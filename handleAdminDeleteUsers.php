<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || $_SESSION['username'] != 'admin'){
   print 'Na túto operáciu nemáte prístup';
   exit;
}

$config = parse_ini_file("../../moj_config.ini.php");

$servername = "localhost";
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$names = json_decode($_POST['jsondata']);

for ($i = 0; $i < count($names); $i++){
   $realname = $names[$i];
   $name = "";

   $sql = "SELECT username FROM users WHERE realname='$realname'";
   $result = $conn->query($sql);

   if($r = mysqli_fetch_assoc($result)) {
      $name = $r['username'];
   }

   $sql = "DELETE FROM users WHERE username='$name'";
   $result = $conn->query($sql);
   $sql = "DELETE FROM rocnikac WHERE username='$name'";
   $result = $conn->query($sql);
}

$conn->close();
exit;

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?> 

