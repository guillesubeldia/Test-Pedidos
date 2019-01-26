<style type="text/css">
    .orden {
        display:none;
    }

    #mensaje_bloquedoPublicacion {
        position: fixed;
        display:none;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
    }

    #mensaje_bloquedoPublicacion_contenido {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #D8D8D8;
        padding: 10px 20px;
    }

    .blur{
        filter: blur(6px);
        transform: scale(0.95);
    }

</style>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <div class="m-content">
      <div class="row">
          <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--full-height">
              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                  <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                      Gesti&oacute;n de Cliente/s
                    </h3>
                  </div>
                </div>
                <div class="m-portlet__head-tools">
                  <button type="button" onclick="InicializarModalAgregarCliente()" class="btn m-btn--pill m-btn--air btn-outline-primary m-btn m-btn--custom">
                    Agregar Cliente
                  </button>
                </div>
              </div>
              <div class="m-portlet__body">
      									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="m_form_2">
      										<div class="m-portlet__body" id="consultaClienteInicio">
      											<div class="form-group m-form__group row">
      												<div class="col-lg-6">
      													<label class="col-form-label">
      														Tipo de documento:
      													</label>
                                <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" data-size="4" id="selectTipoDocumento">
                                  <?php
                                  foreach ($TipoDocumentos as $i => $tipoDocumento) :
                                          echo "<option value ='" . $i . "'>" . $tipoDocumento . "</option>";
                                  endforeach
                                  ;
                                  ?>
          											</select>
      													<span class="m-form__help">
      														Seleccione tipo de documento
      													</span>
      												</div>
      												<div class="col-lg-6">
      													<label class="col-form-label">
      														N&uacute;mero:
      													</label>
                                <input type="text" class="form-control m-input" placeholder="Ingrese n&uacute;mero" onkeypress="return EsNumero(event)" id="inputNumero">
      													<span class="m-form__help">
      														Ingrese n&uacute;mero de documento
      													</span>
      												</div>
      											</div>
      											<div class="form-group m-form__group row">
      												<div class="col-lg-6">
      													<label>
      														Apellido:
      													</label>
      													<div class="m-input-icon m-input-icon--right">
      														<input type="text" class="form-control m-input" placeholder="Ingrese el apellido" onkeypress="return EsLetra(event)" id="inputApellido">
      														<span class="m-input-icon__icon m-input-icon__icon--right">
      														</span>
      													</div>
      													<span class="m-form__help">
      														Ingrese el apellido
      													</span>
      												</div>
      												<div class="col-lg-6">
      													<label class="">
      														Nombre:
      													</label>
      													<div class="m-input-icon m-input-icon--right">
      														<input type="text" class="form-control m-input" placeholder="Ingrese el nombre"  onkeypress="return EsLetra(event)" id="inputNombre">
      														<span class="m-input-icon__icon m-input-icon__icon--right">
      														</span>
      													</div>
      													<span class="m-form__help">
      														Ingrese el nombre
      													</span>
      												</div>
      											</div>
                            <div class="form-group m-form__group row">
      												<div class="col-lg-12">
                            <center>
                              <button type="button" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom" id="botonBusqueda" onclick="BuscarPorParametros()">
                                Buscar
                              </button>
                            </center>
                            </div>
                            </div>
      										</div>

                          <div class="m-portlet__body" id="consultaDinamicaCliente" style="display:none">

      										</div>

      									</form>
      									<!--Fin::Formulario-->
            </div>
          </div>
        </div>
        </div>
      </div>
  </div>

</div>

