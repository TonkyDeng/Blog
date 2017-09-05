<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/24
 * Time: 10:40
 */
$demos=array(array("message","canvas","2","3","4","5","6","7"), //href
             array("images/message.png","images/canvas.png","2","3","4","5","6","7"),//img
             array("可拖动 选色 留言板","简易HTML5画板","2","3","4","5","6","7"));//ps
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Demos</title>
    <link href="demo.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <table>
        <?
        for ($i=0;$i<count($demos[0]);$i++){
            if($i%6==0)
                echo "<tr>";
            echo "<td>
                <a href=\"".$demos[0][$i]."\">
                    <div><img src=\"".$demos[1][$i]."\"/></div>
                    <h4>".$demos[2][$i]."</h4>
                </a>
            </td>";
            if($i%5==0)
                echo "</td>";
        }

        ?>
    </table>
</body>
</html>
