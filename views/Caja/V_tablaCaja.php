<div class="content-wrapper">
  <!-- inicio header  -->
  <section class="content-header">
    <h1>
      Cajas
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Caja</a></li>
      <li class="active">Histórico</li>
    </ol>
  </section>
  <!-- fin header -->
  <!-- inicio content  -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Histórico</h3>
          </div>

          <div class="box-body">
            <div class="table-toolbar">
              <table id="example2" class="table table-bordered table-hover datatable">
                <div class="row">
                    <div class="col-md-2">
                        <div class="btn-group">
                            <button type="button" id="abrirCaja" class="btn btn-block btn-info" data-target="#modalAbrirCaja">
                              <i class="fa fa-plus"></i> Abrir Caja
                            </button>
                        </div>
                    </div>
                </div>

                <thead>
                  <th>Fecha</th>
                  <th>Apertura</th>
                  <th>Cierre</th>
                  <th>Recaudación</th>
                  <th>Monto rendido</th>
                  <th>Acciones</th>
                </thead>
                <tbody>
                  <?php foreach ($cajas as $row) :?>
                    <tr>
                      <td><?php echo date_format(date_create($row->fecha_hora_apertura), 'd/m/Y') ?></td>
                      <td><?php echo date_format(date_create($row->fecha_hora_apertura), 'H:i') ?></td>
                      <td><?php echo (!is_null($row->fecha_hora_cierre) ?  date_format(date_create($row->fecha_hora_cierre), 'H:i') : 'N/D') ?></td>
                      <td><?php echo (floatval($row->total_ingresos) - floatval($row->total_egresos)) ?></td>
                      <td><?php echo $row->monto_rendido ?? 'N/D'?></td>
                      <td>
                        <a href="<?php echo base_url() . "caja/C_caja/Detalle/$row->id_caja" ?>" class="btn btn-xs btn-info" alt="Ver detalle"><span class="fa fa-list"></span>&nbsp;Ver</a>
                        <?php if (is_null($row->fecha_hora_cierre)) : ?>
                          <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalCerrarCaja" alt="Cerrar caja"><span class="fa fa-remove"></span>&nbsp;Cerrar caja</button>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- fin content -->
</div>

<!-- modal nueva caja -->
<div class="modal fade" id="modalAbrirCaja">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Abrir caja</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="formAbrirCaja">
          <div class="form-group">
            <label for="">Usuario</label>
            <input type="text" value="<?php echo (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '')?>" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="">Fecha</label>
            <input type="text" id="fecha" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="">Efectivo Inicial</label>
            <input type="number" id="efectivoInicial" value="0" class="form-control" name="efectivoInicial">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnConfirmar">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal nueva caja -->

<!-- modal nueva caja -->
<div class="modal fade" id="modalCerrarCaja">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cierre de caja</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="formAbrirCaja">
          <div class="form-group">
            <label for="">Usuario</label>
            <input type="text" value="<?php echo (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '')?>" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="">Fecha</label>
            <input type="text" id="fecha" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="">Monto recaudado</label>
            <input type="number" id="rendicion" value="0" class="form-control" name="rendicion">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnCerrarCaja">Cerrar caja</button>
      </div>
    </div>
  </div>
</div>
<!-- fin modal nueva caja -->

<script type="text/javascript">
  $(document).ready(function () {
    $('#abrirCaja').click(function () {
      $('#fecha').val((new Date).toLocaleDateString('es-AR'));
      $('#efectivoInicial').val(0);

      var btnTarget = $(this).data('target');
      $(btnTarget).modal('show');
    });

    $("#btnConfirmar").click(function() {
      var vEfectivoInicial = $('#efectivoInicial').val();
      $.ajax({
        url: "<?php echo base_url().'caja/C_caja/AltaCaja'?>",
        dataType: "JSON",
        type: "POST",
        data: { efectivoInicial : vEfectivoInicial },

        success: function(data){
          console.log(data);
          //si data.status == true entonces se registro correctamente
          if (data.status) {
              location.reload(); // recargamos la página
          } else if (data.codigo == "VALIDACION") {
            alert("Alguno de los campos contienen errores");
          } else if (data.codigo == "CAJA_ABIERTA") {
            alert("Ya hay una caja abierta actualmente");
          } else if (data.codigo == "DB") {
            alert("Ha ocurrido un error al intentar insertar un registro en la base de datos");
          }

        },

        error: function(jqXHR, textStatus, errorThrown) {
          console.log(JSON.stringify(jqXHR));
          console.log(JSON.stringify(textStatus));
          console.log(JSON.stringify(errorThrown));
          alert("¡Ha ocurrido un error!\nComuníquese con el desarrollador del sistema");
        }
      });
    });

    $("#btnCerrarCaja").click(function() {
      var vRendicion = $('#rendicion').val();
      $.ajax({
        url: "<?php echo base_url().'caja/C_caja/Cerrar'?>",
        dataType: "JSON",
        type: "POST",
        data: { rendicion : vRendicion },

        success: function(data){
          console.log(data);
          if (data.status) {
              location.reload(); // recargamos la página
          } else if (data.codigo == "VALIDACION") {
            alert("Alguno de los campos contienes errores");
          } else if (data.codigo == "DB") {
            alert("Ha ocurrido un error al intentar actualizar un registro en la base de datos");
          }
        },

        error: function(jqXHR, textStatus, errorThrown) {
          console.log(JSON.stringify(jqXHR));
          console.log(JSON.stringify(textStatus));
          console.log(JSON.stringify(errorThrown));
          alert("¡Ha ocurrido un error!\nComuníquese con el desarrollador del sistema");
        }
      });
    });
  }); // fin ready
</script>
