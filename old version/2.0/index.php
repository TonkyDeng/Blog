
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Here</title>
    <link href="index/head.css" type="text/css" rel="stylesheet"/>      <!--info style-->
    <link href='index/home.css' type='text/css' rel='stylesheet'/>      <!--list style-->
    <link href="blog/css/article.css" type="text/css" rel="stylesheet"/><!--article style-->
    <script src="index/Ajax.js"></script>
    <script src="index/upRunTime.js"></script>                          <!--Run time ctrl-->
</head>
<body style="background: url('index/back.png');">
<div id="bodyInfo" class="bodyInfo"></div>
<div style="width: 300px;height: 600px;position: fixed;top: 10px;right: 10px;color: #3366CC;">Affiche:
    </p>我知道你不可以返回,当你点击文章的时候.
    后来我可能会使用html5 api history.pushState and history.replaceState.
    但两天后我有一考试,紧接着后面，还要做一个小项目作为JSP课程期末成绩。
    所以暂时我没有足够的时间持续维护My fossa 了。
    大概要一星期的时间吧，一周后再见#_#~
    </p>Time:2017-5-15 9:57
</div><!--status-->
<header id="header">
    <span id="ctrl" class="ctrl">>></span>
    <div class="admin">
        <img class="img" src="index/cat.jpg"/>
        <br>
        <a href="http://www.dearvee.com">vee</a>
        <ul>
            <li><a class="aInfo" href="javascript:void(0);" onclick="getAjax('index/');">Essay</a></li>
            <li><a class="aInfo" href="demos/">My Code</a></li>
            <li><a class="aInfo" href="https://github.com/dearvee"  target="_blank">GitHub</a></li>
            <li><a class="aInfo" href="https://cnblogs.com/dearvee" target="_blank">CnBlog</a></li>
            <li><a class="aInfo" href="http://blog.csdn.net/dearvee"    target="_blank">CSDN</a></li>
        </ul>
        <h4>Follow your heart~</h4>
        <span>Trying...</span>
        <ul class="testInfo">
            <li>PV:<? include 'access/access_func.php';
                include 'access/write_log.php';
                homeCount();echo getLateCount();?>
            </li>
            <li id="runTime">Loading...</li>
            <li>code by vee</li>
        </ul>
    </div>
</header>
</body>
</html>