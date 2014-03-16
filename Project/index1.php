<!doctype html public "-//W3C//DTD HTML 4.0//EN">
<html>
<head>
  <title>Untitled web-page</title>
<style type="text/css">
#main{
margin:10px 10px 0 50px;
border:1px solid lightgreen;
-moz-border-radius-topleft:50px;
-moz-border-radius-bottomleft:50px;
-moz-border-radius-topright:50px;
-moz-border-radius-bottomright:50px;
background-color:white;
float:left;
width:57em;
height:34em;
}
body{
background-color:lightblue;
}
#top{
position:relative;
left:200px;
top:20px;
font-family:cursive;
color:green;
font-size:1.9em;
padding-bottom:20px;
border-bottom: 1px solid lightgreen;
}
#innno{
font-family:cursive;
color:white;

}
#sub1{
font-size:0.5em;
}
#one{
position:absolute;
left:230px;
top:150px;
width:400px;
height:220px;
background-color:white;
border:1px double lightgreen;
-moz-border-radius-topleft:20px;
-moz-border-radius-bottomleft:20px;
-moz-border-radius-topright:20px;
-moz-border-radius-bottomright:20px;
z-index:1;
}
#two{
position:absolute;
left:330px;
top:210px;
width:400px;
height:220px;
background-color:white;
border:1px double lightblue;
-moz-border-radius-topleft:20px;
-moz-border-radius-bottomleft:20px;
-moz-border-radius-topright:20px;
-moz-border-radius-bottomright:20px;
z-index:2;
}
#three{
position:absolute;
left:430px;
top:270px;
width:400px;
height:220px;
background-color:white;
border:1px double lightgreen;
-moz-border-radius-topleft:20px;
-moz-border-radius-bottomleft:20px;
-moz-border-radius-topright:20px;
-moz-border-radius-bottomright:20px;
z-index:3;
}
#last{
position:absolute;
top:500px;
left:150px;
color:green;
}
#hsp
{
color:green;
position:relative;
left:80px;
}
#hsp1{
color:green;
position:relative;
left:30px;
}
#nvt
{
color:blue;
position:relative;
left:120px;
}
#nvt1{
color:blue;
position:relative;
left:30px;
}
#admin
{
color:green;
position:relative;
left:100px;
}
#admin1{
color:green;
position:relative;
left:30px;
}
#comment
{
color:green;
position:relative;
left:80px;
top:20px;
}

</style>
<script language="javascript">
function change(id)
{
var x=document.getElementById(id);
var y;
var z;
if(id=="one")
{
y=document.getElementById("two");
z=document.getElementById("three");
x.style.zIndex=3;
y.style.zIndex=2;
z.style.zIndex=1;
}
else if(id=="two")
{
y=document.getElementById("one");
z=document.getElementById("three");
x.style.zIndex=3;
y.style.zIndex=2;
z.style.zIndex=1;
}
else if(id=="three")
{
y=document.getElementById("one");
z=document.getElementById("two");
x.style.zIndex=3;
y.style.zIndex=1;
z.style.zIndex=2;
}
}
</script>
</head>
<body>
<div id="main">
<font id="top" align="CENTER">Welcome to <i>INNOMICS</i><sub id="sub1">innovation in the omic sciences</sub></font>
       <div id="one" onmouseover="change(id)">
         <h3 id="hsp"><b>Heatshock protein database</b></h3>
 
<font id="hsp1">The first innovation from innomics....Heat shock protein database.Presented in ISMB/ECCB 2007 international conference.To visit this database</font><br><br>

<a href="http://www.innomics.org/home.html" style="position:relative;left:150px;text-decoration:none;color:green">CLICK HERE</a>
       </div>
        <div id="two" onmouseover="change(id)">
           <h3 id="nvt"><b>Teja's slambook</b></h3>

<font id="nvt1">For all bioinformatics friends of Viswateja Nelakuditi..If <br>u want to fill my online slambook</font><br><br>
<a href="http://www.innomics.org/slambook/teja.php" style="position:relative;left:150px;text-decoration:none;color:blue">CLICK HERE</a>

       </div>
      <div id="three" onmouseover="change(id)">
 <h3 id="admin"><b>ADMINISTRATORS</b></h3>

<font id="admin1">To know about the students who started this innomics...</font><br><br>
<a href="http://www.innomics.org/administrators.html" style="position:relative;left:140px;text-decoration:none;color:green">CLICK HERE</a><br>
<font id="comment">To enter comments about innomics...</font><br>
         <a href="http://www.innomics.org/comments.php" style="position:relative;left:140px;top:30px;text-decoration:none;color:green">CLICK HERE</a><br>
       </div>
       <div id="last">
       <font size="2">Best viewed in Firefox under 1024 X 768<sup>*</sup> resolution.<br>Round borders only appears in firefox.</font>
       </div>
</div>
</body>
</html>