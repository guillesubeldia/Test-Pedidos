<script>
function CargaRecordatoriosNuevos() {
  $.post("<?php echo base_url() . 'recordatorio/C_recordatorio/TablaNuevos';?>",
  {},
    function(data) {
      document.getElementById('consultaDinamicaNuevo').innerHTML = data; //Se muestra el resultado
      document.getElementById('consultaDinamicaNuevo').style.display = "block";
    });
}
window.onload = CargaRecordatoriosNuevos();
</script>
  <div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="m-portlet">
          <div class="m-portlet__head">
              <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                      <h3 class="m-portlet__head-text">
                          Recordatorio
                      </h3>
                  </div>
              </div>
              <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                  <li class="m-portlet__nav-item">
                      <a href="<?php echo base_url()."recordatorio/C_recordatorio/CrearRecordatorio";?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air" title='Nuevo Producto/Servicio'>
                        <span><i class="la la-bell"></i>
                          <span>
                            Nuevo Recordatorio
                          </span>
                        </span>
                      </a>
                  </li>
                </ul>
              </div>
          </div>
          <div class="m-portlet__body">
              <ul class="nav nav-pills" role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active show" data-toggle="tab" href="#m_tabs_3_1">Iniciados/Nuevos</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" onClick="TablaCurso()" href="#m_tabs_3_2">En curso</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" onClick="TablaFin()" href="#m_tabs_3_3">Finalizado</a>
                  </li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane active show" id="m_tabs_3_1" role="tabpanel">
                    <div class="m-portlet__body" id="consultaDinamicaNuevo">
                      <!--begin: Datatable -->
                    </div>
                  </div>
                  <div class="tab-pane" id="m_tabs_3_2" role="tabpanel">
                    <div class="m-portlet__body" id="consultaDinamicaCurso">
                      <!--begin: Datatable -->
                    </div>
                  </div>
                  <div class="tab-pane" id="m_tabs_3_3" role="tabpanel">
                    <div class="m-portlet__body" id="consultaDinamicaFin">
                      <!--begin: Datatable -->
                    </div>
                  </div>
              </div>

<!-- MODAL PARA ACTUALIZAR -->
<div id="modalActualizar" class="modal fade" tabindex="2" data-backdrop="static" data-keyboard="false" aria-hidden="true">
                <!-- <form method="post" action="<?php //echo base_url() . "recordatorio/C_recordatorio/ActualizarRecordatorio";?>" class="form-horizontal"> -->
                <form id="formulario" class="form-horizontal">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title"><icon class="fa fa-users"></icon> Editar Recordatorio&nbsp;</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body" style="max-height:auto; overflow-y:auto;">
                                <!-- Contenido que voy a cargar de los elementos -->
                                <div id="contenido" style="display:show;">
                                  <div class="m-portlet__body">
                                      <!-- <form id="formulario" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"> -->
                                      <input type="hidden" id="id_recordatorio" name="id_recordatorio">
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
                                                      <?php foreach($estadoRecordatorio as $row):?>
                                                      <option value="<?php echo $row->id_tipoestadorecordatorio;?>"><?php echo $row->descripcion;?></option>
                                                      <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                              <div class="col-lg-6">
                                                  <label class="col-form-label">Tipo Recordatorio:</label>
                                                  <select class="form-control m-input form-control-sm" id="selectTipoRecordatorio" name="selectTipoRecordatorio" required disabled>
                                                    <option value="" disabled>Seleccione el tipo</option>
                                                    <?php foreach($tipoRecordatorio as $row):?>
                                                    <option value="<?php echo $row->id_tiporecordatorio;?>"><?php echo $row->descripcion;?></option>
                                                    <?php endforeach;?>
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
                                      <button onclick="EnviarDatos()" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Actualizar</button>
                                    </div>
                                    <div id="ocultarModificar" style="display:block;">
                                      <a onclick="EstadoCampos(1)" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Modificar</a>
                                    </div>

                                    <button id="botonCancelar" type="button" onclick="EstadoCampos(2)" class="btn m-btn--pill m-btn--air btn-outline-danger m-btn m-btn--custom" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                                </div>

                              </div>
                      </div>
                  </div>
                  </form>
              </div>
<!-- MODAL PARA ACTUALIZAR -->

<!-- MODAL PARA ELIMINAR -->
<div id="modalEliminar" class="modal fade" tabindex="1" role="dialog" aria-hidden="true">
  <form id="formularioFinalizar" class="form-horizontal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Finalizar Recordatorio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              <input type="hidden" name="idRecordatorioFinalizar" id="idRecordatorioFinalizar">
    			  	<strong>Atencion!</strong> ¿Esta seguro que desea finalizar el recordatorio?.
     				</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" onclick="FinalizarRecordatorio()" class="btn btn-primary">Finalizar</button>
          </div>
        </div>
    </div>
  </form>
