<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <!-- BEGIN: Subheader -->
  <!-- END: Subheader -->
  <div class="m-content">
    <div class="m-portlet m-portlet--mobile">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">
              Listado Categorias
            </h3>
          </div>
        </div>
        <div class="m-portlet__head-tools">
          <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
              <a onclick="cargarCategoria()" class='btn btn-primary' title='Editar Sub Categoria' role='button'>
                <i class='la la-cart-plus'></i>Nueva Categoria</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="m-portlet__body" id="consultaDinamica">
        <!--begin: Datatable Dinamica-->
        <!--end: Datatable Dinamica-->

      </div>

      <!--begin::Modal-->
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
                                        <select onChange="tipo()" class="form-control m-input form-control-sm" id="tipoCarga" name="tipoCarga" required>
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

<!--end::Modal-->











<div id="modalEditarCategoria" class="modal fade" tabindex="2" data-backdrop="static" data-keyboard="false" aria-hidden="true">
      <form action="<?php echo base_url() . "producto/C_producto/EditarCategoria";?>" method="post" id="formularioCategoria" class="form-horizontal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"><icon class="fa fa-users"></icon>Editar Categoria</h4>
              </div>
              <div class="modal-body" style="max-height:auto; overflow-y:auto;">
                <input type="hidden" name="idCategoria" id="idCategoria">
                <input type="hidden" name="tipoEditar" id="tipoEditar">
                <!-- Contenido que voy a cargar de los elementos -->
                  <div class="m-portlet__body">
                      <div class="m-portlet__body">
                        <div id="editarCategoriaDiv" style="display:none;">

                            <div class="form-group m-form__group row">
                              <div class="col-lg-12">
                                  <label class="col-form-label">Categoria:</label>
                                  <input type="text" class="form-control m-input" placeholder="Ingrese la descripcion" name="descripcionCategoria" id="descripcionCategoria">
                              </div>
                            </div>

                        </div>

                        <div id="editarSubCategoriaDiv" style="display:none;">

                          <div class="form-group m-form__group row">
                            <div class="col-lg-6">
                                <label class="col-form-label">Categoria:</label>
                                <select class="form-control m-input form-control-sm" id="selectCategoria" name="selectCategoria" >
                                  <option value=""></option>
                                  <?php foreach($categorias->result() as $row):?>
                                  <option value="<?php echo $row->id_tipoProductoServicio;?>"><?php echo $row->descripcion;?></option>
                                  <?php endforeach;?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="col-form-label">Sub Categoria:</label>
                                <input type="text" class="form-control m-input" placeholder="Ingrese la descripcion" name="descripcionSubCategoria" id="descripcionSubCategoria">
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

<!-- Modal eliminar categoria -->
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
<!-- Fin modal eliminar categoria -->

    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
  </div>
</div>
</div>
<!-- end:: Body -->

<script>
window.onload = function() {
  BuscarPorParametros();
}
function cargarCategoria(){
    $('#modalCategoria').modal('show');
}

 function tipo(){
   var tipo = document.getElementById("tipoCarga").value;
   if(tipo == 1){
       altaCategoria.style.display = "block";
       altaSubCategoria.style.display = "none";
       //cambiar atributos de required en los inputs
       document.getElementById("categoriaModal").required      = true;
       document.getElementById("categoriaPadreModal").required = false;
       document.getElementById("subCategoriaModal").required   = false;
   }else{
     document.getElementById("categoriaPadreModal").required = true;
     document.getElementById("subCategoriaModal").required   = true;
     document.getElementById("categoriaModal").required      = false;
     altaCategoria.style.display = "none";
     altaSubCategoria.style.display = "block";

   }
 }

function EliminarCategoria(id){
 //var idCategoria = $('#idCategoria').val();
 var idCategoria = id;
 console.log("id del categoria: "+idCategoria);
   $.ajax({
       type:'POST',
       url:"<?php echo base_url() . 'producto/C_producto/EliminarCategoria';?>",
       dataType: "json",
       data:{idCategoria:idCategoria},
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
// QUIERO HACER UN MODAL CON V_tablaProductoServicio//http://jsfiddle.net/n__o/19rhfnqm/
 function recuperarCategoria(id){
     var idCategoria = id;
       $.ajax({
           type:'POST',
           url:"<?php echo base_url() . 'producto/C_producto/testDatosInputs';?>",
           dataType: "json",
           data:{idCategoria:idCategoria},
           success:function(data){
             $('#modalEditarCategoria').modal('show');
               if(data.status == 'ok'){
                  $('#idCategoria').val(data.result[0].id_tipoProductoServicio);
                    if(data.result[0].subCategoria == ""){
                      $('#tipoEditar').val(1);
                      editar(1);
                      $('#descripcionCategoria').val(data.result[0].categoria);
                    }else{
                      $('#tipoEditar').val(2);
                      editar(2);
                      //$('#selectCategoria').val(data.result[0].categoria);
                      $('#selectCategoria').append($('<option>', {
                           value: '',
                           text : data.result[0].categoria,
                           selected: true

                       }));
                      console.log(data.result[0].categoria);
                    }
                  //$('#descripcionCategoria').val(data.result[0].categoria);
                  $('#descripcionSubCategoria').val(data.result[0].subCategoria);

               }else{
                 console.log("error");
                   $('.user-content').slideUp();
                   alert("Ocurrio un problema");
               }

           }
       });

 }

function editar(id){
  if(id == 1){
    document.getElementById("tipoEditar").value = id;
    editarCategoriaDiv.style.display     = "block";
    editarSubCategoriaDiv.style.display  = "none";
  }else{
    document.getElementById("tipoEditar").value = id;
    editarCategoriaDiv.style.display     = "none";
    editarSubCategoriaDiv.style.display  = "block";
  }

}
function BuscarPorParametros() {
  $.post("<?php echo base_url() ?>/producto/C_producto/LeerCategorias",
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
</script>
