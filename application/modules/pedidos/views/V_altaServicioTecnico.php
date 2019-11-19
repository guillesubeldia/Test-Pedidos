
<!-- INICIO CUERPO -->
<div class="content-wrapper">
  <div class="content-header">
    <h1>Registro de Pedidos</h1>
    <ol class="breadcrumb">
      <li>Pedidos</li>
      <li>Registrar</li>
    </ol>
  </div>
  <!-- INICIO CONTENT -->
  <section class="content">
    <!-- INICIO ROW -->
    <div class="row">
      <div class="col-md-12">
        <!-- INICIO BOX DE REGISTRO DE pedidos -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Pedido de <strong>Servicio Tecnico</strong></h3>
          </div>
          <div class="box-body">
            <!-- INICIO FORMULARIO DE REGISTRO DE pedidos -->
            <form role="form" method="post" id="form-pedido" action="<?php echo base_url() . 'pedidos/C_pedidos/RegistrarServicioTecnico'?>">
              <div class="row">
                <div class="col-md-12">
                
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Tipo Pedido / Estado</label>
                        <select name="slcTipoPedido"  class="form-control">
                        <option value="" selected disabled>Seleccione..</option>
                          <?php foreach($tipoPedidoTecnico as $row) : 
                            echo "<option value='".$row->id_pedidotecnico."'>".$row->descripcion . "</option>";
                          endforeach;
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Personal Solicitante </label>
                        <input type="text" name="txtSolicitante" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Personal Retira </label>
                        <input type="text" name="txtRetira" class="form-control">
                      </div>
                    </div>

                  </div>
                  <hr>

                  <div class="form-group">
                    <label for="">Titulo</label>
                    <input type="text" name="txtTitulo" class="form-control">
                  </div>

                  
                  <div class="form-group">
                    <label for="">Descripcion</label>
                    <textarea type="text" name="txtDescripcion" class="form-control"></textarea>
                  </div>

                  
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Numero Servicio (*)</label>
                        <input type="text" name="txtNumeroServicio" class="form-control">
                        <span class="label label-warning">* Datos que figuran en la boleta</span>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="">Fecha Servicio (*)</label>
                        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                          <input class="form-control" type="text" readonly name="txtFechaServicio">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                        <!-- <input type="date" name="txtFechaServicio" class="form-control formateado"> -->
                      </div>
                    </div>
                  </div>        
                    
                  
                  <hr>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Dependencia de Origen</label>
                        <select name="slcDependencia" class="form-control">
                        <option value="" selected disabled>Seleccione..</option>
                          <?php foreach($dependencia as $row) : 
                            echo "<option value='".$row->id_dependencia."'>".$row->descripcion . "</option>";
                          endforeach;
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>                 
                </div>
              </div>

              <div class="row" >
                <div class="col-md-12" id="divElementos">
                  <hr>
                  <h4><strong>Lista de Elementos del Pedido</strong></h4>
                
                  <div class="table-scrollable">
                    <table id="tablaElementos" class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                        <tr>
                          <th>Elemento</th>
                          <th>Cantidad</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Numero Serie</th>
                          <th>Observacion</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <select class="form-control" name="slcElemento[]" tabindex="1">
                            <option value='' selected disabled>Seleccione ...</option>
                            <?php foreach($elemento as $row) : 
                              echo "<option value='".$row->id_elemento."'>".$row->descripcion . "</option>";
                            endforeach;
                            ?>
                            </select>
                          </td>
                          <td> <input type="text" name="txtCantidad[]" value="1" class="form-control"> </td>
                          <td> <input type="text" name="txtMarca[]" class="form-control"> </td>
                          <td> <input type="text" name="txtModelo[]" class="form-control"> </td>
                          <td> <input type="text" name="txtNumeroSerie[]" class="form-control"> </td>
                          <td> <input type="text" name="txtObservacion[]" class="form-control"> </td>
                          <td> <button type="button" class="btn btn-danger" onclick="EliminarElemento(this)">Eliminar</button> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <button type="button" class="btn btn-info pull-right" onclick="agregarElemento()">
                    <span class="glyphicon glyphicon-plus"></span>
                    &nbsp;Agregar Elemento
                  </button>
                </div>
              </div>

              
             
             
             
             
             
             
             
             
             
              </div>





            </form>
            <!-- FIN FORMULARIO DE REGISTRO DE pedidos -->
          </div>
          <div class="box-footer">
            <button type="submit" form="form-pedido" name="button" class="btn btn-primary pull-right">Finalizar</button>
          </div>
        </div>
        <!-- FIN BOX DE REGISTRO DE pedidos -->
      </div>
    </div>
    <!-- FIN ROW -->
  </section>
  <!-- FIN CONTENT -->
