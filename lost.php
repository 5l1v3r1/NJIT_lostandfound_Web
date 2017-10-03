<?php
require_once("header.php");
$action = trim($_GET['action']);
switch($action){
	
	case 'update':
		
		$clean['id'] = $_SESSION['id'];
		$clean['what'] = htmlspecialchars($_POST['what']);
		$clean['when'] = $_POST['when'];
		$clean['where'] = htmlspecialchars($_POST['building']."#".trim($_POST['room']));
		$clean['detail'] = htmlspecialchars($_POST['detail']);
		$clean['result'] = $_POST['result'];
		
		if($_POST['usemap'])
			$clean['mapdata'] = $_POST[mapdata];
		else $clean['mapdata'] = NULL;
		
		if(trim($_POST['tag'])!=$_POST['oldtag']){
			if($_POST['tag']){
				$clean['tag'] = htmlspecialchars(trim($_POST['tag']));
				$sql = $db->prepare("SELECT * FROM Tags WHERE word=:word");
				$sql->bindParam(':word', $clean['tag']);
				$sql->execute();
		
				if($sql->rowCount()){
					$db->exec("UPDATE Tags SET count=count+1 WHERE word='$clean[tag]'");
				}else{
					$db->exec("INSERT INTO Tags (word) VALUES('$clean[tag]')");
				} 
			}else{
				$clean['tag'] = "";
			}
			$clean['oldtag'] = htmlspecialchars(trim($_POST['oldtag']));
			$db->exec("UPDATE Tags SET count=count-1 WHERE word='$clean[oldtag]'");
		
		}else $clean['tag'] = htmlspecialchars(trim($_POST['oldtag']));
		
		$sql = $db->prepare("UPDATE `Items`
			SET `what`=:what,`when`=:when,`where`=:where,`detail`=:detail,`tag`=:tag,`mapdata`=GeomFromText(:mapdata),`result`=:result
			WHERE `id`=:id");
		$sql->bindParam(':id', $clean['id'], PDO::PARAM_INT);
		$sql->bindParam(':what', $clean['what']);
		$sql->bindParam(':when', $clean['when']);
		$sql->bindParam(':where', $clean['where']);
		$sql->bindParam(':detail', $clean['detail']);
		$sql->bindParam(':tag', $clean['tag']);
		$sql->bindParam(':mapdata', $clean['mapdata']);
		$sql->bindParam(':result', $clean['result'], PDO::PARAM_INT);
		$sql->execute();

		header("Location: lost.php?id=$_SESSION[id]");

		break;
	case 'del':
	case 'mod':
		$clean['id']=$_REQUEST['id'];
		
		$sql = $db->prepare("SELECT `id`,`uid`,`gid`,`what`,`when`,`where`,`detail`,`tag`,`imageurl`,`result`,
			!ISNULL(`mapdata`) as `hasmap`,ASTEXT(`mapdata`) as `mapdata`,`posttime`
			FROM Items WHERE type=0 AND id=:id");
		$sql->bindParam(":id", $clean['id'], PDO::PARAM_INT);
		$sql->execute();
		
		if(!$sql->rowCount()){
			$smarty->display("item_null.tpl");
			break;
		}
		$item = $sql->fetch(PDO::FETCH_ASSOC);
		
		/* 取用户信息 */
		if(isset($item['gid'])){
			$clean['editcode'] = md5($_GLOBAS['salt'].$_POST['editcode']);
			$sql = "SELECT * FROM Guests WHERE id=$item[gid] AND editcode='$clean[editcode]'";
			$result = $db->query($sql);
			if(!$result->rowCount()){
				$smarty->assign("msg", "修改码不正确");
				$smarty->display("item_null.tpl");
				break;
			}
		}else if(isset($item['uid']) && $item['uid']!=$_SESSION['user']['id']){
			$smarty->assign("msg", "这不是您的物品");
			$smarty->display("item_null.tpl");
			break;
		}
		
		if($action=="del" || $_POST['del']){
			if($item['tag']){
				$db->exec("UPDATE Tags SET count=count-1 WHERE word='$item[tag]'");
			}
			$db->exec("DELETE FROM Items WHERE type=0 AND id=$clean[id]");
			
			$smarty->assign("msg", "删除成功");
			$smarty->display("item_null.tpl");
		}else{
			$_SESSION['id'] = $clean['id'];
			$smarty->assign('item', $item);
			$smarty->display("item_lost_edit.tpl");
		}
		
		break;
		
	default:
		if(isset($_GET['id'])){
			$clean['id'] = trim($_GET['id']);
			
			/* 取物品信息 */
			$sql = $db->prepare("SELECT `id`,`uid`,`gid`,`what`,`when`,`where`,`detail`,`tag`,`imageurl`,`result`,
				!ISNULL(`mapdata`) as `hasmap`,ASTEXT(`mapdata`) as `mapdata`,`posttime`
				FROM Items WHERE type=0 AND id=:id");
			$sql->bindParam(":id", $clean['id'], PDO::PARAM_INT);
			$sql->execute();
			
			if(!$sql->rowCount()){
				$smarty->display("item_null.tpl");
				break;
			}
			$item = $sql->fetch(PDO::FETCH_ASSOC);
			
			/* 取用户信息 */
			if(isset($item['gid'])){
				$sql = "SELECT title,contact FROM Guests WHERE id=$item[gid]";
			}else if(isset($item['uid'])){
				$sql = "SELECT U.id id,username,nickname FROM Users U LEFT JOIN Profiles P ON U.profile=P.id WHERE U.id=$item[uid]";
			}else{
				// 没有用户信息
				$smarty->display("item_null.tpl");
				break;
			}
			$result = $db->query($sql);
			$user = $result->fetch(PDO::FETCH_ASSOC);
			
			
			/* 取相关招领信息 */
			$founds = array();
			
			$sql = "SELECT `id`,`what`,ASTEXT(`mapdata`) as `mapdata`
				FROM Items
				WHERE `type`=1 AND '$item[when]'<=`when` AND (";
			
			if($item['hasmap']){
				$sql .= "(!ISNULL(mapdata)
					AND CONTAINS(GeomFromText('$item[mapdata]'), mapdata)) ";
			}else{
				$sql .= "1 ";
			}
			if($item['tag']){
				$sql .= " OR tag='$item[tag]' ";
			}
			$sql .= ") ORDER BY id DESC
					LIMIT 0,10";
			
			$result = $db->query($sql);
			while($found = $result->fetch(PDO::FETCH_ASSOC)){
				array_push($founds, $found);
			}
			
			/* 取留言领信息 */
			$result = $db->query("SELECT count(*) FROM Comments WHERE item=$item[id]");

			$row = $result->fetch(PDO::FETCH_NUM);

			$total = $row[0];
			$pagesize = 10;
			$pages = ceil($total/$pagesize);
			
			$current = $_GET['page'];
			$current = $current<$pages?$current:$pages;
			$current = $current<1?1:$current;
			$start = ($current-1)*$pagesize;
			$pagenav = "";
			if(1<$current)  $pagenav .= "<a href='?id=$item[id]&page=".($current-1)."#comment'>上一页</a> ";
			for($i = 1; $i<=$pages; $i++){
				if($current==$i)
					$pagenav .= "<a class='current'>$i</a> ";
				else $pagenav .= "<a href='?id=$item[id]&page=$i#comment'>$i</a> ";
			}
			if($current<$pages) $pagenav .= "<a href='?id=$item[id]&page=".($current+1)."#comment'>下一页</a> ";
			if($current<$pages) $pagenav .= "<a href='?id=$item[id]&page=$pages#comment'>最后一页</a> ";
			
			$comments = array();
			
			$sql = "SELECT content,author,C.email cemail,uid,U.email uemail,username,nickname,posttime
					FROM `Comments` C
					LEFT JOIN `Users` U ON C.uid=U.id
					LEFT JOIN `Profiles` P ON U.profile=P.id
					WHERE C.item=$item[id]
					ORDER BY posttime ASC
					LIMIT $start, $pagesize";
			
			$result = $db->query($sql);
			while($comment = $result->fetch(PDO::FETCH_ASSOC)){
				array_push($comments, $comment);
			}
			
			$smarty->assign("user", $user);
			$smarty->assign("item", $item);
			$smarty->assign("founds", $founds);
			$smarty->assign("comments", $comments);
			$smarty->assign("pagenav", $pagenav);
			$smarty->display("item_lost.tpl");
			
		}else{
		
			$result = $db->query("SELECT count(*) FROM Items WHERE type=0");

			$row = $result->fetch(PDO::FETCH_NUM);

			$total = $row[0];
			$pagesize = 10;
			$pages = ceil($total/$pagesize);
			
			$current = $_GET['page'];
			$current = $current<$pages?$current:$pages;
			$current = $current<1?1:$current;
			$start = ($current-1)*$pagesize;
			$pagenav = "";
			if(1<$current)  $pagenav .= "<a href='?page=".($current-1)."'>上一页</a> ";
			for($i = 1; $i<=$pages; $i++){
				if($current==$i)
					$pagenav .= "<a class='current'>".$i."</a> ";
				else $pagenav .= "<a href='?page=".$i."'>".$i."</a> ";
			}
			if($current<$pages) $pagenav .= "<a href='?page=".($current+1)."'>下一页</a> ";
			if($current<$pages) $pagenav .= "<a href='?page=".$pages."'>最后一页</a> ";
			
			$items = array();
			
			$sql = "SELECT I.id,type,uid,gid,username,nickname,`what`,`where`,detail,tag,posttime,!ISNULL(imageurl) image,
				!ISNULL(mapdata) hasmap,AsText(mapdata) as mapdata
				FROM Items I,Users U LEFT JOIN Profiles P ON U.profile=P.id
				WHERE type=0 AND I.uid=U.id AND ISNULL(I.gid)
				UNION SELECT I.id,type,uid,gid,title,NULL,`what`,`where`,detail,tag,posttime,!ISNULL(imageurl) image,
				!ISNULL(mapdata) hasmap,AsText(mapdata) as mapdata
				FROM Items I,Guests G
				WHERE type=0 AND I.gid=G.id
				ORDER BY id DESC
				LIMIT $start, $pagesize";
			
			$result = $db->query($sql);
			
			while($item = $result->fetch(PDO::FETCH_ASSOC)){
				array_push($items, $item);
			}
			
//			print_r($items);
//			exit();
		
			$smarty->assign("items", $items);
			$smarty->assign("pagenav", $pagenav);
			$smarty->display("lost.tpl");
		}
}

require_once("footer.php");
?>