<?php /* Smarty version Smarty-3.0.6, created on 2017-04-02 15:59:16
         compiled from ".\templates\item_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:339158e11fd49b7702-20208679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2750bc82491e3c1fc54ab2cbb952fcf5c95cca1c' => 
    array (
      0 => '.\\templates\\item_list.tpl',
      1 => 1491147822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '339158e11fd49b7702-20208679',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

				<!-- item-list -->
				<ul id="itemlist">
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?><li class="item"><a<?php if ($_smarty_tpl->tpl_vars['item']->value['uid']&&!$_smarty_tpl->tpl_vars['item']->value['gid']){?> href="user.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['uid'];?>
"<?php }?> class="who"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['nickname'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['item']->value['username'] : $tmp);?>
</a> <?php if ($_smarty_tpl->tpl_vars['item']->value['where']!="#"){?>在 <a href="search.php?where=<?php echo $_smarty_tpl->tpl_vars['item']->value['where'];?>
" class="where"><?php echo $_smarty_tpl->tpl_vars['item']->value['where'];?>
</a> <?php }?><?php if ($_smarty_tpl->tpl_vars['item']->value['type']){?>捡到了<?php }else{ ?>丢失了<?php }?> <a href="?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="what"><?php echo $_smarty_tpl->tpl_vars['item']->value['what'];?>
</a> “<?php echo $_smarty_tpl->tpl_vars['item']->value['detail'];?>
”
						<?php if ($_smarty_tpl->tpl_vars['item']->value['image']){?><img src="images/image.png" title="有图有真相" /><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['item']->value['hasmap']){?><img src="images/map.png" title="有地图" /><?php }?>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['posttime'];?>
 <?php if ($_smarty_tpl->tpl_vars['item']->value['tag']){?>标签[<a href="search.php?tag=<?php echo urlencode($_smarty_tpl->tpl_vars['item']->value['tag']);?>
" class="tag"><?php echo $_smarty_tpl->tpl_vars['item']->value['tag'];?>
</a>]<?php }?></p></li>
					<?php }} else { ?>
					<li><p>什么东西也没有！</p></li>
					<?php } ?></ul>
