<?php 
require_once("../includes/global.php");
require_once '../includes/class.Diff.php';
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

if (!isset($_POST["stage"])) { 
?>
<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<h3>Check Solutions</h3>
<br>
<form action="" method="POST" class="form-horizontal" role="form">
<select name="stage">
	<option value="1a">1a</option>
	<option value="1b">1b</option>
	<option value="2a">2a</option>
	<option value="2b">2b</option>
	<option value="3a">3a</option>
	<option value="3b">3b</option>
</select>

<button type="submit" class="btn btn-default">Submit</button>
</div>
</div>
</form>
<br>
<a href="index.php" style="color:black">Home</a>
</body>

</html>
<?php
}
else{
    $stage = $_POST["stage"];
    $sql = "UPDATE stages SET started = 1 WHERE stageid = '{$stage}'";
    $result = $mysqli->query($sql);
    header('Location: startstage.php');
}
?>
