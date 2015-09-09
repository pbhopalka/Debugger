<?php 
require_once("includes/global.php");
metadetails();
if (!isset($_POST["q"])) { 
?>
<html>
<head>
<title>Debugger</title>
<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<h3>Add a new Stage </h3>
<br>
<form action="" method="POST">
<label for="stage">Stage ID </label>
<input type="text" name="stageid" id="stage"required /><br>
<label for="type">Type </label>
<input type="text" name="type" id="type" required /><br>
<label for="time">Time </label>
<input type="text" name="time" id="time" required /><br>
<input type="hidden" name="q" value="1" />
<input type="submit" />
</form>
<?php
}
else
{
include 'includes/connection.php';
$stageid = $_POST['stageid'];
$type = $_POST['type'];
$time = $_POST['time'];
$sql = "INSERT INTO stages VALUES(\"$stageid\", \"$type\", \"$time\")";
if (!$result=$mysqli->query($sql)) {die("Error".$mysqli->error);}
header('Location: addstage.php');
} 
?>
