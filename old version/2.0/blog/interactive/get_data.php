<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/4
 * Time: 19:11
 */
$mysqli=new mysqli("localhost","root","dearvee1996","blog");
$sql="SELECT * FROM blog_article";

$mysqli->query("set character_set_results=utf8");
$result=$mysqli->query($sql);
$titles=array();
$texts=array();
$times=array();
include dirname(__FILE__).'/../function/str_to.php';
while($row=$result->fetch_array()){
    array_push($titles,$row["title"]);
    array_push($texts,str_to_html($row["text"]));
    array_push($times,$row["time"]);
}