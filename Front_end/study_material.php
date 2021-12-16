<?php
// Call PHP function from javascript without ajax

function add_playlist($link){
    $mydata='Call by function declaration PHP';
    return $mydata;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
                <title> Login Page </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="csshome.css">
</head>

        <body>
       <div class="navbar">
        <a href="home.html" class="-button-bar-item">Home</a>
        <a href="study_material.html" class="-button-bar-item">Study Material</a>
        <a href="logout.php">Logout<br></a>

       </div>



       <iframe width="420" height="345" src="https://www.youtube.com/embed/TMubSggUOVE"></iframe>
        <script>
        var phpadd= <?php echo add(1,2);?> //call the php add function
        </script>

       <iframe width="420" height="345" src="https://www.youtube.com/embed/TMubSggUOVE"></iframe>
       <a href="add_playlist(https://www.youtube.com/embed/TMubSggUOVE)" class="-button-bar-item">add</a><br>
       </body>

        </html>