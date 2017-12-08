var paintingColorCellClass = "redCell";

function changeCellColor(cell) {
   if (cell.className == "whiteCell" || cell.className == "redCell" || cell.className == "yellowCell"){
      cell.className = paintingColorCellClass;
   }
}
$(document).ready(function(){
   $('input').click(setPaintingColor);
   $('td').mousedown(paintCells);
   $('body').mouseup(stopPaintCells);
   setPaintingColor();
});
function paintCells() {
   var lastTarget;
   $('table').mousemove(function(event){
      if (lastTarget == event.target)
         return;
      changeCellColor(event.target);
      //console.log(event.target);
      lastTarget = event.target;
      unFocus();
   });
}
function stopPaintCells(){
   $('table').off("mousemove");
}
function setPaintingColor(){
   paintingColorCellClass = $('input:checked').attr('value');
}
function pauseEvent(e){
    if(e.stopPropagation) e.stopPropagation();
    if(e.defaultPrevented) e.defaultPrevented();
    e.cancelBubble=true;
    e.returnValue=false;
    return false;
}
var unFocus = function () {
  if (document.selection) {
    document.selection.empty()
  } else {
    window.getSelection().removeAllRanges()
  }
}
function getTimeTable(){
   // funkcia vrati array classov buniek v rozvrhu
   var result = [];
   $('table').each(function(){
      var i = 0;
      $(this).find('td').each(function(){
         var a = new Object();
         var clas = $(this).attr("class");
         if (clas == "time"){
         }
         else {
            a.class = clas;
            a.day = "";
            if ((i%5) == 0){
               a.day = "Pon";
            }
            if ((i%5) == 1){
               a.day = "Uto";
            }
            if (i%5 == 2){
               a.day = "Str";
            }
            if (i%5 == 3){
               a.day = "Stv";
            }
            if (i%5 == 4){
               a.day = "Pia";
            }
            i++;
            result.push(a);
         }
      })
   });
   return result;
}
function writeToDB(){
   var table = getTimeTable();
   var minute = 8*60 + 10;
   var result = [];
   for (var i = 0; i < table.length; i++){
      var type = table[i].class;
      var day = table[i].day;
      var a = new Object();
      if (type != "whiteCell"){
         a.time = minute;
         a.day = day;
         if (type == "redCell"){
            a.type = 0;
         }
         else {
            a.type = 1;
         }
         result.push(a);
      }
      if ((i+1) % 5 == 0){
         minute += 50;
      }
   }
   var jsonData = JSON.stringify(result);
   var nname = $('#name1').val();
   $("#submit").after("<div class='loader'></div>");
   $("#loadButton").attr("disabled", true);
   $.post("saveToDB.php", { name: nname, jsondata: jsonData}, function (data) {
      console.log("posted data");
      $("#loadButton").removeAttr("disabled", true);
      $(".loader").remove();
      get_names();
   });
}
function getTimetableByName(){
   $("#loadButton").after("<div class='loader'></div>");
   var nname = $('#name2').val();
   $.post("getTimetable.php", { name: nname}, function(data){
      makeTimetable(data);
      $(".loader").remove();
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
            for (var j = 0; j < table.length; j++){
               var cell = table[j];
               var type = "redCell";
               if (cell.type == 1){
                  type = "yellowCell";
               }
               if (minute == parseInt(cell.time)){
                  if ((i%5) == 0 && cell.day == "Pon"){
                     $(this).attr("class", type);
                  }
                  if ((i%5) == 1 && cell.day == "Uto"){
                     $(this).attr("class", type);
                  }
                  if (i%5 == 2 && cell.day == "Str"){
                     $(this).attr("class", type);
                  }
                  if (i%5 == 3 && cell.day == "Stv"){
                     $(this).attr("class", type);
                  }
                  if (i%5 == 4 && cell.day == "Pia"){
                     $(this).attr("class", type);
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

      if (names.length > 0){
         $("datalist").html("<option value=" + names[0].name + ">");
         for (var i = 1; i < names.length; i++){
            //console.log(names.length);
            $("datalist>option:last-child").append("<option value=" + names[i].name + ">");
         }
      }
   });
}
$(document).ready(function (){
   get_names();
});

