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
$sql = "CREATE TABLE `rocnikac` (
 `username` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `day` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
 `time` int(11) NOT NULL,
 `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $conn->query($sql);

$sql = "CREATE TABLE `users` (
 `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
 `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `realname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
 `note` varchar(1024) CHARACTER SET utf16 COLLATE utf16_slovak_ci DEFAULT NULL,
 PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
$result = $conn->query($sql);

$pass = password_hash('admin', PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES ('admin', '$pass')";
$conn->query($sql);

$conn->close();
?> 
