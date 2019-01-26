<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Cuotas
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Cuotas</a></li>
      <li class="active">Listar</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Lista de Grados</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <?php if (isset($exito) && $exito == true): ?>
            <div class="callout callout-success">
              ¡La operaci&oacute;n se ha completado satisfactoriamente!
            </div>
            <?php endif ?>
            <div class="table-toolbar">
              <table id="example2" class="table table-bordered table-hover">
                <div class="row">
                    <div class="col-md-2">
                        <div class="btn-group">
                            <a href="<?php echo base_url().'cuota/C_cuota/CobroCuota'?>"  class="btn btn-block btn-info"><i class="fa fa-plus"></i> Nuevo Cobro
                            </a>
                        </div>
                    </div>
                </div>
                <thead>
                <tr>
                  <th>Grado</th>
                  <th>Turno</th>
                  <th>Valor Cuota</th>
                  <th>Valor Preinscripcion</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                   <?php foreach ($tablaCuota->result() as $row): ?>
                  <tr>
                       <td><?php  echo $row->grado; ?></td>
                       <td><?php  echo $row->turno; ?></td>
                       <td><?php  echo $row->valor_cuota; ?></td>
                       <td><?php  echo $row->valor_preinscripcion; ?></td>
                       <td>
                         <a href="<?php  echo base_url() . "cuota/C_cuota/CobrarCuota/".base64_encode($row->id_grado);?>" class="btn btn-xs btn-info"><span class="fa fa-list"></span>&nbsp;Cobrar Cuotas</a>
                         <a href="<?php  echo base_url() . "cuota/C_cuota/EditarProveedor/" . base64_encode($row->id_grado); ?>" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span>&nbsp;Generar Cuotas</a>
                       </td>
                  </tr>
                  <?php endforeach; ?>
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
