<?php
$servername = "127.0.0.1";
$db = 'publications';
$username = "hapii";
$password = "qwer1234";

// 创建连接
$conn = new mysqli($servername, $username, $password, $db, 3306, "/var/lib/mysql/mysql.sock");

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$conn->close();

//创建并执行查询
$query = 'SELECT * FROM classics';
$result = $conn->query($query);
if ($result) die("查询失败: ".$conn->error);

echo "查询成功";

$row = $result->num_rows;

for ($j = 0;$j<$row;++$j){
    $result->data_seek($j);
    echo 'author'.$result->fetch_assoc()['author'].'<br>';
    $result->data_seek($j);
    echo 'title'.$result->fetch_assoc()['title'].'<br>';

}

