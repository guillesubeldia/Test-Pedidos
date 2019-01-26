<!-- END CONTENT --><?php
/*
 * Proyecto: Sistema Gestión GYM.
 * Autor: Subeldia Guillermo.
 * Descripcion Funcional: Datos de la persona.
 * Fecha:15/12/2015.
 */
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <div class="page-head">
            <div class="page-title">
                <h1>Busqueda de Usuarios</h1>
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
                <a href="#">Lista Usuarios</a>
            </li>
        </ul>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box red">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Tabla Datos de Persona
                        </div>
                    </div>
                   
                    <div class="portlet-body">
                        <div class="portlet-body">
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                    <tr>
                                    <th> Nombre </th>
                                    <th> Apellido </th>
                                    <th> Usuario </th>
                                    <th> Acciones </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usuarios->result() as $row): ?>
                                    <tr>
                                        <input type="hidden" name="id_persona" value="<?php echo $row->id_persona; ?>">
                                        <td align="left"><?php echo $row->nombre; ?></td>
                                        <td align="left"><?php echo $row->apellido; ?></td>
                                    <?php if ($row->nombreUsuario == '') { ?>
                                        <td><span style="color:#FF0000; font-size: 12px;">NO REGISTRA</span></td>
                                    <?php } else { ?>
                                        <td><span class="label label-warning">//<?php echo $row->nombreUsuario; ?></span></td>
                                    <?php } ?>
                                    <?php if ($row->nombreUsuario == '') { ?> <!-- END<span class="Label label-primary">Crear</span> <span class="label label-warning">Editar</span> ><span class="label label-warning">Restablecer</span>-->
                                        <td><a href="altaDatos/<?php echo $row->id_persona ?>" class=" icon-user-follow"  style="color: green; font-size: 24px;" title="Crear" ></a></td>
                                    <?php } else { ?>
                                        <td><a href="editar/<?php echo $row->id_persona ?>" class="icon-pencil"  style="color: blue; font-size: 24px;" title="Editar datos" ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="restablecer/<?php echo $row->id_persona ?>" class="icon-key"  style="color:#4682B4; font-size: 24px;" title="Restablecer Contraseña" ></a></td>
                                        <?php } ?>
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