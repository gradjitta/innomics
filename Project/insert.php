<?php
set_time_limit(0);
$conn=mysql_connect("64.151.232.2","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB",$conn);
$query="load data infile '/var/www/html/estt.txt' into table general_oneliner;";
if($query)
{
$result=mysql_query($query,$conn);
}
else
{
  echo"FUCKKKKKK";
}


?>