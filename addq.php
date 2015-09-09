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

<body>
<h3>Submit new question</h3>
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
<label class="col-sm-2 control-label" for="q">Question</label>
<div class = "col-sm-10">
<textarea name="question" id="q" required></textarea><br>
</div>
</div>
<input type="hidden" name="q" value="1" />
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-default">Submit</button>
</div>
</div>
</form>
</body>
</html>
<?php
}
else
{
include 'includes/connection.php';
$stageid = $_POST['stageid'];
$questionid = $_POST['questionid'];
$question = $_POST['question'];
$sql = "INSERT INTO questions VALUES(\"$stageid\",\"$questionid\",\"$question\")";
if (!$result=$mysqli->query($sql)) {die("Error".$mysqli->error);}
//echo "Question has been Added";
header('Location: addq.php');
} 
?>
