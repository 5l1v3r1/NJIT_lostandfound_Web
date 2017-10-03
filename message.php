<?php
require_once("header.php");

switch($_GET['action']){
	case 'send':
		
		if(!checkverifycode($_POST['verifycode'])){
			$msg="验证码错误，请返回重试";
			break;
		}
		
		$clean['from'] = $_SESSION['user']['id'];
		$clean['to'] = $_POST['to'];
		$clean['content'] = htmlspecialchars($_POST['content']);
		
		$sql = $db->prepare("INSERT INTO Messages (`from`,`to`,content)
			VALUES(:from, :to, :content)");
		$sql->bindParam(':from', $clean['from'], PDO::PARAM_INT);
		$sql->bindParam(':to', $clean['to'], PDO::PARAM_INT);
		$sql->bindParam(':content', $clean['content']);
		$sql->execute();
		
		$msg="信息发送成功";
		
		break;
}
$smarty->assign('msg', $msg);
$smarty->display("message.tpl");
require_once("footer.php");
?> 