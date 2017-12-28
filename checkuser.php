<?php
require_once 'function.php';
if (isset($_POST['username'])) {
	$user = sanitizeString($_POST['username']);
	$result = queryMysql("SELECT * FROM member WHERE user = '$user'");
	if ($result -> num_rows) {
		echo "<span>&nbsp;&#x2718;用户名已存在</span> ";
	} else {
		echo "<span>&nbsp;&#x2718;用户名可用</span> ";
	}

}
?>