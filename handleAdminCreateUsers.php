<?php
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username']) || $_SESSION['username'] != 'admin'){
   print 'Na túto operáciu nemáte prístup';
   exit;
}

$config = parse_ini_file("../../moj_config.ini.php");

$servername = "localhost";
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sprava= test_input($_POST['sprava']);
$people = json_decode($_POST['jsondata']);

if (strpos($sprava, '#email#') === FALSE || strpos($sprava, '#heslo#') === FALSE){
   print 'Sprava musí obsahovať #heslo# a #email#.';
   exit;
}

$resultMessage = "";

// pre kazdeho treba vygenerovat unikatny username (aby sa neplietli v tabulke, ked je to primary key) a heslo
// na toto spravime to iste ako v register, len zabalene do for-cyklu s generovanim udajov 
for ($i = 0; $i < count($people); $i++){
   $realname = $people[$i]->name;
   $email = $people[$i]->email;
   $pass = bin2hex(openssl_random_pseudo_bytes(4));
   $name = bin2hex(openssl_random_pseudo_bytes(4));

   // ak ma niekto rovnake meno, generujem nove
   // ak ma niekto rovnaky mail, preskocim ho, pridam do spravy ktoru vraciam ze sa nepodarilo
   $sql = "SELECT 1 FROM users WHERE email='$email'";
   $result = $conn->query($sql);

   if($r = mysqli_fetch_assoc($result)) {
      $resultMessage .= "Nepodarilo sa pridať '$realname', email '$email' už je zabratý.\n";
      continue;
   }
   while (TRUE){
      $sql = "SELECT 1 FROM users WHERE username='$name'";
      $result = $conn->query($sql);

      if($r = mysqli_fetch_assoc($result)) {
         $name = bin2hex(openssl_random_pseudo_bytes(4));
         continue;
      }
      break;
   }

   $novaSprava = str_replace("#email#", $email, $sprava);
   $novaSprava = str_replace("#heslo#", $pass, $novaSprava);

   $pass = password_hash($pass, PASSWORD_DEFAULT);

   $sql = "INSERT INTO users (username, realname, password, email) VALUES ('$name', '$realname', '$pass', '$email')";
   $result = $conn->query($sql);

   $novaSprava = wordwrap($novaSprava,70);
   mail($email, "Rozvrhar",$novaSprava);
}
if ($resultMessage == ''){
   $resultMessage = "Všetko prebehlo úspešne.";
}

$conn->close();
print ($resultMessage);
exit;

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?> 

