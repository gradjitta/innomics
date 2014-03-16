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
 #enter
{
  float:left;
margin-top:25px;

font-family:verdana;
font-size:15px;
border:1px solid green;
}
#reg
{
  float:left;
margin-top:10px;
width:620px;
height:150px;
border:1px solid green;
}
#reg table{
  position:relative;
  top:20px;
  left:100px;
font-family:verdana;
font-size:15px;
}

</style>
<table  cellpadding=0 cellspacing=0 border=0><tr>
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
currentItem=1;
function SelectItemByNumber(num) {
document.getElementById("b431"+num).style.backgroundPosition = "-300px -"+(num-1)*30+"px";
}
SelectItemByNumber(currentItem);
function check()
{
var regno=document.forms[0].uname.value;
var reg=/^(04|03)(\w{3})(\d{3})$/;
if(reg.test(regno))
{
return true;
}
else
{
alert("please enter correct register number\n Register number should be in format:(04 or 03)(your branch code)(your roll no)");
document.forms[0].uname.focus();
return false;
}
}
</script>
</head>
<body>
<table id="enter" width="620px" cellpadding="4px">
<tr>
<td>
HI friends......Welcome to My slambook.<br>
Do you Know The reason why slambooks are so popular?<br>
Because they are reminiscent of one's past...The past that never comes again..<br>
I invite all of my dear friends to scribble in my slambook and thus help me to never forget them.
</td>
</tr>
<tr>
</tr>
<tr>
<td align="right">
Thankyou<br>
<font color="green">Viswateja.N</font></td>
</tr>
</table>
<div id="reg">
<table id="reg1" width="300px" cellspacing="15px">
<form name="reg_form" action="enter.php" method="post" onsubmit="return check()">
<tr>
<tr>
<td width="150px" align="left">
Register&nbsp;Num:
</td>
<td width="150px" align="center">
<input type="text" name="uname" >
</td>
</tr>
<tr>
<td width="150px" >
</td>
<td width="150px" align="left">
<input type="submit" value="Enter slambook" style="background-image:url(back3.jpg);color:green;">
<br>
<br>

<a  href="admin.php" style="text-decoration:none;color:green;font-family:verdana;font-size:0.8em;">Adminstrator login</a>
</td>
</tr>
</form>
</table>
</div>
<font size="4" style="position:absolute;top:500px;left:150px;">please click on the next>> link on everypage to go to next page........dont use links on top</font>
</body>
</html>

