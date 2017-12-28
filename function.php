<?php
$db_hostname = "localhost";
$db_databases = "GobusDB";
$db_username = "mars";
$db_password = "572286594abc";
$appname = "GoBus";

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_databases);
if ($conn -> connect_error)
	die($conn -> connect_error);

function createTable($name, $query) {
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	echo "Table '$name' created or already exists. <br> ";
}

function queryMysql($query) {
	global $conn;
	$result = $conn -> query($query);
	if (!$result)
		die($conn -> error);
	return $result;
}

function destorySession() {
	$_SESSION = array();
	if (session_id() != "" || isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time() - 2592000, '/');
	}
	session_destroy();
}

function sanitizeString($var) {
	global $conn;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return $conn -> real_escape_string($var);
}

function showUser($user) {
	$result = queryMysql("SELECT user FROM  member WHERE user = '$user'");
	if ($result -> num_rows) {
		$row = $result -> fetch_array(MYSQLI_ASSOC);
		echo stripslashes($row[0]);
	}
}
?>