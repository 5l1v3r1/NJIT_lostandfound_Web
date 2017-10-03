<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 03:34:49
         compiled from ".\templates\search_advance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2498158e619c9836685-59106960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bf5de803f1b1f027c5b8a390999928b8f570aee' => 
    array (
      0 => '.\\templates\\search_advance.tpl',
      1 => 1491474623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2498158e619c9836685-59106960',
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
	<title>搜索物品</title>
	<script type="text/javascript"></script>
	<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="accordion">
					<h3><a href="#">高级搜索</a></h3>
					<div>
						<form action="search.php" method="post">
							<table class="formTable">
								<tr><th>物品名称</th><td><input type="text" name="keyword" id="keywords"/></td></tr>
								<tr><th>搜索类别</th><td><label><input type="radio" class="radio" name="type" value="" checked="checked" />不限</label>
									<label><input type="radio" class="radio" name="type" value="0" />寻物启事</label>
									<label><input type="radio" class="radio" name="type" value="1" />招领启事</label></td></tr>
								<tr><th>时间</th><td><label><input type="radio" class="radio" name="datetype" value="" checked="checked" />不限</label>
									<label><input type="radio" class="radio" name="datetype" value="1" />在
									<input type="text" name="when" id="datepicker" /><select name="datedir" size="1">
									<option value="0" label="之前" selected="selected"></option>
									<option value="1" label="之后"></option>
									</select></label></td></tr>
								<tr><th>地点</th><td><table>
													<tr><td>公共场所</td>
														<td>楼层/房间号</td></tr>
													<tr><td><select name="building" id="building">
														<option value="">不限</option>
														<option value="图书馆">图书馆</option>
														<option value="学海湾">学海湾</option>
														<option value="东馆">东馆</option>
														<option value="西馆">西馆</option>
														<option value="南馆">南馆</option>
														<option value="北大活">北大活</option>
														<option value="东大活">东大活</option>
														<option value="北区一食堂">北区一食堂</option>
														<option value="北区二食堂">北区二食堂</option>
														<option value="东区一食堂">东区一食堂</option>
														<option value="东区二食堂">东区二食堂</option>
														<option value="北区足球场">北区足球场</option>
														<option value="北区篮球场">北区篮球场</option>
														<option value="东区足球场">东区足球场</option>
														<option value="东区篮球场">东区篮球场</option>
														<option value="体育馆">体育馆</option>
														<option value="北区商店">北区商店</option>
														<option value="东区商店">东区商店</option>
														<option value="北区宿舍楼">北区宿舍楼</option>
														<option value="东区宿舍楼">东区宿舍楼</option>
														<option value="信息楼">信息楼</option>
														<option value="经管楼">经管楼</option>
														<option value="文理楼">文理楼</option>
														<option value="设计楼">设计楼</option>
														<option value="行政楼">行政楼</option>
														<option value="基础实验中心">基础实验中心</option>
														<option value="工业中心">工业中心</option>
														<option value="工程实践中心">工程实践中心</option>
													</select></td>
													<td><input type="text" name="room" id="room" value=""/></td>
												</tr>	
											</table></td></tr>
								<tr><th></th><td>
									<label><input type="checkbox" class="checkbox" name="usemap"/>使用地图</label>
									<input type="hidden" name="mapdata" id="mapdata" value=""/>
									<div id="post_map_canvas"></div></td></tr>
								<tr><th></th><td><button type="submit" class="submit" id="submitbtn">立即搜索</button></td></tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>
