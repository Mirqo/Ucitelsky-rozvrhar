<?php
session_start();
$config = parse_ini_file("../../moj_config.ini.php");

$servername = "localhost";
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

$name = $email = test_input($_POST['username']);
$pass = test_input($_POST['password']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// get record by email or username
$sql = "SELECT password FROM users WHERE username='$name' OR email='$email'";
$result = $conn->query($sql);
$conn->close();


while($r = mysqli_fetch_assoc($result)) {
   if (password_verify($pass, $r['password'])){
      // ak su rovnake, nastav $session a redirectni na userHome
      $_SESSION['username'] = $name;
      if ($name == 'admin'){
         header("location: adminViewTimetable.php");
      }
      else {
         header("location: userPage.php");
      }
      exit;
   }
   $s = $r['password'];
   header("location: error.php?error=Zle prihlasovacie udaje.<br>");
}

//header("location: login.html");
exit;
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 

