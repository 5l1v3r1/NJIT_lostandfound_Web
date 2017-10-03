<?php /* Smarty version Smarty-3.0.6, created on 2017-04-06 07:00:56
         compiled from ".\templates\post_lost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2565958e64a18b83221-42165710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2c1ebfbaa28cc08dfda83e28ee5467a9a98d2ae' => 
    array (
      0 => '.\\templates\\post_lost.tpl',
      1 => 1491487252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2565958e64a18b83221-42165710',
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
	<script type="text/javascript" src="js/jquery.ui.datepicker-zh-CN.js"></script>
	<title>登记寻物启事</title>
	<!-- google map -->
	<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript" src="js/post_lost.js"></script>
</head>
<body>
<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentRight">
			<?php if (!$_smarty_tpl->getVariable('login')->value&&!$_smarty_tpl->getVariable('msg')->value){?><h3>成为会员？</h3>
				<p>您还没有登录。<br/>
				如果您是会员，<br/>
				请先<a href="login.php">登录</a>后再填写失物招领表；<br/>
				如果您想成为会员，<br/>
				可以<a href="register.php">点击这里注册</a>；<br/>
				即使不是会员也没有关系，您仍可以提交信息 :)</p><?php }?>
			</div>
			<div class="contentLeft">
				<h3>登记寻物启事</h3>
				<p>登记您所遗失的物品并留下您的联系方式。</p>
				<p id="warning"><?php echo $_smarty_tpl->getVariable('msg')->value;?>
</p>
				<form action="?type=lost&action=post" id="postform" method="post" enctype="multipart/form-data">
					<div id="accordion">
						<h3><a href="#" id="step1">第一步：描述您丢失的物品</a></h3>
						<div>
							<p>* 标记的为必填项</p>
							<table class="formTable">
								<tr><th>* 物品名称</th>
									<td><input type="text" name="what" id="what" value="<?php echo (($tmp = @$_smarty_tpl->getVariable('form')->value['what'])===null||$tmp==='' ? $_smarty_tpl->getVariable('what')->value : $tmp);?>
"/>
										<span id="checkwhat" class="check"></span></td></tr>
								<tr><th>* 遗失时间</th>
									<td><input type="text" name="when" id="datepicker" value="<?php echo $_smarty_tpl->getVariable('form')->value['when'];?>
"/>
										<select name="datetype" size="1">
											<option value="0">当天</option>
											<option value="1">之后</option></select>
										<span id="checkdate" class="check"></span>
										<p class="tip">格式请用 YYYY-MM-DD, 例如 2011-02-28</p>
										</td></tr>
								<tr><th>* 遗失地点</th>
									<td><table>
											<tr><td><label>公共场所</td>
												<td>楼层/房间号[可选]</td></tr>
											<tr><td><select name="building" id="building">
												<option value="null">请选择</option>
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
														<option value="">不在这些地方</option>
											</select></td>
											<td><input type="text" name="room" id="room" value=""/></td>
										</tr>
									</table>
									<p class=tip>例如：东馆A栋 302<span class="pipe">/</span>东馆A栋 二楼</br>如果列表中没有您想要的地点，请使用地图标记</p>
									<span id="checkmap" class="check"></span></td></tr>
								<tr><th></th>
									<td>
										<label><input type="checkbox" class="checkbox" name="usemap" id="usemap"/>使用地图</label>
										<p class="tip">[可选]在地图上标出可能遗落物品的区域</p>
										<input type="hidden" name="mapdata" id="mapdata" value=""></input>
										<div id="post_map_canvas"></div></td></tr>
								<tr><th>物品照片</th>
									<td><input type="file" class="file" name="imagefile" id="imagefile"/>
										<p class="tip">[可选]上传物品的照片，可以便于拾客的识别<br/>（200k以内的jpg，gif或png图片）</p>
										<span id="checkfile" class="check"></span></td></tr>
								<tr><th>* 物品描述</th>
									<td><textarea name="detail" id="detail" maxlength="255"><?php echo $_smarty_tpl->getVariable('form')->value['detail'];?>
</textarea>
										<p id="checkdetail" class="check"></p>
										<p class="tip">详细描述下物品的细节等</p></td></tr>
								<tr><th>物品标签</th>
									<td><input type="text" name="tag" value="<?php echo $_smarty_tpl->getVariable('form')->value['tag'];?>
"/>
										<span id="checktag" class="check"></span>
										<p class="tip">[可选]标签有助于我们对物品的分类</p></td></tr>
							</table>
						</div>
						<h3><a href="#" id="step2">第二步：留下您的联系方式</a></h3>
						<div>
							<p>留下您的联系方式，以便拾客与您联系。</p>
							<table class="formTable">
								<tr><th>帐户类型</th>
									<td><label><input type="radio" class="radio" name="usertype" value="0" <?php if (!$_smarty_tpl->getVariable('login')->value){?>checked="checked"<?php }?>/>使用临时的联系方式</label>
									<?php if ($_smarty_tpl->getVariable('login')->value){?><label><input type="radio" class="radio" name="usertype" value="1" checked="checked"/>使用当前登录的帐号</label></td><?php }?>
								</tr>
							</table>
							<table id="guestinfo" class="formTable" <?php if ($_smarty_tpl->getVariable('login')->value){?>style="display: none;"<?php }?>>
								<tr><th>称呼</th>
									<td><input type="text" name="guest" id="guest" value="<?php echo $_smarty_tpl->getVariable('form')->value['guest'];?>
"/>
										<select name="title" id="title">
											<option value="同学">同学</option>
											<option value="老师">老师</option>
											<option value="先生">先生</option>
											<option value="女士">女士</option>
										</select>
										<span id="checkguest" class="check"></span></td></tr>
								<tr><th>联系方式</th>
									<td><input type="text" name="contact" id="contact" value="<?php echo $_smarty_tpl->getVariable('form')->value['contact'];?>
"/>
										<span id="checkcontact" class="check"></span>
										<p class="tip">可以是您的邮箱、手机或者QQ等</p></td></tr>
								<tr><th>有效时间</th>
									<td><select name="available" id="available">
											<option value="7">一星期</option>
											<option value="15">半个月</option>
											<option value="30" selected="selected">一个月</option>
										</select>
									<p class="tip">有效时间一过，您的联系信息将被删除，以保护您的隐私</p></td></tr>
								<tr><th>修改码</th><td><input type="password" name="editcode" id="editcode"/>
									<p class="tip">由6位字符组成，您可以用这个密码来修改您提交的信息</p>
									<span id="checkeditcode" class="check"></span></td></tr>
							</table>
						</div>
						<h3><a href="#" id="step3">第三步：完成登记</a></h3>
						<div>
							<table class="formTable">
								<tr><th></th><td><p class="check" id="checkform"></p></td></tr>
								<tr><th>验证码</th><td><img src="include/verify.php" id="verifyimg" title="刷新" onclick="changecode()"/>
									<p class="tip">请输入图中的数字</p>
									<input type="text" name="verifycode" id="verifycode"/>
									<span id="checkverifycode" class="check"></span></td></tr>
								<tr><th></th><td><button type="submit" class="submit" id="submitbtn">立即登记</button></td></tr>
							</table>
						</div>
						</div>
				</form>
				<?php if ($_smarty_tpl->getVariable('form')->value){?><script>
					var maptype = <?php echo (($tmp = @$_smarty_tpl->getVariable('form')->value['maptype'])===null||$tmp==='' ? 0 : $tmp);?>
;
					var building = "<?php echo $_smarty_tpl->getVariable('form')->value['building'];?>
";
					var room = "<?php echo $_smarty_tpl->getVariable('form')->value['room'];?>
";
					var usemap = "<?php echo $_smarty_tpl->getVariable('form')->value['usemap'];?>
";
					var mapdata = "<?php echo $_smarty_tpl->getVariable('form')->value['mapdata'];?>
";
					if(mapdata!="") mapdatas.push([mapdata,null,null,1]);
					var title = "<?php echo $_smarty_tpl->getVariable('form')->value['title'];?>
";
					var available = "<?php echo $_smarty_tpl->getVariable('form')->value['available'];?>
";
					$(function(){
						$('input[name=maptype]').each(function(){
							if($(this).val()==maptype){
								$(this).attr("checked", 1);
								return;
							}
						});
						$('#building').val(building);
						$('#room').val(room);
						if(usemap=="Array") $('#usemap').attr("checked", 1);
						$('#title').val(title);
						$('#available').val(available);
					});
					
				</script><?php }?>
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
<?php $_template = new Smarty_Internal_Template("footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>
