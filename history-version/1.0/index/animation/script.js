var w = window.innerWidth;
var h = window.innerHeight;
var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");
//ÉèÖÃ»­²¼¿í¸ßÓë´°¿Ú¿í¸ßÒ»Ñù
canvas.width = w;
canvas.height = h;
//Ëæ»úÊýº¯Êý
function fnRandom(min,max){
return parseInt((max-min)*Math.random()+min+1)
}
function Round(){
this.r = fnRandom(10,30);
this.diam = this.r*2;
//Ëæ»úÎ»ÖÃ
var x = fnRandom(0,canvas.width - this.r);
this.x = x<this.r?this.r:x;
var y = fnRandom(0,canvas.height-this.r);
this.y = y<this.r?this.r:y
//Ëæ»úËÙ¶È
var speed = fnRandom(2,4)/10
this.speedX = fnRandom(0,4)>2?speed:-speed;
this.speedY = fnRandom(0,4)>2?speed:-speed;
//ÑÕÉ«
this.color = "#eeeeee";
/////////////////////////////////////////////////////////////////
}
Round.prototype.draw = function(){
//»æÖÆº¯Êý
ctx.fillStyle = this.color;
ctx.beginPath()
ctx.arc(this.x,this.y,this.r,0,Math.PI*2,true);
ctx.closePath();
ctx.fill();
}
Round.prototype.move = function(){
this.x+=this.speedX;
if(this.x>canvas.width-this.r){
// this.speedX*=-1;
this.x=this.r
}else if(this.x<this.r){
this.x=canvas.width-this.r
}
this.y+=this.speedY;
if(this.y>canvas.height-this.r){
// this.speedY*=-1;
this.y=this.r
}else if(this.y<this.r){
this.y=canvas.height-this.r
}
}
//Ê¹ÓÃRound
var allRound = [];
function initRound(){
//³õÊ¼»¯30¸öÔ²ÐÎ¶ÔÏó,·Åµ½Êý×éÖÐ
for(var i = 0 ; i<30;i++){
var obj = new Round();
obj.draw();
obj.move();
allRound.push(obj);

}
}
initRound();
var dxdy = []
function roundMove(){
ctx.clearRect(0,0,canvas.width,canvas.height);
//±éÀúËùÓÐµÄÔ²ÐÎ¶ÔÏó,ÈÃ¶ÔÏó×Ô¼ºÖØ»æ,ÒÆ¶¯
for (var i = 0 ;i <allRound.length;i++) {
var round = allRound[i];
round.draw();
round.move();
dxdy[i]={
dx:round.x,
dy:round.y
};
var dx = dxdy[i].dx;
var dy =dxdy[i].dy;
for (var j=0;j<i;j++) {
var sx = dxdy[j].dx;
var sy = dxdy[j].dy;
l = Math.sqrt((dx-sx)*(dx-sx)+(dy-sy)*(dy-sy));
var C = 1/l*7-0.009;
var o = C > 0.03 ? 0.03 : C;
ctx.strokeStyle = 'rgba(0,0,0,'+ o +')'
console.log(l);
ctx.beginPath()
ctx.lineWidth=2;
ctx.moveTo(dxdy[i].dx,dxdy[i].dy)
ctx.lineTo(dxdy[j].dx,dxdy[j].dy);
ctx.closePath()
ctx.stroke()

}
}
window.requestAnimationFrame(roundMove)
}
roundMove();