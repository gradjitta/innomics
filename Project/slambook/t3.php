<html>
<head>
<style type="text/css">
body
{
margin-left:10em;
margin-top:5em;
background-image:url(back3.jpg);
}
.b431 {
height: 30px;
width: 100px;
margin-left:3px;
background: url(button74398962.jpg);
}
#professional{
width: 620px;
margin-top:25px;
font-family:verdana;
font-size:15px;
border:1px solid green;
}
 #professional table{

  margin-left:15px;
  margin-top:15px;
 }
</style>
<table cellpadding=0 cellspacing=0 border=0><tr>
<td valign=center>
<a href="teja.php">
<div id="b4311" class="b431"
style="background-position: -0px -0px; "
></div>
</a>
</td>
<td valign=center>
<a href="t2.php">
<div id="b4312" class="b431"
style="background-position: -0px -30px; "
></div>
</a>
</td>
<td valign=center>
<a href="t3.php">
<div id="b4313" class="b431"
style="background-position: -0px -60px; "
></div>
</a>
</td>
<td valign=center>
<a href="t4.php">
<div id="b4314" class="b431"
style="background-position: -0px -90px; "
></div>
</a>
</td>
<td valign=center>
<a href="t5.php">
<div id="b4315" class="b431"
style="background-position: -0px -120px; "
></div>
</a>
</td>
<td valign=center>
<a href="t6.php">
<div id="b4316" class="b431"
style="background-position: -0px -150px; "
></div>
</a>
</td>
</tr></table>
<script language="JavaScript" type="text/javascript">
currentItem=3;
function SelectItemByNumber(num) {
document.getElementById("b431"+num).style.backgroundPosition = "-300px -"+(num-1)*30+"px";
}
SelectItemByNumber(currentItem);
</script>
<script language="javascript">
function colorchange(tid)
{
var nod=document.getElementById(tid);
nod.style.color="green";
nod.style.fontWeight="bold";
nod.style.fontFamily="cursive";
}
function cancelcolorchange(tid)
{
var nod=document.getElementById(tid);
//nod=nod.firstChild;
nod.style.color="lightblue";
nod.style.fontWeight="";
nod.style.fontFamily="";
}
function submit()
{

document.forms[0].submit();
}
</script>
</head>
<body>
<div id="professional">
<form name="professional_form" action="insert_professional.php" method="post" >
<table width="600px" border="0">
<tr>
<td width="30%" align="left" id="1" style="color:lightblue">your branch:</td>
<td width="70%" align="left"><input type="text" name="branch" onfocus="colorchange(1)" onblur="cancelcolorchange(1)"></td>
</tr>
<tr>
<td width="30%" align="left" id="3" style="color:lightblue">Favourite subject:</td>
<td width="70%" align="left"><input type="text" name="subject" onfocus="colorchange(3)" onblur="cancelcolorchange(3)"></td>
</tr>
<tr>
<td width="30%" align="left" id="4" style="color:lightblue">Favourite lecturer:</td>
<td width="70%" align="left"><input type="text" name="lecturer" onfocus="colorchange(4)" onblur="cancelcolorchange(4)"></td>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
<td colspan="2" id="2" style="color:lightblue">Comment about  btech in vit?</td>
</tr>
<tr>
<td colspan="2"><textarea rows="5" cols="70" name="btech_in_vit" onfocus="colorchange(2)" onblur="cancelcolorchange(2)"></textarea></td>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr width="100%" >
<td colspan="2" align="middle"><a href="javascript:submit()"  onmouseover="this.style.color='green'" onmouseout="this.style.color='green'" style="text-decoration:none;color:green;font-size:1.2em;">Next>></a></td>
</tr>
</table>
</form>
</div>
</body>
</html>
