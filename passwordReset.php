<?php
include_once('include/config.php');
include 'include/functions.php';

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
$username = $_REQUEST["username"];

$query = "SELECT UserName FROM User WHERE UserName = '" .$username ."'"; 
$results = runQuery($connection, $query);

if($results){ 
    echo  mysqli_fetch_assoc($results)["UserName"]; 
} else { 
    echo "";
}



?>
