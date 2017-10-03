<?php
//mysql初始化程序文件编写

//连接数据库
if(!($con = mysql_connect('localhost', 'root', 'uknow'))){
	echo mysql_error();
} else {
//	echo "连接数据库成功";
}

//选择数据库
if(!mysql_select_db('njit')){
	echo mysql_error();
}

//设置字符集编码格式
if(!mysql_query('set names utf8')){
	echo mysql_error();
}
?>