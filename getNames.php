<?php
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

$sql = "SELECT DISTINCT name FROM rocnikac ORDER BY name";
$result = $conn->query($sql);
$rows = array();
while($r = mysqli_fetch_assoc($result)) {
   $rows[] = $r;
}
print json_encode($rows);
$conn->close();
?> 
