<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/9
 * Time: 17:21
 */

function to_abstract($str){
    return add_abstract(substr($str,0,strpos($str,'</p>',strpos($str,'</p>')+1)));
}

function add_abstract($str){
    $reg='/\<div\ class=\"in_div\"\>\<img\ class=\"in_img\"\ src\=\"([\s\S]+)\"\/\>\<\/div\>/';
    preg_match($reg,$str,$href); #get href
    return preg_replace($reg,'<div class="in_div"><img class="in_img" src="'.$href[1].'"/></div><h4 style="text-align: left;">摘要:</h4>',$str,1);
}
