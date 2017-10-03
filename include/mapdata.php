<?php
require_once("../config.php");
require_once("../header.php");
header("Content-Type: text/xml");

$type = $_GET['type'];
switch($type){
	case 'lost':
		$typestr="type=0";
		break;
	case 'found':
		$typestr="type=1";
		break;
	default:
		$typestr = 1;
}

$sql = "SELECT id,what,AsText(mapdata) as mapdata
	FROM Items WHERE !ISNULL(mapdata)
	AND $typestr;
	ORDER BY id DESC
	LIMIT 0, 20";
$mapdatas = $db->query($sql);

echo "<data type='$type'>\n";
foreach($mapdatas as $mapdata)
	echo "<item id='$mapdata[id]' name='$mapdata[what]'>$mapdata[mapdata]</item>\n";	
echo "</data>";

require_once("../footer.php");
?>
