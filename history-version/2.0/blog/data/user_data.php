<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/5
 * Time: 2:05
 */

include dirname(__FILE__).'\..\function\dom.php';
$filename=dirname(__FILE__).'\data.xml';
$login=xml_get('login',0,$filename);
$write=xml_get('write',0,$filename);
$count=xml_get('count',0,$filename);