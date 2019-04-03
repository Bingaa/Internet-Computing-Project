<?php
include_once('include/config.php');
include 'include/functions.php';

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
session_start(); 
$id = $_SESSION["id"];
$senderName = $_SESSION["fullName"];

//Request with image has no content
if(!isset($_POST["content"])){ 
    print_r($_FILES);
    print_r($_POST);
    $src = $_FILES['file']['tmp_name'];
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $targ = "images/messages/" . $_SESSION["id"]. time() . "." . $ext; 

    move_uploaded_file($src, $targ);
    $groupID = $_POST["groupID"];
    $targ = "../" . $targ; 
    $query = "INSERT INTO Message (Content, GroupID, UserID, SenderName, Type, ImageSource) VALUES ('', $groupID, $id, '$senderName', 'Img', '$targ')";
    $results = runQuery($connection, $query);
    echo $targ; 
} else { 
    $groupID = $_POST["groupID"];
    $content = $_POST["content"];
    $query = "INSERT INTO Message (Content, GroupID, UserID, SenderName) VALUES ('$content', $groupID, $id, '$senderName' )";
    $results = runQuery($connection, $query);
    
    echo $content; 

}


?>
