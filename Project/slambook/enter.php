<?php
session_start();
if(isset($_POST['uname']))
{
$regno=$_POST['uname'];
}
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB",$conn);
$query="insert into userid values('$regno')";
mysql_query($query,$conn);
$_SESSION['regno']=$regno;
header('Location: t2.php');
?>
