<?php
include "./include/db.php";

// connect to db
mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_select_db($db_name) or die(mysql_error());

// if map is in Startup Genome mode, check for new data
if($sg_enabled) {
  require_once("include/http.php");
  include_once("startupgenome_get.php");
}

// input parsing
function parseInputArray($value){  // CHANGE- AUTHOR: Hritik Vijay DATE: 1-May-2014
	$val="";
	for($i=0;$i<sizeof($value);$i++) {
		 $val .= htmlspecialchars($value[$i], ENT_QUOTES);
		 if($i!=sizeof($value)-1)
		  $val.=",";
		}

  $val = str_replace("\r", "", $val);
  $val = str_replace("\n", "", $val);
  $val= preg_replace('/\s+/', '_', $val);
	 return $val;
}
function parseInput($value) {
  $value = htmlspecialchars($value, ENT_QUOTES);
  $value = str_replace("\r", "", $value);
  $value = str_replace("\n", "", $value);
  return $value;
}



?>