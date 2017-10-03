<?php
require_once("header.php");

if(isset($_SESSION['user'])) header('Location: home.php');

switch(trim($_GET['action'])){
	case 'check':
		if(!checkverifycode($_POST['verifycode'])){
			$smarty->assign("form", $_POST);
			$msg = "验证码不正确，请重新登陆";
		}else{
			$clean['username'] = strtolower(trim($_POST['username']));
			$clean['password'] = md5($_GLOBAS['salt'].$_POST['password']);
			
			$sql = $db->prepare("SELECT * FROM Users
				WHERE username=:username AND password=:password");
			$sql->bindParam(':username', $clean['username']);
			$sql->bindParam(':password', $clean['password']);
			$sql->execute();
			
			if($user = $sql->fetch(PDO::FETCH_ASSOC)){
				$db->exec("UPDATE Users SET login=NOW() WHERE username='$user[username]'");
				$_SESSION['user'] = $user;
				header('Location: home.php');
			}else $msg = "帐号或密码错误，请重新登陆";
		}
		break; 
	case 'registed':
		$msg = "注册成功，马上登录！";
		break;
	case 'logout':
		unset($_SESSION['user']);
		header('Location: index.php');
		break;
}
$smarty->assign("warning", $msg);
$smarty->display("login.tpl");

require_once("footer.php");
?>