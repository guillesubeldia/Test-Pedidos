<?php
/*
 * Proyecto: Sistema Gestión Mediación.
 * Autor: Subeldia Guillermo.
 * Descripcion Funcional: Edicion de menu.
 * Fecha:10/06/2015.
 */
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Menu <small>Modificar</small>
        </h3>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Tabla Menu
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="tablaSimple">
                                <thead>
                                    <tr>
                                        <th>Descripcion</th>
                                        <th>Nivel</th>
                                        <th>Orden</th>
                                        <th>Referencia</th>
                                        <th>Hijo de</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($menu->result() as $row): ?>
                                        <tr>
                                    <input type="hidden" name="menuPadre" value="<?php echo $row->hijode; ?>">
                                    <td align="left"><?php echo $row->descripcion; ?></td>
                                    <td align="left"><?php echo $row->nivel; ?></td>
                                    <td align="left"><?php echo $row->orden; ?></td>
                                    <td align="left"><?php echo $row->referencia; ?></td>
                                    <td align="left"><?php echo $row->hijode; ?></td>
                                    <td aling="rigth">
                                      <a href="modificaMenu/<?php echo $row->id_menu."/".$row->hijode ;?>" class="btn default btn-xs purple"><i class="fa fa-edit"></i>Editar </a>
                                      <a href="ModificarPerfil/<?php echo $row->id_menu;?>" class="btn default btn-xs yellow"><i class="fa fa-user"></i>Perfiles </a>
                                      <a href="Eliminar/<?php echo $row->id_menu;?>" class="btn default btn-xs red"><i class="fa fa-trash"></i>Eliminar </a>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
<!-- END CONTENT -->