<!-- INICIO DE VENTANA MODAL DE GESTIONAR AGREGAR CLIENTE -->
<div id="modalAgregarCliente" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form accept-charset="utf-8" class="form-horizontal">
                <div class="modal-header">
                    <h4 class="modal-title"><icon class="fa fa-users"></icon> Agregar Clientes&nbsp;</h4>
                </div>
                <div class="modal-body" style="max-height:auto; overflow-y:auto;">
                
                    <div class="m-portlet__body">
                        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="m_form_2">
                            <div class="m-portlet__body" id="consultaClienteInicio">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label class="col-form-label">
                                            Tipo de documento:
                                        </label>
                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" data-size="4" id="selectTipoDocumentoAgregarPersona">
                                            <?php
                                            foreach ($TipoDocumentos as $i => $tipoDocumento) :
                                                    echo "<option value ='" . $i . "'>" . $tipoDocumento . "</option>";
                                            endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col-form-label">
                                            N&uacute;mero:
                                        </label>
                                        <input type="text" class="form-control m-input" placeholder="Ingrese n&uacute;mero" onkeypress="return EsNumero(event)" id="inputNumeroAgregarPersona">
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            Apellido:
                                        </label>
                                        <div class="m-input-icon m-input-icon--right">
                                            <input type="text" class="form-control m-input" placeholder="Ingrese el apellido" onkeypress="return EsLetra(event)" id="inputApellidoAgregarPersona">
                                            <span class="m-input-icon__icon m-input-icon__icon--right"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="">
                                            Nombre:
                                        </label>
                                        <div class="m-input-icon m-input-icon--right">
                                            <input type="text" class="form-control m-input" placeholder="Ingrese el nombre"  onkeypress="return EsLetra(event)" id="inputNombreAgregarPersona">
                                            <span class="m-input-icon__icon m-input-icon__icon--right"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label>
                                            Sexo:
                                        </label>
                                        <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" data-size="4" id="selectTipoSexoAgregarPersona">
                                            <?php
                                            foreach ($TipoSexos as $i => $tipoSexo) :
                                                    echo "<option value ='" . $i . "'>" . $tipoSexo . "</option>";
                                            endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="">
                                            Fecha de Nacimiento:
                                        </label>
                                        <div class="m-input-icon m-input-icon--right"> 
                                            <input class="form-control m-input" placeholder="Ingrese el Fecha de Nacimiento" data-provide="datepicker" data-date-format="dd/mm/yyyy" id="inputFechaAgregarPersona">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="AgregarCliente()" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Agregar</button>
                    <button type="button" class="btn m-btn--pill m-btn--air btn-outline-danger m-btn m-btn--custom" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN DE VENTANA MODAL DE GESTIONAR AGREGAR CLIENTE -->

<!-- INICIO DE VENTANA MODAL DE MENSAJE ERROR -->
<div id="modalMensajeError" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="width:510px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Mensaje del Sistema</h4>
            </div>
            <div class="modal-body"><br>

                    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                      <div class="m-alert__icon"><i class="la la-warning"></i><span></span></div>
                        <div class="m-alert__text">
                            <p style="text-align:center;" id="contenidoMensajeError"></p>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn grey-silver" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN DE VENTANA MODAL DE MENSAJE ERROR -->

<!-- INICIO DE VENTANA MODAL DE MENSAJE EXITO -->
<div id="modalMensajeExito" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" style="width:510px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Mensaje del Sistema</h4>
            </div>
            <div class="modal-body"><br>

                    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-brand alert-dismissible fade show" role="alert">
                      <div class="m-alert__icon"><i class="flaticon-exclamation-1"></i><span></span></div>
                        <div class="m-alert__text">
                            <div style="text-align:center;" id="contenidoMensajeExito"></div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="btn grey-silver" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN DE VENTANA MODAL DE MENSAJE EXITO -->

<!-- INICIO DE VENTANA DE BLOQUEO DE PANTALLA MAS CARGADOR -->
<div id="mensaje_bloquedoPublicacion">
    <div id="mensaje_bloquedoPublicacion_contenido" class="col-lg-6 m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-brand alert-dismissible fade show" role="alert">
		<div class="m-alert__icon">
			<i class="flaticon-exclamation-1"></i>
				<span></span>
		</div>
		<div class="m-alert__text">
			<strong>
                Por favor, Aguarde a que el Proceso Finalice.
			</strong>
		</div>
	</div>

</div>
<!-- FIN DE VENTANA DE BLOQUEO DE PANTALLA MAS CARGADOR -->

<script>

window.onload = function () {

}

function EsNumero(evt) {
    // Controla que lo ingresado en un input text sea solo numero
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function EsLetra(e) {
  // Controla que lo ingresado en un input text sea solo letra
  charCode = (document.all) ? e.keyCode : e.which;
  if (charCode == 8) return true;
  patron =/[A-Za-z\s]/;
  te = String.fromCharCode(charCode);
  return patron.test(te);
}

function BuscarPorParametros() {

  var tipoDocumento = document.getElementById("selectTipoDocumento").value;
  var numero        = document.getElementById("inputNumero").value;

  var apellido      = document.getElementById("inputApellido").value;
  var nombre        = document.getElementById("inputNombre").value;
      $('#mensaje_bloquedoPublicacion').fadeIn();
      $('#contenedorTotal').addClass('blur');
      $('html, body').css('overflowY', 'hidden');
      $.post("<?php echo base_url() ?>/persona/C_persona/LeerClientesParametros",
              {tipoDocumento:tipoDocumento,
               numero:numero,
               apellido:apellido,
               nombre:nombre},
      function (data) {

          document.getElementById('consultaDinamicaCliente').innerHTML = data + '<center><button type="button" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom" id="botonBusquedaNueva" onclick="NuevaBusqueda()"> Nueva Busqueda</button></center>'; //Se muestra el resultado

          document.getElementById('consultaDinamicaCliente').style.display = "block";


          $('.dataTable').DataTable({
              "autoWidth": false,
              "lengthMenu": [[3, 5, 10, 25, 50, -1], [3, 5, 10, 25, 50, "Todos"]],
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
                              "sPrevious": "<"},
                  "oAria": {
                      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"}
              },
              order: [[0, 'asc']],
              //rowsGroup: [0]
          });

          document.getElementById('botonBusqueda').style.display = "none";
          document.getElementById('consultaClienteInicio').style.display = "none";
          $('#mensaje_bloquedoPublicacion').fadeOut();
          $('#contenedorTotal').removeClass('blur');
          $('html, body').css('overflowY', 'auto');

      });


}

