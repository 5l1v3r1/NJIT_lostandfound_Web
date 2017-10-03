<?php
require_once("header.php");

if(!isset($_SESSION['user'])) header('Location: login.php');

$uid = $_SESSION['user']['id'];

$sql = $db->query("SELECT * FROM Users WHERE id=$uid");
$user = $sql->fetch(PDO::FETCH_ASSOC);
$pid = $user['profile'];
if($pid){
	$result = $db->query("SELECT * FROM Profiles WHERE id=$pid");
	$profile = $result->fetch(PDO::FETCH_ASSOC);
}

$messages = array();

$result = $db->query("SELECT * FROM Messages WHERE `to`=$uid AND !`read`
	ORDER BY posttime DESC LIMIT 0,5");
while($msg = $result->fetch(PDO::FETCH_ASSOC)){
	array_push($messages, $msg);
}
 
switch(trim($_GET['action'])){
	case 'update':
		
		$clean['nickname'] = htmlspecialchars($_POST['nickname']);
		$clean['email'] = htmlspecialchars($_POST['email']);
		$clean['qq'] = htmlspecialchars($_POST['qq']);
		$clean['msn'] = htmlspecialchars($_POST['msn']);
		$clean['gtalk'] = htmlspecialchars($_POST['gtalk']);
		$clean['phone'] = htmlspecialchars($_POST['phone']);
		$clean['hide'] = $_POST['hide']?1:0;
		$clean['signature'] = htmlspecialchars($_POST['signature']);
		
		if($pid){
			$sql = $db->prepare("UPDATE Profiles SET
				nickname=:nickname,email=:email,qq=:qq,msn=:msn,
				gtalk=:gtalk,phone=:phone,hide=:hide,signature=:signature
				WHERE id=:id");
		}else{
			$sql = $db->prepare("INSERT INTO Profiles
				(nickname,email,qq,msn,gtalk,phone,hide,signature)
				VALUES(:nickname, :email, :qq, :msn, :gtalk, :phone, :hide, :signature)");
		}
		if($pid) $sql->bindParam(':id', $pid, PDO::PARAM_INT);
		$sql->bindParam(':nickname', $clean['nickname']);
		$sql->bindParam(':email', $clean['email']);
		$sql->bindParam(':qq', $clean['qq']);
		$sql->bindParam(':msn', $clean['msn']);
		$sql->bindParam(':gtalk', $clean['gtalk']);
		$sql->bindParam(':phone', $clean['phone']);
		$sql->bindParam(':hide', $clean['hide']);
		$sql->bindParam(':signature', $clean['signature']);
		$sql->execute();
		
		if(!$pid){
			$result = $db->query("SELECT LAST_INSERT_ID()");
			$row = $result->fetch(PDO::FETCH_NUM);
			$pid = $row[0];
			$db->exec("UPDATE Users SET profile=$pid WHERE id=$uid");
		}
		
		header("Location: home.php");
		
		break;
	case 'edit':
		
		if(!$pid){
			$msg = "您还没有联系信息，立即创建：";
		}
		
		$smarty->assign('msg', $msg);
		$smarty->assign('profile', $profile);
		$smarty->display("home_edit.tpl");
		exit();
		break;
}

$result = $db->query("SELECT COUNT(*) FROM Items WHERE uid=$uid");
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

$result = $db->query("SELECT `id`,`type`,`what`,`where`,`detail`,`tag`,`posttime`
	FROM Items 	WHERE uid=$uid
	ORDER BY posttime DESC
	LIMIT $start, $pagesize");

while($item = $result->fetch(PDO::FETCH_ASSOC)){
	array_push($items, $item);
}
//print_r($items);
$smarty->assign("items", $items);
$smarty->assign("messages", $messages);
$smarty->assign("pagenav", $pagenav);
$smarty->assign('profile', $profile);
$smarty->display("home.tpl");

require_once("footer.php");
?>