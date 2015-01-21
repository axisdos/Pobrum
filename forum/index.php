<?php

include("config/config.php");
include("database/database.mysql.php");

Database::connectCustom("localhost", "root", "", null);
Database::update("CREATE DATABASE IF NOT EXISTS ?", array(1 => array("type" => "s", "value" => "forum_test")));
Database::disconnect();

/*
if (FORUM_INSTALLED == true) {
	header("Location: views/viewforum.php");
}
else {
	header("Location: setup/setup.php");
}
*/

?>