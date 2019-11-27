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


          <!-- /.box-header -->

        <form role="form" method="post" action="<?php echo base_url() . 'pedidos/C_pedidos/ListaFechas'?>">
          <div class="box-body">
            <?php if (isset($exito) && $exito == true): ?>
            <div class="callout callout-success">
              ¡La operaci&oacute;n se ha completado satisfactoriamente!
            </div>
            <?php endif ?>
            <div class="table-toolbar">
              <table id="tablaPedidos" class="table table-bordered table-hover">
                <!-- <div class="row">
                    <div class="col-md-2">
                        <div class="btn-group">
                            <a href="<?php //echo base_url().'Pedidos/C_pedidos/CargarPedido'?>" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Nuevo Pedido
                            </a>
                        </div>
                    </div>
                </div> -->
                
          <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                  <div id="datepicker" class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                    <input class="form-control" type="text" name="fechaDesde" readonly>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> Desde</span>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group">
                  <div id="datepicker" class="input-group date datepicker" data-date-format="mm-dd-yyyy">
                    <input class="form-control" type="text" name="fechaHasta" readonly>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> Hasta</span>
                  </div>
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
                  <th>Acciones</th>
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
                    echo '<td>';
                      echo '<a class="btn btn-primary" title="Editar datos." href="'.base_url().'Pedidos/C_pedidos/EditarPedido/'.$pedido->id_pedido.'" role="button"><i class="la la-pencil"></i>Editar</a> ';
                      echo '<a class="btn btn-info" title="Ver pedido completo." href="#" onclick="MovimientosPedidos('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Ver</a> ';
                      //echo '<a class="btn btn-success" title="Ver movimientos del pedido." href="#" onclick="MovimientosPedidos('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Movimientos</a> ';
                    echo '</td>';
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
    <div class="modal-body">

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
            <label>Personal Solicitante</label>
            <input type="text" id="solicita" class="form-control" readonly>
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

      <div class="row" id="divEstadoPedidoTecnico">
        <div class="col-md-6">
          <label for="">Estado Pedido Tecnico</label>        
          <input type="text" name="pedidoTecnico" id="pedidoTecnico" class="form-control" disabled>

        </div>
      </div>

      

      <div class="row"><br>
        <div class="col-md-12 text-center">
          <button type="button" aling="center" onclick="NuevoMovimiento()" class="btn btn-success">Nuevo Movimiento</button>
        </div>

      </div>


      <div class="row">
        <div class="col-md-12" id="tablaMovimiento">

        </div>
      </div>


      <div class="mensajeError" id="mensajeError" style="display:none;">
          <div class="alert alert-danger" role="alert">
            <strong>¡Error!</strong>Haga click en nuevo movimiento para agregar mas datos.
          </div>
      </div>
        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
      <button type="button" class="btn btn-primary">Aceptar</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL PARA AGREGAR MOVIMIENTO -->

<div class="modal fade" id="modalNuevoMovimiento">
  <div class="modal-dialog">
  <form role="form" method="post" id="form-movimiento" action="<?php echo base_url() . 'pedidos/C_pedidos/NuevoMovimiento'?>">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalle de movimientos del pedido.</h4>
      </div>

      <div class="modal-body">
      <input type="hidden" name="idPedido" id="idPedido">
      <input type="hidden" name="idtipoPedido" id="idtipoPedido">

      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Estado Movimiento</label>
              <select class="form-control" name="slctEstadoMovimiento" required>
              <?php foreach($estadoPedido as $row) :
                if($row->id_estadopedido == 2){
                  echo "<option value='".$row->id_estadopedido."' selected>".$row->descripcion . "</option>";
                }
                echo "<option value='".$row->id_estadopedido."'>".$row->descripcion . "</option>";
              endforeach;
              ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Fecha Movimiento</label>
              <input type="date" id="fechaMovimiento" name="fechaMovimiento" class="form-control" required>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label>Tipo Movimiento</label>
              <select class="form-control" onChange="selectTipoMovimiento(this);" name="slctTipoMovimiento" id="slctTipoMovimiento" required>
              <?php foreach($tipoMovimiento as $row) :
                if($row->id_tipomovimiento == 3){
                  echo "<option value='".$row->id_tipomovimiento."' selected>".$row->descripcion . "</option>";
                }
                echo "<option value='".$row->id_tipomovimiento."'>".$row->descripcion . "</option>";
              endforeach;
              ?>
              </select>
            </div>
          </div>
        </div>
        <!-- ACA HAY QUE USAR EL IFFF -->

        <div id="divPedidoTecnico">
        <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Numero Servicio</label>
                <input class="form-control" type="text" name="numeroServicio" id="numeroservicio">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Fecha Servicio</label>
                <input class="form-control" type="date" name="fechaServicio" id="fechaServicio">
              </div>
            </div>
          </div>
          
          <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label>Pedido Tecnico</label>
                <select class="form-control" name="idPedidoTecnico" id="idPedidoTecnico">
                  <?php foreach($tipoPedidoTecnico as $row) :
                      echo "<option value='".$row->id_pedidotecnico."'>".$row->descripcion . "</option>";
                    endforeach;
                  ?>
                </select>
              </div>
            </div><div class="col-md-6">
              <div class="form-group">
                <label>Personal Retira</label>
                <input class="form-control" type="text" name="retira" id="retira">
              </div>
            </div>
          </div>
