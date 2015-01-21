<?php

include("config/config.php");

if (FORUM_INSTALLED == true) {
	header("Location: views/viewforum.php");
}
else {
	header("Location: setup/setup.php");
}

?>