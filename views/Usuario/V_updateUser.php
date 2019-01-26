<?php
foreach ($datosEmpleados->result() as $row):
  $id_enanusua04  = $row->id_enanusua04;
  $nombreEmpleado = $row->enanusua01_nombre.", ".$row->enanusua01_apellido;
  $documentoEmpleado = $row->enanusua01_dni;
endforeach;

foreach ($datosUsuario->result() as $row):
  $id_enanusua11          = $row->id_enanusua11;
  $enanusua11_descripcion = $row->enanusua11_descripcion;
  $email                  = $row->email;
  $username               = $row->username;
  endforeach;
?>
<div class="page-content-wrapper">	<!-- BEGIN CONTENT -->
    <div class="page-content">
        <h3 class="page-title"> </h3><!-- BEGIN PAGE HEADER-->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="">INICIO</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="">USUARIOS</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="">Carga de Nuevo Usuario </a>
                </li>
            </ul>
        </div>	<!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box purple-plum">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-asterisk"></i> Nuevo Usuario para <strong><?php echo $nombreEmpleado;?></strong>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form method="POST" action="<?php echo base_url() . 'Usuarios/C_Usuarios/ActualizarPerfil'; ?>" class="form-horizontal">
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <center>Tienes algunos errores. Por favor chequea.</center>
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <center>Los datos fueron ingresados Correctamente!</center>
                                </div>
                                <div class="row">
                                  <input type="hidden" name="idPersonal" value="<?php echo $idPersonal;?>">

                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_6_1">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nombre Usuario <span class="required"> * </span></label>
                                                    <div class="col-md-6">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" value="<?php echo $username;?>"name="nombreEmpleado" required>
                                                        </div>
                                                        <span class="help-block"><font color="red"><?php echo form_error('nombreEmpleado');?></font></span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Email Usuario</label>
                                                    <div class="col-md-6">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="email" class="form-control" value="<?php echo $email;?>" name="emailEmpleado" required>
                                                        </div>
                                                        <span class="help-block"><font color="red"><?php echo form_error('emailEmpleado');?></font></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Perfil</label>
                                                    <div class="col-md-6">
                                                        <select name="perfilEmpleado" data-placeholder="Seleccione ..." class="form-control select2"  required>
                                                          <option value="<?php echo $id_enanusua11;?>"><?php echo $enanusua11_descripcion?></option>
                                                            <?php
                                                            foreach ($perfiles->result() as $row):?>
                                                                <option value="<?php echo $row->id_enanusua11 ?>"><?php echo $row->enanusua11_descripcion; ?></option>';
                                                            <?php  endforeach;
                                                            ?>
                                                        </select>
                                                        <span class="help-block"><font color="red"><?php echo form_error('perfilEmpleado');?></font></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> <!-- tab content-->
                                    </div><!-- class col md 9-->
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-5 col-md-9">
                                        <button type="submit" class="btn green-meadow button-submit" name="Enviar">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                         <!-- END FORM-->
                    </div>
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
</div>
