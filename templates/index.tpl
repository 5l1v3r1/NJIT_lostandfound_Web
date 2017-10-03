<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
	{include file="config.tpl"}
	<title>南京工程学院失物招领平台</title>
	<!-- google map --> 
	<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDnyuQrhbV2UZXG1YGdNXlicA6gmafHXIc&language=zh-CN"></script>
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<!-- intro -->
			<div id="intro" class="contentLeft message">
				欢迎使用南京工程学院失物招领系统！今天是{$date}。
			</div>
			<!-- enter -->
			<div id="enter" class="contentLeft">
				<ul>
					<li><a href="#tabs-1">我丢了东西</a></li>
					<li><a href="#tabs-2">我捡了东西</a></li>
				</ul>
				<div id="tabs-1">
					有<em>{$count[0][0]+$count[0][1]|default:0}</em>件物品遗失，其中<em>{$count[0][1]|default:0}</em>件已找回！<a href="post.php?type=lost" class="postit">我要登记</a>
				</div>
				<div id="tabs-2">
					有<em>{$count[1][0]+$count[1][1]|default:0}</em>件物品被捡到，其中<em>{$count[1][1]|default:0}</em>件已归还！<a href="post.php?type=found" class="postit">我要提交</a>
				</div>
			</div>
			<!-- tagcloud -->
			<div id="tagcloud" class="contentRight">
				<h3>标签</h3>
				<ul>
					{foreach from=$tagcloud item=tag}<li><a href="search.php?tag={urlencode($tag['word'])}">{$tag['word']}</a></li>
					{foreachelse}<li>暂时没有标签</li>
					{/foreach}
				</ul>
				<div class="clearBoth"></div>
			</div>
			<!-- google map -->
			<div id="index_map_canvas" class="contentLeft"></div>
			<div class="clearBoth"></div>
		</div>
	</div>
	<!-- main ends -->
{include file="footer.tpl"}
</body>
</html>