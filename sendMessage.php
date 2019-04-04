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

    $querybuilder = "INSERT INTO Message (Content, GroupID, UserID, SenderName, Type, ImageSource) VALUES ('', ?, ?, ?, 'Img', ?)";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt,$querybuilder)){
        echo "SQL Statement failure";
    }
    else{
        mysqli_stmt_bind_param($stmt,"siss", $groupID, $id, $senderName,$targ );
        //run param inside database
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    // no binding
    // $query = "INSERT INTO Message (Content, GroupID, UserID, SenderName, Type, ImageSource) VALUES ('', $groupID, $id, '$senderName', 'Img', '$targ')";
    // $results = runQuery($connection, $query);




    echo $targ; 
} else { 
    $groupID = $_POST["groupID"];
    $content = $_POST["content"];



    $querybuilder2 = "INSERT INTO Message (Content, GroupID, UserID, SenderName) VALUES (?, ?, ?, ?)";
    $stmt2 = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt2,$querybuilder2)){
        echo "SQL Statement failure";
    }
    else{
        mysqli_stmt_bind_param($stmt2,"ssis", $content, $groupID, $id,$senderName );
        //run param inside database
        mysqli_stmt_execute($stmt2);
        $result = mysqli_stmt_get_result($stmt2);
    }


    // no binding
    // $query = "INSERT INTO Message (Content, GroupID, UserID, SenderName) VALUES ('$content', $groupID, $id, '$senderName' )";
    // $results = runQuery($connection, $query);
    
    echo $content; 

}


?>
