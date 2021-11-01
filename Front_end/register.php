<?php

session_start();
include('RabbitMqFunctions.php');

$user = strtolower($_POST['username']);
$first = strtolower($_POST['first']);
$last = strtolower($_POST['last']);
$webex_link = $_POST['webex'];
$pass = $_POST['password'];
$class_standing = $_POST['standing'];

$response = register($user, $first, $last, $webex_link, $pass, $class_standing);

if($response == true){
        $_SESSION['username'] = $username;
        header("location:./home.html");
}

else{
    echo("username already taken");
        header("location:./register.html");
}

?>