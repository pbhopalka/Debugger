<?php
require_once ("../includes/global.php");
header ( 'Content-type: text/html; charset=utf-8' );
echo <<<CONTENT
<!DOCTYPE html>
<html>
  <head>
    <title>Debugger - Add a question</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/main.css" rel="stylesheet" media="screen">
CONTENT;
if (! isset ( $_SESSION ['admin'] ))
	header ( 'Location: login.php' ) && die ();
?>
</head>
<body>

  <!--Still missing the feature of having anything inside <> appear in the table-->

  
<h2 align="center"> View all questions</h2>
<a href="addq.php"><button>
    <h3 style="color: black">Add new question</h3>
  </button></a>
<br>
<a href="index.php"><button>
    <h3 style="color: black">Home</h3>
  </button></a>
<br>
  <?php
  include '../includes/connection.php';
  $query1="SELECT stageid FROM stages";
  if (! $result1 = $mysqli->query ( $query1 )) {
    die ( "Error" . $mysqli->error );
  }
  if ($result1->num_rows == 0){
    echo "no data here";
    die();
  }
  while ($row1 = $result1->fetch_assoc()){
    $stageid = $row1['stageid'];
    echo 'stageid = ';
    echo $stageid;
    echo '<br';
    $query="SELECT * from questions WHERE stageid='{$stageid}'";
    $result=$mysqli->query($query);
    if ($result->num_rows > 0){?>
      <!--Creating a table-->
    <table style="margin: 10px 10px 10px 10px;"border="1" >
    		  	<tr>
    				<th>Stage id</th>
    				<th>Question id</th>
    				<th>Question</th>
    			</tr>
          <?php
          while($row = $result->fetch_assoc()){
            echo '
            <tr>
              <td>'.$row["stageid"].'</td>
              <td>'.$row["questionid"].'</td>
              <td><pre style="white-space: pre-line;text-align : left;">'.$row["question"].'</pre></td>
            </tr>';
        	} ?>
      </table>
      <br>
    <?php
    }
  }
?>
</body>
</html>
