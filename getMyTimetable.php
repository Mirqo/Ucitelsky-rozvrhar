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
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM rocnikac where username='$name'";
$result = $conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
   $rows[] = $r;
}
$sql = "SELECT note FROM users where username='$name'";
$result = $conn->query($sql);
while($r = mysqli_fetch_assoc($result)) {
   $note = $r['note'];
}

$data = new stdClass();
$data->note = $note;
$data->rows = $rows;
print json_encode($data);
$conn->close();

?> 
