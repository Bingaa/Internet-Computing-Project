<?php
include_once('include/config.php');
include 'include/functions.php';

$connection = getDB(DBHOST, DBUSER, DBPASS, DBNAME); 
$searchString = $_REQUEST["searchString"];



$querybuilder ="SELECT UserID, FirstName, LastName, Status, Image FROM User WHERE UserName LIKE ? OR CONCAT(FirstName, ' ', LastName) LIKE ?";
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt,$querybuilder)){
    echo "SQL Statement failure";
}else{
    $searchString = $searchString.'%';
    mysqli_stmt_bind_param($stmt,"ss", $searchString, $searchString);
    //run param inside database
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    $json_array = array(); 
    if($results != false){ 
    while($row = mysqli_fetch_assoc($results)){  
        $json_array[] = $row; 
    }
    echo json_encode($json_array);
}
}




// $query = "SELECT UserID, FirstName, LastName, Status, Image FROM User WHERE UserName LIKE '{$searchString}%' OR CONCAT(FirstName, ' ', LastName) LIKE '{$searchString}%'"; 
// $results = runQuery($connection, $query);

// $json_array = array(); 
// if($results != false){ 
//     while($row = mysqli_fetch_assoc($results)){  
//         $json_array[] = $row; 
//     }
// }
// echo json_encode($json_array);
?>
