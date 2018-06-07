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
      #formsHolder {
         display: block;
         float: right;
         margin: 30px;
      }
      #formHolder {
         display: block;
         margin-top: 20px;
      }
      #emailList {
         display: block;
         margin-top: 20px;
      }
      #sprava {
         display: block;
         margin: auto;
      }
      #buttonSubmit {
         float: right;
         width: 100%;
      }
      #buttonSubmit button{
         float: right;
         margin-right: 10%;
         padding: 0.5em;
      }

    </style>
    <link rel="stylesheet" href="navbar.css"/>

    <meta charset="UTF-8">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="adminCreateUser.js"></script>
    <title>Admin Create Users</title>
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  </head>
  <body>
      <div class="navbar">
         <h3>Rozvrhar - Admin</h3>
         <a href="adminCreateUser.php">Vytvoriť používateľské účty</a>
         <a href="userUpdateAccount.php">Zmeniť prihlasovacie udaje</a>
         <a href="logout.php">Odhlásiť</a>
      </div>
     <div>
     <table id="momentalnyUzivatelia">
        <caption>Momentalny uzivatelia v systeme</caption>
        <tr>
           <th>Meno</th>
        </tr>
        <?php
            include 'adminGetUserList.php';
        ?>
     </table>
     </div>
     <div id="formsHolder">
        <div id="formHolder">
              <form class="container" method="POST">
                 <label for="name"><b>Name</b></label>
                 <input id="nameInput" type="text" placeholder="Enter Name" name="name" value="Miroslav">
                 <br>
                 <label for="email"><b>Email</b></label>
                 <input id="emailInput" type="email" placeholder="Enter Email" name="email" value="miroslavmrozek7@gmail.com">

                 <input type="submit" value="Pridaj">
              </form>

        </div>

        <table id="emailList">
           <caption>Uzivatelia pripravujuci sa na pridanie so systemu</caption>
           <tr>
              <th>Meno</th>
              <th>Email</th>
           </tr>
        </table>

     </div>
     <div id="sprava">
        <h3>Sprava ktora sa posle v emaili spolu s heslom</h3>
        <p>#email# a #heslo# budú nahradené údajmi pre daný účet.</p>
        <textarea rows="12" cols="50">
Dobrý deň,

Bol Vám vytvorený účet na stránke https://miroslavmrozek7.000webhostapp.com, slúžaci nato, aby ste si mohli vyklikať, kedy chcete/nechcete/nemôžete učiť.
Vaše prihlasovacie údaje sú:

email: #email#
heslo: #heslo#</textarea>
     </div>
     <div id="buttonSubmit">
     <button type="button" onclick="handleSubmit()">Vytvoriť účty z tabuľky</button>
     <div>


  </body>
</html>
