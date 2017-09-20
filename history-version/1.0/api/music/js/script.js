function Play(){
	var m=document.getElementById('music');
	if(m.paused){
		m.play();
	}
	else {
		m.pause();
	}

}

function Stop(){
	var m=document.getElementById('music');
	m.pause();
	m.currentTime=0;
}

function play_chang_css(){
	var m=document.getElementById('music');
	var p=document.getElementById('play_button');
	if(!m.paused){
		p.className="pause_css";
	}
	else{
		p.className="play_css";
	}
}


function music_Buffer(){ 
var m=document.getElementById('music');
var timeRanges = m.buffered;
var timeBuffered = timeRanges.end(timeRanges.length - 1);
var bufferPercent = timeBuffered / m.duration; 

var p=document.getElementById('music_Buffer');
p.value=bufferPercent*100;
}
setInterval("music_Buffer();Time();play_chang_css()",10);



function Time(){
	var m=document.getElementById('music');
	var t=document.getElementById('time');

	var x=m.duration,y=m.currentTime;
	var ta_string=parseInt((x/60)/10)+""+parseInt((x/60)%10)+":"
				+parseInt((x%60)/10)+""+parseInt((x%60)%10);
	var tc_string=parseInt((y/60)/10)+""+parseInt((y/60)%10)+":"
				+parseInt((y%60)/10)+""+parseInt((y%60)%10);
	t.innerHTML=tc_string+"/"+ta_string;
}



var n=-1,run_lrc,music_flag=false,volume_flag=false,ctrl_flag=false,time=0;
window.onload=function(){

        Next();//init audio

var m=document.getElementById('music');
var a=document.getElementById('all');
var d = document.getElementById('drag_button');
var pc=document.getElementById('click_progress');
var v=document.getElementById('volume');
var vc=document.getElementById('volume_ctrl');
var vp=document.getElementById('progress_volume');
var vd=document.getElementById('volume_drag_button');
var vpc=document.getElementById('volume_click_progress');
d.addEventListener("mousedown", function(ed) {

    music_flag=true;
	a.addEventListener("mousemove",function(em){
		if(music_flag&&em.clientX-640>=0&&em.clientX-640<=320){
		d.style.left=em.clientX-8-480+"px";
		time=(em.clientX-640)/320*m.duration;
		}
	});


	a.addEventListener("mouseup",function(){
		if (music_flag) {
			music_flag=false;
			m.currentTime=time;
		}
	});
	

});//音乐进度拖动


 



pc.addEventListener("click",function(ec){
			var t=(ec.clientX-640)/320*m.duration;
			m.currentTime=t;
	});//音乐点击改变进度

vd.addEventListener("mousedown", function(ed) {
    volume_flag=true;
	a.addEventListener("mousemove",function(em){
		if(volume_flag&&em.clientY>=215+5&&em.clientY<=315+5){

		vp.value=1-(em.clientY-220)/100;
		}
	});


	a.addEventListener("mouseup",function(){
		if (volume_flag) {
			volume_flag=false;
		}
	});
	

});//音量拖动


vpc.addEventListener("click",function(ec){
			
			vp.value=1-(ec.clientY-520)/100;
	});//音量点击改变进度


v.addEventListener("click",function(){
	if(!ctrl_flag){
		vc.style.display="block";
		ctrl_flag=true;
	}
	else{
		vc.style.display="none";
		ctrl_flag=false;
	}

});





var next_one=document.getElementById('next_one');
	next_one.addEventListener("click", function() {
		Next();
	});

var previous_track=document.getElementById('previous_track');
	previous_track.addEventListener("click", function() {
		Previous();
	});



}

function Next(){
var m=document.getElementById('music');
var p=document.getElementById('musicplayer');
		n++;
		if(n>=srcs.length){
			n=0;
		}
		m.src=srcs[n];
		/*var image_src="image/music_image/"+srcs[n].substring(6,srcs[n].length-3)+"jpg";
		p.style.backgroundImage="url('"+image_src+"')";
		p.style.backgroundRepeat="no-repeat";
		p.style.backgroundSize="cover";
		p.style.backgroundPosition="0px -150px";*/
		m.play();
		/*var cache=run_lrc;
		var fun="Lrc("+n+")";
		run_lrc=setInterval(fun,10);*/
		/*clearInterval(cache);*/
	}

function Previous(){
var p=document.getElementById('musicplayer');
var m=document.getElementById('music');
		n--;
		if(n<0){
			n=srcs.length-1;
		}
		m.src=srcs[n];
		//var image_src="image/music_image/"+srcs[n].substring(6,srcs[n].length-3)+"jpg";
		//p.style.backgroundImage="url('"+image_src+"')";

		m.play();
		//var cache=run_lrc;
		//var fun="Lrc("+n+")";
		//run_lrc=setInterval(fun,10);
		//clearInterval(cache);

	}


	function Progress(){
		var m=document.getElementById('music');
		var p=document.getElementById('progress');
		var d=document.getElementById('drag_button');
		var vp=document.getElementById('progress_volume')
		var vd=document.getElementById('volume_drag_button');
		if(!music_flag){
			p.value=m.currentTime/m.duration*100;
			d.style.left=(p.value/100*320+160-8).toString()+"px";
			//console.log("播放时间->"+m.currentTime);
			//console.log("time->"+time);
		}
		else{
			p.value=time/m.duration*100;
		}

		m.volume=vp.value;
		vd.style.top=(100-vp.value*100).toString()+"px";
	}
	setInterval("Progress()",10);