<?php
require_once("header.php");

$smarty->assign("form", $_POST);

switch(trim($_GET['action'])){
	case "check":
		
		if(!$clean['username'] = checkusername($_GET['username'])){
			die('{"msg":"格式不正确","code":0}');
		}
		
		$sql = $db->prepare("SELECT * FROM Users
				WHERE username=:username");
		$sql->bindParam(':username', $clean['username']);
		$sql->execute();
		
		if($sql->rowCount()){
			die('{"msg":"用户已存在","code":0}');
		}else{
			die('{"msg":"可以注册","code":1}');
		}
		break;
	case "post":
		
		if(!checkverifycode($_POST['verifycode'])){
			$msg="验证码不正确"; break;
		}
		
		if(!$clean['username'] = checkusername($_POST['username'])){
			$msg="用户名格式不正确，请重新填写"; break;
		}
		 
		$clean['password'] = MD5($_GLOBAS['salt'].$_POST['password']);
		
		if(!$clean['email'] = checkemail($_POST['email'])){
			$msg="邮箱格式不正确，请重新填写"; break;
		}
		
		$sql = $db->prepare("INSERT INTO Users (username,password,email)
			VALUES(:username, :password, :email)");
		$sql->bindParam(':username', $clean['username']);
		$sql->bindParam(':password', $clean['password']);
		$sql->bindParam(':email', $clean['email']);
		$sql->execute();

		if($sql->rowCount()){
			header('Location: login.php?action=registed');
		}else $msg="注册失败";
		
		break;
}
$smarty->assign("warning", $msg);
$smarty->display("register.tpl");
?>