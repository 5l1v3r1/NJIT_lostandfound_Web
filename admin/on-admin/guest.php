<?php
require_once('../connect.php');//引入connect文件
$sql = "select * from guests";//查询sql语句
$query = mysql_query($sql);

if(!mysql_error()) {
    if ($query && mysql_num_rows($query)) {
        while ($row = mysql_fetch_assoc($query)) {
            $data[] = $row;//每次给$data[i]指定值
//        echo $row['title']."<br>";//测试是否正常返回
        }
    } else {
        $data = array();
    }
//    var_dump($data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css"/>
</head>
<body>
<!-- 导航条 -->
<nav class="navbar navbar-inverse" role="navigation">

    <div class="container">  <!-- 让子元素居中-->
        <div class="navbar-header">
            <a class="navbar-brand">后台管理系统</a>
        </div>
        <!-- 靠右并居中显示 -->
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="index.php">物品管理</a>
            </li>
            <li>
                <a href="user.php">用户管理</a>
            </li>
            <li>
                <a href="guest.php">Guest管理</a>
            </li>
            <li>
                <a href="./../logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- 宽度width为100% -->
<div class="container">
    <div class="row">
        <!-- 分得12等分的9份-->
        <div class="col-md-12 col-sm-12 ">
            <div class="page-header">
                <h1>GUEST数据库</h1>
            </div>
            <!-- 面板模型 -->
            <div class="panel panel-primary">
                <div class="panel-heading">GUEST数据详情</div>
                <div class="panel-body">
                    <!-- 设置为交互表单和背景 -->
                    <div class="table-responsive ">
                        <!-- 条纹式表格 -->
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>临时用户</th>
                                <th>临时密码</th>
                                <th>发布时间</th>
                                <th>联系方式</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($data)) { //判断数据库是否为空
                                foreach ($data as $value) { //遍历每条数据
                                    ?>
                                    <tr>
                                        <td>&nbsp;<?php echo $value['id'] ?></td>
                                         <td>&nbsp;<?php echo htmlspecialchars($value['title'], ENT_QUOTES) ?></td>
                                        <td>&nbsp;<?php echo htmlspecialchars($value['editcode'], ENT_QUOTES) ?></td>
                                        <td>&nbsp;<?php echo htmlspecialchars($value['available'], ENT_QUOTES) ?></td>
                                        <td>&nbsp;<?php echo htmlspecialchars($value['contact'], ENT_QUOTES) ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>