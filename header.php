 <?php
require_once('config.php');
require_once('include/function.php');
require_once("include/smarty/Smarty.class.php");

$clean = array();

$smarty = new Smarty();
$smarty->assign("login", isset($_SESSION['user']));
$smarty->assign("uid", $_SESSION['user']['id']);
$smarty->assign("username", $_SESSION['user']['username']);
?>