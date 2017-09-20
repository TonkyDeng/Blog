<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/11
 * Time: 20:32
 */
include '../../index/head.php';

function buildHtmlFile($title,$time,$text){
    $head=getHead(1);
    $article = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>随笔 - '.$title.'</title>
    
    '.$head.'
    
<link href="../css/article.css" type="text/css" rel="stylesheet"/>
</head>
<body bgcolor="#f1f1f1">
<script src="../../index/canvas-nest.min.js"></script>

<ul style="list-style-type: none;">
    <li><br></li>
    <li><br></li>
    <li><br></li>
            <li class="page">
                    <h2>'.$title.'</h2>
                    <h5>Posted&nbsp;@&nbsp;'.$time.'&nbsp;by&nbsp;dearvee</h5>
                    '.$text.'
                    </p>
                    
            </li></p>
            
            <li><br></li>
</ul>
</div>
<footer style="color:#ffffff;position: fixed;bottom: 10px;right: 10px;text-shadow: 2px 2px 4px #666666;">@code by vee</footer>
</body>
</html>';
    $current_time=time();
    $htmlPath=dirname(__FILE__).'/../p/'.$current_time.'.html';
    file_put_contents($htmlPath,$article);
    return $current_time;
}