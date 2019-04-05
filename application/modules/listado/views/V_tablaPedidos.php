<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pedidos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Pedidos</a></li>
      <li class="active">Listar</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de Pedidos</h3>
          </div>
          <form role="form" method="post" action="<?php echo base_url() . 'listado/C_listado/ListaFechas'?>">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-toolbar">
              <table id="tablaPedidos" class="table table-bordered table-hover">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="input-group">
                            <span class="input-group-addon">Fecha Desde</span>
                            <input type="date" class="form-control" name="fechaDesde" required>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="input-group">
                            <span class="input-group-addon">Hasta</span>
                            <input type="date" class="form-control" name="fechaHasta" required>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <button  type="submit" name="button" class="btn btn-primary pull-left" >Buscar</button>
                          </div>
                      </div>
                  </div>
                </form>
                <br>
                <thead>
                <tr>
                  <th style="text-align: center;">Fecha Ingreso</th>
                  <th>Dependencia Origen</th>
                  <th>Tipo Pedido</th>
                  <th>Titulo</th>
                  <th>Descripcion</th>
                  <th>Ver</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($pedidos)){
                  foreach ($pedidos as $pedido) {
                    $descripcionRecortado = substr($pedido->descripcion, 0, 30)."...";
                    echo '<tr>';
                      echo '<td style="vertical-align:middle;"><center>' . $pedido->fechaalta . '</center></td>';
                      echo '<td style="vertical-align:middle;"><center>' . $pedido->dependenciaOrigen . '</center></td>';
                      echo '<td style="vertical-align:middle;"><center>' . $pedido->tipoPedido . '</center></td>';
                      echo '<td style="vertical-align:middle;"><center>' . $pedido->titulo . '</center></td>';
                      echo '<td style="vertical-align:middle;">' . $descripcionRecortado. '</td>';
                      echo '<td><a class="btn btn-info" title="Ver pedido completo." href="#" onclick="MovimientosPedidos('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Ver</a></td>';
                      echo '</tr>';
                    }
                }
                ?>
                  </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
<div class="modal fade" id="modalMovimientos">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Movimientos del Pedido</h4>
    </div>
    <div class="modal-body" id="primerModal">
    <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Titulo</label>
            <input type="text" id="tituloPedido" class="form-control" readonly>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Fecha Ingreso</label>
            <input type="text" id="fechaAlta" class="form-control" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Descripcion</label>
            <textarea type="text" id="txtDescripcion" class="form-control" readonly></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 text-center" >
        <input type="hidden" id="idPedido">
        <button type="button" class="btn btn-default center-block" onClick="RecuperarElementos()">Ver Elementos</button>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Dependencia Origen</label>
            <input type="text" id="dependenciaOrigen" class="form-control" readonly>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tipo Pedido</label>
            <input type="text" id="tipoPedido" class="form-control" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" id="tablaMovimiento">
        </div>
      </div>      
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
    </div>
  </div>
  <div class="overlay" id="primerOverlay" style="display:block"> 
              <i class="fa fa-refresh fa-spin"></i>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<!-- /.modal -->
<!-- MODAL PARA AGREGAR MOVIMIENTO -->
<!-- MODAL ERROR O EXITOO -->
<div class="modal fade" id="modalElemento">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <strong><h4 class="modal-title">Elementos</h4></strong>
      </div>
      <div class="modal-body" id="cuerpoEstado">
      
      <div class="overlay" id="overlay" style="display:block"> 
              <i class="fa fa-refresh fa-spin"></i>
      </div>

        <div class="row">
          <div class="col-md-12" id="tablaElementos">
                
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick="CerrarTodo()">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- MODAL ERROR O EXITOO -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
$(document).ready(function() {
$('#tablaPedidos').DataTable({
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
function MovimientosPedidos($id){
  document.getElementById("primerOverlay").style.display = 'block';
  container = document.getElementById("primerModal");
        inputs = container.getElementsByTagName('input');
        for (index = 0; index < inputs.length; ++index) {
    	    if(inputs[index].type =="text")
            inputs[index].value = '';
            document.getElementById("tablaMovimiento").innerHTML ="";
        }

  //alert($id);
  $("#modalMovimientos").modal();
  idPedido = $id;
//carga la tabla
  $.post("<?php echo base_url() ?>/Listado/C_Listado/TablaMovimientos",
  {idPedido : idPedido},
    function(data) {
      document.getElementById("primerOverlay").style.display = 'none';
      document.getElementById('tablaMovimiento').innerHTML = data; //Se muestra el resultado
      document.getElementById('tablaMovimiento').style.display = "block";
    });
  //carga los box con la informacion del pedido
  $.ajax({
      type:'POST',
      url:"<?php echo base_url() . '/Listado/C_Listado/DatosMovimiento';?>",
      dataType: "json",
      data:{idPedido:idPedido},
      success:function(data){
          if(data.status == 'ok'){
            $('#txtDescripcion').val(data.result[0].descripcion);
            $('#idPedido').val(data.result[0].id_pedido);
            $('#tituloPedido').val(data.result[0].titulo);
            $('#fechaAlta').val(data.result[0].fechaalta);
            $('#dependenciaOrigen').val(data.result[0].dependencia);
            $('#tipoPedido').val(data.result[0].tipopedido);
          }else{
            console.log("error");
              alert("Ocurrio un problema");
          }
      }
  });
}

function RecuperarElementos(){
  document.getElementById("overlay").style.display = 'block';
  document.getElementById("tablaElementos").innerHTML ="";
  var idPedido = document.getElementById('idPedido').value;
  $("#modalElemento").modal();
  $.post("<?php echo base_url() ?>/Listado/C_Listado/TablaElementos",
  {idPedido : idPedido},
    function(data) {
      document.getElementById('tablaElementos').innerHTML = data; //Se muestra el resultado
      document.getElementById("overlay").style.display = 'none';
    });
}
function CerrarTodo(){
  $('.modal').modal('hide');
}
</script>