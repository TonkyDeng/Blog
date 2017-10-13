var T = 0;
function DrawLine(opx,opy,op,width,color,time){
	for(var i=op[0];i<op[1]-1;i++)
		setTimeout("Line(["+opx[i]+","+opx[i+1]+"],["+opy[i]+","+opy[i+1]+"],"+width+",'"+color+"')",i*time+T);
	T += op[1]*time;
}
function Line(opx,opy,width,color){
	var canvas=document.getElementById('canvas');
	var ctx=canvas.getContext('2d');
	ctx.lineWidth = width;
	ctx.strokeStyle = color;
	ctx.beginPath();
	ctx.moveTo(opx[0],opy[0]);
	ctx.lineTo(opx[1],opy[1]);
	ctx.lineCap="round";
	ctx.stroke();
}
function MakeCoor(op){
	opx = [];
	opy = [];
	width = canvas.width/2;
	Width = width;
	color = '#24262e';
	time = 1;
	for(var i=width/2;i<canvas.width-width/2;i++){
		opx[i] = width;
		opy[i] = i;
	}
	DrawLine(opx,opy,[width/2,canvas.width-width/2],width,color,time);

	for(var i=width/2;i<canvas.width-width/2;i++){
		opx[i] = i;
		opy[i] = width;
	}
	DrawLine(opx,opy,[width/2,canvas.width-width/2],width,color,time);
	
	width = op[0];
	color = op[1];
	for(var i=Width/2;i<5/8*Width+Width/2;i++){
		opx[i] = i;
		opy[i] = Width/2-width/2;
	}
	DrawLine(opx,opy,[Width/2,5/8*Width+Width/2],width,color,time);
	
	for(var i=canvas.width-Width/2-5/8*Width;i<canvas.width-Width/2;i++){
		opx[i] = i;
		opy[i] = canvas.width-Width/2+width/2;
	}
	DrawLine(opx,opy,[canvas.width-Width/2-5/8*Width,canvas.width-Width/2],width,color,time);
	
	width = op[2];
	color = op[3];
	for(var i=Width-width/2;i<Width+width/2;i++){
		opx[i] = i;
		opy[i] = Width/4;
	}
	DrawLine(opx,opy,[Width-width/2,Width+width/2],width,color,time);
	
	for(var i=Width-width/2;i<Width+width/2;i++){
		opx[i] = i;
		opy[i] = canvas.width-Width/4;
	}
	DrawLine(opx,opy,[Width-width/2,Width+width/2],width,color,time);

	width = op[4];
	color = op[5];
	for(var i=Width/4;i<canvas.width-Width/4;i++){
		opx[i] = i;
		opy[i] = -4/Width/Width*Math.pow(opx[i]-Width,3)+Width;
	}	
	setTimeout("document.getElementById('canvas').style.margin = '-40px auto';",T);
	DrawLine(opx,opy,[Width/4,canvas.width-Width/4],width,color,time);
}
