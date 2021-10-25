<?php

session_start();
include('RabbitMqFunctions.php');

$username = strtolower($_POST['username']);
$password = strtolower($_POST['password']);

$response = login($username, $password);

if($loginResponse == true){
	$_SESSION['username'] = $username;
	header("location:./home.php");
}

else(){
    echo("incorrect username or password");
	header("location:../login.php");
}

?>