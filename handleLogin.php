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
$sql = "SELECT username, password FROM users WHERE username='$name' OR email='$email'";
$result = $conn->query($sql);
$conn->close();


if ($r = mysqli_fetch_assoc($result)) {
   if (password_verify($pass, $r['password'])){
      // ak su rovnake, nastav $session a redirectni na userHome
      $_SESSION['username'] = $r['username'];
      if ($name == 'admin'){
         header("location: adminViewTimetable.php");
         exit;
      }
      else {
         header("location: userPage.php");
         exit;
      }
   }
}

header("location: error.php?error=Zle prihlasovacie udaje.<br>");
exit;
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 

