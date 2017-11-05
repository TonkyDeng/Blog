$(function(){
	$(".wrap .index").on("click","li",function(){
		$(".selected").removeClass('selected');
		$(this).addClass('selected');
	});

});

function getDonate(){
	var str="<div id='lbody'><div id='byte-info'><div class='close-info'>×</div><img id='byte' src='https://od.lk/s/NjRfODkzOTQ1NF8/donate_me.png'/></div>";
	$("body").after(str);	
	$(".close-info").click(function(){
		$("#lbody").remove();
	});
}
