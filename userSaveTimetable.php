<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || $_SESSION['username'] == 'admin'){
   print 'Na tuto operaciu nemate pristup.';
   exit;
}
$config = parse_ini_file("../../moj_config.ini.php");

$servername = "localhost";
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

$name = $_SESSION['username'];
$note = test_input($_POST['note']);
$json = json_decode($_POST['jsondata']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$conn->query("DELETE FROM rocnikac WHERE username='$name'");
foreach($json as &$val){

   $sql = "INSERT INTO rocnikac (username, day, time, type) VALUES ('$name', '$val->day', '$val->time', '$val->type')";
   $result = $conn->query($sql);
}
$sql = "UPDATE users SET note = '$note' WHERE username = '$name'";
print $result = $conn->query($sql);

$conn->close();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 
