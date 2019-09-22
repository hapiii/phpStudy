
<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";



$servername = "127.0.0.1";
$db = 'publications';
$username = "hapii";
$password = "qwer1234";

// 创建连接
$conn = new mysqli($servername, $username, $password,$db);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}



$query = "SELECT * FROM userInfo";
$result = $conn->query($query);
if (!$result)die('查询数据库出问题了'.$conn->error);
$rows = $result->num_rows;
for ($j = 0; $j <$rows;++$j){
    $result->data_seek($j);
    //$result->fetch_array(MYSQLI_NUM); $row[0]
    echo '姓名'.$result->fetch_assoc()['name'].'<br>';
    $result->data_seek($j);
    echo 'email'.$result->fetch_assoc()['email'].'<br>';
    $result->data_seek($j);
    echo '网站'.$result->fetch_assoc()['website'].'<br>';
    $result->data_seek($j);
    echo '性别'.$result->fetch_assoc()['gender'].'<br>';
    ?>
    <button >删除</button></<br>>
<?php

}



?>




