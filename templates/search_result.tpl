<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
{include file="config.tpl"}
	<title>搜索物品</title>
	<script type="text/javascript"></script>
	<script type="text/javascript" src="js/search.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="listbox">
					<h3>搜索结果</h3>
					<p id="warning">{$msg}</p>
					<!-- item-list -->
					<ul id="itemlist">
					{foreach from=$items item=item key=key}<li class="item">
						有人{if $item['where']!="#"}在 <a href="search.php?where={$item['where']}" class="where">{$item['where']}</a> {/if}{if $item['type']}捡到了{else}丢失了{/if} <a href="{if $item['type']}found{else}lost{/if}.php?id={$item['id']}" class="what">{$item['what']}</a> “{$item['detail']}”
						{if $item['image']}<img src="images/image.png" title="有图有真相" />{/if}
						{if $item['hasmap']}<img src="images/map.png" title="有地图" />{/if}
						<p>{$item['posttime']} {if $item['tag']}标签[<a href="?tag={$item['tag']}" class="tag">{$item['tag']}</a>]{/if}</p></li>
					{foreachelse}
					<li><p>什么东西也没有！</p></li>
					{/foreach}</ul>
					<div id="pagenav">{$pagenav}</div>
				</div>
			</div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
{include file="footer.tpl"}
</body>
</html>