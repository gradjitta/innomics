<?php
$name=$_POST['uname'];
$comm= $_POST['comment'];
$comm=strip_tags($comm);
$comm=ereg_replace(" ","",$comm);
if(eregi('sex|slut|porn|bitch|suck|dick|ass|nude|cock|fuck',$comm))
{
header('Location: comments.php');
}
else
{
$date=date("Y",time())."-".date("m",time())."-".date("d",time());
$conn=mysql_connect("localhost","root","btech04bif072");
mysql_select_db("comments",$conn);
$query="insert into comment values ('$name','$comm',now());";
mysql_query($query,$conn);
header('Location: comments.php');
}
?>
