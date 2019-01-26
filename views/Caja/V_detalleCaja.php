<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Caja
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Caja</a></li>
      <li class="active">Detalle</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Información general</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <td style="width:30%;">Usuario</td>
                  <td><?php echo $caja->usuario ?></td>
                </tr>
                <tr>
                  <td>Fecha</td>
                  <td><?php echo date_format(date_create($caja->fecha_hora_apertura), 'd/m/Y') ?></td>
                </tr>
                <tr>
                  <td>Hora de apertura</td>
                  <td><?php echo date_format(date_create($caja->fecha_hora_apertura), 'H:i')?></td>
                </tr>
                <?php if (!is_null($caja->fecha_hora_cierre)) : ?>
                  <tr>
                    <td>Hora de cierre</td>
                    <td><?php echo date_format(date_create($caja->fecha_hora_cierre), 'H:i') ?></td>
                  </tr>
                <?php endif ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>


    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs pull-right">
        <li><a href="#tab_facturas_sin_egresos" data-toggle="tab">Facturas sin egresos</a></li>
        <li><a href="#tab_egresos" data-toggle="tab">Egresos</a></li>
        <li class="active"><a href="#tab_ingresos" data-toggle="tab">Ingresos</a></li>
        <li class="header pull-left"><span class="fa fa-list"></span>Movimientos</li>
      </ul>
      <div class="tab-content">
        <!-- /.tab-pane -->
        <div class="tab-pane active" id="tab_ingresos">
          <div class="table-toolbar">
            <table id="example2" class="table table-stripped table-hover datatable">
              <div class="row">
                  <div class="col-md-2">
                      <div class="btn-group">
                          <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modalNuevoMovimiento">
                            <i class="fa fa-plus"></i> Nuevo Movimiento
                          </button>
                      </div>
                  </div>
              </div>

              <thead>
                <th>Cuenta</th>
                <th>Subcuenta</th>
                <th>Descripcion</th>
                <th>Tipo de comprobante</th>
                <th>N° de boleta</th>
                <th>Imp. Pagado T.P.</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php foreach($ingresos as $row) : ?>
                <tr>
                  <td><?php echo $row->cuenta ?></td>
                  <td><?php echo $row->subcuenta ?></td>
                  <td><?php echo $row->descripcion ?></td>
                  <td><?php echo $row->rela_tipo_comprobante ?></td>
                  <td><?php echo $row->nro_comprobante ?></td>
                  <td><?php echo $row->monto ?></td>
                  <td>
                    <a href="#" class="btn btn-xs btn-info"><span class="fa fa-eye"></span>&nbsp;Ver</a>
                    <a href="#" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span>&nbsp;Editar</a>
                    <a href="#" class="btn btn-xs btn-danger"><span class="fa fa-remove"></span>&nbsp;Eliminar</a>
                  </td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_egresos">
          <div class="table-toolbar">
            <table id="example2" class="table table-stripped table-hover datatable">
              <div class="row">
                  <div class="col-md-2">
                      <div class="btn-group">
                          <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modalNuevoMovimiento">
                            <i class="fa fa-plus"></i> Nuevo Movimiento
                          </button>
                      </div>
                  </div>
              </div>

              <thead>
                <th>Cuenta</th>
                <th>Subcuenta</th>
                <th>Descripcion</th>
                <th>Tipo de comprobante</th>
                <th>N° de boleta</th>
                <th>Imp. Pagado T.P.</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php foreach($egresos as $row) : ?>
                <tr>
                  <td><?php echo $row->cuenta ?></td>
                  <td><?php echo $row->subcuenta ?></td>
                  <td><?php echo $row->descripcion ?></td>
                  <td><?php echo $row->rela_tipo_comprobante ?></td>
                  <td><?php echo $row->nro_comprobante ?></td>
                  <td><?php echo $row->monto ?></td>
                  <td>
                    <a href="#" class="btn btn-xs btn-info"><span class="fa fa-list"></span>&nbsp;Ver</a>
                    <a href="#" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span>&nbsp;Editar</a>
                    <a href="#" class="btn btn-xs btn-danger"><span class="fa fa-remove"></span>&nbsp;Eliminar</a>
                  </td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_facturas_sin_egresos">
          <div class="table-toolbar">
            <table id="example2" class="table table-stripped table-hover datatable">
              <div class="row">
                  <div class="col-md-2">
                      <div class="btn-group">
                          <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modalNuevoMovimiento">
                            <i class="fa fa-plus"></i> Nuevo Movimiento
                          </button>
                      </div>
                  </div>
              </div>

              <thead>
                <th>Cuenta</th>
                <th>Subcuenta</th>
                <th>Descripcion</th>
                <th>Tipo de comprobante</th>
                <th>N° de boleta</th>
                <th>Imp. Pagado T.P.</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                <?php foreach($facturasSinEgreso as $row) : ?>
                <tr>
                  <td><?php echo $row->cuenta ?></td>
                  <td><?php echo $row->subcuenta ?></td>
                  <td><?php echo $row->descripcion ?></td>
                  <td><?php echo $row->rela_tipo_comprobante ?></td>
                  <td><?php echo $row->nro_comprobante ?></td>
                  <td><?php echo $row->monto ?></td>
                  <td>
                    <a href="#" class="btn btn-xs btn-info"><span class="fa fa-eye"></span>&nbsp;Ver</a>
                    <a href="#" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span>&nbsp;Editar</a>
                    <a href="#" class="btn btn-xs btn-danger"><span class="fa fa-remove"></span>&nbsp;Eliminar</a>
                  </td>
                </tr>
              <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </section>
