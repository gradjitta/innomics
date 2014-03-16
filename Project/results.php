<?php
                                 /*file for database connectivity*/
require_once('class.output.php');                          /*class for fetching results*/
$obj=new output();
$obj->connect();
$result=array();
$textinput;
if(isset($_GET['selected']))   /* 1st condition for organism 2nd and 3rd  for refreshing*/
{
$prot_id=$_GET['selected'];
$MWT="MW";
$AA="AA";
$result=$obj->search($_GET['selected']);
}
$res_keyword=$result[0];
$res_go=$result[1];
$res_ref=$result[2];
$res_date_entry=$result[3];
$res_general_oneliner=$result[4];
$res_desc=$result[5];
$res_ac=$result[6];
//for ac output ##################################
$ac_string_to_explode=mysql_result($res_ac,0,"ac");
$arr_ac=explode(';',$ac_string_to_explode);
$acc=$arr_ac[0];
$formated_acc=implode(',',$arr_ac);

//for description output##########################
$desc_string=mysql_result($res_desc,0,"desc_text");

//for keywords
$key_string= mysql_result($res_keyword,0,"keyword");

//for all general one liners
$os_string= mysql_result($res_general_oneliner,0,"os");
$mwt_string= mysql_result($res_general_oneliner,0,"mol_wt");
$length_string= mysql_result($res_general_oneliner,0,"length");
//for all reference table output
$author_string=mysql_result($res_ref,0,"ref_auth");
$citation_string=mysql_result($res_ref,0,"ref_title_loc");
$position_string=mysql_result($res_ref,0,"ref_pos_more");
$auth_arra=preg_split("(\(\d)",$author_string);
$iter= count($auth_arra)-1;
$cite_arra=explode("#",$citation_string);
$iter1= count($cite_arra)-1;
print<<<HTML
<link rel="stylesheet" type="text/css" href="output1.css" media="all" />
<script language="javascript">
function ajaxobj(acc)
{
        var idd=acc;
        var dataSource="";

        var XMLObject = false;

        if (window.XMLHttpRequest) {
          XMLObject = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
          XMLObject = new
            ActiveXObject("Microsoft.XMLHTTP");
        }
        var dataSource="neww.php?ac="+idd;



if(XMLObject) {
          XMLObject.open("GET",dataSource );

          XMLObject.onreadystatechange = function()
          {
             if(XMLObject.readyState == 1||XMLObject.readyState == 2||XMLObject.readyState == 3)
                 {
                     var doc=document.getElementById("getfasta");
                             doc.innerHTML="<b>please wait...</b>";     
                     }

             else if (XMLObject.readyState == 4 &&
              XMLObject.status == 200) {
                            var doc=document.getElementById("getfasta");
                             doc.innerHTML="";
              callback(XMLObject.responseText);
              delete XMLObject;
              XMLObject=null;

            }
            else{}
          }

          XMLObject.send(null);
        }
      }

function callback(text)
      {
        document.getElementById("AjaxFeed").innerHTML =text;
      }

</script>
</script>
</head>
<body>
<div id="total">
<div id="idhead">ID</div>
<div id="ProtId"><a href="http://www.expasy.org/uniprot/$acc.txt">$prot_id</a></div>
<div id="molweight">
<div class="mw1">Molecular weight:</div>
<div class="mw2"> $mwt_string $MWT</div>
</div>
<div id="length">
<div class="len1">Length:</div>
<div class="len2"> $length_string $AA</div>
</div>
<div id="accno">
<div class="ac1">acc</div>
<div class="ac2">$formated_acc</div>
</div>
<div class="desc">Description</div>
<div class="protname">
           $desc_string
</div>
<div class="os">Organism Species</div>
<div class="os_data">
           $os_string
</div>

<div id="keyword">
<span>KeyWord</span>
<div id="data1">
<p class="fulldata">
  $key_string
 </p>
 </div>
 </div>
<div class="titles">
<div>
<div id="title"> titles </div>
<div id="titleList">
HTML;
$i=2;
$k=1;
while($i <= $iter)
{
  $titles_output_arr=preg_split("(\|)",$auth_arra[$i]);
  $titles_output=$titles_output_arr[1];
  echo $k.".   ".$titles_output."</br></br>";
  $k++;
  $i=$i+2;
}

print<<<HTML
 </div>
 </div>

</div>

<div class="crossx">
<div>
<div id="cita">citations</div>
<div id="journals">
HTML;
$p=1;

while($p <= $iter1)
{
  $temp= $cite_arra[$p];
  $cite_output_arr=explode("|",$temp);
  $cite_output=$cite_output_arr[1];
  $cite_no= $cite_output_arr[0];
  echo $cite_no.".   ".$cite_output."</br></br>";
  $p++;
}
print<<<HTML
</div>

</div>
</div>
<div class="auth">

<span id="aut">authors</span>
<div id="names">
HTML;
$i=1;
$k=1;
while($i <= $iter)
{
  $authors_output_arr=preg_split("[(\|)|(\.\,)|(\.\;)]",$auth_arra[$i]);
  $authors_output=join(" ",$authors_output_arr);
  echo $k.".   ".$authors_output."</br></br>";
  $k++;
  $i=$i+2;
}
print<<<HTML
</div>
</div>

<div class="sequence">
<div id="seqId">FASTA</div>
<div id="getfasta"><a id="$acc" onclick="ajaxobj(this.id)">Click here</a> </div>
<div id="AjaxFeed">
</div>
</div>
</div>
</table>
</body>
</html>

HTML;

?>
