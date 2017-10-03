<?php

function mysqlquery($query){
	return mysql_query($query)
    	or die("Invalid query: ".mysql_error());
}

function checkverifycode($code){
	$verifycode = $_SESSION['verify_code'];
	
	// 一次性验证，防止重复提交
	$_SESSION['verify_code'] = "";
		
	return $code == $verifycode;
}

function checkusername($str){
	if(preg_match('/^[a-z][a-z0-9]{4,11}/', strtolower($str)))
		return strtolower(trim($str));
	else return false;
}

function checkemail($str){
	if(preg_match('/^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+)*$/i', $str))
		return strtolower(trim($str));
	else return false;
}
?>