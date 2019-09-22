
<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr =  $isbnErr ="";
$name = $email = $gender = $comment = $website = $isbn = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"])) {
        $nameErr = "名字是必需的";
    } else {
        $name = test_input($_POST["name"]);
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[a-zA-Z ]*$/",$name))
        {
            $nameErr = "只允许字母和空格";
        }
    }

//    if (empty($_POST['isbn'])){
//        $isbnErr = '请填入isbn';
//    }

    if (empty($_POST["email"]))
    {
        $emailErr = "邮箱是必需的";
    }
    else
    {
        $email = test_input($_POST["email"]);
        // 检测邮箱是否合法
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
        {
            $emailErr = "非法邮箱格式";
        }
    }

    if (empty($_POST["website"]))
    {
        $website = "";
    }
    else
    {
        $website = test_input($_POST["website"]);
        // 检测 URL 地址是否合法
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
        {
            $websiteErr = "非法的 URL 的地址";
        }
    }

    if (empty($_POST["comment"]))
    {
        $comment = "";
    }
    else
    {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"]))
    {
        $genderErr = "性别是必需的";
    }
    else
    {
        $gender = test_input($_POST["gender"]);
    }


}

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


if (isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['website'])
    &&isset($_POST['comment'])&&isset($_POST['gender'])){
    $namesql = get_post($conn,$_POST['name']);
    $emailsql =  get_post($conn,$_POST['email']);
    $websitesql =  get_post($conn,$_POST['website']);
    $commentsql =  get_post($conn,$_POST['comment']);
    $gendersql =  get_post($conn,$_POST['gender']);
    $isbnsql = get_post($conn,$_POST['isbn']);

    $query = "INSERT INTO userInfo (name, email, website,comment,gender,isbn) VALUES ('$namesql', '$emailsql', '$website','$commentsql','$gendersql','$isbnsql')";
    $result = $conn->query($query);
    if (!$result)
        die($conn->error);
}


function get_post($conn , $var)
{
    return $conn->real_escape_string($var);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>



<h2>PHP 表单验证实例</h2>
<p><span class="error">* 必需字段。</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    名字: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    网址: <input type="text" name="website" value="<?php echo $website;?>">
    <span class="error"><?php echo $websiteErr;?></span>
    isbn: <input type="text" name="isbn" value="<?php echo $isbn;?>">
    <span class="error"><?php echo $isbn;?></span>
    <br><br>
    备注: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    <br><br>
    性别:
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">女
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">男
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>您输入的内容是:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;

echo "<h2>数据库内容:</h2>";
$query = "SELECT * FROM userInfo";
$result = $conn->query($query);
if (!$result)die('查询数据库出问题了'.$conn->error);
$rows = $result->num_rows;

for ($j = 0; $j <$rows;++$j){
    $result->data_seek($j);
    //$result->fetch_array(MYSQLI_NUM); $row[0]
    echo '姓名: '.$result->fetch_assoc()['name'].'<br>';
    $result->data_seek($j);
    echo 'email:'.$result->fetch_assoc()['email'].'<br>';
    $result->data_seek($j);
    echo '网站: '.$result->fetch_assoc()['website'].'<br>';
    $result->data_seek($j);
    echo '性别: '.$result->fetch_assoc()['gender'].'<br>';
    echo '备注: '.$result->fetch_assoc()['comment'].'<br>';
    ?>

    <form action="fromsql.php" method="post">
    <input type="submit" value="DELETE  USER">
    </form>
<?php
}

?>



