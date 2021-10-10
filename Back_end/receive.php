<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;


$BROKER_HOST='52.186.142.107';

$BROKER_PORT=5672;

$USER='admin';

$PASS = "admin";

$VHOST='test';

$EXCHANGE= 'testExchange';

$QUEUE= 'hello';


$connection = new AMQPStreamConnection($BROKER_HOST, $BROKER_PORT, $USER, $PASS, $VHOST);

$channel = $connection->channel();



$channel->queue_declare('hello', false, false, false, false);



echo " [*] Waiting for messages. To exit press CTRL+C\n";



$callback = function ($msg) {

    echo ' [x] Received ', $msg->body, "\n";

};



$channel->basic_consume('hello', '', false, true, false, false, $callback);



while ($channel->is_open()) {

    $channel->wait();
}

$channel->close();

$connection->close();

?>