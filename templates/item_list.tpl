
				<!-- item-list -->
				<ul id="itemlist">
					{foreach from=$items item=item}<li class="item"><a{if $item['uid']&&!$item['gid']} href="user.php?id={$item['uid']}"{/if} class="who">{$item['nickname']|default:$item['username']}</a> {if $item['where']!="#"}在 <a href="search.php?where={$item['where']}" class="where">{$item['where']}</a> {/if}{if $item['type']}捡到了{else}丢失了{/if} <a href="?id={$item['id']}" class="what">{$item['what']}</a> “{$item['detail']}”
						{if $item['image']}<img src="images/image.png" title="有图有真相" />{/if}
						{if $item['hasmap']}<img src="images/map.png" title="有地图" />{/if}
						<p>{$item['posttime']} {if $item['tag']}标签[<a href="search.php?tag={urlencode($item['tag'])}" class="tag">{$item['tag']}</a>]{/if}</p></li>
					{foreachelse}
					<li><p>什么东西也没有！</p></li>
					{/foreach}</ul>
