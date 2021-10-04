<?php

require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;

use PhpAmqpLib\Message\AMQPMessage;


$BROKER_HOST='baboon-01.rmq.cloudamqp.com';

$BROKER_PORT=5672;

$USER='yiowarzc';

$PASS = "vHYTSrG04sVP3jSrmx_ehFS10Hn4aVjy";

$VHOST='yiowarzc';

$EXCHANGE= 'testExchange';

$QUEUE= 'testQueue';




$connection = new AMQPStreamConnection($BROKER_HOST, $BROKER_PORT, $USER, $PASS, $VHOST);

$channel = $connection->channel();



$channel->queue_declare('hello', false, false, false, false);



$msg = new AMQPMessage('Hello World!');

$channel->basic_publish($msg, '', 'hello');



echo " [x] Sent 'Hello World!'\n";



$channel->close();

$connection->close();

?>
     