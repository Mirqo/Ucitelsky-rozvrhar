var emails = [];
var names = [];
function pridajEmailNaList(){
   var email = $("#emailInput").val();
   var name = $("#nameInput").val();
   if (email == "" || name == ""){
      return false;
   }
   emails.push(email);
   names.push(name);
   $("#emailList:last-child").append("<tr><td>" + name + "</td><td>"+email+"</td></tr>");

   // mazanie formulara
   $("#emailInput").val("");
   $("#nameInput").val("");
   return false;
}

function handleSubmit(){
   // tato funkcia zoberie mena z listu
   // zabali ich do arrayu
   // z toho spravi json
   // a nakoniec cez $ ajax post-ne adminCreateUser.php spolu so spravou

   var sprava= $("#sprava textarea").val();
   if (sprava.indexOf("#email#") < 0 || sprava.indexOf("#heslo#") < 0){
      alert("Správa musí obsahovať '#heslo#' a '#email#'.");
      return;
   }

   var ar = [];
   for (var i = 0; i < names.length; i++){
      ar.push({name: names[i], email: emails[i]});
   }
   console.log(ar);
   var jsondata = JSON.stringify(ar);

   $.post("handleAdminCreateUsers.php",{sprava: sprava, jsondata: jsondata}, function (data){
      alert(data);
      console.log(data);
      location.reload();
   });
}


$(document).ready(function (){
   // toto zarucuje, ze mozem stlacit enter ako vo forme, ale neda refresh stranky
   $('#formHolder form').submit(function (event) {
      pridajEmailNaList();
      return false;
   });
});

