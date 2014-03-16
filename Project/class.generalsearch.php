<?php
require_once('class.db.inc');
class generalsearch extends dbconnect{
public $query;
function connectdb()
 {
mysql_select_db("innomics_org_-_RTDB",self::$conn);
}
function getid($user_id)
 {
	
	$this->query="select * from generalsearch where protid like '$user_id'";
	$this->result=mysql_query($this->query,self::$conn);
    
    if(!is_resource($this->result ))
      {
           print "not a resource";
      }
            return $this->result;	
}
function getkey($keyword)
 {
    $this->query="select * from generalsearch where keyword like '%$keyword%'";
	$this->query1="select count(*) from generalsearch where keyword like '%$keyword%' ";
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