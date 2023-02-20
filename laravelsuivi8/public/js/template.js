$(document).ready( function () {
  $("body").css("cursor", "auto");
  //document.body.style.cursor = 'auto';

  if ($("#myModal")) {
    $("#myModal").modal('show');

    setTimeout(function() {
      $('#myModal').modal('hide');
    }, 3000);
  }
});

function verificationFormatHeure(value){
  var hour = value.split('h');
  if (hour.length > 1){
    var heures = hour[0];
    if (heures.length < 2){
      heures = "0" + heures;
    }

    var minutes = hour[1];
    if (minutes.length < 1)
      minutes = "00";
    else if (minutes.length < 2)
      minutes = "0" + minutes;
    value = heures + ":" + minutes;
  }
  return value;
}

// retourne true si hm1 > hm2
function compareHeureMinute(hm1, hm2){
  var temps1 = parseInt(hm1.substr(0, 2)*60) + parseInt(hm1.substr(3, 5));
  var temps2 = parseInt(hm2.substr(0, 2)*60) + parseInt(hm2.substr(3, 5));
  return temps1 > temps2;
}
