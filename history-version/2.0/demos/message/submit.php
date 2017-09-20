<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/4/29
 * Time: 23:35
 */
$message=addslashes($_GET['boarder']);
$pos_color=explode('#',$_GET['pos_color']);
$pos=$pos_color[0];
$color="#".$pos_color[1];
$mysqli=new mysqli("localhost","root","dearvee1996","message_board_db");
$sql="INSERT INTO message_info(message,pos,color)
                          VALUES (N'$message','$pos','$color')";

$mysqli->query($sql);
$mysqli->close();

