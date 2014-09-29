<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<?php
	// Loading config 
	include("config/config.php");

	// If the forum is installed you will be able to see it, if not it will load the setup
	if (FORUM_INSTALLED == true || DB_TEST == true) {
	$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

	if($db->connect_errno > 0){
    	die('Unable to connect to database at this time. Please try again later.');
	}
	
		include_once("viewforum.php");
	}
	else {
		include_once("setup.php");
	}
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
