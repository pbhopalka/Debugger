<?php
require_once ("config.php");
function metadetails() {
	header ( 'Content-type: text/html; charset=utf-8' );
	echo '<!DOCTYPE html>
                    <html>
                      <head>
                          <title>Debugger</title>
                              <meta name="viewport" content="width=device-width, initial-scale=1.0">
                              <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
                              <link href="css/main.css" rel="stylesheet" media="screen">';
}
function AjaxGet() {
	echo <<<CONTENT
		<script>
			function AjaxGet(a, b) {
				Req = new XMLHttpRequest();
				Req.onreadystatechange = function()
				{	if (Req.readyState == 4) {
						if (Req.status == 200 || Req.status == 304) {
							if (Req.responseText != "failed!") document.getElementById(b).innerHTML = Req.responseText;
							else alert("Failed!");
						} else alert("Failed!");
					}
  				}
				Req.open("GET", a, true);
				Req.send();
			}
		</script>
CONTENT;
}
function GetInstructions($lang) {?>
				<ul id="Rules">
					<li>The first round will be of 30 minutes.</li>
					<li>You will be given 4 questions with syntax errors.</li>
					<li>Your answer should not contain any <strong> errors or warnings </strong> when compiled with gcc/g++ compiler.</li>
					<li>Use of Compilers is prohibited.</li>
					<li>Marks will be provided based on the time of completion and correctness of solution.</li>
					<li>All Answers will be locked and cannot be altered after 30 minutes.</li>
					<li><strong>Do NOT refresh the page or hit the Back button at any time.</strong></li>
					<li>Any act of dishonesty will result in immediate disqualification.</li>
					<li>If any doubts, please ask the event managers before proceeding.</li>
					<li>The Decision of the Judges is final & beyond reproach.</li>
				</ul>
				<button class="btn btn-large btn-primary centerh" onclick="window.location.href = 'starttest.php'" style="width: 150px;" id="btn-start">Lets Start!</button><br>
<?php
}
?>
