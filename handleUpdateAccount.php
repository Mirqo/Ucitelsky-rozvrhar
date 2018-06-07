<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
   header("location: login.html");
   exit;
}

$config = parse_ini_file("../../moj_config.ini.php");

$servername = "localhost";
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

$oldPass= test_input($_POST['oldPass']);
$newPass= test_input($_POST['newPass']);
$name= $_SESSION['username'];
$newName= test_input($_POST['username']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT password FROM users WHERE username='$name'";
$result = $conn->query($sql);


while($r = mysqli_fetch_assoc($result)) {
   if (password_verify($oldPass, $r['password'])){
      break;
   }
   header("location: error.php?error=Zle heslo.");
   exit;
}

$message = "";

if ($newPass != ''){
   $hash= password_hash($newPass, PASSWORD_DEFAULT);
   $sql = "UPDATE users SET password='$hash' WHERE username='$name'";
   $result = $conn->query($sql);
   $message .= "Heslo bolo úspešne zmenené.<br>";
}

if ($newName != ''){
   $sql = "SELECT 1 FROM users WHERE username='$newName'";
   $result = $conn->query($sql);

   if($r = mysqli_fetch_assoc($result)) {
      $message .= "Toto prihlasovacie meno už niekto používa.<br>";
   }
   else {
      $sql = "UPDATE users SET username='$newName' WHERE username='$name'";
      $result = $conn->query($sql);
      $sql = "UPDATE rocnikac SET username='$newName' WHERE username='$name'";
      $result = $conn->query($sql);
      $_SESSION['username'] = $newName;
      $message .= "Meno bolo úspešne zmenené.<br>";
   }
}

print $message;
$conn->close();
exit;


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 
