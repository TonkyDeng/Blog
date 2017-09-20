<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/11
 * Time: 14:36
 */
function writeLog($count){
    $logFile = dirname(__FILE__)."/log.txt";
    $ip = getClientIp();
    $log =
        "The Access->" . $count ." | ".
        "User Location->" . getCity($ip)." | ".
        "IP->" . $ip ." | ".
        "Time->" . getAccessTime();
    file_put_contents($logFile,$log."\r\n",FILE_APPEND);
    #echo 'write log success~';
}