<?php
require_once('class.generalsearch.php');
$obj=new generalsearch();
$obj->connect();
$obj->connectdb();
$result=array();
$keyword;
if($_POST['choice1'][0]=="ID")
{
$user_id=$_POST['choice2'];
$result1=$obj->getid($user_id); 
$result_array=mysql_fetch_array($result1);
print<<<HTML
<style type="text/css">
.results{
position:absolute;
top:90px;
left:60px;
}
.results1{
position:absolute;
top:30px;
left:60px;
}

.results td,.results1 td{
border : 1px solid #787A6B;
text-align:center;
background:#98AFC7;
color:green;
}
.results a,.results1 a{
text-decoration:none;
color:white;
}
.results a:hover,.results1 a:hover{
color:green;
}

.results td.tis,.results1 td.tis{
font-size:larger;
color:white;
}
.results .white,.results1 .white{
color:white;
}
</style>
<table class="results1"   cellspacing="7px">
<tr>
<td align="center"><b>ID</b></td>
<td width="150px"><b>Keywords</b></td>
</tr>
HTML;
echo "<tr>";
echo"<td > <a  id=\"0 \" href=\"javascript:connect1()\" target=\"third\" >".$result_array[0]."</a>";echo"</td>";
echo"<td class=\"tis\">".str_replace(';',',',$result_array[1]);echo"</td>";
echo"</tr>";
echo"</table>";
print<<<H
<form name="hid" id="idf" action="results.php" method="get">
<input type="hidden" name="selected" >
</form>
<script language="javascript">
function connect1()
{

  document.forms[0].elements[0].value=document.links[0].firstChild.nodeValue;
  document.forms[0].submit();
}
</script>
H;
}
else if(isset($_POST['choice1'][0])||isset($_GET['key']))
{
 if(isset($_POST['choice1'][0]))
   {
	$keyword=$_POST['choice2'];
	}
  else
  {
	$keyword=$_GET['key'];
 } 
$result=$obj->getkey($keyword);
$res=$result[0];
$res1=mysql_fetch_array($result[1]);
$total=$res1[0];
 print<<<HTML
 <style type="text/css">
.results{
position:absolute;
top:90px;
left:60px;
}
.results1{
position:absolute;
top:30px;
left:60px;
}

.results td,.results1 td{
border : 1px solid #787A6B;
text-align:center;
background:#98AFC7;
color:green;
}
.results a,.results1 a{
text-decoration:none;
color:white;
}
.results a:hover,.results1 a:hover{
color:green;
}

.results td.tis,.results1 td.tis{
font-size:larger;
color:white;
}
.results .white,.results1 .white{
color:white;
}
</style>
<div  style="font-family:verdana;font-size:15px;color:#3574EC;position:absolute;left:80px;top:28px;border:1px solid #98AFC7">
<font color="black">We found </font>$total <font color="black">results for your query on </font>
HTML;
print strtoupper($keyword);
print<<<HTML
</div>
<div  style="font-family:verdana;font-size:15px;position:absolute;left:730px;top:26px;">
<form method="post" action="generalsearch.php?key=$keyword">
Results Per Page
<select name="number">
<option value="5" SELECTED>5</option>
<option value="10">10</option>
<option value="15">15</option>
</select>
<input type="submit" value="GO">
</form>
<form name="hid" action="results.php" method="get">
<input type="hidden" name="selected" >
</form>
</div>
HTML;
if(isset($_POST['number'])||isset($_GET['show']))
{
print<<<HTML
<table class="results"   cellspacing="7px">
<tr>
<td align="center"><b>ID</b></td>
<td width="150px"><b>Keywords</b></td>
</tr>
HTML;
if(isset($_POST['number']))
{
$show=$_POST['number'];
}
else{
$show=$_GET['show'];
}
$count=$_GET['count'];
if(isset($_GET['count'])&&!isset($_GET['count1']))
{
$count=$_GET['count'];
for($i=$count;$i<$count+$show;$i++)
{
echo "<tr>";
echo"<td > <a  id=\"$i \" href=\"javascript:connect($i)\" target=\"third\" >".mysql_result($res,$i,"protid")."</a>";echo"</td>";
echo"<td class=\"tis\">".str_replace(';',',',mysql_result($res,$i,"keyword"));echo"</td>";
echo"</tr>";
HTML;
}
$count=$count+$show;
}
else
{
for($i=0;$i<$show;$i++)
{
echo"<tr>";
echo"<td> <a  id=\"$i \" href=\"javascript:connect($i)\" target=\"third\" >".mysql_result($res,$i,"protid")."</a>";echo"</td>";
echo"<td class=\"tis\">".str_replace(';',',',mysql_result($res,$i,"keyword"));echo"</td>";
echo"</tr>";
HTML;
}
$count=$count+$show;
}
$x=$count-$show+1;
$y=$count;
print<<<HTML
</table>
<style type="text/css">
.button1{
position:absolute;
top:62px;
left:790px;
text-decoration:none;
font-family:verdana;
}
.button2{
position:absolute;
top:62px;
left:870px;
text-decoration:none;
font-family:verdana;
}
</style>
<div class="disp" style="font-family:verdana;font-size:15px;color:#3574EC;position:absolute;left:80px;top:64px;">
<font color="black">Currently showing </font> $x<font color="black">to </font>$y<font color="black"> Results</font>
</div>
<input type="button" class="button1" value="<<prev" onclick="history.go(-1)">
<input type="button" class="button2" value="Next>>" onclick="location.href='generalsearch.php?count=$count&key=$keyword&show=$show'">
<script language="javascript">
function connect(x)
{
  var y=x%$show;
  document.forms[1].elements[0].value=document.links[y].firstChild.nodeValue;
  document.forms[1].submit();

}
</script>
HTML;
}
}
?>