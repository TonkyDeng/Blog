<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/13
 * Time: 1:19
 */

include dirname(__FILE__).'/../interactive/get_data.php';
include dirname(__FILE__).'/articleToHtml.php';
include dirname(__FILE__).'/Home.php';

for ($i=0;$i<count($titles);$i++) {
    $href = buildHtmlFile($titles[$i], $times[$i], $texts[$i]);#build html file
    toHome($href, $titles[$i], $times[$i]);                     #write to home.txt
    echo $i." success~";
    sleep(2);
}