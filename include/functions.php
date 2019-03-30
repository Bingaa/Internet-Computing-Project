<?php
include_once('include/config.php');
/*
Defines functions to connect to the Database, retrieve the result and 
return them. You need several functions for different questions
*/

function getDB($dbhost, $dbuser, $dbpass, $dbname)
{
	// connect to the DB and returns a reference to the DB
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
	mysqli_set_charset($connection, "utf8");
	if(mysqli_connect_errno()){ 
		echo "Failed to connect to MySQL"; 
	}
	return $connection; 
}

function runQuery($db, $query) {
	$query = stripslashes($query);
	$result = mysqli_query($db, $query); 

	if(!$result){ 
		echo "Failed to execute query";
	}

	return $result; 


	// takes a reference to the DB and a query and returns the results of running the query on the database
}


?>
