<?php 
include ("account.php");

$db = mysqli_connect($hostname, $username, $password, 'canvasdb');
if (!$db)
{
die ('Could not connect:' . mysqli_connect_error());
}
echo "Connected successfully";

$showtables= mysqli_query("SHOW TABLES FROM canvasdb");

while($table = mysqli_fetch_array($showtables)) { 
    echo($table[0] . "<br>");    
}
?>
