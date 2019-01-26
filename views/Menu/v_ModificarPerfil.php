<!-- BEGIN PAGE -->
<div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
   <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">

                <!-- BEGIN PAGE TITLE & BREADCRUMB-->			
                <h3 class="page-title">
                    Perfiles 			<small>Modificar el Perfil</small>
                </h3>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN SAMPLE FORM PORTLET-->   
                <div class="portlet box blue tabbable">
                    <div class="portlet-title">
                        <h4>
                            <i class="icon-reorder"></i>
                            <span class="hidden-480">Modificar un Perfil</span>
                            &nbsp;
                        </h4>
                    </div>
                    <div class="portlet-body form">
                        <div class="tabbable portlet-tabs">
                            <br>
                            <div class="tab-content">
                                <div class="tab-pane active" id="portlet_tab1">
                                    <!-- BEGIN FORM-->
                                    <form action='<?php echo base_url(); ?>Menu/c_menu/ModificarPerfil' method='post' class='form-horizontal'>
                                        <?php
                                        $idperfil = $registro->id_perfil;
                                        ?>
                                        <input name='idperfil' id='idperfil' value='<?php echo $idperfil; ?>' type='hidden'>
                                        <div class="control-group">
                                            <label class="control-label" >Nombre del Perfil:</label>
                                            <div class="controls">
                                                <?php echo form_dropdown('consulta', $consulta, $idperfil, 'class="help-inline"'); ?>
                                            </div>
                                        </div>
                                        <div class='control-group'><br> 
                                            <label class='control-label' for='inputError'>Nombre:<span class='required'> *</span></label>
                                            <div class='controls'>
                                                <input 	placeholder='Nombre' id='nombre' name='nombre' 
                                                        value='<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>' 
                                                        class='m-wrap medium' type='text'>
                                                        <?php echo form_error('nombre') ?>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <input type='submit'  name='Modificar' value='Modificar' class='btn blue'>
                                            <input id="cancelar" class='btn' type="button" value="Cancelar" onclick="Cancelar();"/>
                                            <script type="text/javascript">
                                                function Cancelar() {
                                                    history.back();
                                                }
                                            </script>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
    <!-- END PAGE CONTENT-->         
</div>
<!-- END PAGE CONTAINER-->	
</div>
<!-- END PAGE -->	 	
</div>
<!-- END CONTAINER -->