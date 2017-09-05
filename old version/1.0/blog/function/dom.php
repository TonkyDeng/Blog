<?php
/**
 * Created by PhpStorm.
 * User: Dearvee
 * Date: 2017/5/5
 * Time: 11:56
 */

function xml_get($name,$num,$filename){
    $dom=new DOMDocument('1.0');
    $dom->load($filename);
    $records = $dom->getElementsByTagName($name);
    return $records->item($num)->nodeValue;
}
$filename='../data/data.xml';
function xml_revise($name,$value,$num){
    global $filename;

    $dom=new DOMDocument('1.0');
    $dom->load($filename);
    $records = $dom->getElementsByTagName($name);
    $records->item($num)->nodeValue=$value;
    $dom->save($filename);
}
function xml_insert($name,$value){
    global $filename;

    $dom=new DOMDocument('1.0');
    $dom->load($filename);
    $datas = $dom->getElementsByTagName("data")->item(0);
    $login=$dom->createElement($name);
    $login->appendChild($dom->createTextNode($value));
    $datas->appendChild($login);

    $dom->save($filename);
}
function xml_count(){
    global $filename;

    $dom=new DOMDocument('1.0');
    $dom->load($filename);
    return $dom->getElementsByTagName("data")->length;
}

function xml_delete($name,$num){
    global $filename;

    $dom=new DOMDocument('1.0');
    $dom->load($filename);
    $datas = $dom->getElementsByTagName("data")->item(0);
    $datas->removeChild($dom->getElementsByTagName($name)->item($num));

    $dom->save($filename);
}