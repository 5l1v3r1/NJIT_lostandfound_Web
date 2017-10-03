				<div id="listbox">
					<h3><a name="comment"></a>留言</h3>
					<ul id="itemlist">
					{foreach from=$comments item=comment}
						<li>{if $comment['uid']}<a href="user.php?id={$comment['uid']}">{$comment['nickname']|default:$comment['username']}</a>{else}{$comment['author']}{/if}
							说 “{$comment['content']}”
							<p>{$comment['posttime']}</p></li>
					{foreachelse} 
						<li><p>暂时没有留言</p></li>
					{/foreach}
					</ul>
					<div id="pagenav">{$pagenav}</div>
					<form action="comment.php?action=post" method="post">
						<input type="hidden" name="item" value="{$item['id']}"/>
						<table class="formTable">
						{if $login}
							<tr><th>* 用户</th><td>{$username}</td></tr>
						{else}
							<tr><th>* 名称</th><td><input type="text" name="author" id="author"/></td></tr>
							<tr><th>* 邮箱</th><td><input type="text" name="email" id="email"/><span class="tip">不会被公开</span></td></tr>
						{/if}
							<tr><th>* 内容</th><td><textarea name="content" id="content"></textarea></td></tr>
							<tr><th>验证码</th><td><img src="include/verify.php" id="verifyimg" title="刷新" onclick="changecode()"/> 
								<p class="tip">请输入图中的数字和字母</p> 
								<input type="text" name="verifycode" id="verifycode"/> 
								<span id="checkverifycode" class="check"></span></td></tr>
							<tr><th></th><td><button type="submit" class="submit">我要留言</button></td></tr> 
						</table>
					</form>
				</div>