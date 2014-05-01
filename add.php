<?php
include_once "header.php";

// This is used to submit new markers for review.
// Markers won't appear on the map until they are approved.

$owner_name = mysql_real_escape_string(parseInput($_POST['owner_name']));
$owner_email = mysql_real_escape_string(parseInput($_POST['owner_email']));
$title = mysql_real_escape_string(parseInput($_POST['title'])); 
//$type = mysql_real_escape_string(parseInput($_POST['type']));
$skills = mysql_real_escape_string(parseInputArray($_POST['skills']));  // CHANGE- AUTHOR: Hritik Vijay DATE: 1-May-2014
$address = mysql_real_escape_string(parseInput($_POST['address']));
$uri = mysql_real_escape_string(parseInput($_POST['uri']));
$description = mysql_real_escape_string(parseInput($_POST['description']));

// validate fields
if(empty($title) || empty($skills) || empty($address) || empty($uri) || empty($description) || empty($owner_name) || empty($owner_email)) {
  echo "All fields are required - please try again.";
  exit;
  
} else {
 

  
  // if startup genome mode enabled, post new data to API
  if($sg_enabled) {
    
    try {
      @$r = $http->doPost("/organization", $_POST);
      $response = json_decode($r, 1);
      if ($response['response'] == 'success') {
        include_once("startupgenome_get.php");
        echo "success"; 
        exit;
      }
    } catch (Exception $e) {
      echo "<pre>";
      print_r($e);
    }
    
    
  // normal mode enabled, save new data to local db
  } else {

    // insert into db, wait for approval
    $insert = mysql_query("INSERT INTO places (approved, title, type,skills, address, uri, description, owner_name, owner_email) VALUES (null, '$title', null,'$skills', '$address', '$uri', '$description', '$owner_name', '$owner_email')") or die(mysql_error());  // CHANGE- AUTHOR: Hritik Vijay DATE: 1-May-2014

    // geocode new submission
    $hide_geocode_output = true;
    include "geocode.php";
    
    echo "success";
    exit;
  
  }

  
}


?>
