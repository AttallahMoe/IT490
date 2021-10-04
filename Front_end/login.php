<?php

require_once('rabbitMQLib.inc');
require_once('get_host_info.inc');
require_once('path.inc');

//login info
$username=$_POST['username'];
$password=$_POST['password'];

//requests
$request=array();
$request['type']='login';
$request['username']=$username;
$request['password']=$password;

$client=new rabbitMQCLient("testRabbitMQ.ini","testServer");
$response=$client->send_request($request);

?>