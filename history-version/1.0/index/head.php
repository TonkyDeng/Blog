<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/3
 * Time: 8:59
 */
$tips = array(array("首页","随笔", "小玩意", "工具", "留言板","社区"),#"博客园", "Git" , "https://cnblogs.com/dearvee/", "https://git.ahstu.cc/dearvee/"
    array("http://dearvee.com", "http://dearvee.com/blog/","http://dearvee.com/api/", "http://dearvee.com/tools/", "http://dearvee.com/api/message/","#"));
function getHead($num){
    global $tips;
    $head = "<style type=\"text/css\">
        .header_css{
                width: 100%;
                height: 60px;
                position: fixed;
                left: 0px;
                top: 0px;
                background: #ffffff;
                font-size: 16px;
                font-family: sans-serif;
                text-align: center;
                user-select: none;
                line-height: 90px;
                z-index: 99999;
            }
        #ui_all{
            position: absolute;
            right: 200px;
        }
        
        #ui_all li{
            float: left;
            list-style-type: none;
        }
        #ui_all li a{
            width: 100px;
            height: 60px;
            background: #ffffff;
            color: #666666;
            display: block;
            text-align: center;
            text-decoration: none;
            line-height: 60px;
            transition: all 0.2s;
            text-shadow: 1px 1px 2px #ffffff;
        }
        #ui_all li a:hover{
            width: 100px;
            height: 60px;
            background: #888888;
            color: #ffffff;
            text-shadow: 1px 1px 2px #666666;
        }
        
        #sq_ui{
            display: none;
        }

    </style>
    <div id=\"header\" class=\"header_css\">
    <nav>
    <ui id='ui_all'>
    ";
    for ($i = 0; $i < count($tips[0]); $i++) {
        if ($i==$num)
            $head = $head . "<li><a style=\"background:#666666;color: #ffffff\" href=\"" . $tips[1][$i] . "\">" . $tips[0][$i] . "</a></li>";
        else if ($i==5)
            $head = $head . "<li><a id='sq' href=\"" . $tips[1][$i] . "\">" . $tips[0][$i] . "</a>".
                                "<ui id='sq_ui'><a id='blog' href=\"" . "https://cnblogs.com/dearvee/" . "\">" . "博客园" . "</a>".
                                            "<a id='git' href=\"" . "https://github.com/dearvee/" . "\">" . "Git" . "</a>
                                 </ui>".
                            "</li>";

        else
            $head = $head . "<li><a href=\"" . $tips[1][$i] . "\">" . $tips[0][$i] . "</a></li>";
    }
    $head = $head . "</ui></nav></div><script type='text/javascript'>
                                        
                                        mouse('sq','sq_ui');
                                        mouse('sq_ui','sq_ui');
                                        
                                        
                                        function mouse(s,t) {
                                          document.getElementById(s).onmouseover=function() {
                                            document.getElementById(t).style.display='block';
                                            }
                                          document.getElementById(s).onmouseout=function() {
                                            document.getElementById(t).style.display='none';
                                            }
                                        }
                                        
                                      </script>
                    ";
    return $head;
}