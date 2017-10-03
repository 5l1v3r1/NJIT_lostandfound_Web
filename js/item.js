$(function(){
	$('#accordion').accordion();
	
	$('#editbtn').click(function(){
		if($('#del').attr('checked'))
			if(!window.confirm('确定要删除？')) return false;
	});
	
	$('#image').hover(function(){
		$(this).addClass('image-hover');
	},function(){
		$(this).removeClass('image-hover');
	})
});  