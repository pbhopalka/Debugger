<?php
require_once("../includes/global.php");
require_once '../includes/class.Diff.php';
header('Content-type: text/html; charset=utf-8');
echo <<<CONTENT
<!DOCTYPE html>
<html>
  <head>
    <title>Debugger - Start a stage</title>
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
<h3>Start a stage</h3>
<br>
<form action="" method="POST" class="form-horizontal" role="form">
<select name="stage">
	<option value="1">Stage 1</option>
	<option value="2">Stage 2</option>
	<option value="3">Stage 3</option>
</select>

<button type="submit" class="btn btn-default">Submit</button>
</div>
</div>
</form>
<br>
<button><a href="index.php" style="color:black">Home</a></button>
</body>

</html>
<?php
}
else{
    $stage = $_POST["stage"];
    $stageA = $stage.'a';
    $stageB = $stage.'b';
    $sql1 = "UPDATE stages SET stageStart = 1 WHERE stageid = '{$stageA}'";
    $sql2 = "UPDATE stages SET stageStart = 1 WHERE stageid = '{$stageB}'";
    $result = $mysqli->query($sql1);
    $result->close;
    $result = $mysqli->query($sql2);
    $result->close;
    header('Location: startstage.php');
}
?>
