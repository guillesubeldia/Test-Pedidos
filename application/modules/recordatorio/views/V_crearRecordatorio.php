<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <div class="m-content">
    <!--begin::Portlet-->
    <div class="m-portlet">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <span class="m-portlet__head-icon">
              <i class="la la-thumb-tack m--font-success"></i>
            </span>
            <h3 class="m-portlet__head-text m--font-success">Productos / Servicios</h3>
          </div>
        </div>
      </div>


      <!-- MODAL PARA LOS MENSAJES DE ESTADO -->
                  <div id="modalMensaje" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" style="width:510px;">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> Mensaje del Sistema</h4>
                        </div>
                        <div class="modal-body"><br>
                          <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-brand alert-dismissible fade show" role="alert">
                            <div class="m-alert__icon">
                              <div id="icono">
                              <!-- <i class="flaticon-like"></i><span></span> -->
                              </div>
                            </div>
                            <div class="m-alert__text">
                              <div style="text-align:center;" id="contenidoMensaje">

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn grey-silver" data-dismiss="modal">Cerrar</button>
                        </div>
                      </div>
                    </div>
                  </div>
      <!-- MODAL PARA LOS MENSAJES DE ESTADO -->


      <form id="formularioRecordatorio" class="m-form m-form--label-align-right">
        <div class="m-portlet__body">
          <div class="m-form__section m-form__section--first">
            <div class="m-form__heading">
              <h3 class="m-form__heading-title">Informacion del Elemento:</h3>
            </div>

            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Tipo Recordatorio</label>
              <div class="col-lg-6">
                <select class="form-control m-input form-control-sm" id="id_tiporecordatorio" name="id_tiporecordatorio" required>
                  <option value="" selected disabled>Seleccione el tipo</option>
                  <?php foreach($recordatorio as $row):?>
                  <option value="<?php echo $row->id_tiporecordatorio;?>"><?php echo $row->descripcion;?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <a class="btn btn-primary" href="#" onclick="ModalTipoRecordatorio()" role="button"></i>Agregar tipo</a>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Titulo</label>
              <div class="col-lg-6">
                <input id="titulo" name="titulo" class="form-control m-input" placeholder="Titulo recordatorio" required>
                <span class="m-form__help">*Requerido</span>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Recordatorio</label>
              <div class="col-lg-6">
                <textarea id="recordatorio" name="recordatorio" class="form-control m-input" placeholder="Texto del recordatorio" required></textarea>
                <span class="m-form__help">*Requerido</span>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Fecha Inicio</label>
              <div class="col-lg-6">
                <input id="fechaInicio" name="fechaInicio" class="form-control m-input" type="date" required>
                <span class="m-form__help">*Requerido</span>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Fecha Finalizacion</label>
              <div class="col-lg-6">
                <input id="fechaFin" name="fechaFin" class="form-control m-input" type="date" required>
                <span class="m-form__help">*Requerido</span>
              </div>
            </div>
          </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
          <div class="m-form__actions m-form__actions">
            <div class="row">
              <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">
                  Enviar
                </button>
                <button type="reset" class="btn btn-secondary">
                  Cancelar
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!--end::Portlet-->
  </div>
</div>
</div>
<!-- end:: Body -->
<!-- Modal Eliminar Elemento -->
      <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <form action="<?php echo base_url() . "recordatorio/C_recordatorio/AltaTipoRecordatorio";?>" method="post" id="nuevoRecordatorio" >

        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLongTitle">Agregar Tipo Recordatorio</h5>
            </div>

              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label"><strong>&nbsp;Descripcion</strong></label></br>
                <div class="col-lg-11">
                  <input id="descripcion" name="descripcion" class="form-control m-input" placeholder="Descripcion del recordatorio..." required>
                  <span class="m-form__help">*Requerido</span>
                </div>
              </div>

            <div class="modal-footer">
              <button type="submit" onClick="" class="btn btn-primary">Aceptar</button>
            </div>
          </div>
        </form>
        </div>
      </div>
 <!-- Modal Eliminar Elemento -->
<script>
function ModalTipoRecordatorio(){
  $('#modalAgregar').modal('show');
}
// funcion cargar por medio de js
var formulario = document.getElementById("formularioRecordatorio");
formulario.addEventListener('submit',function(e){

  e.preventDefault();
  var datos = new FormData(formulario);

  fetch("<?php echo base_url() . "recordatorio/C_recordatorio/AltaRecordatorio";?>",{
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





 function MensajeEstado(data){
       if (data == 1) {
             document.getElementById("formularioRecordatorio").reset();
             document.getElementById("contenidoMensaje").innerHTML = "<strong>El elemento fue cargado Exitosamente</strong>";
             document.getElementById("icono").innerHTML = "<i class='flaticon-like'></i><span></span>";
             $('#modalMensaje').modal('show');
           }else{
             document.getElementById("contenidoMensaje").innerHTML = "<strong>Ocurrio un error!</strong>";
             document.getElementById("icono").innerHTML = "<i class='flaticon-exclamation'></i><span></span>";
             $('#modalMensaje').modal('show');
           }
 }

</script>
