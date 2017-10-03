<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html>
<head>
{include file="config.tpl"}
	<title>用户信息</title>
	<script typ="text/javascript" src="js/user.js"></script>
</head>
<body>
{include file="header.tpl"}
	<!-- main start -->
	<div id="main">
		<div class="container">
			<div class="contentLeft">
				<div id="tab">
					<ul><li><a href="#tabs-1">个性签名</a></li>
					<li><a href="#tabs-2">给TA留言</a></li></ul>
					<div id="tabs-1">
						<p>{$profile['signature']|default:"暂时没有个性签名"}</p>
					</div>
					<div id="tabs-2">
					{if $login}
					<form action="message.php?action=send" method="post">
							<input type="hidden" name="to" value="{$user['id']}"/>
							<table class="formTable">
								<tr><th>* 留言内容</th><td><textarea name="content" id="content" maxlength="255"></textarea>
										<p class="check" id="checkcontent"></p></td></tr>
								<tr><th>* 验证码</th><td><img src="include/verify.php" id="verifyimg" title="刷新" onclick="changecode()"/>
									<p class="tip">请输入图中的数字</p>
									<input type="text" name="verifycode" id="verifycode"/>
									<span id="checkverifycode" class="check"></span></td></tr>
								<tr><th></th><td><button type="submit" class="submit" id="submitbtn">留言</button></td></tr>
							</table>
						</form>{else}
						<p>您尚未登录，无法使用此功能</p>
						{/if}</div>
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
					<li><span>手机</span>{if !$profile["hide"]||$login}{$profile['phone']|default:"-"}{else}只对注册用户显示{/if}</li>
				</ul>
				{else}<p>尚未填写联系信息</p>{/if}				
			</div>
			<div class="contentLeft">
				<div id="listbox">
					<h3>发布的物品信息</h3>
					<!-- item-list -->
					<ul id="itemlist">
					{foreach from=$items item=item key=key}<li class="item">
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