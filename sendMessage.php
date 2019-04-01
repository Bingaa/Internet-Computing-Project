<?php
include_once('include/config.php');
include 'include/functions.php';

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
$groupID = $_POST["groupID"];
$content = $_POST["content"];
session_start(); 
$id = $_SESSION["id"];
$senderName = $_SESSION["fullName"];

$query = "INSERT INTO Message (Content, GroupID, UserID, SenderName) VALUES ('$content', $groupID, $id, '$senderName' )";
$results = runQuery($connection, $query);



echo $content; 
?>
