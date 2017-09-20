<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/4
 * Time: 5:0156+
 * +
 */
include '../index/head.php';
include 'interactive/get_data.php'; #获得文章内容
include 'function/get_abstract.php';#摘要
include $login.'data/user_data.php';#身份验证

#include '../access/client_ip.php';#ip
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章</title>
    <?echo getHead(1);?>

    <link href="css/article.css" type="text/css" rel="stylesheet"/>
</head>
<body bgcolor="#f1f1f1">
<script src="../index/canvas-nest.min.js"></script>

    <?
    if ($login=="true")
        echo "<a class=\"admin\" href=\"interactive/write.php\">新随笔</a>";
    else
        echo "<a class=\"admin\" href=\"interactive/login.php\">Login</a>";
    ?>
        <ul style="list-style-type: none;">
            <li><br></li>
            <li><br></li>
            <li><br></li>
            <?php
            for ($i=count($titles)-1;$i>=0;$i--)
            echo "
            <li class=\"page\">
                    <h2>".$titles[$i]."</h2>
                    <h5>Posted&nbsp;@&nbsp;".$times[$i]."&nbsp;by&nbsp;dearvee</h5>
                    ".$texts[$i]."
                    </p>
                    
            </li></p>
            
            <li><br></li>";
            ?>
        </ul>
    </div>
    <footer style="color:#ffffff;position: fixed;bottom: 10px;right: 10px;text-shadow: 2px 2px 4px #666666;">@code by vee</footer>
</body>
</html>
<script>
    window.onload=function () {
        <?xml_revise('login','false',0);?>
    }
</script>

