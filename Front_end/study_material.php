<?php
// Call PHP function from javascript without ajax
session_set_cookie_params(0, "~/RabbitMQ_connect/IT490/RabbitMQ/php_example/html/");
session_start();
function add_playlist($link){
    $mydata='Call by function declaration PHP';
    return $mydata;
}
?>