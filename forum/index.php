<?php
	include("config.php");

	if (FORUM_INSTALLED == true) {
		include_once("viewforum.php");
	}
	else {
		include_once("setup.php");
	}
?>
