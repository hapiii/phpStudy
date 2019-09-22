<?php

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}else{
    $name = "NOT entered";
}


echo <<<_END
<html>
<head>
    <title>FORM Test </title>
   </head>
    <body>
    <form method="post" action="formTest.php">
    What is your name?
    <input type="text" name="name">
    <input type="submit">
    </form>
    </body>
    </html>  

_END;
