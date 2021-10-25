#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

global $db;

function doLogin($username,$password)
{
    global $db;
    $server = new rabbitMQServer("testRabbitMQ.ini","testServer");

    $query = "select Student_Password from canvasdb.Student_Table where Student_ID='$username';";
    $check = $db->query($query);
    $result = mysqli_fetch_array($check, MYSQLI_ASSOC);
    $fResult = $result['Student_Password'];

    if($check->num_rows == 0){
        echo "user does not exist ";
        return false;
    }

    if($fResult == $password){
        echo "passwords match ";
        return true;
    }
    else{
        echo "passwords don't match ";
        return false;
    }
}

function doRegister($first, $last, $webex_link, $password, $username, $class_standing)
{
    global $db;
    $server = new rabbitMQServer("testRabbitMQ.ini","testServer");

    $query = "select Student_Password from canvasdb.Student_Table where Student_ID='$username';";
    $reg = "insert into canvasdb.Student_Table (Student_ID, Student_Password, Webex_Link, Class_Standing, first, last) values ('$username', '$password','$webex_link','$class_standing','$first','$last'); ";

    $check = $db->query($query);

    if($check->num_rows >= 1){
        echo "username already exists";
        return false;
    }
    elseif($check->num_rows == 0){
        if(mysqli_query($db, $reg)){
            echo "account created";
        }
        return true;
    }
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);

  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }

  switch ($request['type'])
  {
    case "login":
      return doLogin($request['Student_ID'],$request['Student_Password']);

    case "register":
        return doRegister($request['first'],$request['last'],$request['Webex_Link'],$request['Student_Password'],$request['Student_ID'], $request['Class_Standing']);

    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$db = mysqli_connect("20.55.45.25", "XDiaz241", "canvasdb", "XDSandman2388");

if(!$db){
    die ('Could not connect:' . mysqli_connect_error());
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
