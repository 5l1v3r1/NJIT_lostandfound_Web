<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
{include file="config.tpl"}
	<title>寻物启事>{$item['what']|default:"物品信息不存在"}</title>
	<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript" src="js/item_lost_edit.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="accordion">
					<h3><a href="#">修改寻物信息</a></h3>
					<div>
						<form action="?action=update" method="post">
							<table class="formTable">
								<tr><th>物品名称</th>
									<td><input type="text" name="what" id="what" value="{$item['what']}"/>
										<span id="checkwhat" class="check"></span></td></tr>
								<tr><th>丢失日期</th>
									<td><input type="text" name="when" id="datepicker" value="{$item['when']|date_format:"%Y-%m-%d"}"/>
										<span id="checkwhen" class="check"></span></td></tr>
								<tr><th>丢失地点</th><td><table>
													<tr><td>公共场所</td>
														<td>楼层/房间号</td></tr>
													<tr><td><select name="building" id="building">
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
											</td></tr>
								<tr><th>地图信息</th>
									<td><label><input type="checkbox" class="checkbox" name="usemap" id="usemap"/>使用地图</label>
									<span id="checkmap" class="check"></span>
									<input type="hidden" name="mapdata" id="mapdata" value=""></input>
									<div id="post_map_canvas"></div></td></tr>
								<tr><th>物品描述</th>
									<td><textarea name="detail" id="describe">{$item['detail']}</textarea>
										<p id="checkdetail" class="check"></p></td></tr>
								<tr><th>标签</th>
									<td><input type="text" name="tag" id="tag" value="{$item['tag']}"/>
									<input type="hidden" name="oldtag" value="{$item['tag']}"/>
									<span id="checktag" class="check"></span></td></tr>
								<tr><th>处理结果</th><td><select name="result" id="result">
										<option value="0">未找到</option>
										<option value="1">已找到</option>
									</select></td></tr>
								<tr><th></th><td><button type="submit" class="submit" id="submitbtn">提交修改</button></td></tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<script>
					var placestr = "{htmlspecialchars_decode($item['where'])}";
					var place = placestr.split("#");
					var building = place[0];
					var room = place[1];
					var usemap = {if $item['mapdata']}true{else}false{/if};
					var mapdata = "{$item['mapdata']}";
					var result = "{$item['result']}";
					if(usemap && mapdata!="") mapdatas.push([mapdata,null,null,1]);
					{literal}$(function(){
						$('#building').val(building);
						$('#room').val(room);
						if(usemap) $('#usemap').attr("checked", 1);
						$('#result').val(result);
					});
					{/literal}
				</script>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
{include file="footer.tpl"}
</body>
</html>