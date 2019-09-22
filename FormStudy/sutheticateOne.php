<?php

if (isset($_SERVER['PHP_AUTH_USER'])&&isset($_SERVER['PHP_AUTH_PW'])){
    echo "welcome";
}else{
    header('WWW-Authenticate:Base realm="Restricted Section"');
    header('HTTP/1.0 401 Unauthorized');
    die('please enter your username and password');
}
