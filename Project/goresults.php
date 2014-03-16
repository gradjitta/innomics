<?php
                                 /*file for database connectivity*/
require_once('class.go.php');                          /*class for fetching results*/
$obj=new go();
$obj->connect();
$result=array();
$textinput;
$gocode;
if(isset($_GET['textinput']))   /* 1st condition for organism 2nd and 3rd  for refreshing*/
{
  $textinput=$_GET['textinput'];

$result=$obj->search($_GET['textinput']);
}
if(isset($_GET['goCode']))
{
  $gocode= $_GET['goCode'];
}
$res=mysql_fetch_array($result[0]);
$total=mysql_fetch_array($result[1]);
$goRowDataId=mysql_fetch_array($result[2]);
$goRowData=$result[4];
//function starts


function difGoDisplay($k)
{
  $z=explode('; ',$k);
  //for id entry
$pid=preg_grep('/^[GO]/',$z);
$pid1=preg_grep('/(\|GO)/',$z);
$pid2=preg_grep('/^[C:]/',$z);
$pid3=preg_grep('/^[F:]/',$z);
$pid4=preg_grep('/^[P:]/',$z);
foreach($pid1 as $d1)
{
  $d= explode('|',$d1);
  $m.= $d[1]." ";
}
$id= $pid[0]." ".$m;
//now diff entries based on A C F P
foreach($pid2 as $c1)
{
  $c= explode(':',$c1);
  $cc.= $c[1].",";
}
foreach($pid3 as $f1)
{
  $f= explode(':',$f1);
  $ff.= $f[1].",";
}
foreach($pid4 as $p1)
{
  $p= explode(':',$p1);
  $pp.= $p[1].",";
}


return array($id,$cc,$ff,$pp);
}
//ends here

 print<<<HTML
<div  style="font-family:verdana;font-size:15px;color:#3574EC;position:absolute;left:80px;top:28px;border:1px solid #98AFC7">
<font color="black">We found </font>$total[0] <font color="black">results for your query on </font>
HTML;
print strtoupper($textinput);
print<<<HTML
</div>
<div  style="font-family:verdana;font-size:15px;position:absolute;left:730px;top:26px;">
<form method="post" action="goresults.php?textinput=$textinput&goCode=$gocode">
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
<td width="150px"><b>Gene ontology specification</b></td>
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
$cresult=mysql_result($goRowData,$i,"protid");
$textt=mysql_result($goRowData,$i,"protgodata");
$arrr=difGoDisplay("$textt");
echo "<tr>";
echo"<td><a  id=\"$i \" href=\"javascript:connect($i)\" target=\"third\" >".mysql_result($goRowData,$i,"protid")."</a>";echo"</td>";
echo "<td id=\"checks\">"."<input  type=\"checkbox\" name=\"prot$i\"  value=\"$cresult\" id=\"check1\" >"."</td>";
if($_GET['goCode']=="A")
{
echo"<td class=\"tis\">".$arrr[1].$arrr[2].$arrr[3];echo"</td>";
}
if($_GET['goCode']=="C")
{
echo"<td class=\"tis\">".$arrr[1];echo"</td>";
}
if($_GET['goCode']=="F")
{
echo"<td class=\"tis\">".$arrr[2];echo"</td>";
}
if($_GET['goCode']=="P")
{
echo"<td class=\"tis\">".$arrr[3];echo"</td>";
}
echo"</tr>";
HTML;
}
$count=$count+$show;
}
else
{
for($i=0;$i<$show;$i++)
{
$cresult=mysql_result($goRowData,$i,"protid");
$textt=mysql_result($goRowData,$i,"protgodata");
$arrr=difGoDisplay("$textt");
echo"<tr>";
echo"<td><a  id=\"$i \" href=\"javascript:connect($i)\" target=\"third\" >".mysql_result($goRowData,$i,"protid")."</a>";echo"</td>";
echo "<td id=\"checks\">"."<input  type=\"checkbox\" name=\"prot$i\" value=\"$cresult\" >"."</td>";
if($_GET['goCode']=="A")
{
echo"<td class=\"tis\">".$arrr[1].$arrr[2].$arrr[3];echo"</td>";
}
if($_GET['goCode']=="C")
{
echo"<td class=\"tis\">".$arrr[1];echo"</td>";
}
if($_GET['goCode']=="F")
{
echo"<td class=\"tis\">".$arrr[2];echo"</td>";
}
if($_GET['goCode']=="P")
{
echo"<td class=\"tis\">".$arrr[3];echo"</td>";
}


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
<input type="button" class="button2" value="Next>>" onclick="location.href='goresults.php?count=$count&textinput=$textinput&show=$show&goCode=$gocode';">
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
