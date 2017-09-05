<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/4/28
 * Time: 10:47
 */

include 'getdata.php';
include '../../index/head.php';
$message=str_replace("\r\n","\\n",$message);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
	<title>留言板</title>
    <?echo getHead(4);?>
    <link rel="stylesheet" type="text/css" href="mess_style.css">
    <script type="text/javascript" src="create.min.js"></script>
    <script type="text/javascript">
        var i=1;
        var j=1;
        var submit_flag=true;
        window.onload=function () {
            document.getElementById("add")
                .addEventListener("click",function () {
                    if(submit_flag) {
                        createBoard(true, "", "660px*250px", "");
                        submit_flag=false;
                    }
                    else{
                        //alert("you need submit you have been board~");
                    }
                });
            var messages="<?=$message?>";
            var messages=messages.split('*');
            var poss="<?=$pos?>";
            var poss=poss.split('&');
            var colors="<?=$color?>";
            var colors=colors.split('*');
            for(var i=0;i<messages.length&&messages[i];i++) {
                createBoard(false,messages[i],poss[i],colors[i]);
            }
        }


    </script>


</head>
<body id="body" bgcolor="#f1f1f1" style="overflow: hidden">
<script src="../../index/canvas-nest.min.js"></script><!--animation-->
<span id="add"  class="add_css">+&nbsp留言</span>
<iframe id="action" name="action" src="about:blank" style="display:none;"></iframe><!--no F5 get data-->
<? include '../../index/footer.php';echo $footer;?>
</body>
</html>