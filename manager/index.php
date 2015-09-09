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

<br>
<a href="addq.php"><h3 style="color:black">Submit new question</h3></a>

<br>
<a href="addteam.php"><h3 style="color:black">Add new team</h3></a>

<br>
<a href="addstage.php"><h3 style="color:black">Add new stage</h3></a>

<br>
<a href="checker.php"><h3 style="color:black">View Results</h3></a>

<br>
<a href = "startstage.php"><h3 style="color:black">Start a Stage</h3></a>


</body>
</html>

