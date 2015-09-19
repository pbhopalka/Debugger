<?php

require_once("../includes/global.php");
header('Content-type: text/html; charset=utf-8');
echo '
<!DOCTYPE html>
<html>
  <head>
    <title>Debugger : Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
';
if(!isset($_SESSION['admin']))
	header('Location: login.php')&& die();

?>

<html>
<head>
<style>
h1 {text-align:center;}
p {text-align:center;}
</style>
<title>Debugger</title>
<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
	<h1 align= center>Welcome to the Manager's Platform</h1>
	<br>
	<a href="addq.php"><button><h3 style="color:black">Submit new question</h3></button></a>
	<br>
	<a href="addteam.php"><button><h3 style="color:black">Add new team</h3></button></a>

	<br>
	<a href="addstage.php"><button><h3 style="color:black">Add new stage</h3></button></a>

	<br>
	<a href="checker.php"><button><h3 style="color:black">View Results</h3></button></a>

	<br>
	<a href = "startstage.php"><button><h3 style="color:black">Start a Stage</h3></button></a>
</body>
</html>
