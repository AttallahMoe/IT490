<?php
require_once(__DIR__ . "../...");
require_once('rabbitMQLib.inc');
$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");
?>