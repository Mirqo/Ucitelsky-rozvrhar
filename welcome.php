<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
<?php    
  $fp = fopen('sidebar_subscribers.txt', 'a') or die('fopen failed');

  fwrite($fp, "$name\t$email\t$leader\t$industry\t$country\t$zip\r\n") or die('fwrite failed');
?>
<?php
file_put_contents('somefile.txt', 'test test test');
session_start();
$requestType = $_SERVER['REQUEST_METHOD'];
 
//Print the request method out on to the page.
echo $requestType;
print_r($_SESSION);
// Write the contents back to the file
?>


</body>
</html> 
