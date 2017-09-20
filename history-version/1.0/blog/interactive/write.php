<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/4
 * Time: 4:57
 */

include $write.'../data/user_data.php';

if ($write=="true") {
    echo "<!DOCTYPE html>
<html>
<head>
<meta charset=\"utf-8\">
	<title></title>
	
	<link href=\"../css/edit.css\" type=\"text/css\" rel=\"stylesheet\"/>
	
</head>
<body bgcolor=\"#f1f1f1\">
<script src=\"../../index/canvas-nest.min.js\"></script>

    <div>
        <form action=\"submit.php\">
            <input name=\"title\" class=\"put\" type=\"text\" placeholder=\"文章标题\"/>
            <textarea name=\"text\" class=\"area\" placeholder=\"文章内容\"></textarea>
            <input id=\"index\" name=\"index\" class=\"box\" type=\"checkbox\" contextmenu=\"123\"/>
            <label for=\"index\" class=\"box\" style=\"left: 320px;top: 670px;\">添加到主页</label>
            <input class=\"sub\" type=\"submit\"/>
        </form>
        <?echo $write;?>
    </div>
<? include '../index/footer.php';echo $footer;?>
</body>
</html>";
    include '../../index/footer.php';echo $footer;
    xml_revise('write','false',0);
}
else
    echo "you can't write~"

?>


