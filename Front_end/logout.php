<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>

<?php require_once(__DIR__ . "/IT490/Front_end/RabbitMqFunctions.php"); ?>
<?php
flash("You have been logged out");
die(header("Location: login.html"));
?>