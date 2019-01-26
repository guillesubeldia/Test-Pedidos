<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <!-- BEGIN: Subheader -->
  <!-- END: Subheader -->
  <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Listado Productos/Servicios
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
                <a href="<?php echo base_url()."producto/C_producto/CargarProductoServicio";?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air" title='Nuevo Producto/Servicio'>
                  <span><i class="la la-cart-plus"></i>
                    <span>
                      Nuevo Elemento
                    </span>
                  </span>
                </a>
            </li>
          </ul>
        </div>
      </div>


      <div id="modalStock" class="modal fade" tabindex="2" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <form method="post" action="<?php echo base_url() . "producto/C_producto/ActualizarStock";?>" class="form-horizontal">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title"><icon class="fa fa-users"></icon> Editar Stock&nbsp;</h4>
                      </div>
                      <div class="modal-body" style="max-height:auto; overflow-y:auto;">
                        <!-- Contenido que voy a cargar de los elementos -->
                        <div id="contenido" style="display:none;">
                          <div class="m-portlet__body">
                              <!-- <form id="formulario" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed"> -->
                                <input type="hidden" name="id_stock" id="id_stock">
                                <input type="hidden" name="recargar" id="recargar">
                                  <div class="m-portlet__body">
                                      <div class="form-group m-form__group row">
                                          <div class="col-lg-12">
                                              <label class="col-form-label">Producto:</label>
                                              <input type="text" class="form-control m-input" placeholder="Ingrese el nombre"  id="descripcion" name="descripcion" disabled required>
                                          </div>
                                      </div>
                                      <div class="form-group m-form__group row">

                                        <div class="col-lg-6">
                                            <label class="col-form-label">Cantidad Actual:</label>
                                            <input type="text" class="form-control m-input" placeholder="Ingrese la Cantidad Actual" name="cantidadActual" id="cantidadActual" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-form-label">Cantidad Minima:</label>
                                            <input type="text" class="form-control m-input" placeholder="Ingrese la Cantidad Actual" name="cantidadMinima" id="cantidadMinima" required>
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
                          <button type="submit" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Modificar</button>
                          <button class="btn m-btn--pill m-btn--air btn-outline-danger m-btn m-btn--custom" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                      </div>
              </div>
          </div>
          </form>
      </div>



      <div id="modalElemento" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <form id="formularioElemento" method="post" action="<?php echo base_url() . "producto/C_producto/ActualizarDatos";?>" class="form-horizontal">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">

                      <div class="modal-header">
                          <h4 class="modal-title"><icon class="fa fa-users"></icon> Editar Elemento&nbsp;</h4>
                      </div>
                      <div class="modal-body" style="max-height:auto; overflow-y:auto;">
                        <!-- Contenido que voy a cargar de los elementos -->
                        <div id="contenido" style="display:none;">
                          <div class="m-portlet__body">

                                <input type="hidden" name="idElemento" id="idElemento">
                                  <div class="m-portlet__body">
                                      <div class="form-group m-form__group row">
                                          <div class="col-lg-6">
                                              <label class="col-form-label">Tipo de Elemento:</label>
                                              <select class="form-control m-bootstrap-select m_selectpicker" data-size="4" onchange="VerElemento()" id="tipoElemento" name="tipoElemento" required>

                                                <option value="1">Producto</option>
                                                <option value="2">Servicio</option>
                                              </select>
                                          </div>
                                          <div class="col-lg-6">
                                              <label class="col-form-label">Nombre:</label>
                                              <input type="text" class="form-control m-input" placeholder="Ingrese el nombre"  id="nombreElemento" name="nombreElemento" required>
                                          </div>
                                      </div>

                                      <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label class="col-form-label">Categoria</label>
                                            <select class="form-control m-bootstrap-select m_selectpicker" data-size="4" id="categoriaPadre"  name="categoriaPadre" required>

                                              <?php foreach($categorias->result() as $row):?>
                                              <option value="<?php echo $row->id_tipoProductoServicio;?>"><?php echo $row->descripcion;?></option>
                                              <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-form-label">Sub-Categoria</label>
                                            <select class="form-control m-input form-control-sm" data-size="4"  id="subCategoria" name="subCategoria" required>
                                              <option value="" disabled>Seleccione una Sub Categoria</option>
                                            </select>
                                        </div>
                                      </div>

                                      <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label class="col-form-label">Codigo Producto:</label>
                                            <input type="text" class="form-control m-input" placeholder="Ingrese el Codigo" name="cups" id="codigoElemento" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-form-label">Precio Final:</label>
                                            <input type="text" class="form-control m-input" placeholder="Ingrese el Precio Final" onkeyup="Calculo(2)" name="precioVenta" id="precioVenta" required>
                                        </div>
                                      </div>
                                    <div id="elementoProducto" style="display:none;">
                                      <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label class="col-form-label">Precio de Costo:</label>
                                            <input type="text" class="form-control m-input" placeholder="Ingrese el Precio" name="precioCosto" id="precioCosto" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="col-form-label">Porcentaje de ganancia:</label>
                                            <input type="text" class="form-control m-input" placeholder="Ingrese la Ganancia" onkeyup="Calculo(1)" name="ganancia" id="ganancia" required>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

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
                          <button type="submit" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Modificar</button>
                          <button class="btn m-btn--pill m-btn--air btn-outline-danger m-btn m-btn--custom" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                      </div>
              </div>
          </div>
          </form>
      </div>

