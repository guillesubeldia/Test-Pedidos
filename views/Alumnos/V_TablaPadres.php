<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Alumnos
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Alumnos</a></li>
      <li class="active">Listar</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">


          <div class="box-header">
            <h3 class="box-title">Lista de padres</h3>
          </div>


          <!-- /.box-header -->
          <div class="box-body">
            <?php if (!is_null($exito)): ?>
                <?php if ($exito == true): ?>
                    <div class="callout callout-success">
                      ¡La operaci&oacute;n se ha completado satisfactoriamente!
                    </div>
                <?php else:  ?>
                    <div class="callout callout-danger">
                      ¡Ha ocurrido un error!
                    </div>
                <?php endif ?>
            <?php endif ?>
            <div class="table-toolbar">
              <table id="example2" class="table table-bordered table-hover">
                <div class="row">
                    <div class="col-md-2">
                        <div class="btn-group">
                            <a href="<?php echo base_url().'Alumnos/C_Alumnos/AltaTutor'?>" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Nuevo Tutor
                            </a>
                        </div>
                    </div>
                </div>
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cuit</th>
                  <th>Direcci&oacute;n</th>
                  <th>Contacto</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach($padresArr as $row): ?>
                    <tr>
                      <td><?php echo $row->numero_documento ?></td>
                      <td><?php echo $row->apellido ?></td>
                      <td><?php echo $row->nombre ?></td>
                      <td><?php echo "" ?></td>
                      <td>
                        <a href="<?php echo base_url() . "Alumnos/C_Alumnos/DetalleTutor/" . $row->id_padre ?>" class="btn btn-xs btn-info"><span class="fa fa-list"></span>&nbsp;Ver</a>
                        <a href="#" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span>&nbsp;Editar</a>
                        <a href="<?php echo base_url() . 'Alumnos/C_Alumnos/BajaTutor/' . $row->id_padre ?>" class="btn btn-xs btn-danger"><span class="fa fa-remove"></span>&nbsp;Eliminar</a>
                      </td>
                    </tr>
                  <?php endforeach ?>
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
