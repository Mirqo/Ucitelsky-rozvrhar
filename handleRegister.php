<?php
session_start();
$config = parse_ini_file("../../moj_config.ini.php");

$servername = "localhost";
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

$name = test_input($_POST['username']);
$realname = test_input($_POST['realname']);
$email = test_input($_POST['email']);
$pass = password_hash(test_input($_POST['password']), PASSWORD_DEFAULT);

//$json = json_decode($_POST['data']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// ak ma niekto rovnaky mail/meno, poslem naspat na register
$sql = "SELECT 1 FROM users WHERE username='$name' OR email='$email'";
$result = $conn->query($sql);

if($r = mysqli_fetch_assoc($result)) {
   $conn->close();
   header("location: error.php?error=Meno alebo emailova adresa uz existuju.");
   exit;
}
// meno/mail su unikatne, vlozim noveho pouzivatela do databazy
else {
   $sql = "INSERT INTO users (username, realname, password, email) VALUES ('$name', '$realname', '$pass', '$email')";
   $result = $conn->query($sql);
   $conn->close();
   $_SESSION['username'] = $name;
   header("location: userPage.php");
   exit;
}
header("location: userPage.php");
exit;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?> 

