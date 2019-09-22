<?php
//读取数据
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

$sql = 'SELECT id, firstname, lastname FROM MyGuests';


//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    // 输出数据
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//    }
//} else {
//    echo "0 结果";
//}

$sqlWhere = "SELECT * FROM MyGuests WHERE firstname = 'John'";
$searchresult = mysqli_query($conn,$sqlWhere);

while($roww = mysqli_fetch_array($searchresult,yes))
{
    echo $roww['FirstName'] . " " . $roww['LastName'];
    echo "<br>";
}

$conn->close();

?>
