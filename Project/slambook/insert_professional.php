<?php
session_start();
$branch=$_POST['branch'];
$subject=$_POST['subject'];
$lecturer=$_POST['lecturer'];
$btech=$_POST['btech_in_vit'];
$regno=$_SESSION['regno'];
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB",$conn);
$query="insert into professional values('$regno','$subject','$lecturer','$btech')";
mysql_query($query,$conn);
header('Location: t4.php');
?>