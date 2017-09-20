<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/12
 * Time: 13:45
 */


function getId(){
    $filename=dirname(__FILE__).'/../data/home.txt';
    $homeArticleId=file_get_contents($filename);
    $homeArticleId=explode("\r\n",$homeArticleId);
    $homeInfo=array();
    for($i=0;$i<count($homeArticleId);$i++){
        $homeInfo[$i]=array();
        $Info=explode("*",$homeArticleId[$i]);
        $homeInfo[$i]['href']=$Info[0];
        $homeInfo[$i]['title']=$Info[1];
        $homeInfo[$i]['time']=$Info[2];
    }
    return $homeInfo;
}

function toHome($href,$title,$time){
    $filename=dirname(__FILE__).'/../data/home.txt';
    file_put_contents($filename,"\r\n".$href."*".$title."*".$time,FILE_APPEND);
}

function getHome(){
    $homeInfo=getId();
    $home="";
    for($i=count($homeInfo)-1;$i>=0;$i--){
        $home=$home."<li class='abs'><a href='"."blog/p/".$homeInfo[$i]['href'].".html'>".$homeInfo[$i]['title']."</a><span>".$homeInfo[$i]['time']."</span></p><li><br></li>";
    }
    return $home;
}
