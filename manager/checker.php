<!--<?php /*
require_once("../includes/global.php");
require_once '../includes/class.Diff.php';
header('Content-type: text/html; charset=utf-8');
echo <<<CONTENT*/-->
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
</body>
</html>
<?php
}
else{
echo <<<CONTENT
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
CONTENT;

include '../includes/connection.php';
$stageid = $_POST['stage'];
$sql = "SELECT * FROM answers where stageid = '{$stageid}'";
if (!$result=$mysqli->query($sql)) {die("Error".$mysqli->error);}
while($row = mysqli_fetch_array($result)) {
  $fname = $row['teamid'] .$row['stageid'].$row['questionid'];
  $codename = $fname.".c";
  $execname = $fname.".o";
  $outname = $fname.".out";
  $ansname = $row['stageid'].$row['questionid'].".ans";
  $i = file_put_contents("/home/anant/debugger/submissions/".$codename,$row['ans']);
  $cmd = "/home/anant/debugger/compile.sh '{$codename}' '{$execname}'";
  $ret = exec($cmd,$arr,$retval);
  if(!$retval){
    $cmd1 = "/home/anant/debugger/run.sh '{$execname}' '{$outname}'";
    $ret = exec($cmd1, $arr, $retval);
    if($retval)
    {
        $sql = "INSERT INTO RESULT VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',0,'{$row['time']}',NULL)";
	    $result1 = $mysqli->query($sql);
	    continue;
    }
    /*$diff = Diff::compareFiles("/home/anant/debugger/submissions/".$outname,"/home/anant/debugger/answers/".$ansname);*/
    $cmd3 = "/home/
    $count = 0;
    foreach ($diff as $a)
    {
        if($a[1] == Diff::INSERTED || $a[1] == Diff::DELETED)
            $count = $count + 1;
    }
    if($count == 0)
    {
            $qname = $row['stageid'].$row['questionid'].".q";
            /*$diff = Diff::compareFiles("/home/anant/debugger/submissions/".$codename,"/home/anant/debugger/questions/".$qname);
            echo Diff::toHTML($diff);
            $count = 0;
            foreach ($diff as $a)
            {
                if($a[1] == Diff::INSERTED || $a[1] == Diff::DELETED)
                        $count = $count + 1;
            }*/
           $cmd2 = "/home/anant/debugger/changes.sh '{$codename}' '{$qname}'";
            echo $cmd2."<br>";
            $ret1 = intval(exec($cmd2,$arr,$retval));

            $sql = "INSERT INTO RESULT VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',1,'{$row['time']}','{$count}')";
            $result1 = $mysqli->query($sql);
        }
    else
        {
	        $sql = "INSERT INTO RESULT VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',0,'{$row['time']}',NULL)";
	        $result1 = $mysqli->query($sql);
        }
	}
  else
  {
    $qname = $row['stageid'].$row['questionid'].".q";
    $diff = Diff::compareFiles("/home/anant/debugger/submissions/".$codename,"/home/anant/debugger/questions/".$qname);
    $count = 0;
    foreach ($diff as $a)
    {
        if($a[1] == Diff::INSERTED || $a[1] == Diff::DELETED)
            $count = $count + 1;
    }
    echo ($count)."<br>";
    //$cmd2 = "/home/anant/debugger/changes.sh '{$codename}' '{$qname}'";
    //$ret1 =  shell_exec($cmd2);
    //$out = file_get_contents("/home/anant/debugger/out.txt");
    //echo $out;
    //echo $cmd2."<br>";
    //echo $arr[0]."<br>";
    //echo $retval."<br>";
    //echo $ret1." changes<br>";
	$sql = "INSERT INTO RESULT VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',0,'{$row['time']}','{$count}')";
	if (!$result1=$mysqli->query($sql)) {die("Error".$mysqli->error);}
  }
}
$sql = "SELECT teamid, sum(status) AS score,sum(time) AS time_remaining, sum(changes) AS total_changes FROM RESULT WHERE stageid = '{$stageid}' GROUP BY teamid ORDER BY score DESC,time DESC,changes ASC";
$result = $mysqli->query($sql);

echo "<h2>Results after Stage '{$stageid}'</h2><br>";
$row = $result->fetch_assoc();
	if ($row==NULL) {
		echo "<p class='text-danger text-center bg-danger' id='notf'>Table is empty</p>";
	}
	else{
		echo '<div class="table-responsive"><table class="table">';
		echo "<tr>"; foreach ($row as $heado => $bods) {echo "<th>".$heado."</th>"; $first = $row;}; echo "</tr>";
		echo "<tr>"; foreach ($first as $heado => $bods) {echo "<td>".$bods."</td>";}; echo "</tr>";
		while ($row = $result->fetch_assoc()) {echo "<tr>"; foreach ($row as $heado => $bods) {echo "<td>".$bods."</td>";};echo "</tr>";}
		echo '</table></div>';
    }
    echo '</html>';
}
?>
