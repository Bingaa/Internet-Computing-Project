<?php
include '../include/config.php';
include '../include/functions.php';

$chattime = getDB();
mysqli_set_charset($chattime, 'utf8');
$parameter = $_GET['input'];


$querybuilder = "SELECT * FROM user WHERE Email=? OR UserName=?;";
$stmt = mysqli_stmt_init($chattime);
if (!mysqli_stmt_prepare($stmt,$querybuilder)){
    echo "SQL Statement failure";
}else{
    mysqli_stmt_bind_param($stmt,"ss", $parameter, $parameter);
    //run param inside database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
$r = mysqli_fetch_assoc($result);




// $q = "SELECT * FROM user WHERE Email='".$parameter."' OR UserName='".$parameter."' LIMIT 1;"; 
// $data=runQuery($chattime,$q);
// $r = mysqli_fetch_assoc($data);
$n = rand(1000,9999);
$newhash = password_hash('forget'.$n,PASSWORD_DEFAULT);

$q2 = "UPDATE `user` SET `Password` ='".$newhash."' WHERE Email=\'".$r['Email']."\' OR UserName=\'".$r['UserName']."\' LIMIT 1;";
$data2 = runQuery($chattime,$q2);


mail($r['Email'],"Password Information", "Your password is forget".$n." and your username is ".$r['UserName'].".");
echo $r['Email'];


//this file emails the user their password and username


?>