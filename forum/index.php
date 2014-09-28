<?php
	// Loading config 
	include("config/config.php");

	// If the forum is installed you will be able to see it, if not it will load the setup
	if (FORUM_INSTALLED == true) {
		include_once("viewforum.php");
	}
	else {
		include_once("setup.php");
	}
?>
