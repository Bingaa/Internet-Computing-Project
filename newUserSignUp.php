<?php
include_once('include/config.php');
include 'include/functions.php';

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
$username = $_REQUEST["userName"];
$password = $_REQUEST["password"]; 
$firstName = $_REQUEST["firstName"]; 
$lastName = $_REQUEST["lastName"];
$email = $_REQUEST["email"];

$hashed_password = password_hash($password,PASSWORD_DEFAULT);


$querybuilder = "INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`) VALUES (?,?,?,?,?)";
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt,$querybuilder)){
    echo "SQL Statement failure";
}else{
    mysqli_stmt_bind_param($stmt,"sssss", $username, $hashed_password, $firstName, $lastName, $email);
    //run param inside database
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
}



// $query = "INSERT INTO User (`UserName`, `Password` , `FirstName` , `LastName` , `Email`)
//              VALUES ('" .$username."','" .$hashed_password."','" .$firstName."','" .$lastName."','" .$email . "')"; 
// $results = runQuery($connection, $query);








    $querybuilder2 = "SELECT UserID FROM User WHERE UserName = ?";
    $stmt2 = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt2,$querybuilder2)){
        echo "SQL Statement failure";
    }else{
        mysqli_stmt_bind_param($stmt2,"s", $username);
        //run param inside database
        mysqli_stmt_execute($stmt2);
        $results2 = mysqli_stmt_get_result($stmt2);
        $id = mysqli_fetch_assoc($results2)["UserID"];
     
        session_start(); 
        $_SESSION["id"] = $id; 
        $_SESSION["fullName"] = $firstName . " " . $lastName; 
        echo "true"; 
    }
    // $query = "SELECT UserID FROM User WHERE UserName = '" .$username ."'"; 
    // $results = runQuery($connection, $query);  
    // $id = mysqli_fetch_assoc($results)["UserID"];
    // session_start(); 
    // $_SESSION["id"] = $id; 
    // $_SESSION["fullName"] = $firstName . " " . $lastName; 
    // echo "true"; 
    






?>
