<?php
//相当于OC的import 与 include
include_once 'login.php';
require_once 'login.php';

// 创建连接
$conn = new mysqli($servername, $username, $password,$db);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$query = "SELECT * FROM classics";
$result = $conn->query($query);
if (!$result)die($conn->error);

$rows = $result->num_rows;

for ($j = 0; $j <$rows;++$j){
    $result->data_seek($j);
    echo 'Author'.$result->fetch_assoc()['author'].'<br>';
    $result->data_seek($j);
    echo 'Author'.$result->fetch_assoc()['title'].'<br>';
    $result->data_seek($j);
    echo 'Author'.$result->fetch_assoc()['category'].'<br>';
    $result->data_seek($j);
    echo 'Author'.$result->fetch_assoc()['year'].'<br>';
}

//插入数据
$sql = "INSERT INTO classics(author,title,category,year) VALUES('wq','my order','php upload','2010');";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}
$result->close();
$conn->close();

?>