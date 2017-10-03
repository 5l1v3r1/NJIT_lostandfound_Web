<?php
    //删除处理php

    require_once('../connect.php');//引入配置php
    $id = $_GET['id'];//获取id
    $deletesql = "delete from items where id=$id";
    if (mysql_query($deletesql)) {
        echo "<script>alert('删除此条成功');window.location.href='index.php';</script>";//弹窗并返回
    } else {
        echo "<script>alert('删除此条失败');window.location.href='index.php';</script>";
    }
?>