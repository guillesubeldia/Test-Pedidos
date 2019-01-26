<?php
foreach($perfil->result() as $row):
  $id_perfil = $row->id_enanusua11;
  $descripcionPerfil = $row->enanusua11_descripcion;
endforeach;


 ?>
<!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->

                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Inicio</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Usuario</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Perfiles</span>
                                </li>
                            </ul>

                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Modificar Perfil</h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tabbable-line boxless tabbable-reversed">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_personas">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-users"></i>Modificar Perfil</div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form action="<?php echo base_url() . "Usuarios/C_Usuarios/ModificarPerfil";?>" method="post"  class="form-horizontal">

                                                      <input type="hidden" name="idPerfil" value="<?php echo $id_perfil;?>">

                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Descripcion</label>
                                                                <div class="col-md-4">
                                                                    <input name="descripcionPerfil" value="<?php echo $descripcionPerfil;?>" type="text" class="form-control input-circle" value="<?php echo set_value('descripcionPerfil');?>" required>
                                                                    <span class="help-block"><font color="red"><?php echo form_error('descripcionPerfil');?></font></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-4 col-md-8">
                                                                    <button type="submit" class="btn btn-circle red">Enviar</button>
                                                                    <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancelar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
