<?php
include_once('include/config.php');
include 'include/functions.php';

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
$searchString = $_REQUEST["searchString"];

session_start(); 
$id = $_SESSION["id"];

$query = "SELECT ContactID, FirstName, LastName, Image FROM User INNER JOIN Contacts ON User.UserID = Contacts.ContactID WHERE Contacts.UserID = {$id} AND UserName LIKE '{$searchString}%' OR CONCAT(FirstName, ' ', LastName) LIKE '{$searchString}%'"; 
$results = runQuery($connection, $query);

$json_array = array(); 
if($results != false){ 
    while($row = mysqli_fetch_assoc($results)){  
        $json_array[] = $row; 
    }
}
echo json_encode($json_array);
?>
