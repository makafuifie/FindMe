<?php
include_once("setting.php");
class dbConnect{
  var $db=null;
  var $result=null;
  
  function __construct() {
  }

  
 function connect(){
   $this->db=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
   if($this->db->connect_errno){
     return false;
   }
   return true;
 }
  	/**
  	*Query the database
  	*@param string $strQuery sql string to execute
  	*/
    function query($strQuery){
     if(!$this->connect()){
       return false;
     }
     if($this->db==null){
       return false;
     }
     $this->result=$this->db->query($strQuery);
     if($this->result==false){
      return false;
    }
    return true;
  }
  	/*
  	* Fetch from the current data set and return
  	*@return array one record
  	*/
    function fetch(){
  		//Complete this funtion to fetch from the $this->result
      if($this->result==null){
       return false;
     }
     if($this->result==false){
       return false;
     }
     
     return $this->result->fetch_assoc();
   }
 }
 ?>