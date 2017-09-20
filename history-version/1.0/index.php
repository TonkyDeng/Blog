<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/4/21
 * Time: 22:50
 */
include 'index/head.php';
include 'access/access_func.php';
include 'access/write_log.php';
?>
<!DOCTYPE html> <META http-equiv="content-type" content="text/html; charset=utf-8">
<html style="overflow-x:hidden;">
<head>
    <title>Here</title>
    <?#echo getHead(0);?>
    <link href="blog/css/article.css" type="text/css" rel="stylesheet"/>
    <link href="index/home.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="index/upRunTime.js"></script>
</head>
<body bgcolor="#f1f1f1">
<script src="index/canvas-nest.min.js"></script>
<div>
    <br>
    <br>
    <br>
        <div class="info" style="position:fixed;margin:1% 0;left: calc(30% - 220px);"><!--information-->
            <div class="log">Vee<div style="font-size: 15px;">发现美，而不是坚持。</div></div>
            <div class="li"><a href="#">访问数:<?homeCount();echo getLateCount();?></a></div>
            <div class="li"><a href="api/wordcloud/">个性标签</a></div>
        </div>
</div>
    <div><!--page-->
        <ul class="abstract">
                <?
                include dirname(__FILE__).'/blog/function/Home.php';
                echo getHome();
                ?>
   </p></ul>


    </div>
    <br>
    <br>
    <br>

<? include 'index/runTime.php';echo $runTime;?>
<? include 'index/footer.php';echo $footer;?>
</body>
</html>
