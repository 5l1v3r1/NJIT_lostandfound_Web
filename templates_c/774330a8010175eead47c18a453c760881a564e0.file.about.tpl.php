<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 06:53:26
         compiled from ".\templates\about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1539658e64856785a70-92703652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '774330a8010175eead47c18a453c760881a564e0' => 
    array (
      0 => '.\\templates\\about.tpl',
      1 => 1491486802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1539658e64856785a70-92703652',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
<?php $_template = new Smarty_Internal_Template("config.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<title>关于我们</title>
	<style>
	.container{
	height:300px;}
	h3{
	font-size: 15px;
    color: #1264ce;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 15px;}
	</style
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<h3>About</h3>
				<h3>Thinking</h3>
				<li><a href="https://github.com">Github</a></li>
				<li><a href="http://www.google.cn/maps">Google地图</a></li>
				<li><a href="http://getbootstrap.com">Bootstrap</a></li>
				<li><a href="http://jquery.com">jQuery</a></li>
				<li><a href="http://www.smarty.net/">Smarty</a></li>
				<li><a href="https://www.seniverse.com/">心知天气</a></li>
				<h3>Feedback</h3>
				<li>Emali:uknowsec@gmail.com</li>
				<li>QQ:9690627</li>				
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>