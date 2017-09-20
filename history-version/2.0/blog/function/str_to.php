<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/5
 * Time: 23:03
 */

function str_to_html($str){
    $str=to_space($str);    #space to html
    $str=to_n($str);        #\n to html
    $str=to_a($str);        #a to html
    $str=to_img($str);      #img to html
    $str=to_code($str);     #code to html
    return $str;
}

function to_space($str){
    return str_replace(" ","&#160;",$str);
}

function space_to($str){
    return str_replace("&#160;"," ",$str);
}

function to_n($str){
    return str_replace("\n","</p>",$str);
}

function n_to($str){
    return str_replace("</p>","\n",$str);
}

function to_a($str){
    $reg='/#a\(([\s\S]+)\)\(([\s\S]+)\)#a/U';
    preg_match_all($reg,$str,$hrefs); #get hrefs
    $len=count($hrefs[1]);
    for ($i=0;$i<$len;$i++) {
        $str=preg_replace($reg,"<a class=\"in_a\" href=\"".$hrefs[2][$i]."\" target=\"_blank\">".$hrefs[1][$i]."</a>",$str,1);
    }
    return $str;
}

function to_img($str){
    $reg='/#img\(([\s\S]+)\)#img/';
    preg_match($reg,$str,$href); #get href
    return preg_replace($reg,"<div class=\"in_div\"><img class=\"in_img\" src=\"".$href[1]."\"/></div>",$str);
}

function to_code($str){
    $reg='/#code\(([\s\S]+)\)#code/U';
    preg_match_all($reg,$str,$codes); #get code
    $len=count($codes[1]);
    for ($i=0;$i<$len;$i++) {
        $code = space_to($codes[1][$i]);
        $code = n_to($code);
        $str=preg_replace($reg, "<pre class=\"in_code\">" . htmlentities($code,ENT_COMPAT,'utf-8') . "</pre>",$str,1);
    }
    return $str;
}