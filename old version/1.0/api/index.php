<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/4/22
 * Time: 13:52
 */
include '../index/head.php';
$tip=array(array("Web Music","Doco Music","Message Board"),array("","","message"));
include '../access/client_ip.php';
echo get_ip();
?>
<!DOCTYPE html> <META http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
    <meta charset="utf-8">
    <title>小玩意</title>
    <?#echo getHead(2);?>
</head>
<body bgcolor="#f1f1f1">
<script src="../index/canvas-nest.min.js"></script>
正在紧急开发中...
<ul style="position: absolute;top: 80px;">
    <?for ($i=0;$i<count($tip[0]);$i++) {
        echo "<li><a style='color: #666;' href=\"".$tip[1][$i]."\">".$tip[0][$i]."</a></li>";
    }
    ?>
</ul>
<? include '../index/footer.php';echo $footer;?>
</body>
</html>