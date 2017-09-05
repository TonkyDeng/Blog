<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/5
 * Time: 10:24
 */
include dirname(__FILE__).'/../data/user_data.php';
    $filename=dirname(__FILE__).'/../data/data.xml';
    $error=false;
    $login = false;
    $in_user = $_GET['user'];
    $in_password = $_GET['password'];
    echo $error;
    echo (int)xml_get('error',0,$filename);
    if ($in_user == $user && $in_password == $password && (int)xml_get('error',0,$filename)<5) {
        echo "login in successful~";
        xml_revise('login','true',0);
        xml_revise('write','true',0);
        echo "<script>window.location.href=\"../index.php\"</script>";
    }
    else {
        echo "login in error~";
        xml_revise('error',(int)xml_get('error',0,$filename)+1,0);
        echo "<script>window.location.href=\"../index.php\"</script>";
    }


