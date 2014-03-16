<?php
                                 /*file for database connectivity*/
require_once('class.hoss.php');                          /*class for fetching results*/
$obj=new hoss();
$obj->connect();
$result=array();
$org;
if(isset($_GET['org']))   /* 1st condition for organism 2nd and 3rd  for refreshing*/
{
  $org=$_GET['org'];

$result=$obj->search($_GET['org']);
}
$res=$result[0];
$res1=mysql_fetch_array($result[1]);
$total=$res1[0];
 print<<<HTML
<div  style="font-family:verdana;font-size:15px;color:#3574EC;position:absolute;left:80px;top:28px;border:1px solid #98AFC7">
<font color="black">We found </font>$total <font color="black">results for your query on </font>
HTML;
print strtoupper($org);
print<<<HTML
</div>
<div  style="font-family:verdana;font-size:15px;position:absolute;left:730px;top:26px;">
<form method="post" action="hossresults.php?org=$org">
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
<style type="text/css">
.results{
position:absolute;
top:90px;
left:60px;
}

.results td{
border : 1px solid #787A6B;
text-align:center;
background:#98AFC7;
color:green;
}
.results a{
text-decoration:none;
color:white;
}
.results a:hover{
color:green;
}

.results td.tis{
font-size:larger;
color:white;
}
.results .white{
color:white;
}
#check1,#checks{
padding:0px;
border:0;
}
#check0{
background:white;
}
</style>
<form name="hspphyinput" method="post" action="hspphyresults.php" onsubmit="return check()">
<table class="results" border="0"  cellspacing="7px">
<tr>
<td align="center"><b>ID</b></td>
<td id="check0"></td>
<td><b>Accession Number</b></td>
<td width="150px"><b>Tissue/Organ</b></td>
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
$cresult=mysql_result($res,$i,"ID");
echo "<tr>";
echo"<td><a  id=\"$i \" href=\"javascript:connect($i)\" target=\"third\" >".mysql_result($res,$i,"ID")."</a>";echo"</td>";
echo "<td id=\"checks\">"."<input  type=\"checkbox\" name=\"prot$i\"  value=\"$cresult\" id=\"check1\" >"."</td>";
echo"<td class=\"white\">". mysql_result($res,$i,"accession_number");echo"</td>";
echo"<td class=\"tis\">".implode(' ',array_unique(split(' +|,',rtrim(mysql_result($res,$i,"tissue")))));echo"</td>";
echo"</tr>";
HTML;
}
$count=$count+$show;
}
else
{
for($i=0;$i<$show;$i++)
{
$cresult=mysql_result($res,$i,"ID");
echo"<tr>";
echo"<td><a  id=\"$i \" href=\"javascript:connect($i)\" target=\"third\" >".mysql_result($res,$i,"ID")."</a>";echo"</td>";
echo "<td id=\"checks\">"."<input  type=\"checkbox\" name=\"prot$i\" value=\"$cresult\" >"."</td>";
echo"<td class=\"white\">". mysql_result($res,$i,"accession_number");echo"</td>";
echo"<td class=\"tis\">".implode(' ',array_unique(split(' +|,',rtrim(mysql_result($res,$i,"tissue")))));echo"</td>";
echo"</tr>";
HTML;
}
$count=$count+$show;
}
$x=$count-$show+1;
$y=$count;
print<<<HTML
</table>
<input type="submit" value="Compare with HSPPHY" style="position:absolute;top:62px;left:550px;">
</form>
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
<input type="button" class="button2" value="Next>>" onclick="location.href='hossresults.php?count=$count&org=$org&show=$show';">
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
?>
