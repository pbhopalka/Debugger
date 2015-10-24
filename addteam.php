<?php
require_once ("includes/global.php");
metadetails ();
if (! isset ( $_POST ["q"] )) {
	?>
<html>
<head>
<title>Debugger</title>
<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<h3>Add a new Team</h3>
<br>
<form action="" method="POST">
	<label for="teamid">Team ID</label> <input type="text" name="teamid"
		id="teamid" required /><br> <label for="status">Status</label> <input
		type="text" name="status" id="status" /><br> <label for="stage">Stage
		ID</label> <input type="text" name="stage" id="stage" /><br> <label
		for="language">Language</label> <input type="text" name="language"
		id="language" /><br> <label for="password">Password</label> <input
		type="text" name="password" id="password" required /><br> <input
		type="hidden" name="q" value="1" /> <input type="submit" />
</form>
<?php
} else {
	include 'includes/connection.php';
	$teamid = $_POST ["teamid"];
	$status = $_POST ["status"];
	$stage = $_POST ["stage"];
	$lang = $_POST ["language"];
	$pass = $_POST ["password"];
	$sql = "INSERT INTO teams VALUES(\"$teamid\", \"$status\",\" $stage\",\" $lang\", \"$pass\")";
	if (! $result = $mysqli->query ( $sql )) {
		die ( "Error: " . $mysqli->error );
	}
	header ( 'Location: addteam.php');
} 
?>
