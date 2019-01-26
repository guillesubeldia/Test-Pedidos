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
</div>


      <body>
      <h3 align="center">Manage Student Details</h3>
      <table border="1" align="center">
         <tr>
             <td> <input onclick="ajaxTabla()" type="button" id="display" value="Display All Data" /> </td>
         </tr>
      </table>
      <div id="responsecontainer" align="center">

      </div>
      </body>


      <div class="m-portlet__body" id="stock">
        <button onclick="testModal()">Prueba Modal Tabs</button>
      </div>
      <div class="m-portlet__body" >
        <button onclick="EliminarCategoria()">Prueba Eliminar Categoria</button>
      </div>

<input type="text" id="idCategoria" value="1">
<button id="getUser" onClick="ajaxInputs()" >Get Details</button>

<div class="user-content" style="display: block;">
    <h4>Datos Categorias</h4>
    <p>id_tipoProductoServicio: <span id="id_tipoProductoServicio"></span></p>
    <p>Categoria: <span id="categoria"></span></p>
    <p>subCategoria: <span id="subCategoria"></span></p>
</div>

<div id="modalElemento" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="true">
  <form id="formularioElemento" method="post" action="<?php echo base_url() . "producto/C_producto/ActualizarDatos";?>" class="form-horizontal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

              <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Adjusted Tabs
                        </h3>
                    </div>
                </div>
              </div>
              <div class="m-portlet__body">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#m_tabs_1_1">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">Link</a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                      <div class="form-group m-form__group row">

                        <div class="col-lg-6">
                            <label class="col-form-label">Cantidad Actual:</label>
                            <input type="text" class="form-control m-input" placeholder="Ingrese la Cantidad Actual" name="cantidadActual" id="cantidadActual" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="col-form-label">Cantidad Actual:</label>
                            <input type="text" class="form-control m-input" placeholder="Ingrese la Cantidad Actual" name="cantidadMinima" id="cantidadMinima" required>
                        </div>

                      </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">
                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>
                    <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn m-btn--pill m-btn--air btn-outline-success m-btn m-btn--custom"><i class="fa fa-check"></i> Modificar</button>
                    <button class="btn m-btn--pill m-btn--air btn-outline-danger m-btn m-btn--custom" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                </div>
            </div>

          </div>
        </div>
    </div>
    </form>
</div>

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



    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
  </div>
</div>
</div>
<!-- end:: Body -->


<!-- MODAL PARA LOS MENSAJES DE ESTADO -->

<script>
function testModal(){
    $('#modalElemento').modal('show');
}

function ajaxTabla() {
  console.log("EnviarDatos");
   $(document).ready(function() {
    $.ajax({    //create an ajax request to display.php
      type: "GET",
      url: "<?php echo base_url() . 'producto/C_producto/testDatosTablas';?>",
      dataType: "html",   //expect html to be returned
        success: function(response){
            $("#responsecontainer").html(response);
        }
    });
  });
 }

function EliminarCategoria(){
  //var idCategoria = $('#idCategoria').val();
  var idCategoria = 34;
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


 function ajaxInputs(){
   var idCategoria = $('#idCategoria').val();
   console.log("id del categoria: "+idCategoria);
     $.ajax({
         type:'POST',
         url:"<?php echo base_url() . 'producto/C_producto/testDatosInputs';?>",
         dataType: "json",
         data:{idCategoria:idCategoria},
         success:function(data){
         console.log("entro en la funcion");
             if(data.status == 'ok'){
                 $('#id_tipoProductoServicio').text(data.result[0].id_tipoProductoServicio);
                 $('#categoria').text(data.result[0].categoria);
                 $('#subCategoria').text(data.result[0].subCategoria);
                 $('.user-content').slideDown();
             }else{
               console.log("error");
                 $('.user-content').slideUp();
                 alert("User not found...");
             }

         }
     });
 }





</script>
