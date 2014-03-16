<?php
session_start();
$firstimp=$_POST['firstimp'];
$comment=$_POST['comment_on_me'];

$regno=$_SESSION['regno'];
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB",$conn);
$query="insert into aboutteja  values('$regno','$firstimp','$comment')";
mysql_query($query,$conn);
session_destroy();
header('Location: t6.php');
?>