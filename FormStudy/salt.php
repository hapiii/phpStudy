<?php
$servername = "127.0.0.1";
$db = 'publications';
$username = "hapii";
$password = "qwer1234";

$conn = new mysqli($servername,$username,$password,$db);
if ($conn->connect_error){
    die($conn->connect_error);
}

//$query = 'CREATE TABLE users(
//    forename VARCHAR(32) NOT NULL,
//    surname VARCHAR(32) NOT NULL ,
//    username VARCHAR(32) NOT NULL UNIQUE ,
//    password VARCHAR(32) NOT NULL
//)';
//
//$result = $conn->query($query);
//if (!$result){
//    die($conn->error);
//}

$salt1 = 'qm&h*';
$salt2 = 'pg!@';

$forename = 'Bills';
$surname = 'smiths';
$username = 'bsmiths';
$password = 'mysecrets';
$token = hash('ripemd128','$salt1$$passwordsalt2');
add_user($conn,$forename,$surname,$username,$token);

$forename = 'pauline';
$surname = 'Jones';
$username = 'pjones';
$password = 'acrobat';
$token = hash('ripemd128','$salt1$$passwordsalt2');
add_user($conn,$forename,$surname,$username,$token);

function add_user($connention,$fn,$sn,$un,$pw){

    $query = "INSERT INTO users VALUES('$fn','$sn','$un','$pw')";
    $result = $connention->query($query);
    if (!$result){
        die($connention->error);
    }
}
