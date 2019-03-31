<?php
include_once('include/config.php');
include 'include/functions.php';

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
$searchString = $_REQUEST["searchString"];

$query = "SELECT UserID, FirstName, LastName, Status, Image FROM User WHERE UserName LIKE '{$searchString}%' OR CONCAT(FirstName, ' ', LastName) LIKE '{$searchString}%'"; 
$results = runQuery($connection, $query);

$json_array = array(); 
if($results != false){ 
    while($row = mysqli_fetch_assoc($results)){  
        $json_array[] = $row; 
    }
}
echo json_encode($json_array);
?>
