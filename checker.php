<?php 
require_once("includes/global.php");
metadetails();
if (!isset($_POST["stage"])) { 
?>
<html>
<head>
<title>Debugger</title>
<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
<h3>Check Solutions</h3>
<br>
<form action="" method="POST" class="form-horizontal" role="form">
<select name="stage">
	<option value="1a">1a</option>
	<option value="2a">2a</option>
	<option value="3a">3a</option>
</select>

<button type="submit" class="btn btn-default">Submit</button>
</div>
</div>
</form>
</body>
</html>
<?php
}
else{
include 'includes/connection.php';
$stageid = $_POST['stage'];
$teamid = "DEB009";
$sql = "SELECT * FROM answers where stageid = '{$stageid}'";
if (!$result=$mysqli->query($sql)) {die("Error".$mysqli->error);}
while($row = mysqli_fetch_array($result)) {
  echo $row['teamid']. " ".$row['questionid']." ".$row['ans'];
  echo "<br>";
  $fname = $row['teamid'] .$row['questionid'].".c";
  $i = file_put_contents($fname,$row['ans']);
  $o_file = $row['teamid'] . $row['questionid'].".out";
  $cmd = "./testing.sh '{$fname}' '{$row['stageid']}' '{$row['questionid']}'";
  $ret = exec($cmd,$arr,$retval);
  echo $ret;
  $ret = exec($cmd,$op,$retval);
  var_dump($op);
  echo $retval;
  if(!$retval){
	echo "correct<br>";
	}
  else
  {
	echo "compile error<br>";
  }
}
} 
?>
