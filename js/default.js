$(function(){
	
	if (($.browser.msie && $.browser.version == "6.0"))
		$('<p class="browser">您的浏览器版本太低，建议您升级为更高版本的 <a href="http://www.microsoft.com/china/windows/products/winfamily/ie/default.mspx">Internet Explorer</a> 或者使用 <a href="http://chrome.google.com/">Google Chrome</a> / <a href="http://firefox.com.cn/">Firefox</a> 等浏览器</p>').insertBefore("#header");
	
});


function changecode(){
	var vimg = document.getElementById("verifyimg");
	vimg.src = "include/verify.php";
}

function addBookmark(){
	if (document.all){
		window.external.addFavorite(location.href,'拾客'); 
	}else if (window.sidebar){
		window.sidebar.addPanel('拾客', location.href, ""); 
	}else alert('您可以尝试通过快捷键加入到收藏夹~');
	return false;
} 