<?php
require_once("header.php");

switch(trim($_GET['action'])){
	case 'advance':
		$smarty->display("search_advance.tpl");
		break;
	default:
		
		if($_GET['page']){
			$lastSearch = $_SESSION['lastSearch'];
			$type = $lastSearch['type'];
			$datetype = $lastSearch['datetype'];
			$datedir = $lastSearch['datedir'];
			$building = $lastSearch['building'];
			$room = $lastSearch['room'];
			$clean['keyword'] = $lastSearch['keyword'];
			$clean['tag'] = $lastSearch['tag'];
			$clean['when'] = $lastSearch['when'];
			$clean['where'] = $_REQUEST['where'];
			$clean['mapdata'] = $lastSearch['mapdata'];
		}else{
			$type = $_REQUEST['type'];
			$datetype = $_REQUEST['datetype'];
			$datedir = $_REQUEST['datedir'];
			$building = $_REQUEST['building'];
			$room = $_REQUEST['room'];
			$where = $_REQUEST['where'];
			$clean['keyword'] = $_REQUEST['keyword'];
			$clean['tag'] = $_REQUEST['tag'];
			$clean['when'] = $_REQUEST['when'];
			$clean['where'] = $_REQUEST['where'];
			$clean['mapdata'] = $_REQUEST['mapdata'];
			$_SESSION['lastSearch'] = $_REQUEST;
		} 
		
		if(!$clean['where'] = $where)
			$clean['where'] = "$building#$room";
		
		$searchstr = "";
		
		if($clean['keyword']){
			$searchstr .= "CONCAT(`what`,`where`,`detail`) LIKE CONCAT('%',:keyword,'%') AND ";
		}
		
		if($clean['tag']){
			$searchstr .= "tag=:tag AND ";
		}
		
		if($where || $building || $room){ 
			$searchstr .= "`where` LIKE CONCAT('%',:where,'%') AND ";
		}
		
		
		
		if($datetype){
			switch($datedir){
				case '0':
					$searchstr .= "posttime<=:when AND ";
					break;
				case '1':
					$searchstr .= "posttime>=:when AND ";
					break;
			}
		}
		
		$usemap = $_POST['usemap'];
		
		if($usemap && $clean['mapdata']!=""){
			$clean['mapdata'] = $_POST[mapdata];
			$searchstr .= "CONTAINS(GeomFromText(:mapdata), mapdata) AND ";
		}
		if(($searchstr.="1")=="1"){
			print_r($lastSearch);
			$msg = "请输入关键词";
			$smarty->assign("msg", $msg);
		}else{
			
			switch($type){
				case '0':
				case '1':
					$typestr = "type=:type";
					break;
				default:
					$typestr = 1;
			}
			
			$query = "SELECT count(*) FROM Items
						WHERE $typestr AND $searchstr";		
			
			$sql = $db->prepare($query);
			if($clean['keyword']) $sql->bindParam(':keyword', $clean['keyword']);
			if($clean['tag']) $sql->bindParam(':tag', $clean['tag']);
			if($usemap) $sql->bindParam(':mapdata', $clean['mapdata']);
			if($datetype && isset($datedir)) $sql->bindParam(':when', $clean['when']);
			if($where || $building || $room) $sql->bindParam(':where', $clean['where']);
			if($typestr!=1) $sql->bindParam(':type', $type, PDO::PARAM_INT);
			$sql->execute();
			$row = $sql->fetch(PDO::FETCH_NUM);
			
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
			
			$query = "SELECT `id`,`type`,`what`,`where`,`detail`,`tag`,`posttime`,!ISNULL(`imageurl`) image,!ISNULL(mapdata) hasmap
						FROM Items 	WHERE $typestr AND $searchstr
						ORDER BY posttime DESC
						LIMIT $start, $pagesize";
			
			$sql = $db->prepare($query);
			if($clean['keyword']) $sql->bindParam(':keyword', $clean['keyword']);
			if($clean['tag']) $sql->bindParam(':tag', $clean['tag']);
			if($usemap) $sql->bindParam(':mapdata', $clean['mapdata']);
			if($datetype && isset($datedir)) $sql->bindParam(':when', $clean['when']);
			if($where || $building || $room) $sql->bindParam(':where', $clean['where']);
			if($typestr!=1) $sql->bindParam(':type', $type, PDO::PARAM_INT);
			$sql->execute();
			
			while($item = $sql->fetch(PDO::FETCH_ASSOC)){
				array_push($items, $item);
			}
			
			//print_r($items);
			
			$smarty->assign("keyword", $clean['keyword']);
			$smarty->assign("items", $items);
			$smarty->assign("pagenav", $pagenav);
		}
		
		$smarty->display("search_result.tpl");
}
require_once("footer.php");
?>