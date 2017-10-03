<?php /* Smarty version Smarty-3.0.6, created on 2017-03-12 09:07:29
         compiled from ".\templates\help.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2905558c50fd1c01523-62961935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4582a8c88e7e16b7f2a637e667b196b6ad6cc967' => 
    array (
      0 => '.\\templates\\help.tpl',
      1 => 1323434556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2905558c50fd1c01523-62961935',
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
	<title>拾客>如何使用</title>
	<link href="css/help.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div style="position: fixed; width: 100%; z-index: 100;">
		<div class="container">
			<div class="contentRight">
				<h3>目录</h3>
				<ul>
					<li><a href="#enter">如何提交信息</a></li>
					<li><a href="#post">如何填写寻物/招领启事</a></li>
					<li><a href="#map">如何使用地图</a></li>
					<li><a href="#edit">如何编辑物品</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<h2>使用说明</h2>
				<p>本页面将介绍如何有效地使用拾客系统。</p>
				<h3>功能介绍</h3>
				<p>拾客网站分为“寻物启事”、“招领启事”、“感谢信（暂未开放）”三个主要版块。</p>
				<h3><a name="enter">如何提交信息</a></h3>
				<ul><li><h4>从首页的选项卡入口，您可以便捷选择您要提交的信息类型</h4>
				<img src="images/help/1_enter_1.jpeg"/>
				<p class="imgtip">[图]从首页提交寻物启事</p>
				<img src="images/help/1_enter_2.jpeg"/>
				<p class="imgtip">[图]从首页提交招领启事</p></li>
				<li><h4>从“寻物启事”、“招领启事”版块的快速提交入口</h4>
				<img src="images/help/1_enter_3.jpeg" />
				<p class="imgtip">[图]从“寻物启事”版块快速提交寻物启事</p></li></ul>
				<h3><a name="post">如何填写寻物/招领启事</a></h3>
				<ol><li><h4>填写物品信息</h4>
					<img src="images/help/2_post_lost_1.jpeg" class="floatImg"/>
					<p class="imgtip"> [图]填写寻物启事</p>
					<p><span>物品名称：</span>所丢失的物品的名称</p>
					<p><span>遗失时间：</span>最后一次见到该物品的时间。<em>如果不记得，可以给出一个更早的时间。</em></p>
					<p><span>遗失地点：</span>如果是在公共场所丢失了您的物品，可以从列表中选择您当时所在的地点。<em>如果您不能清楚的记得物品遗失的地点，可以使用地图将您认为可能遗失物品的区域标注出来。</em></p>
					<p><a href="#map">如何使用地图?</a></p>
					<p><span>物品照片：</span>如果有的话，您可以上传一张物品的照片。</p>
					<p><span>物品描述：</span>您可以阐述下物品的一些细节或其它事项。</p>
					<p><span>物品标签：</span>给物品签上一个标签，有助于我们对物品分类，同时您也可以查看帖有相同签的物品。</p>
					<p class="clearLeft"></p></li>
					<li><h4>填写联系人信息</h4>
					<img src="images/help/2_post_2.jpeg" class="floatImg"/>
					<p class="imgtip">[图]填写联系人信息</p>
					<p><span>帐户类型：</span>如果您是未注册用户，您可以使用“临时的联系方式”，留下您的联系信息。<em>如果你已注册并登录拾客，您可以直接使用“当前登录的帐户”而无需填写该项，也可以使用临时的联系方式为他人发布信息。</em></p>
					<p><span>称呼：</span>别人如何称呼您。</p>
					<p><span>联系方式：</span>别人如何联系您。</p>
					<p><span>有效时间：</span>有效时间一过，您的联系信息将被删除，以保护您的隐私。</p>
					<p><span>修改码：</span>如果您想编辑你提交过的物品，可以使用修改码。<em>在本站注册登录的用户可以直接编辑自己提交的物品。</em></p>
					<p><a href="#edit">如何编辑物品?</a></p></li>
					<li><h4>提交表格</h4>
					<img src="images/help/2_post_3.jpeg"/>
					<p class="imgtip">[图]完成并提交信息</p>
					<p><em>如果提交过程出现错误，请根据提示信息仔细检查您填写内容。</em></p></li></ol>
				<h3><a name="map">如何使用地图</a></h3>
				<h4>为什么要使用地图?</h4>
				<p>有的时候您丢了东西，可能您去了很多个地方，实在记不得东西落在哪里了。这时候您可以在地图上标出你经过的地方，把可能遗落物品的地方标在地图上。一旦有人在您标的范围内提交了物品，网站就会提醒您关注。</p>
				<h4>地图的一般操作方法：</h4>
				<ul><li><p><span>缩放地图：</span>使用左上角的[+/-]号；使用鼠标滑轮；双击地图可以放大局部位置；</p></li>
					<li><p><span>平移地图：</span>使用鼠标左键拖动地图，可以平移地图；</p></li></ul>
				<h4>发布/编辑寻物信息</h4>
				<img src="images/help/3_map_1.jpeg"/>
				<p class="imgtip">[图]某同学在人文楼上课后去了中区食堂吃饭，过后发现自己丢了东西，但不知道丢在哪里了</p>
				<p>对于寻物信息，需要在地图上用区域表示，也就是说至少要标记三个点，操作方法如下：</p>
				<ul><li><p><span>添加标记：</span>在地图上单击鼠标左键，添加一个标记；</p></li>
					<li><p><span>删除标记：</span>在标记上双击鼠标左键，删除一个标记；</p></li>
					<li><p><span>移动标记：</span>使用鼠标左键拖动标记，可以移动标记；</p></li>
					<li><p><span>清空标记：</span>使用右上角的[清空标记]按钮，可以清空标记；</p></li></ul>
				<h4>发布/编辑招领信息</h4>
				<img src="images/help/3_map_2.jpeg"/>
				<p class="imgtip">[图]某同学在中区食堂门口捡到东西</p>
				<p>对于招领信息，只要在地图上用一个标记表示，操作方法如下：</p>
				<ul><li><p><span>添加标记：</span>在地图上单击鼠标左键，添加一个标记；</p></li>
					<li><p><span>移动标记：</span>使用鼠标左键拖动标记，可以移动标记；</p></li></ul>
				<h4>查看物品信息</h4>
				<img src="images/help/3_map_3.jpeg"/>
				<p class="imgtip">[图]被捡到的物品出现在丢失的区域内，形成关联</p>
				<p>物品信息的地图中，一般有两类信息：</p>
				<ul><li><p><span>红色标记：</span>表示这个地方有人捡到东西；</p></li>
					<li><p><span>黄色区域：</span>表示这个区域内有人丢了东西；</p></li></ul>
				<p></p>
				<h3><a name="edit">如何编辑物品</a></h3>
				<p>从物品信息页右边栏的管理物品一项，可以进入物品编辑页面。</p>
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>