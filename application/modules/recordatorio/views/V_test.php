<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <div class="m-content">
    <h3>
    <?php
    echo "Userdata";
    echo "<br>";
    print_r( $this->session->all_userdata());
    echo "<br>";
    echo "<br>";
    echo "<br>";
    ?>

    <div class="m-list-timeline__item">
      <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
      <a href="" class="m-list-timeline__text">
        <span id="cantidadRecordatorio"></span> Test Editar Recordatorio
      </a>

      <button onclick="leerRecordatorio(1)">testEditar</button>
      <button onclick="modal()">ModalShow</button>
    </div>

    <div id="recordatoriosNuevos">

    </div>

    <div id="pagoRecordatorio">

    </div>
    <div id="pedidoRecordatorio">

    </div>
  </h3>


  <div id="modalMensaje" class="modal fade" tabindex="2" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <form method="post" action="<?php echo base_url() . "recordatorio/C_recordatorio/ActualizarRecordatorio";?>" class="form-horizontal">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title"><icon class="fa fa-users"></icon> Editar Stock&nbsp;</h4>
                  </div>
                  <div class="modal-body" style="max-height:auto; overflow-y:auto;">
                    <!-- Contenido que voy a cargar de los elementos -->
                    <div id="contenido" style="display:show;">
                      <div class="m-portlet__body">
                          <!-- <form id="formulario" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"> -->
                            <input type="hidden" name="id_stock" id="id_stock">
                              <div class="m-portlet__body">



                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                      <label class="col-form-label">Fecha Inicio:</label>
                                      <input id="fechaInicio" name="fechaInicio" class="form-control m-input" type="date" disabled>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-form-label">Estado Recordatorio:</label>
                                        <select class="form-control m-input form-control-sm" id="selectEstadoRecordatorio" name="selectEstadoRecordatorio" required disabled>
                                          <option value="" disabled>Seleccione el tipo</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                  <div class="col-lg-6">
                                      <label class="col-form-label">Tipo Recordatorio:</label>
                                      <select class="form-control m-input form-control-sm" id="selectTipoRecordatorio" name="selectTipoRecordatorio" required disabled>
                                        <option value="" disabled>Seleccione el tipo</option>
                                      </select>
                                  </div>
                                  <div class="col-lg-6">
                                      <label class="col-form-label">Titulo Recordatorio:</label>
                                      <input type="text" class="form-control m-input" placeholder="Ingrese la Cantidad Actual" name="tituloRecordatorio" id="tituloRecordatorio" required disabled>
                                  </div>
                                </div>

                                  <div class="form-group m-form__group row">
                                      <div class="col-lg-12">
                                          <label class="col-form-label">Recordatorio:</label>
                                          <textarea id="textoRecordatorio" name="textoRecordatorio" class="form-control m-input" placeholder="Texto del recordatorio" required disabled></textarea>
                                      </div>
                                  </div>

                                  <div class="form-group m-form__group row">
                                    <div class="col-lg-3">
                                        <label class="col-form-label">Fecha Finalizacion:</label>
                                        <input id="fechaFin" name="fechaFin" class="form-control m-input" type="date" placeholder="Codigo del Producto" required disabled>
                                    </div>

                                  </div>


                              </div>
                          <!-- </form> -->
                      </div>
                    </div>
                    <!-- Contenido que voy a cargar de los elementos -->
                    <!-- Mensaje de error -->
                                      <div id="mensajeEstado" style="display:none;">
                                        <div class="m-alert__icon">
                                          <div id="icono">

                                          </div>
                                        </div>
                                        <div class="m-alert__text">
                                          <div style="text-align:center;" id="contenidoMensaje">
                                          </div>
                                        </div>
                                      </div>
                  <!-- Mensaje de error -->
                  </div>
                  <div class="modal-footer">
                    <div id="actualizar" style="display:none;">
                      <button type="submit" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Actualizar</button>
                    </div>
                    <div id="ocultarModificar" style="display:block;">
                      <a onclick="estadoCampos(1)" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Modificar</a>
                    </div>
                      <button class="btn m-btn--pill m-btn--air btn-outline-danger m-btn m-btn--custom" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                  </div>
          </div>
      </div>
      </form>
  </div>



  </div>
</div>
</div>
<!-- end:: Body -->
<script>
window.onload = function() {
  //CargarRecordatoriosNuevos();
}


 function modal(){
    estadoCampos(2);
     $('#modalMensaje').modal('show');
 }

function leerRecordatorio(id){
 var recordatorio = id;
  $.ajax({
      type:'POST',
      url:"<?php echo base_url() . 'recordatorio/C_recordatorio/LeerRecordatorio';?>",
      dataType: "json",
      data:{recordatorio:recordatorio},
      success:function(data){
      console.log(data.resultado[0]);
          if(data.estado == 'ok'){
                $('#fechaInicio').val(data.resultado[0].fechainicio);
                $('#fechaFin').val(data.resultado[0].fechafin);
                $('#tituloRecordatorio').val(data.resultado[0].titulo);
                $('#textoRecordatorio').val(data.resultado[0].textorecordatorio);
              //document.getElementById("estado").innerHTML = data.result;
              /* Para el select*/
              $('#selectTipoRecordatorio').append($('<option>', {
                   value: data.resultado[0].id_tiporecordatorio,
                   text : data.resultado[0].descrecordatorio,
                   selected: true
               }));
              $('#selectEstadoRecordatorio').append($('<option>', {
                   value: data.resultado[0].id_tipoestadorecordatorio,
                   text : data.resultado[0].descestadorecordatorio,
                   selected: true
               }));

          }else{
            console.log("error");
              $('.user-content').slideUp();
              alert("User not found...");
          }
      }
  });
}

function estadoCampos(id){
  if (id == 1){
    actualizar.style.display = "block";
    ocultarModificar.style.display = "none";
    document.getElementById("tituloRecordatorio").disabled = false;
    document.getElementById("textoRecordatorio").disabled = false;
    document.getElementById("selectTipoRecordatorio").disabled = false;
    document.getElementById("selectEstadoRecordatorio").disabled = false;
    document.getElementById("fechaFin").disabled = false;
  }else {
    actualizar.style.display = "none";
    ocultarModificar.style.display = "block";
    document.getElementById("tituloRecordatorio").disabled = true;
    document.getElementById("textoRecordatorio").disabled = true;
    document.getElementById("selectTipoRecordatorio").disabled = true;
    document.getElementById("selectEstadoRecordatorio").disabled = true;
    document.getElementById("fechaFin").disabled = true;
  }

}
</script>
