<?php
require_once("header.php");

if($_GET['page']){
	$request = $_SESSION['REQUEST'];
	$clean['id'] = $request['id'];
}else{
	$_SESSION['REQUEST'] = $_REQUEST;
	$clean['id'] = $_REQUEST['id'];
}

$sql = $db->prepare("SELECT * FROM Users WHERE id=:id");
$sql->bindParam(':id', $clean['id'], PDO::PARAM_INT);
$sql->execute();
if(!$user = $sql->fetch(PDO::FETCH_ASSOC)){
	$smarty->display("user_null.tpl");
	exit();
}

$pid = $user['profile'];
if($pid){
	$result = $db->query("SELECT * FROM Profiles WHERE id=$pid");
	$profile = $result->fetch(PDO::FETCH_ASSOC);
}

$sql = $db->prepare("SELECT COUNT(*) FROM Items WHERE uid=:uid");
$sql->bindParam(':uid', $clean['id'], PDO::PARAM_INT);
$sql->execute();
$row = $sql->fetch(PDO::FETCH_NUM);

$total = $row[0];
$pagesize = 5;
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

$query = "SELECT `id`,`type`,`what`,`where`,`detail`,`tag`,`posttime`
	FROM Items 	WHERE uid=:uid
	ORDER BY posttime DESC
	LIMIT $start, $pagesize";
$sql = $db->prepare($query);
$sql->bindParam(':uid', $clean['id'], PDO::PARAM_INT);
$sql->execute();

while($item = $sql->fetch(PDO::FETCH_ASSOC)){
	array_push($items, $item);
}

//print_r($items);

$smarty->assign("items", $items);
$smarty->assign("pagenav", $pagenav);
$smarty->assign("user", $user);
$smarty->assign("profile", $profile);
$smarty->display("user.tpl");
require_once("footer.php");
?>