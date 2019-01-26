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

      <form id="formularioProducto" name="formularioProducto" class="m-form m-form--label-align-right">
        <div class="m-portlet__body">
          <div class="m-form__section m-form__section--first">
            <div class="m-form__heading">
              <h3 class="m-form__heading-title">Informacion del Elemento:</h3>
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

            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Elemento a Cargar</label>
              <div class="col-lg-6">
                <select class="form-control m-input form-control-sm" onchange="VerElemento()" id="tipoElemento" name="tipoElemento" required>
                  <option value="" selected disabled>Seleccione</option>
                  <option value="1">
                    Producto
                  </option>
                  <option value="2">
                    Servicio
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Categoria</label>
              <div class="col-lg-6">
                <select class="form-control m-input form-control-sm" id="categoriaPadre" name="categoriaPadre" required>
                  <option value="" selected disabled>Seleccione una Categoria</option>
                  <?php foreach($categorias->result() as $row):?>
                  <option value="<?php echo $row->id_tipoProductoServicio;?>"><?php echo $row->descripcion;?></option>
                  <?php endforeach;?>
                </select>
              </div>
              <a class="btn btn-primary" href="#" onclick="ModalCategoria()" role="button"></i>Agregar Categoria</a>
            </div>

            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">
            Sub Categoria
          </label>
              <div class="col-lg-6">
                <select class="form-control m-input form-control-sm" id="subCategoria" name="subCategoria" required>
                    <option value="" selected disabled>Seleccione una Sub Categoria</option>
                </select>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Descripcion</label>
              <div class="col-lg-6">
                <input id="nombreElemento" name="nombreElemento" class="form-control m-input" placeholder="Nombre del Producto" required>
                <span class="m-form__help">*Requerido</span>
              </div>
            </div>

            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Código Producto</label>
              <div class="col-lg-6">
                <input id="codigoElemento" name="cups" class="form-control m-input" placeholder="Codigo del Producto" required>
                <span class="m-form__help">*</span>
              </div>
            </div>
<!-- INICIO DIV OCULTA/Muestra -->
            <div id="elementoProducto" style="display:none;">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Precio Costo</label>
                <div class="col-lg-6">
                  <input name="precioCosto" id="precioCosto" class="form-control m-input" placeholder="Precio de Costo" required>
                  <span class="m-form__help">*</span>
                </div>
              </div>

              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Porcentaje de ganancia</label>
                <div class="col-lg-6">
                  <input name="ganancia" id="ganancia" class="form-control m-input" placeholder="Porcentaje de ganancia" onkeyup="Calculo(1)" required>
                  <span class="m-form__help">*</span>
                </div>
              </div>

            </div>
<!-- FIN DIV OCULTA/Muestra -->
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Precio Final</label>
              <div class="col-lg-6">
                <input name="precioVenta" id="precioVenta" class="form-control m-input" placeholder="Precio de Venta" onkeyup="Calculo(2)" required>
                <span class="m-form__help">*</span>
              </div>
            </div>
          </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
          <div class="m-form__actions m-form__actions">
            <div class="row">
              <div class="col-lg-6">
                <button onclick="EnviarDatos()" class="btn btn-primary">
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

<!-- MODAL DE CATEGOORIA -->
<div id="modalCategoria" class="modal fade" tabindex="2" data-backdrop="static" data-keyboard="false" aria-hidden="true">
      <form action="<?php echo base_url() . "producto/C_producto/AltaCategoria";?>" method="post" id="formularioCategoria" class="form-horizontal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"><icon class="fa fa-users"></icon>Cargar Categoria</h4>
              </div>
              <div class="modal-body" style="max-height:auto; overflow-y:auto;">
                <!-- Contenido que voy a cargar de los elementos -->
                  <div class="m-portlet__body">
                      <div class="m-portlet__body">
                          <div class="form-group m-form__group row">
                              <div class="col-lg-12">
                                  <label class="col-form-label">Tipo de carga:</label>
                                  <select onChange="Tipo()" class="form-control m-input form-control-sm" id="tipoCarga" name="tipoCarga" required>
                                    <option value="" selected disabled>Seleccione</option>
                                    <option value="1">Categoria</option>
                                    <option value="2">SubCategoria</option>
                                  </select>
                              </div>
                          </div>
                        <div id="altaCategoria" style="display:none;">
                          <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label class="col-form-label">Categoria:</label>
                                <input type="text" class="form-control m-input" placeholder="Ingrese la descripcion" name="categoria" id="categoriaModal">
                            </div>
                          </div>
                        </div>
                          <div id="altaSubCategoria" style="display:none;">
                          <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label class="col-form-label">Categoria:</label>
                                <select class="form-control m-input form-control-sm" id="categoriaPadreModal" name="categoriaPadre" >
                                  <option value="" selected disabled>Seleccione una Categoria</option>
                                  <?php foreach($categorias->result() as $row):?>
                                  <option value="<?php echo $row->id_tipoProductoServicio;?>"><?php echo $row->descripcion;?></option>
                                  <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Sub Categoria:</label>
                                <input type="text" class="form-control m-input" placeholder="Ingrese la descripcion" name="subCategoria" id="subCategoriaModal">
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Enviar</button>
                <button class="btn m-btn--pill m-btn--air btn-outline-danger m-btn m-btn--custom" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
              </div>
            </div>
        </div>
      </form>
    </div>
    <!-- MODAL DE CATEGOORIA -->

