<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<body>

Welcome <?php echo $_SESSION["username"]; ?><br>
Your email address is: <?php echo $_SESSION["email"]; ?><br>

</body>
</html> 
