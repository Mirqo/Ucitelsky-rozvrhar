<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || $_SESSION['username'] != 'admin'){
   header("location: login.html");
   exit;
}
// na tejto stranke si admin vie pozriet rozvrhy a vytlacit ich
?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Rozvrhar</title>
      <link rel="stylesheet" href="style.css"/>
      <link rel="stylesheet" href="navbar.css"/>
      <link rel="stylesheet" href="print.css"/>
      <script src="jquery-3.2.1.min.js"></script>
      <script src="adminViewTimetable.js"></script>
   </head>
   <body class="">
      <div class="navbar">
         <h3>Rozvrhar - Admin</h3>
         <a href="adminViewTimetable.php">Pozrieť rozvrhy</a>
         <a href="adminCreateUser.php">Vytvoriť používateľské účty</a>
         <a href="adminDeleteUser.php">Vytvoriť používateľské účty</a>
         <a href="userUpdateAccount.php">Zmeniť prihlasovacie udaje</a>
         <a href="logout.php">Odhlásiť</a>
      </div>
      <h3 class="print" id="titleName"><br></h3>
      <table id="mytab1">
         <tr>
            <th></th>
            <th>Pondelok</th>
            <th>Utorok</th>
            <th>Streda</th>
            <th>Stvrtok</th>
            <th>Piatok</th>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">8:10</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">9:00</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">9:50</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">10:40</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">11:30</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">12:20</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">13:10</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">14:00</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">14:50</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">15:40</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">16:30</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">17:20</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">18:10</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
         <tr>
            <td class="time" onclick="changeCellColor(this)">19:00</td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
            <td class="whiteCell" onclick="changeCellColor(this)"></td>
         </tr>
      </table>
      <div id="legenda">
         <ul>
            <li><span class="nonPrint">Red</span><span class="print">X</span> - tu nemôžem učiť</li>
            <li><span class="nonPrint">Yellow</span><span class="print">?</span> - tu by som nerád učil, ale teoreticky môžem</li>
            <li><span class="nonPrint">White</span><span class="print">prázdne</span> - tu môžem učiť</li>
         </ul>
         <div>
            <h3>Poznámka</h3>
            <p id="note"></p>
         </div>
         <div class="nonPrint">
            Meno, koho rozvrh treba vytiahnut z databazy<br>
            <input list="names" id="name2" name="name" autocomplete="off">
            <datalist id="names">
            </datalist>
            <button id="loadButton" type="button" onclick="getTimetableByName()">Load Timetable</button>
         </div>
      </div>
      <div id="printButton">
         <button type="button" onclick="window.print()">Tlačiť rozvrh</button>
      </div>
   </body>
</html>
