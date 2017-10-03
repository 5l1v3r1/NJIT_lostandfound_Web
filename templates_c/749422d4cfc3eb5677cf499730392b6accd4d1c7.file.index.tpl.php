<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 07:23:33
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1739858e63d2828d621-70520002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1491483930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1739858e63d2828d621-70520002',
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
	<title>南京工程学院失物招领平台</title>
	<!-- google map --> 
	<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<!-- intro -->
			<div id="intro" class="contentLeft message">
				欢迎使用南京工程学院失物招领系统！今天是<?php echo $_smarty_tpl->getVariable('date')->value;?>
。
			</div>
			<!-- enter -->
			<div id="enter" class="contentLeft">
				<ul>
					<li><a href="#tabs-1">我丢了东西</a></li>
					<li><a href="#tabs-2">我捡了东西</a></li>
				</ul>
				<div id="tabs-1">
					有<em><?php echo $_smarty_tpl->getVariable('count')->value[0][0]+(($tmp = @$_smarty_tpl->getVariable('count')->value[0][1])===null||$tmp==='' ? 0 : $tmp);?>
</em>件物品遗失，其中<em><?php echo (($tmp = @$_smarty_tpl->getVariable('count')->value[0][1])===null||$tmp==='' ? 0 : $tmp);?>
</em>件已找回！<a href="post.php?type=lost" class="postit">我要登记</a>
				</div>
				<div id="tabs-2">
					有<em><?php echo $_smarty_tpl->getVariable('count')->value[1][0]+(($tmp = @$_smarty_tpl->getVariable('count')->value[1][1])===null||$tmp==='' ? 0 : $tmp);?>
</em>件物品被捡到，其中<em><?php echo (($tmp = @$_smarty_tpl->getVariable('count')->value[1][1])===null||$tmp==='' ? 0 : $tmp);?>
</em>件已归还！<a href="post.php?type=found" class="postit">我要提交</a>
				</div>
			</div>
			<!-- tagcloud -->
			<div id="tagcloud" class="contentRight">
				<h3>标签</h3>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tagcloud')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
?><li><a href="search.php?tag=<?php echo urlencode($_smarty_tpl->tpl_vars['tag']->value['word']);?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['word'];?>
</a></li>
					<?php }} else { ?><li>暂时没有标签</li>
					<?php } ?>
				</ul>
				<div class="clearBoth"></div>
			</div>
			<!-- google map -->
			<div id="index_map_canvas" class="contentLeft"></div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>