</div>
<!-- FIN CUERPO -->

<script type="text/javascript">


//function RecuperarElemento(){
function agregarElemento(data) {
  $.post("<?php echo base_url();?>pedidos/C_pedidos/LeerElementos",
  {},
    function(data) {
      agregarCampo(data);
  });
}

var posicionCampo = 1;
//function agregarElemento(data) {
 function agregarCampo(data){ 

  console.log(posicionCampo);
/* Declaramos una variable llamada nuevaFila y a ella le asignamos la recuperación del elemento HTML designado por el id tablaElementos. En este caso, la tabla en la que manejamos los campos dinámicamente y llamamos a la función insertRow para agregar una fila */
  nuevaFila = document.getElementById("tablaElementos").insertRow(-1);
/* Asignamos a la propiedad id de nuevaFila el valor de posicionCampo, que inicializamos en 1 */
  nuevaFila.id = posicionCampo;
/* Luego en otra variable llamada nuevaCelda, agregaremos una celda a la tabla, mediante la función insertCell */
  nuevaCelda = nuevaFila.insertCell(-1);
/* Con la celda creada, insertamos dinámicamente un campo de texto, el cual almacenaremos en un array llamado nombre, con una posición equivalente a la variable posicionCampo. Una vez terminado, repetimos la acción asignando al array respectivo */
 /*Esto lo voy a agregar para que se pueda cargar automaticamente los elementos */
  nuevaCelda.innerHTML ="<td><select name='slcElemento["+ posicionCampo +"]' id='selectDinamico' data-placeholder='Seleccione ...' class='form-control select2' required>"+data+"</select></td>";
  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML ="<td><input name='txtCantidad[" + posicionCampo + "]' value='1' type='text' class='form-control' required></td>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML ="<td><input name='txtMarca[" + posicionCampo + "]' type='text' class='form-control' required></td>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML ="<td><input name='txtModelo[" + posicionCampo + "]' type='text' class='form-control' required></td>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML ="<td><input name='txtNumeroSerie[" + posicionCampo + "]' type='text' class='form-control' required></td>";

  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML ="<td><input name='txtObservacion[" + posicionCampo + "]' type='text' class='form-control' required></td>";

/* Finalmente añadimos una última celda para las acciones y ahí agregamos un botón llamado Eliminar, el cual al ser presionado (definiendo la propiedad onClick), llamará a una función EliminarElemento, pasando como parámetro la fila correspondiente */
  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML = "<td><input type='button' value='Eliminar' onclick='EliminarElemento(this)' class='btn btn-danger'></td>";
/* Incrementamos el valor de posicionCampo para que empiece a contar de la fila siguiente */
  posicionCampo++;
  //RecuperarElemento();
  //agregarElemento();
}






/* Definimos la función EliminarElemento, la cual se encargará de quitar la fila completa del formulario. No es necesario hacer modificaciones sobre este código */
function EliminarElemento(obj) {
  var oTr = obj;
  while(oTr.nodeName.toLowerCase() != 'tr') {
      oTr=oTr.parentNode;
  }
  var root = oTr.parentNode;
  root.removeChild(oTr);
}
</script>
