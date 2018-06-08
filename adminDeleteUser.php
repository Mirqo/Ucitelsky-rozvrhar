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
         background: #f2f2f2;
         line-height: 1.8;
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
         float: left;
      }
      #momentalnyUzivatelia {
         margin-right: 50px;
         margin-top: 10px;
         margin-bottom: 10px;
      }
      #buttonDelete {
         float: left;
         width: 100%;
      }
      #buttonDelete button{
         float: left;
         margin-left: 5%;
         margin-top: 1em;
         padding: 0.5em;
      }

    </style>
    <link rel="stylesheet" href="navbar.css"/>

    <meta charset="UTF-8">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="adminDeleteUser.js"></script>
    <title>Admin Delete Users</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
  </head>
  <body>
     <div class="navbar">
        <h3>Rozvrhar - Admin</h3>
        <a href="adminViewTimetable.php">Pozrieť rozvrhy</a>
        <a href="adminCreateUser.php">Vytvoriť používateľské účty</a>
        <a href="adminDeleteUser.php">Zmazať používateľské účty</a>
        <a href="userUpdateAccount.php">Zmeniť prihlasovacie udaje</a>
        <a href="logout.php">Odhlásiť</a>
     </div>
     <div id="formsHolder">
        <div class="nonPrint">
           Meno, koho rozvrh treba vytiahnut z databazy<br>
           <input list="names" id="name2" name="name" autocomplete="off">
           <datalist id="names">
           </datalist>
           <button id="loadButton" type="button" onclick="pridajMenoNaList()">Pridaj Meno</button>
        </div>
     </div>
     <div>
        <table id="menaNaZmazanie">
           <caption>Pouzivatelia na zmazanie</caption>
           <tr>
              <th>Meno</th>
           </tr>
        </table>
     <div id="buttonDelete">
        <button type="button" onclick="handleDelete()">Zmazať</button>
     </div>
     </div>

  </body>
</html>
