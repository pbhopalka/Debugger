<?php
require_once("../includes/global.php");
header('Content-type: text/html; charset=utf-8');
echo <<<CONTENT
<!DOCTYPE html>
<html>
  <head>
    <title>Debugger - Add a question</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
CONTENT;
if(!isset($_SESSION['admin'])) header('Location: login.php') && die();
if (!isset($_POST["q"])) {
?>
<html>
<head>
<title>Debugger - Add a question</title>
<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<h3>Submit new question</h3>

<br>
<form action="" method="POST">
<label for="stage">Stage ID </label>
<input type="text" name="stageid" id="stage" placeholder="For example: 1a" required /><br>
<label for="question">Question ID </label>
<input type="text" name="questionid" placeholder="For example: 2" required /><br>
<label for="Q">Question </label>
<textarea name="question" id="Q" required></textarea><br>
<label for="ans">Expected Output </label>
<textarea name="answer" id="ans" required></textarea><br>
<input type="hidden" name="q" value="1" />
<button type="submit" class="btn btn-default">Submit</button>
</form>
<br>
<a href="index.php" style="color:black"><button>Home</button></a>
<!--
<br>
<form action="" method="POST" class="form-horizontal" role="form">
<div class = "form-group">
<label class="col-sm-2 control-label" for="stage">Stage ID </label>
<div class = "col-sm-10">
<input type="text" name="stageid" required id="stage" class="form-control"/><br>

</div>
</div>
<div class = "form-group">
<label class="col-sm-2 control-label" for="question">Question ID</label>
<div class = "col-sm-10"><input type="text" name="questionid" required /><br>
</div>
</div>
<div class = "form-group">
<label class="col-sm-2 control-label" for="Q">Question</label>
<div class = "col-sm-10">
<textarea name="question" id="Q" required></textarea><br>
</div>
<div class = "form-group">
<label class="col-sm-2 control-label" for="ans">Expected program output</label>
<div class = "col-sm-10">
<textarea name="answer" id="ans" required></textarea><br>
</div>
</div>
<input type="hidden" name="q" value="1" />
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-default">Submit</button>
</div>
</div>
</form>
<br>
<a href="index.php" style="color:black"><button>Home</button></a>-->
</body>
</html>
<?php
}
else
{
include '../includes/connection.php';
$stageid = $_POST['stageid'];
$questionid = $_POST['questionid'];
$question = $_POST['question'];
$answer = $_POST['answer'];
$sql = "INSERT INTO questions VALUES('{$stageid}','{$questionid}','{$question}')";
if (!$result=$mysqli->query($sql)) {die("Error".$mysqli->error);}
$fname = $stageid.$questionid.".q";
$i = file_put_contents("questions/".$fname,$question);
$fname1 = $stageid.$questionid.".ans";
$i = file_put_contents("answers/".$fname,$answer);
header('Location: addq.php');
}
?>
