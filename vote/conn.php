<?php
define('HOST','127.0.0.1');
define('USER','hapii');
define('PWD','qwer1234');
define('DBNAME','publications');

$conn = new  mysqli(HOST,USER,PWD,DBNAME);
if ($conn->error){
    die('数据库连接出错'.$mysqli->connect_error);
}