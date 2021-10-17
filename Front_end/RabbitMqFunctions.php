<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function login($user, $pass){
    $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

    $request = array();

    $request['type'] = "login";
    $request['username'] = $user;
    $request['password'] = $pass;

    $response = $client->send_request($request);

    return $response;

}

function register($user, $first, $last, $email, $pass){
    $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

    $request = array();

    $request['type'] = "register";
    $request['first'] = strtolower($first);
    $request['last'] = strtolower($last);
    $request['email'] = $email;
    $request['password'] = $pass;

    $response = $client->send_request($request); 

    return $response;
}

?>
