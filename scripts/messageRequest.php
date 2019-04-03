<?php
include '../include/config.php';
include '../include/functions.php';

session_start(); 
$chattime = getDB();
$q = "SET CHARACTER SET utf8mb4";
runQuery($chattime, $q);
$parameter = $_GET['input'];
if(isset($_GET['time'])){ 
    $time = $_GET['time'];
    $q = "SELECT * FROM Message WHERE GroupID=".$parameter. " AND CreateDate  > ". $time .  " AND UserID !=" . $_SESSION["id"]; 
} else { 
    $q = "SELECT * FROM Message WHERE GroupID=".$parameter.";"; 
}
$data=runQuery($chattime,$q);

if($data == false){ 
    echo "nothing"; 
} else { 
    $rows = array();
    while($r = mysqli_fetch_assoc($data)){
        array_push($rows,array($r['Content'],$r['CreateDate'],$r['UserID'],$r['SenderName'], $_SESSION["id"], $r["Type"], $r["ImageSource"]));
    }
    echo json_encode($rows);
}




?>