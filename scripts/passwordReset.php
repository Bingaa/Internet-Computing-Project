<?php
include '../include/config.php';
include '../include/functions.php';

$chattime = getDB();
mysqli_set_charset($chattime, 'utf8');
$parameter = $_GET['input'];
$q = "SELECT * FROM user WHERE Email='".$parameter."' OR UserName='".$parameter."' LIMIT 1;"; 
$data=runQuery($chattime,$q);
$r = mysqli_fetch_assoc($data);
mail($r['Email'],"Password Information", "Your password is ".$r['Password']." and your username is ".$r['UserName'].".");
echo $r['Email'];


//this file emails the user their password and username


?>