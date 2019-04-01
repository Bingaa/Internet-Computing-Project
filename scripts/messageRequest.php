<?php
include '../include/config.php';
include '../include/functions.php';

$chattime = getDB();
mysqli_set_charset($chattime, 'utf8');
$parameter = $_GET['input'];
$q = "SELECT * FROM Message WHERE GroupID=".$parameter.";"; 
$data=runQuery($chattime,$q);
$rows = array();
while($r = mysqli_fetch_assoc($data)){
    array_push($rows,array($r['Content'],$r['CreateDate'],$r['UserID']));
}
echo json_encode($rows);



?>