<script>
/*Funcion para cargar un select dependiente de otro.*/
$(document).ready(function () {
  $("#categoriaPadre").change(function () {
    //console.log("funca");
      $("#categoriaPadre option:selected").each(function () {
          categoriaPadre = $('#categoriaPadre').val();
          $.post("<?php echo base_url();?>producto/C_producto/BuscarsubCategoria", {
              categoriaPadre: categoriaPadre
          }, function (data) {
              $("#subCategoria").html(data);
          });
      });
  });
});

function EnviarDatos(){
  var formularioProducto = document.getElementById('formularioProducto');
  formularioProducto.addEventListener('submit',function(e){
  e.preventDefault();
  var datos = new FormData(formularioProducto);
//console.log(datos.get("nombreElemento"));
/*
for (var value of datos.values()) {
console.log(value);
}*/
  fetch("<?php echo base_url()."producto/C_producto/AltaProductoServicio";?>",{
    cache: 'reload',
    //https://developer.mozilla.org/en-US/docs/Web/API/Request/cache
    method : 'POST',
    body : datos
  })

  .then (res => res.json())
  .then (data => {
      if (data.estado == "1"){
        //console.log("estado 1");
        MensajeEstado(data.estado);
      }else{
        console.log("estado 2");
        //MensajeEstado(data.estado);
      }  })

    .catch(function(error){
          alert('entrando a catch');
          alert("error"+error);
          console.log("error"+error);
          console.error("error trow"+errorThrown);
      })
});
}


function Calculo(tipo){
  var precioCosto =   parseFloat(document.getElementById("precioCosto").value);//porcentaje de ganancia
  var porcentaje =   parseFloat(document.getElementById("ganancia").value);//porcentaje de ganancia
  var precioVentaFinal =   parseFloat(document.getElementById("precioVenta").value);//precio final de venta
  // console.log(precioCosto);
  // console.log(porcentaje);
  // console.log(precioVentaFinal);
  if(tipo == 1){//quiero calcular el final
    // var porcentajeFinal = precioCosto + ((porcentaje * precioCosto) / 100);
    var calculoFinal = precioCosto + ( (precioCosto * porcentaje ) / 100 );
    document.getElementById("precioVenta").value = calculoFinal;
  }else{//quiero calcular el porcentaje
    var porcentajeFinal = ( (precioVentaFinal * 100) / precioCosto) - 100;
    document.getElementById("ganancia").value = porcentajeFinal.toFixed(2);
  }
}

  function VerElemento() {
    var elemento = document.getElementById("tipoElemento").value;
    //alert (elemento);
    if (elemento == 1) {
      elementoProducto.style.display = "block";
      document.getElementById("precioCosto").required = true;
      document.getElementById("ganancia").required = true;
    } else {
      elementoProducto.style.display = "none";
      document.getElementById("precioCosto").required = false;
      document.getElementById("ganancia").required = false;
    }
  }



 function ModalCategoria(){
   altaCategoria.style.display = "none";
   altaSubCategoria.style.display = "none";
   document.getElementById("formularioCategoria").reset();
   $('#modalCategoria').modal('show');
 }


 function MensajeEstado(data){
       if (data == 1) {
             document.getElementById("formularioProducto").reset();
             document.getElementById("contenidoMensaje").innerHTML = "<strong>El elemento fue cargado Exitosamente</strong>";
             document.getElementById("icono").innerHTML = "<i class='flaticon-like'></i><span></span>";
             $('#modalMensaje').modal('show');
           }else{
             document.getElementById("contenidoMensaje").innerHTML = "<strong>Ocurrio un error!</strong>";
             document.getElementById("icono").innerHTML = "<i class='flaticon-exclamation'></i><span></span>";
             $('#modalMensaje').modal('show');
           }
 }

 function Tipo(){
   var tipo = document.getElementById("tipoCarga").value;
   console.log(tipo);
   if(tipo == 1){
      console.log("cambio categoria");
       altaCategoria.style.display = "block";
       altaSubCategoria.style.display = "none";
       //cambiar atributos de required en los inputs
       document.getElementById("categoriaModal").required      = true;
       document.getElementById("categoriaPadreModal").required = false;
       document.getElementById("subCategoriaModal").required   = false;
   }else{
     console.log("cambio subcategoria");
     document.getElementById("categoriaPadreModal").required = true;
     document.getElementById("subCategoriaModal").required   = true;
     document.getElementById("categoriaModal").required      = false;
     altaCategoria.style.display = "none";
     altaSubCategoria.style.display = "block";

   }
 }



</script>
