<?php
require_once("header.php");

switch($_GET['action']){
	case 'post':
		
		if(!checkverifycode($_POST['verifycode'])){
			$msg="验证码错误，请返回重试";
			break;
		}
		
		$clean['item'] = $_POST['item'];
		$uid = $_SESSION['user']['id'];
		$clean['uid'] = ($uid)?$uid:NULL;
		$clean['author'] = htmlspecialchars($_POST['author']);
		$clean['email'] = $_POST['email'];
		if(!$uid && !$clean['email'] = checkemail($_POST['email'])){
			$msg="邮箱格式不正确，请重新填写"; break;
		} 
		$clean['content'] = htmlspecialchars($_POST['content']);
		
		$sql = $db->prepare("INSERT INTO Comments (`item`,`uid`,`author`,email,content)
			VALUES(:item,:uid,:author,:email,:content)");
		$sql->bindParam(':item', $clean['item'], PDO::PARAM_INT);
		$sql->bindParam(':uid', $clean['uid'], PDO::PARAM_INT);
		$sql->bindParam(':author', $clean['author']);
		$sql->bindParam(':email', $clean['email']);
		$sql->bindParam(':content', $clean['content']);
		$sql->execute();
		
		$msg="留言成功，<a href='$_SERVER[HTTP_REFERER]#comment'>返回</a>";
		
		break;
}
$smarty->assign('msg', $msg);
$smarty->display("comment.tpl");
require_once("footer.php");
?>