var names = [];
function pridajMenoNaList(){
   var name = $("#name2").val();
   names.push(name);
   $("#menaNaZmazanie").append("<tr><td>" + name + "</td></tr>");

   // mazanie formulara
   $("#name2").val("")
   return false;
}

function handleDelete(){
   if (!confirm("Skutočne chcete zmazať týchto používateľov?")){
      return false;
   }
   var jsondata = JSON.stringify(names);
   console.log(jsondata);

   $.post("handleAdminDeleteUsers.php",{jsondata: jsondata}, function (data){
   });
}

function get_names() {
   $.post("getNames.php", function (data){
      var names = JSON.parse(data);
      console.log(names);

      if (names.length > 0){
         $("datalist").html("<option value=\"" + names[0].realname + "\">");
         for (var i = 1; i < names.length; i++){
            $("datalist>option:last-child").append("<option value=\"" + names[i].realname+ "\">");
         }
      }
   });
}

$(document).ready(function (){
   // toto zarucuje, ze mozem stlacit enter ako vo forme, ale neda refresh stranky
   $('#formHolder form').submit(function (event) {
      pridajMenoNaList();
      return false;
   });
   get_names();
});

