<?php
require_once('class.db.inc');
class go extends dbconnect{
public $query;
public $result;
public $query1;
public $result1;
public $query2;
public $result2;

function search($textinput)
{
if(!mysql_select_db("innomics_org_-_RTDB",self::$conn))
{
 print "not selected";
}
$this->query ='select * from generalsearch where keyword like "%'.$textinput.'%";';
$this->query1='select count(*) from go where protid in (select protid from generalsearch where keyword like "%'.$textinput.'%");';
$this->query2='select * from go where protid="'.$textinput.'";';
$this->query3='select protgodata from go where protid= '.$textinput.';';
$this->query4='select * from go where protid in (select protid from generalsearch where keyword like "%'.$textinput.'%");';
$this->result=mysql_query ($this->query ,self::$conn);
$this->result1=mysql_query($this->query1,self::$conn);
$this->result2=mysql_query($this->query2,self::$conn);
$this->result3=mysql_query($this->query3,self::$conn);
$this->result4=mysql_query($this->query4,self::$conn);
if(!is_resource($this->result )||!is_resource($this->result1)||!is_resource($this->result2)||!is_resource($this->result3))
{
print "not a resource";
}
return array($this->result,$this->result1,$this->result2,$this->result3,$this->result4);
}
}
?>
