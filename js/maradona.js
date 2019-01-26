var base_url = "http://localhost/maradona/"; //TODO modificar cuando se ponga en produccion

$(document).ready(function (){
    $("select[name=slctNivel]").change(nivelChange);
});

function nivelChange() {
  var idNivel = $(this).val();
  var selectGrado = "select[name=slctGrado]";

  //Si se selecciona el option vacío del select nivel, se limpia el select de grado
  if (idNivel == "") {
    $(selectGrado).html("");
    addOptionToSelect(selectGrado, "", "Seleccionar...");
  }
  // Datos para petición AJAX
  var url = base_url + "Alumnos/C_Alumnos/GetGrados/" +idNivel ;
  var data = {};
  var dataType = "json";
  var success = function (data) {
    // console.log(JSON.stringify(data)); // para debug
    if (data.length > 0)
    {
      $(selectGrado).html("");
      addOptionToSelect(selectGrado, "", "Seleccionar...");
      for (var i = 0; i < data.length; i++){
        addOptionToSelect(selectGrado, data[i].id_grado,  data[i].descripcion );
      }
    }
  };

  $.post(url, data, success, dataType);
}

function addOptionToSelect(select, value, text)
{
  $(select).append('<option value="' + value + '">' + text + "</option>");
}
