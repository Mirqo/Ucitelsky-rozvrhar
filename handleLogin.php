<?php
$config = parse_ini_file("../../moj_config.ini.php");

$servername = "localhost";
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

//$name = $email = test_input($_POST['username']);
//$pass = password_hash(test_input($_POST['password']), PASSWORD_DEFAULT);

$name = $email = 'name';
//$json = json_decode($_POST['data']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// get record by email or username
$sql = "SELECT password FROM users WHERE username='$name' OR email='$email'";
$result = $conn->query($sql);

while($r = mysqli_fetch_assoc($result)) {
   if (password_verify($pass, $r['password'])){
      // ak su rovnake, nastav $session a redirectni na userHome
      $_SESSION['username'] = $name;
      header("location: welcome.php");
      break;
   }
}
$conn->close();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 

