<?php
function ListPlaylists ($username,$db){
  $db = mysqli_connect("20.55.45.25", "XDiaz241", "canvasdb", "XDSandman2388");

  if(!$db){
    die ('Could not connect:' . mysqli_connect_error());
  }
  $s= "select * from canvasdb.Playlist_Table where Student_ID = '$username' ";
  echo "<br>$s<br><br>";
  ($t= mysqli_query($db, $s)) or die(mysqli_error($db));

  while ($r = mysqli_fetch_array($t, MYSQLI_ASSOC)){
    $username = $r["STUDENT_ID"];
    $videolink = $r["Video_Link"];
    echo "<br> Student ID: Your Playlist! <br>";
    <iframe width="420" height="345" src=$videolink></iframe><br>

  }
  
}

?>