<?php

	// If the forum is installed you will be able to see it, if not it will load the setup
	if (FORUM_INSTALLED == true || DB_TEST == true) {
		include("db.php");

	if($db->connect_errno > 0){
    	die('Unable to connect to database at this time. Please try again later.');
	}
	
		include_once("viewindex.php");
	}
	else {
		include_once("setup.php");
	}
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
