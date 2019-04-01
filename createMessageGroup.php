<?php
include_once('include/config.php');
include 'include/functions.php';
session_start(); 

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
$ids = $_POST["ids"];
$userId = $_SESSION["id"];
$groupName = $_SESSION["fullName"]; 

foreach($ids as $id){ 
    $query = "SELECT * FROM User WHERE UserID = {$id}";
    $results = runQuery($connection, $query);
    $result = mysqli_fetch_assoc($results);
    $groupName = $groupName . ", " . $result["FirstName"] . " " . $result["LastName"];
}

//group name is default set to null if there is only one other person in the chat or if it hasnt been configured through the UI 
$query = "INSERT INTO `Group`(`Groupname`) VALUES ('{$groupName}')";
$results = runQuery($connection, $query);

$query = "SELECT LAST_INSERT_ID();";
$results = runQuery($connection, $query);

$groupId = mysqli_fetch_assoc($results)["LAST_INSERT_ID()"]; 

foreach($ids as $id){ 
    $query = "INSERT INTO UserGroup (UserID, GroupID) VALUES ({$id},{$groupId})";
    $results = runQuery($connection, $query);
}
$query = "INSERT INTO UserGroup (UserID, GroupID) VALUES ({$userId},{$groupId})";
$results = runQuery($connection, $query);

echo $groupId;


?>