function NuevaBusqueda() {
    $('#mensaje_bloquedoPublicacion').fadeIn();
    $('#contenedorTotal').addClass('blur');
    $('html, body').css('overflowY', 'hidden');
    
    $('.dataTable').DataTable().destroy();

    //$("#selectTipoDocumento").select2("val", "");
    document.getElementById("inputNumero").value= "";
    document.getElementById("inputApellido").value= "";
    document.getElementById("inputNombre").value= "";
    document.getElementById('consultaDinamicaCliente').style.display = "none";
    document.getElementById('consultaClienteInicio').style.display = "block";
    document.getElementById('botonBusqueda').style.display = "block";

    $('#mensaje_bloquedoPublicacion').fadeOut();
    $('#contenedorTotal').removeClass('blur');
    $('html, body').css('overflowY', 'auto');

}

function InicializarModalEliminarCliente(identificador){
  var i = identificador;
  var id_personaHumana = document.getElementById("id_personaHumana"+i).value;
  $.post("<?php echo base_url() ?>/persona/C_persona/EliminarCliente",
              {
                  id_personaHumana: id_personaHumana
              },
      function (data) {
          if ((data === 1) || (data === '1')) {
                document.getElementById("contenidoMensajeExito").innerHTML = "<i>El cliente fue eliminado con exito</i>";
                $('#modalMensajeExito').modal('show');
              }else{
                document.getElementById("contenidoMensajeError").innerHTML = "<i>El cliente no fue Eliminado. Si continua el problema comuniquese con el Adminisrador</i>";
                $('#modalMensajeError').modal('show');
              }
      });
}

function InicializarModalAgregarCliente(){
    $("#modalAgregarCliente").modal('show');   //Mostrar el modal
}

function AgregarCliente(){
    var TipoDocumento = document.getElementById("selectTipoDocumentoAgregarPersona").value;
    var NumeroDocumento = document.getElementById("inputNumeroAgregarPersona").value;
    var Apellido = document.getElementById("inputApellidoAgregarPersona").value;
    var Nombre = document.getElementById("inputNombreAgregarPersona").value;
    var TipoSexo = document.getElementById("selectTipoSexoAgregarPersona").value;
    var FechaNacimiento = document.getElementById("inputFechaAgregarPersona").value;
            var FechaNacimientoF = FechaNacimiento.split('/');
            dia = FechaNacimientoF[0].trim();
            mes = FechaNacimientoF[1].trim();
            anio = FechaNacimientoF[2].trim();
            var FechaNacimientoFormateado = anio + '-' + mes + '-' + dia;
    var TipoPersona = '1'; // Hace referencia a Persona Humana
    var TipoRol = '4'; //Hace referencia al Cliente

                $('#mensaje_bloquedoPublicacion').fadeIn();
                $('#contenedorTotal').addClass('blur');
                $('html, body').css('overflowY', 'hidden');
                $.post("<?php echo base_url() ?>/persona/C_persona/AgregarCliente",
                        {TipoDocumento: TipoDocumento,
                            NumeroDocumento: NumeroDocumento,
                            Apellido: Apellido,
                            Nombre: Nombre,
                            TipoSexo: TipoSexo,
                            FechaNacimientoFormateado: FechaNacimientoFormateado,
                            TipoPersona: TipoPersona,
                            TipoRol: TipoRol},

                function (data) {
                    
                    //$("#selectTipoDocumentoAgregarPersona").select2("val", "");
                    document.getElementById("inputNumeroAgregarPersona").value= "";
                    document.getElementById("inputApellidoAgregarPersona").value= "";
                    document.getElementById("inputNombreAgregarPersona").value= "";
                    //$("#selectTipoSexoAgregarPersona").select2("val", "");
                    document.getElementById("inputFechaAgregarPersona").value= "";
                    
                    $('#modalAgregarCliente').modal('hide');

                    document.getElementById("selectTipoDocumento").value = TipoDocumento;
                    document.getElementById("inputNumero").value = NumeroDocumento;

                    BuscarPorParametros();
                    
                    $('#mensaje_bloquedoPublicacion').fadeOut();
                    $('#contenedorTotal').removeClass('blur');
                    $('html, body').css('overflowY', 'auto');
                });

}

</script>
