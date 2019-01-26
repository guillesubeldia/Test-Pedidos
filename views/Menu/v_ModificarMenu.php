<?php
/*
 * Proyecto: Sistema Gestión Mediación.
 * Autor: Subeldia Guillermo.
 * Descripcion Funcional: Edicion de menu.
 * Fecha:10/06/2015.
 */
foreach ($modificar->result() as $row):
    $orden = $row->orden;
    $idperfil = $row->idperfil;
    $nivel = $row->nivel;
    $descripcion = $row->descripcion;
    $hijode = $row->hijode;
    $referencia = $row->referencia;
    $icono = $row->icono;
    $descripcionPerfil = $row->descripcionPerfil;
    $id_menu = $row->id_menu;  
endforeach;
if ($padre === 'No posee'){
    $descripcionPadre = '';
}else{
   foreach ($padre->result() as $row):
     $descripcionPadre = $row->descripcionPadre;
endforeach; 
}?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

        <!-- BEGIN STYLE CUSTOMIZER -->

        <!-- END STYLE CUSTOMIZER -->
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Menu <small>Modificacion</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Menu</a>
                    <i class="fa fa-angle-right"></i>
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
                        <form action="<?php echo base_url() . 'Menu/c_menu/ModificaDatos'; ?>" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                                <input type="hidden" value="<?php echo $id_menu?>" name="id_menu" id="id_menu">
                                <input type="hidden" value="<?php echo $orden ?>" name="orden" id="orden"/>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Seleccione el Perfil</label>
                                    <div class="col-md-4">
                                        <select class="form-control input-large select2me" data-placeholder="Seleccionar..." name="perfil" id="perfil">
                                            <option value="<?php echo $idperfil?>"> <?php echo $descripcionPerfil ?></option>
                                            <?php
                                            foreach ($perfiles->result() as $row):
                                                echo '<option value = "' . $row->id_perfil . '">' . $row->descripcion . '</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ingrese el nombre</label>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-inline input-medium" value="<?php echo $descripcion?>" size="16" type="text"  name="nombreMenu" id="nombreMenu"/>
                                    </div>
                                    <?php echo form_error('nombreMenu') ?>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Menu Padre</label>
                                    <div class="col-md-4">
                                        <select class="form-control input-large select2me" data-placeholder="Seleccionar menu..." name="menuPadre" id="menuPadre">
                                            <option value="<?php echo ($id_menu-1)?>"><?php echo $descripcionPadre?></option>
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
                                        <input class="form-control form-control-inline input-medium" value="<?php echo $referencia?>" size="16" type="text" name="referencia" id="referencia"/>
                                        <span class="help-block">
                                            Ej: Carpeta/Controlador/Funcion</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ingrese el icono</label>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-inline input-medium" value="<?php echo $icono?>" size="16" type="text" name="icono" id="icono"/>
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