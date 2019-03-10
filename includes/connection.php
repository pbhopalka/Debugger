<?php
	require_once("config.php");
    $mysqli = new mysqli($server, $sqlid, $sqlpass, $dbase);
    
    // Sometimes the above line does not work as it is not able to parse from config.php file properly
    // In that case, we can send the credentials directly in this file, but it can have security implications
    // Comment the above line 3 and uncomment below lines

    // $server="localhost";
    // $sqlid="<databse-userid>";
    // $sqlpass="<database-password>";
    // $dbase="<database-name>";
    // $mysqli = new mysqli($server, $sqlid, $sqlpass, $dbase);
    
    if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();			
?>