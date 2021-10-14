<?php
include ("account.php");

$db = mysqli_connect($hostname, $username, $password, $project);
if (!$db)
{
die ('Could not connect:' . mysqli_connect_error());
}

$result = "INSERT INTO canvasdb.Student_Table VALUES ('jeb65', 'Password', 'webex.com/jeb65','Senior');";
mysqli_query($db,$result) or die (mysqli_error($db));


?>