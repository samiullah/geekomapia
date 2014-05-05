<?php
require 'header.php';
if($_GET['info']=='user_name')
	echo $user_profile['name'];
else if($_GET['info']=='user_email')
{	if(isset($user_profile['email']))
	echo $user_profile['email'];
	else
		echo 'Cannot retrive your email';
}
?>