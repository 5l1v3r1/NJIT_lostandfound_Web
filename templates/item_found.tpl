<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
{include file="config.tpl"}
	<title>招领启事>{$item['what']|default:"物品信息不存在"}</title>
	{if $item['hasmap']}<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript">
		mapdatas.push(["{$item['mapdata']}",{$item['id']},"{$item['what']}"]);
		{foreach from=$losts item=lost}mapdatas.push(["{$lost['mapdata']}",{$lost['id']},"{$lost['name']}"]);{/foreach}
	</script>
	<script type="text/javascript" src="js/item_map.js"></script>{/if}
	<script type="text/javascript" src="js/item.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="accordion">
					<h3><a href="#">招领信息</a></h3>
					<div>
						{if $item['result']}<img src="images/done.png" id="done"/>{/if}
						<table class="itemTable">
						<tr><th>物品名称</th><td>{$item['what']}</td>
							<td rowspan="5" class="imageCol"><img src="{$item['imageurl']|default:"images/noitem.png"}" id="image" class="image-fixed"></img></td></tr>
						<tr><th>发现日期</th><td>{$item['when']|date_format:"%Y-%m-%d"}</td></tr>
						<tr><th>发现地点</th><td>{if $item['where']!="#"}<a href="search.php?where={$item['where']}" class="where">{$item['where']}</a>{else}未注明{/if}</td></tr>
						<tr><th>物品描述</th><td>{$item['detail']}</td></tr>
						<tr><th>标签</th><td>{if $item['tag']}<a href="search.php?tag={urlencode($item['tag'])}" class="tag">{$item['tag']}</a>{else}未帖标签{/if}</td></tr>
						{if $item['hasmap']}<tr><th>地图信息</th><td colspan="2"><div id="item_map_canvas"></div></td></tr>{/if}
						{if $item['gid']}
						<tr><th>提交者</th><td>{$user['title']}</td></tr>
						<tr><th>联系方式</th><td>{$user['contact']}</td></tr>
						{else}
						<tr><th>提交者</th><td>{$user['nickname']|default:$user['username']}</td></tr>
						<tr><th>联系方式</th><td><a href="user.php?id={$user['id']}">查看详细</a></td></tr>
						{/if}
						<tr><th>提交时间</th><td>{$item['posttime']}</td></tr>
						</table>
					</div>
				</div>
			</div>
			<div class="contentRight">
				<h3>相关寻物信息</h3>
				<ul>
					{foreach from=$losts item=lost}
						<li><a href="lost.php?id={$lost['id']}">{$lost['what']}</a></li>
					{foreachelse}
						<li>没有相关寻物启事</li>
					{/foreach}
				</ul>
			</div>
			<div class="contentRight">
				<h3>物品管理</h3>

				{if $item['gid']}
					<p>请输入修改码</p>
					<form action="?action=mod" method="post">
						<input type="hidden" name="id" value="{$item['id']}"/>
						<input type="password" name="editcode"/><br/>
						<label><input type="checkbox" name="del" id="del" value="1"/> 删除信息</label>
						<button type="submit" id="editbtn">修改信息</button>
					</form>
				{else}
					{if $login && $item['uid']==$uid}
					<ul><li><a href="?action=mod&id={$item['id']}">修改信息</a></li>
					<li><a href="?action=del&id={$item['id']}" onclick="return window.confirm('确定要删除？');">删除信息</a></li>
					</ul>
					{else}
					<p>这不是您提交的物品信息</p>
					{/if}
				{/if}
			</div>
			<div class="contentLeft">
				{include file="item_comment.tpl"}
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
{include file="footer.tpl"}
</body>
</html>