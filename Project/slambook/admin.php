<html>
<body>
<form name="check" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
&nbsp;&nbsp;&nbsp;&nbsp;please answer the following question.......<br>
<br><br> What is your first crush name?
<input type="password" name="crush">
<input type="submit" value="validate">
</form>
</body>
</html>
<?php
if(isset($_POST['crush']))
{
$crush=$_POST['crush'];
if($crush=="prameela")
{
print "<BR>welcome teja";
print"<form name=\"two\" method=\"post\" action=\"admin.php\">";
print" Enter your password to continue......";
print"<input type=\"password\" name=\"passwd\">";
print " <input type=\"submit\" value=\"GO\">";
print " </form>";

}
else
{
print "Sorry..this page is only for administrators....";
}
}


?>
<?php
if(isset($_POST['passwd']))
{
$passwd=$_POST['passwd'];
if($passwd=="btech04bif072")
{
print "confirmed...welcome minnu........";
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB",$conn);
$query="select count(regno)  from userid";

$result=mysql_query($query,$conn);
while($line=mysql_fetch_array($result))
{
print "TOTAL <a href=\"admin.php?show=1\">".$line[0]. "</a>"." entries so far";
}

}
else
{
print "Leave at once.........";
}
}
?>
<?php
if(isset($_GET['show']))
{
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB",$conn);
$query="select regno from userid";

$result=mysql_query($query,$conn);
while($lin=mysql_fetch_array($result))
{
print "<a href=\"admin.php?detail=$lin[0]\">".$lin[0]."</a>"."<BR>";
}
}
?>
<?php
if(isset($_GET['detail']))
{
  $regno=$_GET['detail'];
$conn=mysql_connect("localhost","innomics","aditya314");
mysql_select_db("innomics_org_-_RTDB",$conn);
$query="select * from personal where regno='$regno'";
$result=mysql_query($query,$conn);
while($lin1=mysql_fetch_array($result,MYSQL_ASSOC))
{
foreach($lin1 as $key=>$value)
{
print $key."=>".$value."<BR>";
}
}
$query1="select * from professional where regno='$regno'";
$result1=mysql_query($query1,$conn);
while($lin2=mysql_fetch_array($result1,MYSQL_ASSOC))
{
foreach($lin2 as $key1=>$value1)
{
print $key1."=>".$value1."<BR>";
}
}
$query2="select * from aboutvit where regno='$regno'";
$result2=mysql_query($query2,$conn);
while($lin3=mysql_fetch_array($result2,MYSQL_ASSOC))
{
foreach($lin3 as $key2=>$value2)
{
print $key2."=>".$value2."<BR>";
}
}
$query3="select * from aboutteja where regno='$regno'";
$result3=mysql_query($query3,$conn);
while($lin4=mysql_fetch_array($result3,MYSQL_ASSOC))
{
foreach($lin4 as $key3=>$value3)
{
print $key3."=>".$value3."<BR>";
}
}
}
?>
