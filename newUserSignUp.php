<?php
include_once('include/config.php');
include 'include/functions.php';

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
$username = $_REQUEST["userName"];
$password = $_REQUEST["password"]; 
$firstName = $_REQUEST["firstName"]; 
$lastName = $_REQUEST["lastName"];
$email = $_REQUEST["email"];

$query = "INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`)
             VALUES ('" .$username."','" .$password."','" .$firstName."','" .$lastName."','" .$email . "')"; 
$results = runQuery($connection, $query);
if($results != false){ 
    $query = "SELECT UserID FROM User WHERE UserName = '" .$username ."'"; 
    $results = runQuery($connection, $query);  
    $id = mysqli_fetch_assoc($results)["UserID"];      
    session_start(); 
    $_SESSION["id"] = $id; 
    echo "true"; 
} else { 
    echo "false"; 
}

?>
