<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Conection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);                                                                           
                                                                                                                                        
$msg = new AMQPMessage('Hello Everybody');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello Everybody'\n";

$channel->close();
$connection->close();
?>