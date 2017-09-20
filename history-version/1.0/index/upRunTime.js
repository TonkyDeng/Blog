/**
 * Created by Dearvee on 2017/5/13.
 */
    function upTime() {
    var data=new Date();
    document.getElementById('runTime').innerHTML="小窝已运行: "+
        timeToString(parseInt(data.getTime()/1000-1494644444));
}
    function timeToString(time){
    var strTime=(parseInt(time/60/60/24/10)).toString()+(parseInt(time/60/60/24%10)).toString()+" 天 "+
    (parseInt(time/60/60%24/10)).toString()+(parseInt(time/60/60%24%10)).toString()+" 时 "+
    (parseInt(time/60%60/10)).toString()+(parseInt(time/60%60%10)).toString()+" 分 "+
    (parseInt(time%60/10)).toString()+(parseInt(time%60%10)).toString()+" 秒 ";
    return strTime;
}
    setInterval("upTime();",1000);