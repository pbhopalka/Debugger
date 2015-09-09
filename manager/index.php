<?php
require_once("../includes/global.php");
header('Content-type: text/html; charset=utf-8');
echo <<<CONTENT
<!DOCTYPE html>
<html>
  <head>
    <title>Debugger</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
CONTENT;
if(!isset($_SESSION['admin'])) header('Location: login.php') && die();
?>

<html>
<head>
<title>Debugger</title>
<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
  <h1 align= center>Welcome to the Manager's Platform</h1>

<br>
<a href="addq.php"><button align=center><h3 style="color:black">Submit new question</h3></button></a>

<br>
<a href="addteam.php"><button align=center><h3 style="color:black">Add new team</h3></button></a>

<br>
<a href="addstage.php"><button align=center><h3 style="color:black">Add new stage</h3></button></a>

<br>
<a href="checker.php"><button align=center><h3 style="color:black">View Results</h3></button></a>

<br>
<a href = "startstage.php"><button align=center><h3 style="color:black">Start a Stage</h3></button></a>


</body>
</html>
