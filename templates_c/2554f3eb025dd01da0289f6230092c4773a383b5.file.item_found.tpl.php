<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 07:23:18
         compiled from ".\templates\item_found.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1441658e644cd9cbce4-49590728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2554f3eb025dd01da0289f6230092c4773a383b5' => 
    array (
      0 => '.\\templates\\item_found.tpl',
      1 => 1490457166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1441658e644cd9cbce4-49590728',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\websoft9\wampstack-5.5.35-1\apache2\htdocs\include\smarty\plugins\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
<?php $_template = new Smarty_Internal_Template("config.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<title>招领启事><?php echo (($tmp = @$_smarty_tpl->getVariable('item')->value['what'])===null||$tmp==='' ? "物品信息不存在" : $tmp);?>
</title>
	<?php if ($_smarty_tpl->getVariable('item')->value['hasmap']){?><script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript">
		mapdatas.push(["<?php echo $_smarty_tpl->getVariable('item')->value['mapdata'];?>
",<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
,"<?php echo $_smarty_tpl->getVariable('item')->value['what'];?>
"]);
		<?php  $_smarty_tpl->tpl_vars['lost'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('losts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['lost']->key => $_smarty_tpl->tpl_vars['lost']->value){
?>mapdatas.push(["<?php echo $_smarty_tpl->tpl_vars['lost']->value['mapdata'];?>
",<?php echo $_smarty_tpl->tpl_vars['lost']->value['id'];?>
,"<?php echo $_smarty_tpl->tpl_vars['lost']->value['name'];?>
"]);<?php }} ?>
	</script>
	<script type="text/javascript" src="js/item_map.js"></script><?php }?>
	<script type="text/javascript" src="js/item.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="accordion">
					<h3><a href="#">招领信息</a></h3>
					<div>
						<?php if ($_smarty_tpl->getVariable('item')->value['result']){?><img src="images/done.png" id="done"/><?php }?>
						<table class="itemTable">
						<tr><th>物品名称</th><td><?php echo $_smarty_tpl->getVariable('item')->value['what'];?>
</td>
							<td rowspan="5" class="imageCol"><img src="<?php echo (($tmp = @$_smarty_tpl->getVariable('item')->value['imageurl'])===null||$tmp==='' ? "images/noitem.png" : $tmp);?>
" id="image" class="image-fixed"></img></td></tr>
						<tr><th>发现日期</th><td><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['when'],"%Y-%m-%d");?>
</td></tr>
						<tr><th>发现地点</th><td><?php if ($_smarty_tpl->getVariable('item')->value['where']!="#"){?><a href="search.php?where=<?php echo $_smarty_tpl->getVariable('item')->value['where'];?>
" class="where"><?php echo $_smarty_tpl->getVariable('item')->value['where'];?>
</a><?php }else{ ?>未注明<?php }?></td></tr>
						<tr><th>物品描述</th><td><?php echo $_smarty_tpl->getVariable('item')->value['detail'];?>
</td></tr>
						<tr><th>标签</th><td><?php if ($_smarty_tpl->getVariable('item')->value['tag']){?><a href="search.php?tag=<?php echo urlencode($_smarty_tpl->getVariable('item')->value['tag']);?>
" class="tag"><?php echo $_smarty_tpl->getVariable('item')->value['tag'];?>
</a><?php }else{ ?>未帖标签<?php }?></td></tr>
						<?php if ($_smarty_tpl->getVariable('item')->value['hasmap']){?><tr><th>地图信息</th><td colspan="2"><div id="item_map_canvas"></div></td></tr><?php }?>
						<?php if ($_smarty_tpl->getVariable('item')->value['gid']){?>
						<tr><th>提交者</th><td><?php echo $_smarty_tpl->getVariable('user')->value['title'];?>
</td></tr>
						<tr><th>联系方式</th><td><?php echo $_smarty_tpl->getVariable('user')->value['contact'];?>
</td></tr>
						<?php }else{ ?>
						<tr><th>提交者</th><td><?php echo (($tmp = @$_smarty_tpl->getVariable('user')->value['nickname'])===null||$tmp==='' ? $_smarty_tpl->getVariable('user')->value['username'] : $tmp);?>
</td></tr>
						<tr><th>联系方式</th><td><a href="user.php?id=<?php echo $_smarty_tpl->getVariable('user')->value['id'];?>
">查看详细</a></td></tr>
						<?php }?>
						<tr><th>提交时间</th><td><?php echo $_smarty_tpl->getVariable('item')->value['posttime'];?>
</td></tr>
						</table>
					</div>
				</div>
			</div>
			<div class="contentRight">
				<h3>相关寻物信息</h3>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['lost'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('losts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['lost']->key => $_smarty_tpl->tpl_vars['lost']->value){
?>
						<li><a href="lost.php?id=<?php echo $_smarty_tpl->tpl_vars['lost']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lost']->value['what'];?>
</a></li>
					<?php }} else { ?>
						<li>没有相关寻物启事</li>
					<?php } ?>
				</ul>
			</div>
			<div class="contentRight">
				<h3>物品管理</h3>

				<?php if ($_smarty_tpl->getVariable('item')->value['gid']){?>
					<p>请输入修改码</p>
					<form action="?action=mod" method="post">
						<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
"/>
						<input type="password" name="editcode"/><br/>
						<label><input type="checkbox" name="del" id="del" value="1"/> 删除信息</label>
						<button type="submit" id="editbtn">修改信息</button>
					</form>
				<?php }else{ ?>
					<?php if ($_smarty_tpl->getVariable('login')->value&&$_smarty_tpl->getVariable('item')->value['uid']==$_smarty_tpl->getVariable('uid')->value){?>
					<ul><li><a href="?action=mod&id=<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
">修改信息</a></li>
					<li><a href="?action=del&id=<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
" onclick="return window.confirm('确定要删除？');">删除信息</a></li>
					</ul>
					<?php }else{ ?>
					<p>这不是您提交的物品信息</p>
					<?php }?>
				<?php }?>
			</div>
			<div class="contentLeft">
				<?php $_template = new Smarty_Internal_Template("item_comment.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>