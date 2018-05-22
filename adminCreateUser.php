<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || $_SESSION['username'] != 'admin'){
   header("location: login.html");
   exit;
}
// na tejto stranke chcem zobrazit list vsetkych uzivatelov
// a mat moznost pridavat dalsich
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
         flex-direction: row;
         justify-content: space-between;
         align-items: center;
      }
      a {
         display: block;
         text-decoration: none;
      }
      table, th, td {
         min-width: 200px;
         border: 1px solid black;
      }
    </style>
    <meta charset="UTF-8">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="adminCreateUser.js"></script>
    <title>Admin Page</title>
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  </head>
  <body>
     <table>
        <caption>Momentalny uzivatelia v systeme</caption>
        <tr>
           <th>Username</th>
        </tr>
        <?php
            include 'adminGetUserList.php';
        ?>
     </table>


  </body>
</html>
