$(function(){
    $.ajax({
        url: 'api/list',
        dataType: 'text',
        success: function(filedata) {
            var data = eval('('+filedata+')');
			getLists(data);
			getList(data['lists'][1]['songs']);


			var listnum=1;
			var songnum=0;
			var audio = $("#py")[0];

			$("#lists li").click(function(){
				getList(data['lists'][$(this).index()]['songs']);
				listnum = $(this).index();
			});

			
			$('#player').on('click','#list li',function(){
				songnum = $(this).index();
				audio.src=data['lists'][listnum]['songs'][songnum]['url'];
				audio.play();
				/*$(this).css('background','#24262e');
				$(this).css('color','#fff');*/
			});

			/*$('#player').on('mouseover','#list tr',function(){
				$(this).find("th").css("display","inline-block");
			});

			$('#player').on('mouseout','#list tr',function(){
				$(this).find("th").css("display","none");
			});*/
        }
    });
});
function getLists(data){
	var str="";
	var lists = data['lists'];
	for(var i=0;i<lists.length;i++){
		var cache = lists[i]['picurl']
		if(cache === "")
			cache = "http://cdn-img.easyicon.net/png/11674/1167488.gif";
    	str+="<li><img src='"+cache+"'><span>"+lists[i]['title']+"<br/>"+lists[i]['subtitle']+"</span></li>";
	}
	$('#lists').html(str);
}

function getList(list){
	var str="";
	for(var i=0;i<list.length;i++){
		str+="<li><a href='javascript:void(0);'><span>"+list[i]['song']+"</span><span>"+list[i]['singer']+"</span><span>Time</span></a></li>";
	}
	$('#list').html(str);
}


function getTime(src){
	var audio = $('#py')[0];
	audio.src = src;
	return audio.duration
}
