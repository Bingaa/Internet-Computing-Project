<?php
include '../include/config.php';
include '../include/functions.php';

$chattime = getDB();
mysqli_set_charset($chattime, 'utf8');
$parameter = $_GET['input'];
$q = "SELECT * FROM user WHERE Email='".$parameter."' OR UserName='".$parameter."' LIMIT 1;"; 
$data=runQuery($chattime,$q);
$r = mysqli_fetch_assoc($data);
$n = rand(1000,9999);
$newhash = password_hash('forget'.$n,PASSWORD_DEFAULT);

$q2 = "UPDATE `user` SET `Password` ='".$newhash."' WHERE Email='".$parameter."' OR UserName='".$parameter."' LIMIT 1;";
$data2 = runQuery($chattime,$q2);


mail($r['Email'],"Password Information", "Your password is forget".$n." and your username is ".$r['UserName'].".".$newhash);
echo $r['Email'];


//this file emails the user their password and username


?>