
<?php
require_once('../connect.php');
//读取旧信息
$id = $_GET['id'];
$query = mysql_query("select * from users where id=$id");
$data = mysql_fetch_assoc($query);//获取关联数组
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户修改</title>
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
                <a href="items.php">物品管理</a>
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
                <h1>修改用户</h1>
            </div>
            <!-- 面板模型 -->
            <div class="panel panel-primary">
                <div class="panel-heading">修改用户详情</div>
                <br>
                <form class="form-horizontal" method="post" action="user.modify.handle.php">
                    <!-- 隐藏id,只为传到修改handle去 -->
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" placeholder="用户名" value="<?php echo $data['username'] ?>"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="password" name="password" placeholder="密码" value="<?php echo $data['password'] ?>"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">电子邮箱</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" placeholder="电子邮箱" value="<?php echo $data['email'] ?>"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9">
                            <button type="submit" class="btn btn-default">提交</button>
                            <button type="reset" class="btn btn-default">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>