<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || $_SESSION['username'] != 'admin'){
header("location: login.html");
exit;
}
?>
<!DOCTYPE html>
<html>
   <head>
      <style>
body {
   display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
   text-align: center;
}
a {
   display: block;
   text-decoration: none;
}
      </style>
      <meta charset="UTF-8">
      <title>Admin Page</title>
      <link rel="stylesheet" href="stylesheet.css" type="text/css">
   </head>
   <body>
      <h1>Admin Home<h1>
            <a href="adminCreateUser.php">Tvorba novych pouzivatelov</a>
            <br>
            <a href="adminViewTimetable.php">Pozriet rozvrhy</a>




   </body>
</html>
