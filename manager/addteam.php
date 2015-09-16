<?php
require("../includes/global.php");
header('Content-type: text/html; charset=utf-8');
echo <<<CONTENT
<!DOCTYPE html>
<html>
  <head>
    <title>Game Of Bugs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
CONTENT;
if(!isset($_SESSION['admin'])) header('Location: login.php') && die();
if (!isset($_POST["q"])) {
?>
<html>
<head>
<title>Debugger</title>
<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<h3>Add a new Team </h3>
<br>
<p>Password is going to be the same as Username</p>
<form action="" method="POST">
<label for="teamid">Team ID</label>
<input type="text" name="teamid" id="teamid" placeholder="Must start with DEB"required /><br>
<!--<label for="status">Status</label>
<input type="text" name="status" id="status"/><br>
<label for="stage">Stage ID</label>
<input type="text" name="stage" id="stage"/><br>
<label for="language">Language</label>
<input type="text" name="language" id="language"/><br>
<label for="password">Password</label>
<input type="text" name="password" id="password" required /><br>-->
<input type="hidden" name="q" value="1" />
<input type="submit" />
</form>
<br>
<a href="index.php" style="color:black"><button>Home</button></a>
<?php
}
else
{
require_once '../includes/connection.php';
$teamid = $_POST["teamid"];
//$status= $_POST["status"];
//$stage=$_POST["stage"];
//$lang = $_POST["language"];
//$pass = $_POST["password"];
$sql = "INSERT INTO teams(teamid,password) VALUES(\"$teamid\", \"$teamid\")";
if (!$result=$mysqli->query($sql)) {die("Error: ".$mysqli->error);}
header('Location: addteam.php');
}
?>
