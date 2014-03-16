<?php
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB");
$query="alter table personal  modify singer varchar(100)";
$result=mysql_query($query,$conn);
  if($result)
  {
  print "changed";
  }
?>