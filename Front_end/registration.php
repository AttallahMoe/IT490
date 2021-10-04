<?php

require_once("rabbitMQLib.inc");
require_once("get_host_info.inc");
require_once("path.inc");

//registration requirements
$password_length=['length'=>8];
$username=$_POST['username'];
$password=$_POST['password'];
$passwd_hash=password_hash($passwd,PASSWORD_DEFAULT,$password_length);
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];

//requests
$request= array();
$request['type']="login";
$request['username']=$username;
$request['password']=$password;
$request['firstname']=$firstname;
$request['lastname']=$lastname;

//conenction and response
$client=new rabbitMQClient("testRabbitMQ.ini","testServer");

$response=$client->send_request($request);

require 'registration.html';
?>