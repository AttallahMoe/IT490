<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="csshome.css">
<title> Login </title>

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body style= "background-color: red;">

<div id="mySidenav" class="sidenav">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.html" class="homelink">Home</a>
  <a href="study_material.php" class="studymaterial">Study Material</a>
  <a href="playlist.php" class="studymaterial">Playlist</a>
  <a href="logout.php" class="studymaterial">Logout</a>
</div>

<span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776; Menu</span>

<div class="body" style= "text-align: center; margin: 10px; border: 10px;padding: 40px; height: 300px; border-style: double; background-color: grey; opacity: 0.85; font-weight: bold; background-image: url('AS6973.jpg')"> 
<h2 style= "font-size: 40px; color: white;">Login Here!</h2>
<p style= "padding: 5px; font-size: 30px; color: black;">
 <div class="wrapper">
       </div>
         
      <form method="post" action="login.php">
          <input type="username" name="username" placeholder="Username: ">
          <input type="password" name="password" placeholder="Password: ">
          <input type="submit" value="Submit">
      </form>
</p>


</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
</body>
</html> 
