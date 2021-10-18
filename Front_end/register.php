<?php 
require_once(__DIR__ . "/IT490/Front_end/RabbitMqFunctions.php"); 
require_once('/IT490/RabbitMQ/rabbitMQLib.inc');
require_once('/IT490/RabbitMQ/get_host_info.inc');
require_once('/IT490/RabbitMQ/path.inc');
?>

<?php
if (isset($post["register"])) {
    $password = null;
    $confirm = null;
    $username = null;
    
    if (isset($post["password"])) {
        $password = $post["password"];
    }
    if (isset($post["confirm"])) {
        $confirm = $post["confirm"];
    }
    if (isset($post["username"])) {
        $username = $post["username"];
    }
    $isValid = true;
    //check if passwords match on the server side
    if ($password == $confirm) {
    }
    else {
        flash("Passwords don't match");
        $isValid = false;
    }
    if (!isset($password) || !isset($confirm)) {
        $isValid = false;
    }
    // validation, last line of defense
    if ($isValid) {
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $db = getDB();
        if (isset($db)) {
            //placeholders to let PDO map and sanitize our data
            $stmt = $db->prepare(" users (username, password) values(:username, :password)");
            //here's the data map for the parameter to data
            $params = array(":username" => $username, ":password" => $hash);
            $r = $stmt->execute($params);
            //echo "db returned: " . var_export($r, true);
            $e = $stmt->errorInfo();
            if ($e[0] == "00000") {
                flash("Successfully registered! Please login.");
                die(header("Location: login.php"));
            }
            else {
                if ($e[0] == "23000") {//code for duplicate entry
                    flash("Username or email already exists.");
                }
                else {
                    flash("An error occurred, please try again");
                }
            }
        }
    }
    else {
        flash( "There was a validation issue");
    }
}
//safety measure to prevent php warnings
if (!isset($username)) {
    $username = "";
    
$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

$response = $client->send_request($request);

require 'registration.html';
}
?>