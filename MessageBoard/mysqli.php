<?php
include_once 'conn.inc.php';
$mysqli = new  mysqli(HOST,USER,PWD,DBNAME);
if ($mysqli->error){
    die('数据库连接出错'.$mysqli->connect_error);
}