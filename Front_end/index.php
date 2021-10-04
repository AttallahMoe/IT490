<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

$client=new rabbitMQClient("testRabbitMQ.ini","testServer");

require('index_page.php');

?>