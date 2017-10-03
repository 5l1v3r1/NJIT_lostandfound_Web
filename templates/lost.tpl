<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
{include file="config.tpl"}
	<title>寻物启事</title>
	<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript">{foreach from=$items item=item}{if $item['hasmap']}mapdatas.push(["{$item['mapdata']}",{$item['id']},"{$item['what']}"]);{/if}{/foreach}</script>
	<script type="text/javascript" src="js/lost.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="post">
					<ul><li><a href="#tabs-1">快速提交</a></li></ul>
					<div id="tabs-1">
						<form action="post.php?type=lost&action=quickpost" method="post">
							<label for="itemname">物品名称：</label><input type="text" name="itemname" id="itemname" />
							<input type="submit" id="submitbtn" value="发布寻物信息"/>
						</form>
					</div>
				</div>
			</div>
			<div class="contentLeft">
				<div id="listbox">
					<h3>寻物启事</h3>
					{include file="item_list.tpl" type="lost"}
					<div id="pagenav">{$pagenav}</div>
				</div>
			</div>
			<div class="contentRight"> 
				<h3>地图</h3> 
				<div id="items_map_canvas"></div>
			</div> 
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
{include file="footer.tpl"}
</body>
</html>