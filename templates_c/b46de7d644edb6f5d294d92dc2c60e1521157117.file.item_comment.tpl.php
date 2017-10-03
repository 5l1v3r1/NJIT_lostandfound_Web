<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 06:38:21
         compiled from ".\templates\item_comment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:263358e644cdafd060-19468563%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b46de7d644edb6f5d294d92dc2c60e1521157117' => 
    array (
      0 => '.\\templates\\item_comment.tpl',
      1 => 1491147854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '263358e644cdafd060-19468563',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
				<div id="listbox">
					<h3><a name="comment"></a>留言</h3>
					<ul id="itemlist">
					<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('comments')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
?>
						<li><?php if ($_smarty_tpl->tpl_vars['comment']->value['uid']){?><a href="user.php?id=<?php echo $_smarty_tpl->tpl_vars['comment']->value['uid'];?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['comment']->value['nickname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['comment']->value['username'] : $tmp);?>
</a><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['comment']->value['author'];?>
<?php }?>
							说 “<?php echo $_smarty_tpl->tpl_vars['comment']->value['content'];?>
”
							<p><?php echo $_smarty_tpl->tpl_vars['comment']->value['posttime'];?>
</p></li>
					<?php }} else { ?> 
						<li><p>暂时没有留言</p></li>
					<?php } ?>
					</ul>
					<div id="pagenav"><?php echo $_smarty_tpl->getVariable('pagenav')->value;?>
</div>
					<form action="comment.php?action=post" method="post">
						<input type="hidden" name="item" value="<?php echo $_smarty_tpl->getVariable('item')->value['id'];?>
"/>
						<table class="formTable">
						<?php if ($_smarty_tpl->getVariable('login')->value){?>
							<tr><th>* 用户</th><td><?php echo $_smarty_tpl->getVariable('username')->value;?>
</td></tr>
						<?php }else{ ?>
							<tr><th>* 名称</th><td><input type="text" name="author" id="author"/></td></tr>
							<tr><th>* 邮箱</th><td><input type="text" name="email" id="email"/><span class="tip">不会被公开</span></td></tr>
						<?php }?>
							<tr><th>* 内容</th><td><textarea name="content" id="content"></textarea></td></tr>
							<tr><th>验证码</th><td><img src="include/verify.php" id="verifyimg" title="刷新" onclick="changecode()"/> 
								<p class="tip">请输入图中的数字和字母</p> 
								<input type="text" name="verifycode" id="verifycode"/> 
								<span id="checkverifycode" class="check"></span></td></tr>
							<tr><th></th><td><button type="submit" class="submit">我要留言</button></td></tr> 
						</table>
					</form>
				</div>