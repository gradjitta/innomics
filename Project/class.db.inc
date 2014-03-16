<?php
class dbconnect{
static $conn;
function __construct(){	
$this->host="localhost";
$this->uname="innomics";
$this->password="aditya314";
 
 }
 function connect()
 {
	self::$conn=mysql_connect("localhost","innomics","aditya314");
}
}
?>