<hr>
        </div>
        
        <div class="row">
          <div class="col-md-12">
          <div class="form-group">
              <label>Dependencia Destino</label>
              <select class="form-control" name="slctDestino" required>
              <?php foreach($dependencia as $row) :
                echo "<option value='".$row->id_dependencia."'>".$row->descripcion . "</option>";
              endforeach;
              ?>
              </select>
            </div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" form="form-movimiento" class="btn btn-primary">Cargar</button>
      </div>
    </div>
    <!-- /.modal-content -->
    </form>
  </div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- MODAL ERROR O EXITOO -->
<div class="modal modal-success fade" id="modal-estado">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <strong><h4 class="modal-title" id="tituloEstado"></h4></strong>
              </div>
              <div class="modal-body" id="cuerpoEstado">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline" onClick="CerrarTodo()">Cerrar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<!-- MODAL ERROR O EXITOO -->



        </div>
        <!-- /.box -->


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
    $('#comprobanteModal').modal('show');
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
document.getElementById('mensajeError').style.display = "none";  

  //alert($id);
  $("#modalMovimientos").modal();
  idPedido = $id;
//carga la tabla
  $.post("<?php echo base_url() ?>/Pedidos/C_Pedidos/TablaMovimientos",
  {idPedido : idPedido},
    function(data) {
      document.getElementById('tablaMovimiento').innerHTML = data; //Se muestra el resultado
      document.getElementById('tablaMovimiento').style.display = "block";
    });
  //carga los box con la informacion del pedido
  $.ajax({
      type:'POST',
      url:"<?php echo base_url() . '/Pedidos/C_Pedidos/DatosMovimiento';?>",
      dataType: "json",
      data:{idPedido:idPedido},
      success:function(data){
          if(data.status == 'ok'){
            
            $('#idtipoPedido').val(data.result[0].id_tipopedido);  
            $('#txtDescripcion').val(data.result[0].descripcion);
            $('#idPedido').val(data.result[0].id_pedido);
            $('#tituloPedido').val(data.result[0].titulo);
            $('#fechaAlta').val(data.result[0].fechaalta);
            $('#dependenciaOrigen').val(data.result[0].dependencia);
            $('#tipoPedido').val(data.result[0].tipopedido);
            $('#solicita').val(data.result[0].solicita);

             var tipoPedido = data.result[0].id_tipopedido;
            if(tipoPedido == 2){
              //divPedidoTecnico
                
                 document.getElementById('divPedidoTecnico').style.display = "block";  
                 document.getElementById('divEstadoPedidoTecnico').style.display = "block";  
                $('#numeroServicio').val(data.result[0].numeroservicio);
                $('#fechaServicio').val(data.result[0].fechaservicio);
                $('#pedidoTecnico').val(data.result[0].pedidotecnico);
                $('#retira').val(data.result[0].retira);
            }else{
              document.getElementById('divPedidoTecnico').style.display = "none"; 
            }
             

          }else{
            console.log("error");
              alert("Ocurrio un problema");
          }
      }
  });
 
}


function selectTipoMovimiento(valor) {
  //alert(valor.value);
  
}

function NuevoMovimiento(){
  document.getElementById('mensajeError').style.display = "none";  
  $("#modalNuevoMovimiento").modal();
  
}

function FinalizarMovimiento($id){
  idtipoPedido = document.getElementById('idtipoPedido').value;
  if(idtipoPedido == 1){
  idPedido=$id;
  $.ajax({
      type:'POST',
      url:"<?php echo base_url() . '/Pedidos/C_Pedidos/FinalizarMovimiento';?>",
      dataType: "json",
      data:{idPedido:idPedido},
      success:function(data){
          if(data.status == 'ok'){
            $("#modal-estado").modal();
            document.getElementById("modal-estado").className = "modal modal-success fade";
            $('#tituloEstado').text("Exito!");
            $('#cuerpoEstado').text("Se dio por finalizada la cadena de movimientos");
          }else{
            $("#modal-estado").modal();
            document.getElementById("modal-estado").className = "modal modal-danger fade";
            $('#tituloEstado').text("ERROR!");
            $('#cuerpoEstado').text("Ocurrio un error al intentar finalizar la cadena de movimiento.");
          }
       }
   });
  }else{
    document.getElementById('mensajeError').style.display = "block";  
  }
  
}

function CerrarTodo(){
  $('.modal').modal('hide');
}

</script>
