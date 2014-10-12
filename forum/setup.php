<link rel="stylesheet" type="text/css" href="setup/style.css">

<h1>Installing Pobrum</h1>
<hr>

<?php
include("db.php");

//Load correct setup based on GET header

$page = 0;

if (isset($_GET['page'])) {
	$page = $_GET['page'];
}

if (file_exists("setup/setup_" . $page . ".php")) {
	include_once("setup/setup_" . $page . ".php");
}
else {
	echo "<div style='color: red;'>Invalid or missing setup step. Please see documentation for more help.</div>";
}

?>
