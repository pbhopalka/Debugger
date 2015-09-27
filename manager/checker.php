<?php
require_once '../includes/global.php';
require_once '../includes/class.Diff.php';
header('Content-type: text/html; charset=utf-8');
echo '
			<!DOCTYPE html>
			<html>
			<head>
				<title>Debugger</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
				<link href="../css/main.css" rel="stylesheet" media="screen">
			';
if (!isset($_SESSION ['admin'])) {
    header('Location: login.php') && die();
}
if (!isset($_POST ['stage'])) {
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
	</form>
</body>
</html>
<?php

} else {
    echo '<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
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
	 <br>';
    include '../includes/connection.php';
    $delete = 'DELETE from result';
    $mysqli->query($delete);
    $stageid = $_POST ['stage'];
    echo $stageid, '<br>';
    $sql = "SELECT * FROM answers where stageid = '".$stageid."';";
    echo $sql, '<br>';
    if (!$result = $mysqli->query($sql)) {
        die('Error'.$mysqli->error);
    }
    while ($row = mysqli_fetch_array($result)) {
        $fname = $row ['teamid'].$row ['stageid'].$row ['questionid'];
        $directory = 'submissions/';
        $codename = $fname.'.c';
        $execname = $fname.'.o';
        $outname = $fname.'.out';
        $ansname = $row ['stageid'].$row ['questionid'].'.ans';
        echo 'FileName = ', $directory.$codename, '<br>';
        $i = file_put_contents($directory.$codename, $row ['ans']);
        echo '$i Type = ', gettype($i), '<br>';
        if ($i === false) {
            echo 'Dammit!!<br>';
            die();
        }
        $lastLine = exec('ls', $arr, $retval);
        echo '$arr = ', $arr, '<br>';
        $retval = -1;
        echo '$retval = ', $retval, '<br>';
        echo '$lastLine = ', $lastLine, '<br>';
        $cmd = "./compile.sh '{$directory}{$codename}' '{$directory}{$execname}' 2>&1";
        echo '$cmd = ', $cmd, '<br>';
        $lastLine = exec($cmd, $arr, $retval);
        echo '$arr = ', $arr, '<br>';
        echo '$retval = ', $retval, '<br>';
        echo '$lastLine = ', $lastLine, '<br>';
        // die();
        if (!$retval) {
            $cmd1 = "./run.sh '{$directory}{$execname}' '{$directory}{$outname}'";
            echo '$cmd1 = ', $cmd1, '<br>';
            $lastLine = exec($cmd1, $arr, $retval);
            echo '$arr = ', $arr, '<br>';
            echo '$retval = ', $retval, '<br>';
            if ($retval) {
                echo 'Gone to if part<br>';
                $sql = "INSERT INTO result VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',0,'{$row['time']}',NULL)";
                $result1 = $mysqli->query($sql);
                continue;
            }
            $diff = Diff::compareFiles('submissions/'.$outname, 'answers/'.$ansname);
            $cmd3 = '/home/';
            $count = 0;

            foreach ($diff as $a) {
                if ($a [1] == Diff::INSERTED || $a [1] == Diff::DELETED) {
                    $count = $count + 1;
                }
            }
            echo 'count = ', $count, '<br>';
            if ($count == 0) {
                $qname = $row ['stageid'].$row ['questionid'].'.q';
                $diff = Diff::compareFiles('submissions/'.$codename, 'questions/'.$qname);
                $cmd2 = "./changes.sh '{$codename}' '{$qname}'";
                echo '$cmd2 = ', $cmd2.'<br>';
                $ret1 = intval(exec($cmd2, $arr, $retval));
                $sql = "INSERT INTO result VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',1,'{$row['time']}','{$count}')";
                $result1 = $mysqli->query($sql);
            } else {
                echo 'Entered here<br>';
                // $sql = "INSERT INTO result VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',0,'{$row['time']}',0)";
                // $result1 = $mysqli->query($sql);
                $sql = "INSERT INTO result VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',0,'{$row['time']}',NULL)";
                $result1 = $mysqli->query($sql);
            }
        } else {
            echo 'Gone to else part';
            $qname = $row ['stageid'].$row ['questionid'].'.q';
            $diff = Diff::compareFiles('submissions/'.$codename, 'questions/'.$qname);
            $count = 0;

            foreach ($diff as $a) {
                if ($a [1] == Diff::INSERTED || $a [1] == Diff::DELETED) {
                    $count = $count + 1;
                }
            }
            echo($count).'<br>';
            // $cmd2 = "/home/anant/debugger/changes.sh '{$codename}' '{$qname}'";
            // $ret1 = shell_exec($cmd2);
            // $out = file_get_contents("/home/anant/debugger/out.txt");
            // echo $out;
            // echo $cmd2."<br>";
            // echo $arr[0]."<br>";
            // echo $retval."<br>";
            // echo $ret1." changes<br>";
            $sql = "INSERT INTO result VALUES('{$row['teamid']}','{$row['stageid']}','{$row['questionid']}',0,'{$row['time']}','{$count}')";
            if (!$result1 = $mysqli->query($sql)) {
                die('Error'.$mysqli->error);
            }
        }
        // die();
    }
    $sql = "SELECT teamid, sum(status) AS score,sum(time) AS time_remaining, sum(changes) AS total_changes FROM result WHERE stageid = '{$stageid}' GROUP BY teamid ORDER BY score DESC,time DESC,changes ASC";
    $result = $mysqli->query($sql);
    echo "<h2>Results after Stage '{$stageid}'</h2><br>";
    $row = $result->fetch_assoc();
    if ($row == null) {
        echo "<p class='text-danger text-center bg-danger' id='notf'>Table is empty</p>";
    } else {
        echo '<div class="table-responsive"><table class="table">';
        echo '<tr>';

        foreach ($row as $heado => $bods) {
            echo '<th>'.$heado.'</th>';
            $first = $row;
        }
        ;
        echo '</tr>';
        echo '<tr>';

        foreach ($first as $heado => $bods) {
            echo '<td>'.$bods.'</td>';
        }
        ;
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';

            foreach ($row as $heado => $bods) {
                echo '<td>'.$bods.'</td>';
            }
            ;
            echo '</tr>';
        }
        echo '</table></div>';
    }
    echo '</html>';
}

?>
