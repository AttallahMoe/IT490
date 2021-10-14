<?php
include ("account.php");

$db = mysqli_connect($hostname, $username, $password, $project);
if (!$db)
{
die ('Could not connect:' . mysqli_connect_error());
}
echo "\n\n Connected successfully";
// mysqli_select_db($db,$project);

$result="SELECT * from canvasdb.Student_Table;";
  $t = mysqli_query($db, $result) or die(mysqli_error($db));
  $num = mysqli_num_rows($t);
 while($row = $t->fetch_assoc()) {
 echo "id: " . $row["Student_ID"]. " - Name: " . $row["Webex_Link"]. "<br>";
}
