<?php
                                 /*file for database connectivity*/
require_once('class.search.php');                          /*class for fetching results*/
$obj=new search();
$obj->connect();
$input_arr=array($_GET['keyword'],$_GET['radio2'],$_GET['organ'],$_GET['radio3'],$_GET['strain'],$_GET['radio4'],$_GET['taxonomy'],$_GET['radio5'],$_GET['author'],$_GET['titles1'],$_GET['titles2'],$_GET['radio6'],$_GET['mol1'],$_GET['mol2'],$_GET['radio7'],$_GET['doe1'],$_GET['doe2'],$_GET['radio8'],$_GET['aa1'],$_GET['aa2']);
  $keyword=$input_arr[0];
  $inc_tissue=$input_arr[1];
  $organ=$input_arr[2];
  $inc_strain=$input_arr[3];
  $strain=$input_arr[4];
  $inc_tax=$input_arr[5];
  $taxonomy=$input_arr[6];
  $inc_auth=$input_arr[7];
  $author=$input_arr[8];
  $min_title=$input_arr[9];
  $max_title=$input_arr[10];
  $inc_mwt=$input_arr[11];
  $min_mwt=$input_arr[12];
  $max_mwt=$input_arr[13];
  $inc_doe=$input_arr[14];
  $min_doe=$input_arr[15];
  $max_doe=$input_arr[16];
  $inc_aa=$input_arr[17];
  $min_aa=$input_arr[18];
  $max_aa=$input_arr[19];
  echo $organ;
$str_arr=implode(',',$input_arr);
$count;
$result=$obj->searc($str_arr);
  $res_key=$result[0];
  $res_length=$result[1];
  $res_wt=$result[2];
  $res_date=$result[3];
  $res_author=$result[4];
  $res_taxonomy=$result[5];
  $res_organ=$result[6];
  $res_title=$result[7];
  $res_strain=$result[8];
  $res_author_wt=$result[9];
  $res_strain_wt=$result[10];
  $res_organ_wt=$result[11];
  $res_taxonomy_wt=$result[12];
  $res_author_aa=$result[13];
  $res_strain_aa=$result[14];
  $res_organ_aa=$result[15];
  $res_taxonomy_aa=$result[16];
  if($author)
  {

    if($min_aa)
    {
      $textinput1=$res_author_aa;
    }
    elseif($min_mwt)
    {
      $textinput1=$res_author_wt;
    }
    else
    {
      $textinput1=$res_author;
    }

  }
  elseif($organ)
  {
    if($min_aa)
    {
      $textinput1=$res_organ_aa;
    }
    elseif($min_mwt)
    {
      $textinput1=$res_organ_wt;
    }
    else
    {
      $textinput1=$res_organ;
    }



  }
  elseif($strain)
  {
    if($min_aa)
    {
      $textinput1=$res_strain_aa;
    }
    elseif($min_mwt)
    {
      $textinput1=$res_strain_wt;
    }
    else
    {
      $textinput1=$res_strain;
    }

  }
  elseif($taxonomy)
  {
     if($min_aa)
    {
      $textinput1=$res_taxonomy_aa;
    }
    elseif($min_mwt)
    {
      $textinput1=$res_taxonomy_wt;
    }
    else
    {
      $textinput1=$res_taxonomy;
    }

  }
  elseif($min_title)
  {
    $textinput1=$res_title;
  }
  elseif($min_doe)
  {
    $textinput1=$res_date;
  }

  elseif($inc_aa=="and7"  &&  $min_aa)
  {
    $textinput1=$res_length;

  }

  elseif($inc_mwt == "and5" &&  $min_mwt)
  {
    $textinput1=$res_wt;
  }
  else
  {
    $textinput1=$res_key;
  }

  $numm= mysql_num_rows($textinput1);








print<<<HTML
<div  style="font-family:verdana;font-size:15px;color:#3574EC;position:absolute;left:80px;top:28px;border:1px solid #98AFC7">
<font color="black">We found </font> $numm<font color="black">results Click Go</font>
HTML;

print<<<HTML
</div>
<div  style="font-family:verdana;font-size:15px;position:absolute;left:730px;top:26px;">
<form method="post" action="searchresults.php?keyword=$keyword&radio2=$inc_tissue&organ=$organ&radio3=$inc_strain&strain=$strain&radio4=$inc_tax&taxonomy=$taxonomy&radio5=$inc_auth&author=$author&titles1=$min_title&titles2=$max_title&radio6=$inc_mwt&mol1=$min_mwt&mol2=$max_mwt&radio7=$inc_doe&doe1=$min_doe&doe2=$max_doe&radio8=$inc_aa&aa1=$min_aa&aa2=$max_aa">
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
<td id="check0">Select ID</td>
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
$cresult=@mysql_result($textinput1,$i,"protid");

echo "<tr>";
echo"<td><a  id=\"$i \" href=\"javascript:connect($i)\" target=\"third\" >".@mysql_result($textinput1,$i,"protid")."</a>";echo"</td>";
echo "<td id=\"checks\">"."<input  type=\"checkbox\" name=\"prot$i\"  value=\"$cresult\" id=\"check1\" >"."</td>";
echo"</tr>";
HTML;
}
$count=$count+$show;
}
else
{
for($i=0;$i<$show;$i++)
{
$cresult=mysql_result($textinput1,$i,"protid");

echo"<tr>";
echo"<td><a  id=\"$i \" href=\"javascript:connect($i)\" target=\"third\" >".mysql_result($textinput1,$i,"protid")."</a>";echo"</td>";
echo "<td id=\"checks\">"."<input  type=\"checkbox\" name=\"prot$i\" value=\"$cresult\" >"."</td>";

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
<input type="button" class="button2" value="Next>>" onclick="location.href='searchresults.php?count=$count&keyword=$keyword&radio2=$inc_tissue&organ=$organ&radio3=$inc_strain&strain=$strain&radio4=$inc_tax&taxonomy=$taxonomy&radio5=$inc_auth&author=$author&titles1=$min_title&titles2=$max_title&radio6=$inc_mwt&mol1=$min_mwt&mol2=$max_mwt&radio7=$inc_doe&doe1=$min_doe&doe2=$max_doe&radio8=$inc_aa&aa1=$min_aa&aa2=$max_aa&show=$show';">
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