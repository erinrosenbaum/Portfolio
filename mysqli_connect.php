<?php
ini_set('display_errors', 'On');
$server_name = "oniddb.cws.oregonstate.edu";
$mysql_username = "roseneri-db";
$mysql_password = "pYZuSk6TdSCyCKWo";
$db_name = "roseneri-db";
$mysqli = new mysqli($server_name, $mysql_username,$mysql_password, $db_name);
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>