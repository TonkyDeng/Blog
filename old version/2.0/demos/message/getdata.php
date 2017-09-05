<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/1
 * Time: 16:01
 */
$mysqli=new mysqli("localhost","root","dearvee1996","message_board_db");
$sql="SELECT * FROM message_info";

$mysqli->query("set character_set_results=utf8");
$result=$mysqli->query($sql);
$messages=array();
$poss=array();
$colors=array();
while($row=$result->fetch_array()){
    array_push($messages,$row["message"]);
    array_push($poss,$row["pos"]);
    array_push($colors,$row["color"]);
}
$message=addslashes(implode('*',$messages));
$pos=implode('&',$poss);
$color=implode('*',$colors);

