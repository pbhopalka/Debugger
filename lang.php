<?php
require_once ("includes/global.php");
if ($_SESSION ['status'] == 0) {
	$_SESSION ['status'] = 1;
	if ($_GET ['lang'] == 'c') {
		$_SESSION ['language'] = 1;
		$mysqli->query ( "UPDATE `teams` SET `language` = '1', `status` = '1' WHERE `teamid` = '{$_SESSION['teamid']}'" );
		echo ('<h2>printf("Hey C Coders!");</h2><br/>');
//		GetInstructions ( 'c' );
	} else {
		$_SESSION ['language'] = 2;
		$mysqli->query ( "UPDATE `teams` SET `language` = '2', `status` = '1' WHERE `teamid` = '{$_SESSION['teamid']}'" );
		echo ('<h2>cout<<"Howdy C++ Aficionados!";</h2><br/>');
//		GetInstructions ( 'cpp' );
	}
}
echo '
	<ul id="Rules">
	<li>The first round will be of 30 minutes.</li>
	<li>You will be given 4 questions with syntax errors <strong>only.</strong></li>
	<li>Your answer should not contain any <strong> errors or warnings </strong> when compiled with gcc/g++ compiler.</li>
	<li><strong>You are not allowed to leave this interface at any time of the contest</strong></li>
	<li>You are required to debug the code using <strong>minimum</strong> number of changes.</li>
	<li>All questions are available on the same page. Please refer to question number on the left hand side of the next page.</li>
	<li>All Answers will be locked and cannot be altered after 30 minutes.</li>
	<li>Note:<strong>The SUBMIT button will submit all the four questions.</strong></li>
	<li>Any act of dishonesty will result in immediate disqualification.</li>
	<li>If any doubts, please ask the event managers before proceeding.</li>
	<li>The Decision of the Judges is final & beyond reproach.</li>
	</ul>';
$queryString = "SELECT * FROM stages WHERE stageid = '{$_SESSION['stage']}' AND stageStart = 1;";
$result = $mysqli->query ( $queryString );
if ($result->num_rows) {
	echo "<button class=\"btn btn-large btn-primary centerh\" onclick=\"window.location.href = 'starttest.php'\" style=\"width: 150px;\" id=\"btn-start\">Lets Start!</button><br>";
} else {
	echo "<button class=\"btn btn-large btn-primary centerh\" onclick=\"window.location.href = 'starttest.php'\" style=\"width: 150px;\" id=\"btn-start\" disabled>Lets Start!</button><br>";
}
?>