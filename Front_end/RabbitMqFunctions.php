<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function login($user, $pass){
    $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

    $request = array();

    $request['type'] = "login";
    $request['Student_ID'] = $user;
    $request['Student_Password'] = $pass;

    $response = $client->send_request($request);

    return $response;

}

function register($user, $first, $last, $webex_link, $pass, $class_standing){
    $client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

    $request = array();

    $request['type'] = "register";
    $request['first'] = strtolower($first);
    $request['last'] = strtolower($last);
    $request['Student_ID'] = $user;
    $request['Student_Password'] = $pass;
    $request['Class_Standing'] = $class_standing;
    $request['Webex_Link'] = $webex_link;

    $response = $client->send_request($request);

    return $response;
}

?>