</div>
<!-- MODAL PARA ELIMINAR -->
          </div>
      </div>
    </div>
  </div>
</div>
<!-- end:: Body -->

<script>
window.onload = function() {
  CargaRecordatoriosNuevos();
  $('.dataTable').DataTable({
    "autoWidth": false,
    "lengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "Todos"]
    ],
    'aoColumnDefs': [{
      'bSortable': false,
      'aTargets': ['noSort']
    }],
    "language": {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "<<",
        "sLast": ">>",
        "sNext": ">",
        "sPrevious": "<"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    },
  });
}

function TablaCurso(){
  $.post("<?php echo base_url() ?>/recordatorio/C_recordatorio/TablaRecordatoriosCurso",
  {},
    function(data) {
      document.getElementById('consultaDinamicaCurso').innerHTML = data; //Se muestra el resultado
      document.getElementById('consultaDinamicaCurso').style.display = "block";
    });
}
function TablaFin(){
  $.post("<?php echo base_url() ?>/recordatorio/C_recordatorio/TablaRecordatoriosFinalizados",
  {},
    function(data) {
      document.getElementById('consultaDinamicaFin').innerHTML = data; //Se muestra el resultado
      document.getElementById('consultaDinamicaFin').style.display = "block";
    });
}
//Falta desarrollar
function ModalFinalizar(id){

  var recordatorio = id;

  $('#modalEliminar').modal('show');
  $('#idRecordatorioFinalizar').val(recordatorio);
}

function FinalizarRecordatorio(){
  var finalizarRecordatorio = document.getElementById('idRecordatorioFinalizar').value;
  $.ajax({
      type:'POST',
      url:"<?php echo base_url() . 'recordatorio/C_recordatorio/FinalizarRecordatorio';?>",
      dataType: "json",
      data:{finalizarRecordatorio:finalizarRecordatorio},
      success:function(data){
        window.location.reload();
      }
  });


}

function LeerRecordatorio(id){
  EstadoCampos(2);
  $('#modalActualizar').modal('show');
 var recordatorio = id;
  $.ajax({
      type:'POST',
      url:"<?php echo base_url() . 'recordatorio/C_recordatorio/LeerRecordatorio';?>",
      dataType: "json",
      data:{recordatorio:recordatorio},
      success:function(data){
          //if(data.estado == 'ok'){
                $('#id_recordatorio').val(data.resultado[0].id_recordatorio);
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
          //}
      }
  });
}
function EstadoCampos(id){
  contenido.style.display = "block";
  mensajeEstado.style.display = "none";
  botonCancelar.innerHTML= "Cancelar";

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

/*Funciones que todavia no funcionan :(*/
function EnviarDatos(){
  var formulario = document.getElementById('formulario');
  formulario.addEventListener('submit',function(e){
  e.preventDefault();
  var datos = new FormData(formulario);


  fetch("<?php echo base_url() . "recordatorio/C_recordatorio/ActualizarRecordatorio";?>",{
    method : 'POST',
    body : datos
  })
  .then (res => res.json())
  .then (data => {
      if (data.estado == "1"){
        MensajeEstado(data.estado);
      }else{
        MensajeEstado(data.estado);
      }
  })
});
}

function MensajeEstado(data){
if (data == 1) {
      document.getElementById('botonCancelar').innerHTML= "Cerrar";
      botonCancelar.onclick = window.location.reload();
      ocultarModificar.style.display = "none";
      actualizar.style.display = "none";
      document.getElementById("contenido").style.display = "none";
      document.getElementById("mensajeEstado").style.display = "block";
      document.getElementById("formulario").reset();
      document.getElementById("contenidoMensaje").innerHTML = "<strong>El elemento fue actualizado Exitosamente</strong>";
      document.getElementById("icono").innerHTML = "<i class='flaticon-like'></i><span></span>";
      $('#modalActualizar').modal('show');
    }else{
      document.getElementById('botonCancelar').innerHTML= "Cerrar";
      ocultarModificar.style.display = "none";
      actualizar.style.display = "none";
      document.getElementById("contenido").style.display = "none";
      document.getElementById("mensajeEstado").style.display = "block";
      document.getElementById("contenidoMensaje").innerHTML = "<strong>Ocurrio un error!</strong>";
      document.getElementById("icono").innerHTML = "<i class='flaticon-exclamation'></i><span></span>";
      $('#modalActualizar').modal('show');
    }
}
</script>
