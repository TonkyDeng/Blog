$(function(){
	$(".index li").click(function(){
		$(".selected").removeClass('selected');
		$(this).addClass('selected');
	});
});
