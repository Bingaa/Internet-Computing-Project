<?php
include 'config.php';
/*
Defines functions to connect to the Database, retrieve the result and 
return them. You need several functions for different questions
*/

function getDB()
{
	// connect to the DB and returns a reference to the DB
	$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	if (mysqli_connect_errno()){
		echo "failed to connect".mysqli_connect_errno();
	}
	//echo "successful connect";
	return $conn;
}

function runQuery($db, $query) {
	$result = mysqli_query($db,$query);
	return $result;
}




?>
