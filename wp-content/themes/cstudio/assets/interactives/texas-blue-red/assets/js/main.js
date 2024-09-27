$(document).ready(function(){
	$('.prompt-box').click(function(e){
		$(this).fadeOut();
	});
	
	$('.tab_btn').unbind('click');
	$('.tab_btn').click(function(){
		getId = $(this).attr('id');
		
		//$("g[name='tab_ctrl']").removeAttr('class');
		view_status = $('g[data-id="'+getId+'"]').attr('class');
		//alert(getId +" =="+view_status)
		if(view_status == "show-box"){
			$('g[data-id="'+getId+'"]').removeAttr('class');
			$('g[data-id="'+getId+'"]').attr('class','hide-box');
		}else if(view_status == "hide-box"){
			$('g[data-id="'+getId+'"]').removeAttr('class');			
			$('g[data-id="'+getId+'"]').attr('class','show-box');
		}
	});
	
});
