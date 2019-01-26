
<?php
/*
 * Proyecto: Sistema Gestión Mediación.
 * Autor: Subeldia Guillermo.
 * Descripcion Funcional: Carga de menu.
 * Fecha:10/06/2015.
 */
?>
<?php
foreach ($orden->result() as $row):
    $orden = $row->orden;

endforeach;

?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN STYLE CUSTOMIZER -->
        <!-- END STYLE CUSTOMIZER -->
        <!-- BEGIN PAGE HEADER-->

        <div class="page-title">
           <h1> Menu <small>Carga y Modificacion</small></h1>
        </div>

        <div class="page-bar">
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo base_url();?>">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="#">Menu</a>
                    <i class="fa fa-circle"></i>
                </li>
            </ul>

        </div>

        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Carga Menu
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo base_url() . 'Menu/c_menu/AltaMenu'; ?>" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">

                                <input type="hidden" value="<?php echo $orden ?>" name="orden" id="orden"/>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Seleccione el Perfil</label>
                                    <div class="col-md-4">
                                        <select class="form-control input-large" placeholder="Seleccionar..." name="perfil" id="perfil">
                                            <option></option>
                                            <?php
                                            foreach ($perfiles->result() as $row):
                                                echo '<option value = "' . $row->id_enanusua11 . '">' . $row->enanusua11_descripcion . '</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ingrese el nombre</label>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-inline input-medium" size="16" type="text"  name="nombreMenu" id="nombreMenu"/>
                                    </div>
                                    <?php echo form_error('nombreMenu') ?>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Menu Padre</label>
                                    <div class="col-md-4">
                                        <select class="form-control input-large" data-placeholder="Seleccionar menu..." name="menuPadre" id="menuPadre">
                                            
                                            <option value="0">Ninguno</option>
                                            <?php
                                            foreach ($padres->result() as $row):
                                                echo '<option value = "' . $row->id_menu . '">' . $row->descripcion . '</option>';

                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Ingrese la URL</label>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-inline input-medium" placeholder="Nombre..." size="16" type="text" name="referencia" id="referencia"/>
                                        <span class="help-block">
                                            Ej: Carpeta/Controlador/Funcion</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ingrese el icono</label>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-inline input-medium" placeholder="Nombre..." size="16" type="text" name="icono" id="icono"/>
                                        <span class="help-block">
                                            Ej: Icon-nombre</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn purple"  name="grabarMenu" id="grabarMenu" value="grabarMenu"><i class="fa fa-check"></i> Cargar</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
