<?php
$config = parse_ini_file("../../moj_config.ini.php");

$servername = "localhost";
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

$name = test_input($_POST['username']);
$pass = password_hash(test_input($_POST['password']), PASSWORD_DEFAULT);
$email = test_input($_POST['email']);
//$json = json_decode($_POST['data']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (username, password, email) VALUES ('$name', '$pass', '$email')";
$result = $conn->query($sql);

$conn->close();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 
