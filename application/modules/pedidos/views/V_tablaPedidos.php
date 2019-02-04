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
          <div class="box-body">
            <?php if (isset($exito) && $exito == true): ?>
            <div class="callout callout-success">
              ¡La operaci&oacute;n se ha completado satisfactoriamente!
            </div>
            <?php endif ?>
            <div class="table-toolbar">
              <table id="tablaPedidos" class="table table-bordered table-hover">
                <div class="row">
                    <div class="col-md-2">
                        <div class="btn-group">
                            <a href="<?php echo base_url().'Pedidos/C_pedidos/CargarPedido'?>" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Nuevo Pedido
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                          <span class="input-group-addon">Tipo Pedido</span>
                          <select class="form-control" name="">
                            <option value="1">Todos los pedidos</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                          <span class="input-group-addon">Estado</span>
                          <select class="form-control" name="">
                            <option value="1">Todos los cursos</option>
                          </select>
                        </div>
                    </div>
                    
                </div>
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
                foreach ($pedidos as $pedido) {
                  $descripcionRecortado = substr($pedido->descripcion, 0, 30)."...";
                  echo '<tr>';
                    echo '<td style="vertical-align:middle;"><center>' . $pedido->fechaalta . '</center></td>';
                    echo '<td style="vertical-align:middle;"><center>' . $pedido->dependenciaOrigen . '</center></td>';
                    echo '<td style="vertical-align:middle;"><center>' . $pedido->tipoPedido . '</center></td>';
                    echo '<td style="vertical-align:middle;"><center>' . $pedido->titulo . '</center></td>';
                    echo '<td style="vertical-align:middle;">' . $descripcionRecortado. '</td>';
                    echo '<td>';
                      echo '<a class="btn btn-primary" title="Editar datos." href="#" onclick="ModalEditar('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Editar</a> ';
                      echo '<a class="btn btn-info" title="Ver pedido completo." href="#" onclick="ModalEditar('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Ver</a> ';      
                      echo '<a class="btn btn-success" title="Ver movimientos del pedido." href="#" onclick="ModalEditar('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Movimientos</a> ';
                    echo '</td>';
                    echo '</tr>';
                  }
                ?>
                  </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
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


window.onload = function() {
  BuscarPorParametros();
}
function BuscarPorParametros() {
  console.log("entra");
  $.post("<?php echo base_url();?>pedidos/C_pedidos/LeerPedidos",
  {},
    function(data) {
      document.getElementById('consultaDinamica').innerHTML = data; //Se muestra el resultado
      // document.getElementById('consultaDinamica').style.display = "block";
    
  });
}
</script>