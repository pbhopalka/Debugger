<?php
	require_once("config.php");
	$mysqli = mysqli_connect($server, $sqlid, $sqlpass, $dbase);
	if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
?>
