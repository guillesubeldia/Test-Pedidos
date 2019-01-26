<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <!-- BEGIN: Subheader -->
  <!-- END: Subheader -->
  <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Listado Pedidos
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
              <a onclick="cargarCategoria()" class='btn btn-primary' title='Editar Sub Categoria' role='button'>
                <i class='la la-cart-plus'></i>Nuevo Pedido</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="m-portlet__body" id="consultaDinamica">
        <!--begin: Datatable Dinamica-->
        <!--end: Datatable Dinamica-->

      </div>
<!-- Modal Stock -->
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
<!-- Modal Stock -->

    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
  </div>
</div>
</div>
<!-- end:: Body -->

<script>
function VerPedidos() {
  $.post("<?php echo base_url() ?>/producto/C_producto/TablaPedidos",
  {},
    function(data) {
      document.getElementById('consultaDinamica').innerHTML = data; //Se muestra el resultado
      document.getElementById('consultaDinamica').style.display = "block";
      $('.dataTable').DataTable({
        "autoWidth": false,
        "lengthMenu": [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "Todos"]
        ],
        'aoColumnDefs': [{
          'bSortable': true,
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
window.onload =  VerPedidos();


</script>