</div>


<!-- modal nuevo movimiento -->
<div class="modal fade" id="modalNuevoMovimiento">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo Movimiento</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="formNuevoMovimiento">
          <div class="form-group">
            <label for="">Tipo de Movimiento</label>
            <select class="form-control" name="tipoMovimiento">
              <option>Seleccione...</option>
              <?php foreach ($tiposMovimiento as $row) : ?>
                <option value="<?php echo $row->id_tipo ?>"><?php echo $row->descripcion ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Cuenta</label>
                <select class="form-control" id="cuenta" name="cuenta">
                  <option>Seleccione...</option>
                  <?php foreach ($cuentas as $row) : ?>
                    <option value="<?php echo $row->id_cuenta?>"><?php echo $row->descripcion ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Subcuenta</label>
                <select class="form-control" id="subcuenta" name="subcuenta">
                  <option>Seleccione...</option>
                </select>
              </div>
            </div>
          </div>


          <div class="form-group">
            <label for="">Descripción</label>
            <input type="text" class="form-control" placeholder="Ingrese una descripción...">
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Tipo de comprobante</label>
                <select class="form-control" name="tipoComprobante">
                  <option>Seleccione...</option>
                  <?php foreach ($tiposComprobante as $row) : ?>
                    <option value="<?php echo $row->id_tipo_comprobante?>"><?php echo $row->descripcion ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group">
                <label for="">Número de comprobante</label>
                <input type="text" name="nroComprobante" value="" class="form-control" placeholder="Ingrese el número de la factura o recibo">
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="">Proveedor</label>
            <select class="form-control" name="proveedor">
              <option>Seleccione...</option>
              <?php foreach ($proveedores as $row) : ?>
                <option value="<?php echo $row->id_proveedor?>"><?php echo $row->nombre ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">Importe</label>
            <input type="number" value="0" min-value="1" name="importe" class="form-control">
          </div>

          <div class="form-group">
            <label for="">Tipo de pago</label>
            <select class="form-control" name="tipoPago">
              <option>Seleccione...</option>
              <?php foreach ($pagoMedios as $row) : ?>
                <option value="<?php echo $row->id_pago_medio?>"><?php echo $row->descripcion ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal nuevo movimiento -->

<script type="text/javascript">
  var subcuentas = <?php echo json_encode($subcuentas) ?>;

  function buscarSubcuentas(idCuenta)
  {
    var subcuentasHijas = [];

    for (var i = 0; i < subcuentas.length; i++) {
      if (subcuentas[i].rela_cuenta == idCuenta) {
          subcuentasHijas.push(subcuentas[i]);
      }
    }

    return subcuentasHijas;
  }

  function actualizarSelectSubcuentas(subcuentasHijas) {
    $('#subcuenta').html('');
    var options = '<option>Seleccione...</option>';
    for (var i = 0; i < subcuentasHijas.length; i++) {
      options = options + "<option value='" + subcuentasHijas[i].id_subcuenta + "'>"
          + subcuentasHijas[i].descripcion + "</option>";
    }
    $('#subcuenta').html(options);
  }

  $(document).ready(function() {
    $('#cuenta').change(function() {
      var idCuenta = $("#cuenta").val();
      //alert(idCuenta);
      subcuentasHijas = buscarSubcuentas(idCuenta);
      actualizarSelectSubcuentas(subcuentasHijas);
    });
  });
</script>
