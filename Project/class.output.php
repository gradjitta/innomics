<?php
require_once('class.db.inc');
class output extends dbconnect{
public $query,$query1,$query2,$query3,$query4,$query5,$query6,$result,$reult1,$result2,$result3,$result4,$result5,$result6;


function search($str)
{
if(!mysql_select_db("innomics_org_-_RTDB",self::$conn))
{
 print "not selected";
}

$prot_id=$str;

$this->query ='select * from generalsearch where protid like\''.$prot_id.'\';';
$this->query1='select * from go where protid like\''.$prot_id.'\';';
$this->query2='select * from ref where protid like\''.$prot_id.'\';';
$this->query3='select * from date_entry where protid like\''.$prot_id.'\';';
$this->query4='select * from general_oneliner where protid like\''.$prot_id.'\';';
$this->query5='select * from description where protid like\''.$prot_id.'\';';
$this->query6='select * from id_ac where protid like\''.$prot_id.'\';';

$this->result=mysql_query ($this->query ,self::$conn);
$this->result1=mysql_query ($this->query1 ,self::$conn);
$this->result2=mysql_query ($this->query2 ,self::$conn);
$this->result3=mysql_query ($this->query3 ,self::$conn);
$this->result4=mysql_query ($this->query4 ,self::$conn);
$this->result5=mysql_query ($this->query5 ,self::$conn);
$this->result6=mysql_query ($this->query6 ,self::$conn);

return array($this->result,$this->result1,$this->result2,$this->result3,$this->result4,$this->result5,$this->result6);
}
}
?>