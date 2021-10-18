<?php 
require_once(__DIR__ . "/IT490/Front_end/RabbitMqFunctions.php"); 
require_once('/IT490/RabbitMQ/rabbitMQLib.inc');
require_once('/IT490/RabbitMQ/get_host_info.inc');
require_once('/IT490/RabbitMQ/path.inc');
?>

<?php 

$client = new rabbitMQClient("testRabbitMQ.ini", "testServer");

if(!is_logged_in()){
 die(header("Location: login.php"));
}
$user = ""
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}
?>

<p>Welcome, <?php echo $user; ?></p>
