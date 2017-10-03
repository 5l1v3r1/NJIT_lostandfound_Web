<?php
//新闻详情修改处理
	require_once('../connect.php');
	$_GLOBAS['salt'] = "njit";
	$id = $_POST['id'];//获取id
	$username = htmlspecialchars($_POST['username'], ENT_QUOTES);//对```\\\^^^等字符做转义处理
    $password = htmlspecialchars(md5($_GLOBAS['salt'].$_POST['password']), ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$login = htmlspecialchars($_POST['login'], ENT_QUOTES);
	$updatesql = "update users set username='$username',password='$password',email='$email',login='$login' where id=$id";
	if(mysql_query($updatesql)){
        echo "<script>alert('修改成功');window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('修改失败');window.location.href='index.php';</script>";
    }
?>