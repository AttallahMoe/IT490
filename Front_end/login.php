<?php
session_set_cookie_params(0, "~/RabbitMQ_connect/IT490/RabbitMQ/php_example/html/");
session_start();
require_once('RabbitMqFunctions.php');
$username = strtolower($_POST['username']);
$password = $_POST['password'];

$response = login($username, $password);

if($response == true){
        $_SESSION['username'] = $username;
        header("location:./home.php");
}

else{
    echo("incorrect username or password");
        header("location:./login.html");
}

?>