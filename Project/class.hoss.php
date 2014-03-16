<?php
require_once('class.db.inc');
class hoss extends dbconnect{
public $hoss;
public $query;
public $result;
public $query1;
public $result1;

function search($org)
{
if(!mysql_select_db("innomics_org_-_RTDB",self::$conn))
{
 print "not selected";
}
$this->query= "select * from hoss where tissue like '%$org%' and ID like '%HUMAN%';";
$this->query1="select count(*) from hoss where tissue like '%$org%' and ID like '%HUMAN%'";
$this->result=mysql_query($this->query,self::$conn);
$this->result1=mysql_query($this->query1,self::$conn);
if(!is_resource($this->result )||!is_resource($this->result1))
{
print "not a resource";
}
return array($this->result,$this->result1);
}
}
?>
