<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/10
 * Time: 21:28
 */
include dirname(__FILE__).'/../../blog/interactive/get_data.php';
$text=implode('',$texts);
$text=str_replace("\"","",$text);
$text=str_replace("'","",$text);
$text=str_replace("\r\n","",$text);
echo $texts[14];
echo $texts[20];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>标签</title>
    <link href="../../blog/css/article.css" type="text/css" rel="stylesheet"/>
    <script src="wordcloud2.js"></script>
    <script src="wordfunc.js"></script>
</head>
<body bgcolor="#f1f1f1">
<canvas id="mark" width="700px" height="500px" style="margin: 0 30%;"></canvas>
<script>
    var my_list="<?=$text?>";
    WordCloud(document.getElementById('mark'), {
        list:get_list(my_list,120,2),
        backgroundColor: '#ffffff',
        fontFamily:'Lato,"PingFang SC","Microsoft YaHei",sans-serif',
        wait:80,
        rotateRatio:1
    });
</script>
</body>
</html>