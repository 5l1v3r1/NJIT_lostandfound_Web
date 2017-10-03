<?php
require_once("header.php");

$tagcloud = array();

$sql = "SELECT id,word FROM Tags
	WHERE count
	ORDER BY count DESC
	LIMIT 0, 10";
foreach($db->query($sql,PDO::FETCH_ASSOC) AS $tag){
	array_push($tagcloud, $tag);
}

/* 统计信息 */
$count = array();
$sql = "SELECT count(*) count,type,result FROM `Items` GROUP BY `type`,result";
foreach($db->query($sql,PDO::FETCH_ASSOC) AS $result){
	$count[$result['type']][$result['result']] = $result['count'];
}
date_default_timezone_get('PRC');
$date=date('Y年m月d日');
$smarty->assign("date", $date);
$smarty->assign("tagcloud", $tagcloud);
$smarty->assign("count", $count);
$smarty->display("index.tpl");

require_once("footer.php");
?>
 