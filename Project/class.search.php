<?php
require_once('class.db.inc');
class search extends dbconnect{
public $query,$query1,$query2,$query3,$query4,$query5,$result,$reult1,$result2,$result3,$result4,$result5,$query_title;


function searc($str_arr)
{
if(!mysql_select_db("innomics_org_-_RTDB",self::$conn))
{
 print "not selected";
}
$textinput=explode(',',$str_arr);
$keyword=$textinput[0];
$inc_tissue=$textinput[1];
$tissue=$textinput[2];
$inc_strain=$textinput[3];
$strain=$textinput[4];
$inc_tax=$textinput[5];
$taxonomy=$textinput[6];
$inc_auth=$textinput[7];
$author=$textinput[8];
$min_title=$textinput[9];
$max_title=$textinput[10];
$inc_mwt=$textinput[11];
$min_mwt=$textinput[12];
$max_mwt=$textinput[13];
$inc_doe=$textinput[14];
$min_doe=$textinput[15];
$max_doe=$textinput[16];
$inc_aa=$textinput[17];
$min_aa=$textinput[18];
$max_aa=$textinput[19];

$this->query ='select protid from generalsearch where keyword like "%'.$keyword.'%";';
$this->query1 ='select protid from general_oneliner where length <'.$max_aa.' and length >'.$min_aa.' ;';
$this->query2 ='select protid from general_oneliner where mol_wt <'.$max_mwt.' and mol_wt >'.$min_mwt.' ;';
$this->query3 ='select protid from date_entry where date like \'%'.$min_doe.'%\';';
$this->query4 ='select protid from ref where match(ref_auth) against(\''.$author.'*\');';
$this->query5 ='select protid from general_oneliner where tax_id ='.$taxonomy.';';
$this->query6 ='select protid from ref where match(ref_pos_more) against(\''.$tissue.'*\');';
$this->query7 ='select protid from ref where ref_auth like \'%'.$min_title.'%\';';
$this->query8 ='select protid from ref where match(ref_pos_more) against(\''.$strain.'*\');';
$this->query9 ='select protid from ref where match(ref_auth) against(\''.$author.'*\') having protid in(select protid from general_oneliner where mol_wt <'.$max_mwt.' and mol_wt >'.$min_mwt.');';
$this->query10 ='select protid from ref where match(ref_pos_more) against(\''.$strain.'*\') having protid in(select protid from general_oneliner where mol_wt <'.$max_mwt.' and mol_wt >'.$min_mwt.');';
$this->query11 ='select protid from ref where match(ref_pos_more) against(\''.$tissue.'*\') having protid in(select protid from general_oneliner where mol_wt <'.$max_mwt.' and mol_wt >'.$min_mwt.');';
$this->query12 ='select protid from general_oneliner where tax_id ='.$taxonomy.' having  protid in(select protid from general_oneliner where mol_wt <'.$max_mwt.' and mol_wt >'.$min_mwt.');';
$this->query13 ='select protid from ref where match(ref_auth) against(\''.$author.'*\') having protid in(select protid from general_oneliner where length <'.$max_aa.' and length >'.$min_aa.');';
$this->query14 ='select protid from ref where match(ref_pos_more) against(\''.$strain.'*\') having protid in(select protid from general_oneliner where length <'.$max_aa.' and length >'.$min_aa.');';
$this->query15 ='select protid from ref where match(ref_pos_more) against(\''.$tissue.'*\') having protid in(select protid from general_oneliner where length <'.$max_aa.' and length >'.$min_aa.');';
$this->query16 ='select protid from general_oneliner where tax_id ='.$taxonomy.' having  protid in(select protid from general_oneliner where length <'.$max_aa.' and length >'.$min_aa.');';



$this->result=mysql_query ($this->query ,self::$conn);
$this->result1=mysql_query($this->query1 ,self::$conn);
$this->result2=mysql_query($this->query2 ,self::$conn);
$this->result3=mysql_query($this->query3 ,self::$conn);
$this->result4=mysql_query($this->query4 ,self::$conn);
$this->result5=mysql_query($this->query5 ,self::$conn);
$this->result6=mysql_query($this->query6 ,self::$conn);
$this->result7=mysql_query($this->query7 ,self::$conn);
$this->result8=mysql_query($this->query8 ,self::$conn);
$this->result9=mysql_query($this->query9 ,self::$conn);
$this->result10=mysql_query($this->query10 ,self::$conn);
$this->result11=mysql_query($this->query11 ,self::$conn);
$this->result12=mysql_query($this->query12 ,self::$conn);
$this->result13=mysql_query($this->query13 ,self::$conn);
$this->result14=mysql_query($this->query14 ,self::$conn);
$this->result15=mysql_query($this->query15 ,self::$conn);
$this->result16=mysql_query($this->query16 ,self::$conn);

//$this->query_title='select ref_auth from ref where protid in ';
//$this->subquery_begin=$this->temp.'('.$this->sub_query.');';
















return array($this->result,$this->result1,$this->result2,$this->result3,$this->result4,$this->result5,$this->result6,$this->result7,$this->result8,$this->result9,$this->result10,$this->result11,$this->result12,$this->result13,$this->result14,$this->result15,$this->result16);
}
}
?>