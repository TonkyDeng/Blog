<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/11
 * Time: 14:41
 */


/*function home_session()
{
    $_SESSION["count"]++;
#unset($_SESSION["count"]);
}*/

function getLateCount(){
    $filename=dirname(__FILE__).'/count.txt';
    $count=file_get_contents($filename);
    return $count;
}

function addCount(){
    $count=getLateCount();
    $filename=dirname(__FILE__).'/count.txt';
    file_put_contents($filename,$count+1,FILE_SKIP_EMPTY_LINES);
    return $count+1;
}

function homeCount(){
    $clientIP=getClientIp();
    $myIP=array("183.167.205.81","223.104.34.82");
    $flag=false;
    #echo "current_time".time().'</p>';
    #echo "cookie".$_COOKIE["user_access"]."</p>";
    #echo "session".$_SESSION["count"].'</p>';
    if (isset($_COOKIE["user_access"])) {
        if (time()-$_COOKIE['user_access']>60) {                   #60s ignore
            if ($clientIP!=$myIP[0]&&$clientIP!=$myIP[1]) {
                $flag=true;
            }
            else{
                #echo "Yourself access count can't add~";          #yourself access
            }
        }
        else {
            #echo "contain 1 minus can't add~";                    #revonate
        }
    }
    else if ($clientIP!=$myIP[0]&&$clientIP!=$myIP[1]){                                                         #first access
        $flag=true;
    }
    if($flag){
        #echo "Welcome " . $_COOKIE['user_access'] . "!<br />";
        setcookie('user_access', time());               #updata cookie
        writeLog(addCount());                                  #write log
    }
}

function getClientIp(){
    return $_SERVER["REMOTE_ADDR"];
}

function getAccessTime(){
    date_default_timezone_set('Asia/Shanghai');
    return date("Y-m-d H:i:s");
}

function getCity($ip = '')
{
    /*if($ip == ''){
        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
        $ip=json_decode(file_get_contents($url),true);
        $data = $ip;
    }else{*/
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));
        if((string)$ip->code=='1'){
            return false;
        }
        $data = (array)$ip->data;
    /*}*/

    return $data["country"].$data["region"].$data["city"].$data["isp"];
}
