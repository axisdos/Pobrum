<?php

//TODO Needs to be tested/ checked/ etc...

class Database {

	include_once "config/config.php";

	$con = null;

	public function connect($host, $user, $password) {
		$mysqli = new mysqli($host, $user, $password);
		if ($mysqli->connect_errno) {
			if (DEBUG) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			return false;
		}
		else {
			$con = $mysqli;
			return true;
		}
	}

	public function disconnect() {
		return $con::close();
	}

	public function query($statement, $arguments) {
		if (!($stmt = $mysqli->prepare("INSERT INTO test(id) VALUES (?)"))) {
			if (DEBUG) {
				echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			return null;
		}
		$i = 1;
		foreach ($arguments as $arg) {
			$stmt->bindParam($i, $arg);
		}
		return $stmt->execute();
	}

	public function update($statement, $arguments) {
		if (!($stmt = $mysqli->prepare("INSERT INTO test(id) VALUES (?)"))) {
			if (DEBUG) {
				echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}
			return false;
		}
		$i = 1;
		foreach ($arguments as $arg) {
			$stmt->bindParam($i, $arg);
		}
		$stmt->execute();
		return true;
	}

}

?>