<?php

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'uknow');
define('DBNAME', 'njit');
$_GLOBAS['salt'] = "njit";

/**
 * $dbconnect : koneksi kedatabase
 */
$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

/**
 * Check Error ya ng terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
	die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}
