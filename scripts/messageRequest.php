<?php
include '../include/config.php';
include '../include/functions.php';

session_start(); 
$chattime = getDB();
$q = "SET CHARACTER SET utf8mb4";
runQuery($chattime, $q);
$parameter = $_GET['input'];
$q = "SELECT * FROM Message WHERE GroupID=".$parameter.";"; 
$data=runQuery($chattime,$q);
$rows = array();
while($r = mysqli_fetch_assoc($data)){
    array_push($rows,array($r['Content'],$r['CreateDate'],$r['UserID'],$r['SenderName'], $_SESSION["id"]));
}
echo json_encode($rows);



?>