<?php
  if (!empty($idCuotas)) { // <= true
    $listaCuotas = serialize($idCuotas);
    $detalle = "Cuota Mensual.";
    // echo "array de los datos de las cuotas: ";print_r($idCuotas);
  }else{
    $listaCuotas = "";
    $detalle = "Otros";
    // echo "No es cuota mensual.";
  }
  if(!isset($idDetalleCuota)){
      $idDetalleCuota = 0;
  }

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pago
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Advanced Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Detalle de Pago: <?php echo $detalle;?> </h3>
      </div>
      <!-- /.box-header -->
      <form role="form" action="<?php echo base_url()."/cuota/C_cuota/RecibirDatos";?>" method="post">

        <input type="hidden" name="tipoPago" value='<?php echo $tipoPago ?>'>
        <input type="hidden" name="cuotas" value='<?php echo $listaCuotas;?>'>
        <input type="hidden" name="totalPagar" value='<?php echo $totalAPagar;?>'>
        <input type="hidden" name="idGrado" value='<?php echo $idGrado;?>'>
        <input type="hidden" name="alumno" value='<?php echo $alumno;?>'>

        <input type="hidden" name="idDetalleCuota" value='<?php echo $idDetalleCuota;?>'>

      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label>Monto de Cuota</label>
              <input type="text" class="form-control" name="montoPago" value="<?php echo $totalAPagar;?>" style="width: 100%;">
            </div>
            <div id="botonPago">
                <div class="box-footer">
                  <button type="submit" id="enviarDatos" name="button" class="btn btn-primary pull-right">Pagar</button>
                </div>
            </div>
            <!-- /.form-group -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
    </form>
      <div class="box-footer">

      </div>
    </div>
    <!-- /.box -->



  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
