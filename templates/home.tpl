<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
{include file="config.tpl"}
	<title>个人中心</title>
	<script typ="text/javascript" src="js/home.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="post">
					<ul><li><a href="#tabs-1">个人中心</a></li>
					<li><a href="#tabs-2">短信箱{if $messages}({count($messages)}){/if}</a></li></ul>
					<div id="tabs-1">
						
					</div>
					<div id="tabs-2">
						<ul id="msglist">
						
						{foreach from=$messages item=msg}
							<li class="msg">
							<span>内容</span> “{$msg['content']|truncate:35:"..."}”
							<p>{$msg['posttime']}</p>
							</li>
						{foreachelse}
							<li><p>没有未读的短信息</p></li>
						{/foreach}</ul>
					</div>
				</div>
			</div>
			<div class="contentRight">
				<h3>用户信息</h3>
				{if $profile}
				<ul id="contact">
					<li><span>昵称</span>{$profile['nickname']}</li>
					<li><span>邮箱</span>{$profile['email']|default:"-"}</li>
					<li><span>QQ</span>{$profile['qq']|default:"-"}</li>
					<li><span>MSN</span>{$profile['msn']|default:"-"}</li>
					<li><span>GTALK</span>{$profile['gtalk']|default:"-"}</li>
					<li><span>手机</span>{$profile['phone']|default:"-"}</li>
				</ul>
				<p><a href="home.php?action=edit">修改>></a></p>
				{else}<p>您还没有填写联系信息，这可能造成他人无法直接与您取得联系</p>
				<p><a href="home.php?action=edit">现在填写>></a></p>{/if}				
			</div>
			<div class="contentLeft">
				<div id="listbox">
					<h3>发布的物品信息</h3>
					<!-- item-list -->
					<ul id="itemlist">
					{foreach from=$items item=item}<li class="item">
						{if $item['where']!="#"}在 <a href="search.php?where={$item['where']}" class="where">{$item['where']}</a> {/if}{if $item['type']}捡到了{else}丢失了{/if} <a href="{if $item['type']}found{else}lost{/if}.php?id={$item['id']}">{$item['what']}</a> “{$item['detail']}”
						<p>{$item['posttime']} {if $item['tag']}标签[<a href="?tag={$item['tag']}" class="tag">{$item['tag']}</a>]{/if}</p></li>
					{foreachelse}
					<li><p>尚未发布任何信息！</p></li>
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