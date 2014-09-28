<?php
//Load correct setup based on GET header

$page = 0;

if (isset($_GET['page'])) {
	$page = $_GET['page'];
}
if (file_exists("setup/setup_" . $page . ".php")) {
	include_once("setup/setup_" . $page . ".php");
}
else {
	echo "Invalid or missing setup step. Please see documentation for more help.";
}

?>
