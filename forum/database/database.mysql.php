<?php

//TODO Needs to be tested/ checked/ etc...

include_once("config/config.php");

class Database {

	public static $con = null;

	//Connect to default database
	public static function connect() {
		$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_SCHEMA);
		if ($mysqli->connect_errno) {
			if (DEBUG) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return false;
		}
		else {
			self::$con = $mysqli;
			return true;
		}
	}

	//Connect to other database
	public static function connect($host, $user, $password, $database) {
		$mysqli = new mysqli($host, $user, $password, $database);
		if ($mysqli->connect_errno) {
			if (DEBUG) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return false;
		}
		else {
			self::$con = $mysqli;
			return true;
		}
	}

	//Disconnect from current database
	public static function disconnect() {
		return self::$con->close();
	}

	//TODO Fix query functions, help needed

	public static function query($statement, $arguments) {
		if (!($stmt = self::$con->prepare($statement))) {
			if (DEBUG) {
				echo "Prepare failed: (" . self::$con->errno . ") " . self::$con->error;
			}
			return null;
		}
		foreach ($arguments as $arg) {
			$stmt->bind_param($arg['type'], $arg['value']);
		}
		return $stmt->execute();
	}

	public static function update($statement, $arguments) {
		$stmt = self::$con->prepare($statement));

		print_r($arguments);
		foreach ($arguments as $arg) {
			$stmt->bind_param($arg['type'], $arg['value']);
			echo $arg['type'] . " : " . $arg['value'];
		}
		$stmt->execute();
		return true;
	}

}

?>