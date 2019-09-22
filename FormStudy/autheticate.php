<?php
$servername = "127.0.0.1";
$db = 'publications';
$username = "hapii";
$password = "qwer1234";

$conn = new mysqli($servername,$username,$password,$db);
if ($conn->connect_error){
    die($conn->connect_error);
}

if (isset($_SERVER['PHP_AUTH_USER'])&&isset($_SERVER['PHP_AUTH_PW'])){
    $un_temp = mysql_entities_fix_string($conn,$_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($conn,$_SERVER['PHP_AUTH_PW']);

    $query = "SELECT * FROM users WHERE username='$un_temp'";

    $result = $conn->query($query);
    if (!$result){
        die($conn->connect_error);
    }elseif ($result->num_rows){
        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();

        $salt1 = 'qm&h*';
        $salt2 = 'pg!@';

        $token = hash('ripemd128','$salt1$pw_temp$salt2');

        if ($token == $row[3]){
            echo "$row[0] $row[1] Hi $row[0], you are NOT logged in as $row[2]";
        }else{
            die('invalid username/password combination');
        }
    }
    else die('invalid username/password combination');
}else{
    header('WWW-Authenticate:Base realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die('please enter your username and password');
}

$conn->close();

function mysql_entities_fix_string($connent,$string){
    return htmlentities(mysql_entities_fix_string($connent,$string));
}
function mysql_fix_string($connent,$string){
    if (get_magic_quotes_gpc()){
        $string = stripcslashes($string);
    }
    return $connent->real_escape_string($string);
}