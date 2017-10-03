<?php
//查找数据库
require_once('connect.php');
//读取旧信息
$type = $_GET['type'];
//echo $type;
mysql_query("set names 'utf8'");//设置编码，解决乱码问题
$query = mysql_query("select * from newstable where type='$type'");
//$data = mysql_fetch_assoc($query);//获取关联数组

$arr = array();//创建一个数组


if($query&&mysql_num_rows($query)){
    while($row = mysql_fetch_assoc($query)){
        $data[] = $row;//数组负责
    } 
    $resultJson = array("state"=>200, "result"=>$data);//json格式的数组
    echo urldecode(json_encode($resultJson));//Json格式输出
}  else {
    $resultJson = array("state"=>0);
    echo urldecode(json_encode($resultJson));
}

//while($row = mysql_fetch_array($query)) {//以数组形式返回每一行
////            echo $row['title'] . "," . $row['img']. "," . $row['content']. "," . $row['time'];
//    array_push($arr, array("title"=>urlencode($row['title']),"img"=>urlencode($row['img']),"dateline"=>urlencode($row['dateline'])));
//}
//$resultJson = array("state"=>200, "result"=>$arr);//json格式的数组
//
//echo urldecode(json_encode($resultJson));//Json格式输出

?>