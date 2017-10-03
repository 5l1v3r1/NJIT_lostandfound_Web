<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 07:23:39
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1531658e64f6ba26358-57911782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1491488617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1531658e64f6ba26358-57911782',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
	<!-- header start -->
		<script type="text/javascript" src="js/weather.js"></script>
		<script type="text/javascript" src="js/count.js"></script>
	<div id="header">
		<div class="container">
			<div id="logo"></div>
			<h1></h1>
			<h2></h2>
			<ul id="nav">
				<li><a href="index.php" title="Index" id="nav-index">首页</a></li>
				<li><a href="lost.php" title="Lost" id="nav-lost">寻物启事</a></li>
				<li><a href="found.php" title="Found" id="nav-found">招领启事</a></li>
				<li><a href="about.php" title="About_us" id="nav-about">关于我们</a></li>
			</ul>
			<form id="searchbox" action="search.php" method="get">
				<input type="text" id="keyword" name="keyword" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
" placeholder="找东西" />
				<input type="submit" id="searchbtn" value="搜索" />
				<span class="pipe">|</span><a href="search.php?action=advance">高级搜索</a>		
			</form>
			<div id="login">
				<img src="images/usericon.png" alt="成员登录" id="usericon" />
			<?php if ($_smarty_tpl->getVariable('login')->value){?>
				<a href="user.php?id=<?php echo $_smarty_tpl->getVariable('uid')->value;?>
"><?php echo $_smarty_tpl->getVariable('username')->value;?>
</a><span class="pipe">|</span><a href="home.php">个人中心</a><span class="pipe">|</span><a href="login.php?action=logout">退出</a>
			<?php }else{ ?>
				<a href="login.php">登录</a><span class="pipe">|</span><a href="register.php">注册</a><span class="pipe">|</span>
			<?php }?>
			</div>
		</div>
	</div>
	<!-- header ends -->
