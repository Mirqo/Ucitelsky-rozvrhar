 <?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<form action="welcome.php" method="post">
Name: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
?>


</body>
</html> 
