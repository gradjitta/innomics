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
#personal{
  width: 620px;
margin-top:25px;
font-family:verdana;
font-size:15px;
border:1px solid green;
}

#personal #first{
font-family:verdana;
font-size:15px;
}
#personal #second{
margin-top:20px;
font-family:verdana;
font-size:15px;
}

</style>
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
nod.style.color="black";
nod.style.fontWeight="";
nod.style.fontFamily="";
}
function submit()
{

document.forms[0].submit();
}
</script>
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
currentItem=2;
function SelectItemByNumber(num) {
document.getElementById("b431"+num).style.backgroundPosition = "-300px -"+(num-1)*30+"px";
}
SelectItemByNumber(currentItem);
</script>
</head>
<body>
<div id="personal" >
<form name="personal_form" action="insert_personal.php" method="post" >
<table  id="first" width="620px" cellspacing="6px">
<tr>
<th colspan="2" align="center" style="text-decoration:underline;color:lightblue">Contact Information</th>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr width="100%" >
<td width="20%" align="center" id="1" style="color:black;font-weight:none;font-family:verdana;" >FirstName</td>
<td width="30%" >:&nbsp;<input type="text" name="first_name" onfocus="colorchange(1)" onblur="cancelcolorchange(1)" style="background-color:white;"></td>
<td width="19%" align="left" id="2" style="color:black;font-weight:none;">MiddleName</td>
<td width="30%">:&nbsp;<input type="text" name="middle_name" onfocus="colorchange(2)" onblur="cancelcolorchange(2)"></td>
</tr>
<tr width="100%">
<td width="20%" align="center" id="3" style="color:black;font-weight:none;">LastName</td>
<td width="30%">:&nbsp;<input type="text" name="last_name" onfocus="colorchange(3)" onblur="cancelcolorchange(3)"></td>
<td width="20%" align="left" id="18" style="color:black;font-weight:none;">Gender</td>
<td width="30%">:&nbsp;<input type="radio" name="gender" value="male" CHECKED onfocus="colorchange(18)" onblur="cancelcolorchange(18)">Male &nbsp;&nbsp;<input type="radio" name="gender" value="female" onfocus="colorchange(18)" onblur="cancelcolorchange(18)">Female</td>
</tr>
<tr width="100%">
<td width="20%" align="center" id="4" style="color:black;font-weight:none;">Birthday</td>
<td width="30%" >:&nbsp;<input type="text"size="2" name="date" value="date" onfocus="colorchange(4)" >/<input type="text" size="2" name="month" value="mon">/<input type="text"size="4" name="year" value="year" onblur="cancelcolorchange(4)"></td>
<td width="19%" align="left" id="5" style="color:black;font-weight:none;">Email</td>
<td width="30%">:&nbsp;<input type="text" name="email" onfocus="colorchange(5)" onblur="cancelcolorchange(5)"></td>
</tr>
<tr width="100%" >
<td width="20%" align="center" id="6" style="color:black;font-weight:none;">Phone no</td>
<td width="30%" >:&nbsp;<input type="text" name="phone_no" onfocus="colorchange(6)" onblur="cancelcolorchange(6)"></td>
<td width="19%" align="left" id="7" style="color:black;font-weight:none;">Mobile no</td>
<td width="30%">:&nbsp;<input type="text" name="mobile_no" onfocus="colorchange(7)" onblur="cancelcolorchange(7)"></td>
</tr>
</table>
<table  id="second" width="620px" cellspacing="6px">
<tr>
<th colspan="2" align="center" style="text-decoration:underline;color:lightblue">Favourite information</th>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr width="100%" >
<td width="20%" align="center" id="8" style="color:black;font-weight:none;">Cuisine</td>
<td width="30%" >:&nbsp;<input type="text" name="cusine" onfocus="colorchange(8)" onblur="cancelcolorchange(8)"></td>
<td width="19%" align="left" id="9" style="color:black;font-weight:none;">Movie</td>
<td width="30%">:&nbsp;<input type="text" name="movie" onfocus="colorchange(9)" onblur="cancelcolorchange(9)"></td>
</tr>
<tr width="100%">
<td width="20%" align="center" id="10" style="color:black;font-weight:none;">Book</td>
<td width="30%">:&nbsp;<input type="text" name="book" onfocus="colorchange(10)" onblur="cancelcolorchange(10)"></td>
<td width="20%" align="left" id="11" style="color:black;font-weight:none;">Actor/Actress</td>
<td width="30%">:&nbsp;<input type="text" name="actor" onfocus="colorchange(11)" onblur="cancelcolorchange(11)"></td>
</tr>
<tr width="100%">
<td width="20%" align="center" id="12" style="color:black;font-weight:none;">Author</td>
<td width="30%" >:&nbsp;<input type="text" name="author" onfocus="colorchange(12)" onblur="cancelcolorchange(12)"></td>
<td width="19%" align="left" id="13" style="color:black;font-weight:none;">Color</td>
<td width="30%">:&nbsp;<input type="text" name="color" onfocus="colorchange(13)" onblur="cancelcolorchange(13)"></td>
</tr>
<tr width="100%" >
<td width="20%" align="center" id="14" style="color:black;font-weight:none;">Hobbies</td>
<td width="30%" >:&nbsp;<input type="text" name="hobbies" onfocus="colorchange(14)" onblur="cancelcolorchange(14)" ></td>
<td width="19%" align="left" id="15" style="color:black;font-weight:none;">Place</td>
<td width="30%">:&nbsp;<input type="text" name="place" onfocus="colorchange(15)" onblur="cancelcolorchange(15)"></td>
</tr>
<tr width="100%" >
<td width="20%" align="center" id="16" style="color:black;font-weight:none;">Singer</td>
<td width="30%" >:&nbsp;<input type="text" name="singer" onfocus="colorchange(16)" onblur="cancelcolorchange(16)"></td>
<td width="19%" align="left" id="17" style="color:black;font-weight:none;">Sport</td>
<td width="30%">:&nbsp;<input type="text" name="sport" onfocus="colorchange(17)" onblur="cancelcolorchange(17)"></td>
</tr>
<tr width="100%" >
</tr>
<tr width="100%" >
<td colspan="4" align="middle"><a href="javascript:submit()"  onmouseover="this.style.color='green'" onmouseout="this.style.color='green'" style="text-decoration:none;color:green;font-size:1.2em;">Next>></a></td>
</tr>
</table>

</form>
</div>
</body>
</html>