<!-- Modal Eliminar Elemento -->
      <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Categoria</h5>

            </div>
            <div class="modal-body" id="estado">

            </div>
            <div class="modal-footer">

              <button type="button" onClick="window.location.reload()" class="btn btn-primary">Aceptar</button>
            </div>
          </div>
        </div>
      </div>
 <!-- Modal Eliminar Elemento -->

      <div class="m-portlet__body" id="consultaDinamica">
        <!--begin: Datatable -->

      </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
  </div>
</div>
</div>
<!-- end:: Body -->

<script>
$(document).ready(function() {
  BuscarPorParametros();
    console.log( "ready!" );
});
// window.onload = function(){
//   BuscarPorParametros();
// }

function BuscarPorParametros() {
  $.post("<?php echo base_url() ?>/producto/C_producto/LeerProductoServicio",
  {  },
    function(data) {
      document.getElementById('consultaDinamica').innerHTML = data; //Se muestra el resultado
      document.getElementById('consultaDinamica').style.display = "block";

      $('.dataTable').DataTable({
        "autoWidth": true,
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
    });
}


//funciones para los que seria editar aTargets

function ModalEditar(elemento){
  document.getElementById("formularioElemento").reset();
var url = "<?php echo base_url() ;?>/producto/C_producto/EditarProductoServicio/" + elemento;
var select = document.getElementById("categoriaPadre");
fetch(url)
  .then((res) => res.json())
  .then((data) => {
    //mostrar el modal y rellenar los datos
    document.getElementById("idElemento").value               = data[0].id_productoServicio;
    document.getElementById("tipoElemento").value             = data[0].id_tipoContenedor;
      if(data[0].id_tipoContenedor != 0){
        console.log(data[0].id_tipoContenedor);
        VerElemento(data[0].id_tipoContenedor);
      }
    document.getElementById("nombreElemento").value           = data[0].descripcion;
    document.getElementById("codigoElemento").value           = data[0].cups;
    document.getElementById("precioCosto").value              = data[0].precioCosto;
    document.getElementById("ganancia").value                 = data[0].ganancia;
    document.getElementById("precioVenta").value              = data[0].precioVenta;



    document.getElementById("categoriaPadre").value                  = data[0].idPadre;
    document.getElementById("subCategoria").value                    = data[0].idHijo;
    //document.getElementById("descripcionHijo").value          = data[0].descripcionHijo;

    contenido.style.display = "block";
    mensajeEstado.style.display = "none";
    $('#modalElemento').modal('show');
  })
  .catch(error => {
    //mostrar modal con mensaje de error
    console.log(error);
    contenido.style.display = "none";
    mensajeEstado.style.display = "block";
    document.getElementById("contenidoMensaje").innerHTML = "<strong>Ocurrio un error!</strong>";
    document.getElementById("icono").innerHTML = "<i class='flaticon-exclamation'></i><span></span>";
    $('#modalElemento').modal('show');
  })
}

//modal para editar el Stock
function ModalStock(elemento){
var url = "<?php echo base_url() ;?>/producto/C_producto/GestionarStock/" + elemento;
fetch(url)
  .then((res) => res.json())
  .then((data) => {
    //mostrar el modal y rellenar los datos
    document.getElementById("id_stock").value         = data[0].id_stock;
    document.getElementById("recargar").value         = 'GestionarProductoServicio';
    document.getElementById("descripcion").value      = data[0].descripcion;
    document.getElementById("cantidadMinima").value   = data[0].cantidadMinima;
    document.getElementById("cantidadActual").value   = data[0].cantidadActual;
    if (data[0].estado == 1){
      document.getElementById("cantidadActual").disabled = false;
    }else{
        document.getElementById("cantidadActual").disabled = true;
    }
    contenido.style.display = "block";
    $('#modalStock').modal('show');
  })
  .catch(error => {
    //mostrar modal con mensaje de error
    console.log(error);
    mensajeEstado.style.display = "block";
    document.getElementById("contenidoMensaje").innerHTML = "<strong>Ocurrio un error!</strong>";
    document.getElementById("icono").innerHTML = "<i class='flaticon-exclamation'></i><span></span>";
    $('#modalStock').modal('show');
  })
}
/*Funcion para cargar un select dependiente de otro.*/
$(document).ready(function () {
  $("#categoriaPadre").change(function () {
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

function Calculo(tipo){
  var precioCosto =   parseFloat(document.getElementById("precioCosto").value);//porcentaje de ganancia
  var porcentaje =   parseFloat(document.getElementById("ganancia").value);//porcentaje de ganancia
  var precioVentaFinal =   parseFloat(document.getElementById("precioVenta").value);//precio final de venta

  if(tipo == 1){//quiero calcular el final
    // var porcentajeFinal = precioCosto + ((porcentaje * precioCosto) / 100);
    var calculoFinal = precioCosto + ( (precioCosto * porcentaje ) / 100 );
    document.getElementById("precioVenta").value = calculoFinal;
  }else{//quiero calcular el porcentaje
    var porcentajeFinal = ( (precioVentaFinal * 100) / precioCosto) - 100;
    document.getElementById("ganancia").value = porcentajeFinal.toFixed(2);
  }
}

function VerElemento(tipo) {
  var elemento = document.getElementById("tipoElemento").value;
  //alert (elemento);
  if (elemento == 1 || tipo == 1) {
    elementoProducto.style.display = "block";
    document.getElementById("precioCosto").required = true;
    document.getElementById("ganancia").required = true;
  } else {
    elementoProducto.style.display = "none";
    document.getElementById("precioCosto").required = false;
    document.getElementById("ganancia").required = false;
  }
}

function EliminarCategoria(id){
  var idElemento = id;
    $.ajax({
        type:'POST',
        url:"<?php echo base_url() . 'producto/C_producto/EliminarElemento';?>",
        dataType: "json",
        data:{idElemento:idElemento},
        success:function(data){
            if(data.status == 'ok'){
              //pasar el json con tags de html y que realice los cambios
              document.getElementById("estado").innerHTML = data.result;
            }else{
                console.log("error");
              document.getElementById("estado").innerHTML = data.result;
            }
            $('#modalEliminar').modal('show');
        }
    });
}
</script>
