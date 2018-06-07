function getTimetableByName(){
   $("#loadButton").after("<div class='loader'></div>");
   var nname = $('#name2').val();
   $.post("getTimetable.php", { name: nname}, function(data){
      console.log(JSON.parse(data));
      makeTimetable(data);
      $(".loader").remove();
      document.title = nname;
   });
}
function makeTimetable(data){
   // funkcia zobrazi rozvrh vyucujuceho
   var table = JSON.parse(data);

   $('table').each(function(){
      var i = 0; // ak i/5 je riadok, i%5 stlpec
      var minute = 8*60+10;
      $(this).find('td').each(function(){
         var clas = $(this).attr("class");
         if (clas != "time"){
            $(this).attr("class", 'whiteCell'); //mazem co je
            $(this).empty();
            for (var j = 0; j < table.length; j++){
               var cell = table[j];
               var type = "redCell";
               var spanChar = "x";
               if (cell.type == 1){
                  type = "yellowCell";
                  spanChar = "?";
               }
               if (minute == parseInt(cell.time)){
                  if ((i%5) == 0 && cell.day == "Pon"){
                     $(this).attr("class", type);
                     $(this).append("<span>" + spanChar + "</span>");
                  }
                  else if ((i%5) == 1 && cell.day == "Uto"){
                     $(this).attr("class", type);
                     $(this).append("<span>" + spanChar + "</span>");
                  }
                  else if (i%5 == 2 && cell.day == "Str"){
                     $(this).attr("class", type);
                     $(this).append("<span>" + spanChar + "</span>");
                  }
                  else if (i%5 == 3 && cell.day == "Stv"){
                     $(this).attr("class", type);
                     $(this).append("<span>" + spanChar + "</span>");
                  }
                  else if (i%5 == 4 && cell.day == "Pia"){
                     $(this).attr("class", type);
                     $(this).append("<span>" + spanChar + "</span>");
                  }
               }
            }
            i++;
            if (i%5 == 0){
               minute += 50;
            }
         }
      });
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
   get_names();
});

