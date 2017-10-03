<?php

/* 启用 session */
session_start();

$_GLOBAS['salt'] = "njit";	// 网站启用后请勿修改，否则可能导致用户无法正常登陆
$_GLOBAS['upload_dir'] = "uploads/";	// 上传目录

/* 填写数据库信息 */

$mysql_server = "localhost";	// 数据库服务器
$mysql_username = "root";	// 数据库用户名
$mysql_password = "uknow";	// 数据库密码
$mysql_dbname = "njit";	// 数据库名称

/* 连接数据库 */
$db = new PDO("mysql:host=$mysql_server;dbname=$mysql_dbname",
	$mysql_username,$mysql_password);
$db->exec("SET NAMES utf8");	// 解决 UTF-8 乱码问题
$db->exec("SET time_zone = '+8:00'");	// 时区

?> 
