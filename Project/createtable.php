<?php
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB");
$query="create table personal(firstname varchar(20),middlename varchar(20),lastname varchar(20),gender varchar(20),
                                  birthday varchar(20),email varchar(20),phoneno varchar(20),mobileno varchar(20),
                                  cuisine varchar(20),movie varchar(20), book varchar(20),actor varchar(20),
                                  author varchar(20),color varchar(20),hobbies varchar(20),place varchar(20),
                                  singer varchar(20), sport varchar(20),regno varchar(20) references userid(regno))type=InnoDB";
if(mysql_query($query,$conn))
{
print "table created";

}
