<?php
$id=$_GET['ac'];
$url="http://www.expasy.ch/uniprot/";
$url1=$url.$id.".fas";
$str=file_get_contents($url1);
echo $str;
?>