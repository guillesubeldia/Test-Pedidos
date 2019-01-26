
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">		<!-- BEGIN PAGE HEADER-->
        <!--<h3 class="page-title">	Busqueda <small>de personas</small>	</h3>-->
        <div class="page-head">
            <div class="page-title">
                <h1>Alta de Usuarios</h1>
            </div>
        </div>
         <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="<?php echo base_url(); ?>">Inicio</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Usuarios</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="#">Alta Usuarios</a>
            </li>
        </ul>
        <!-- END PAGE HEADER-->		
        <div class="row">	<!-- BEGIN PAGE CONTENT-->
            <div class="col-md-12">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-search"></i>Nuevo Usuario
                        </div>
                    </div>
                    <div class="portlet-body form">	
                        <!-- BEGIN FORM-->
                        <form method="post" action="<?php echo base_url() . 'Usuarios/c_usuarios/NuevoUsuario'; ?>" class="form-horizontal form-row-sepe">  
                            <div class="form-body">
                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nombre Usuario <span class="required"> * </span></label>
                                                    <div class="col-md-6">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="text" class="form-control" name="nombreUsuario"  id="nombreUsuario"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Contraseña <span class="required"> * </span></label>
                                                    <div class="col-md-6">
                                                        <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input type="password" class="form-control" name="claveUsuario" id="claveUsuario"/>
                                                        </div>
                                                    </div>
                                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Tipo Usuario</label>
                                    <div class="col-md-4">
                                        <select name="perfil" class="form-control input-medium select2me" data-placeholder="Select...">
                                            <option value="">Seleccionar</option>
                                            <?php
                                            foreach ($perfiles->result() as $row) {
                                                echo '<option value="' . $row->id_perfil . '">' . $row->descripcion . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-6 col-md-9">
                                            <button type="submit" class="btn purple"><i class="fa fa-search"></i> Alta de Usuario </button>
                                        </div>
                                    </div>
                                </div>
                        </form>                                                       
                    </div>
                </div>
            </div>
        </div><!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->

