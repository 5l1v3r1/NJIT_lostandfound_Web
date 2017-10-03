	<!-- header start -->
		<script type="text/javascript" src="js/weather.js"></script>
		<script type="text/javascript" src="js/count.js"></script>
	<div id="header">
		<div class="container">
			<div id="logo"></div>
			<h1></h1>
			<h2></h2>
			<ul id="nav">
				<li><a href="index.php" title="Index" id="nav-index">首页</a></li>
				<li><a href="lost.php" title="Lost" id="nav-lost">寻物启事</a></li>
				<li><a href="found.php" title="Found" id="nav-found">招领启事</a></li>
				<li><a href="about.php" title="About_us" id="nav-about">关于我们</a></li>
			</ul>
			<form id="searchbox" action="search.php" method="get">
				<input type="text" id="keyword" name="keyword" value="{$keyword}" placeholder="找东西" />
				<input type="submit" id="searchbtn" value="搜索" />
				<span class="pipe">|</span><a href="search.php?action=advance">高级搜索</a>		
			</form>
			<div id="login">
				<img src="images/usericon.png" alt="成员登录" id="usericon" />
			{if $login}
				<a href="user.php?id={$uid}">{$username}</a><span class="pipe">|</span><a href="home.php">个人中心</a><span class="pipe">|</span><a href="login.php?action=logout">退出</a>
			{else}
				<a href="login.php">登录</a><span class="pipe">|</span><a href="register.php">注册</a><span class="pipe">|</span>
			{/if}
			</div>
		</div>
	</div>
	<!-- header ends -->
