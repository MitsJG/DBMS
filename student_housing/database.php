<?php

function connect_db()
{
    $nl ="<br /><br />";
    //$sql_host="localhost"; 
    //$sql_username="root"
    //$sql_password="";
    //$sql_database="student_housing";
	$mysqli = new mysqli('localhost', 'root', '', 'student_housing');
    
	if ($mysqli->connect_errno) 
    {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	
	echo "Connected to database !".$nl;
	
	return $mysqli;
}
	
?>