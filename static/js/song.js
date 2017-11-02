$(function(){
    $.ajax({
        url: 'api/list',
        dataType: 'text',
        success: function(filedata) {
            var data = eval('('+filedata+')');
			getLists(data);
			getList(data['lists'][0]['songs']);

			var listnum=0;
			var songnum=0;
			var audio = $("#py")[0];

			$("#lists li").click(function(){
				getList(data['lists'][$(this).index()]['songs']);
				listnum = $(this).index();
			});

			
			$('#player').on('click','#list tr',function(){
				songnum = $(this).index();
				audio.src=data['lists'][listnum]['songs'][songnum]['url'];
				audio.play();
			});

        }
    });
});
function getLists(data){
	var str="";
	var lists = data['lists'];
	for(var i=0;i<lists.length;i++){
    	str+="<li><img src='"+lists[i]['picurl']+"'><span>"+lists[i]['title']+"<br/>"+lists[i]['subtitle']+"</span></li>";
	}
	$('#lists').html(str);
}

function getList(list){
	var str="";
	for(var i=0;i<list.length;i++){
		str+="<tr><th>"+list[i]['song']+"</th><th>"+list[i]['singer']+"</th><th>Time</th></tr>";
	}
	$('#list').html(str);
}



