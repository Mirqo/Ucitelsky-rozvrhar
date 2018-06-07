<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || $_SESSION['username'] == 'admin'){
   header("location: adminViewTimetable.php");
   exit;
}
// na tejto stranke si uzivatel vyklika rozvrh a potvrdi
?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Rozvrhar</title>
      <link rel="stylesheet" href="style.css"/>
      <link rel="stylesheet" href="navbar.css"/>
      <script src="jquery-3.2.1.min.js"></script>
      <script src="userPage.js"></script>
   </head>
   <body class="">
      <div class="navbar">
         <h3>Rozvrhar</h3>
         <a href="userUpdateAccount.php">Zmeniť prihlasovacie udaje</a>
         <a href="logout.php">Odhlásiť</a>
      </div>
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
      <div id="submitForm">
         Zvoľ farbu<br>
         <input type="radio" name="color" value="redCell"  /><span class="red"> Red - tu nemôžem učiť</span><br>
         <input type="radio" name="color" value="yellowCell" checked/><span class="yellow"> Yellow - tu by som nerád učil, ale teoreticky môžem</span><br>
         <input type="radio" name="color" value="whiteCell"/><span class="black"> White - tu môžem učiť</span><br>
         <h4>Poznámka</h4>
         <textarea rows="15" cols="50" type="text" name="note" id="note" autocomplete="off"></textarea><br>
         <button id="submit" onclick="writeToDB()">submit</button>
      </div>
   </body>
</html>
