<?php
session_start();
$comments=$_POST['comments_on_vit'];
$memorable=$_POST['memorable_in_vit'];

$regno=$_SESSION['regno'];
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB",$conn);
$query="insert into aboutvit  values('$regno','$comments','$memorable')";
mysql_query($query,$conn);
header('Location: t5.php');
?>