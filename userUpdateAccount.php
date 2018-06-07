<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
   header("location: login.html");
   exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {
border: 3px solid #f1f1f1;
}

input[type=text], input[type=password], input[type=email] {
    width: 100%;
    max-width: 300px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    max-width: 300px;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>


<form action="handleUpdateAccount.php" method="post">

  <div class="container">
    <label for="oldPass"><b>Staré heslo</b></label>
    <br>
    <input type="password" placeholder="Enter old Password" name="oldPass" required autofocus>
    <br>

    <label for="newPass"><b>Nové heslo</b></label>
    <br>
    <input type="password" placeholder="Enter new Password" name="newPass">
    <br>

    <label for="username"><b>Nové prihlasovacie meno</b></label>
    <br>
    <input type="text" placeholder="Enter new Username" name="username">
    <br>
    <p>*Nevyplnené nové meno/heslo sa nezmení.</p>
        
    <button type="submit">Potvrdiť</button>
  </div>

</form>

</body>
</html>

