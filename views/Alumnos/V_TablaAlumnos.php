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
            <h3 class="box-title">Lista de alumnos</h3>
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
                            <a href="<?php echo base_url().'Alumnos/C_Alumnos/Registrar'?>" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Nuevo Alumno
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                          <span class="input-group-addon">Nivel&nbsp;&nbsp;</span>
                          <select class="form-control" name="">
                            <option value="1">Todos los niveles</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                          <span class="input-group-addon">Cursos</span>
                          <select class="form-control" name="">
                            <option value="1">Todos los cursos</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                          <span class="input-group-addon">Filtros</span>
                          <select class="form-control" name="">
                            <option value="1">Todos los alumnos</option>
                            <option value="1">Alumnos con hermanos</option>
                            <option value="1">Alumnos con cuota especial</option>
                            <option value="1">Alumnos familiares de docentes</option>
                          </select>
                        </div>
                    </div>
                </div>
                <thead>
                <tr>
                  <th>N&uacute;mero de documento</th>
                  <th>Apellido</th>
                  <th>Nombre</th>
                  <th>Curso</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($alumnosArr as $row): ?>
                  <tr>
                    <td><?php echo $row->numero_documento ?></td>
                    <td><?php echo $row->apellido ?></td>
                    <td><?php echo $row->nombre ?></td>
                    <td><?php echo "" ?></td>
                    <td>
                      <a href="<?php echo base_url() . "Alumnos/C_Alumnos/DetalleAlumno/" . $row->id_alumno ?>" class="btn btn-xs btn-info"><span class="fa fa-list"></span>&nbsp;Ver</a>
                      <a href="#" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span>&nbsp;Editar</a>
                      <a href="<?php echo base_url() . "Alumnos/C_Alumnos/BajaAlumno/" . $row->id_alumno ?>" class="btn btn-xs btn-danger"><span class="fa fa-remove"></span>&nbsp;Eliminar</a>
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
