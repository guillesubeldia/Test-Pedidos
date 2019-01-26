<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Menu
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
                        <br>
                        <br>
                        <form name="FormularioAdmin" action="<?php echo base_url() . 'Menu/c_menu/BajaPerfiles'; ?>" class="form-horizontal" method="post">
                            <?php form_open('Menues/c_menu/AltaPerfiles'); ?>
                            <table name="altas" class="table table-striped table-hover table-bordered" id="tabla">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Perfiles</th>
                                    </tr>
                                </thead>
                                Perfiles activos del Menu: <b><?php
                                    foreach ($idmenu as $registro):
                                        echo element('descripcion', $registro);
                                    endforeach;
                                    ?></b>
                                <input type="hidden" name="id_menu" value="<?php echo element('id_menu', $registro) ?>"/>
                                <br>
                                <br>
                                <tbody>
                                    <?php
                                    if (count($consulta) > 0) {
                                        foreach ($consulta as $registro):
                                            ?>
                                            <tr>
                                                <td><input name="deshabilitar[]" id="deshabilitar"  type="checkbox" value='<?php echo element("perfiluno", $registro); ?>'></td>
                                                <td><?php echo element('descripcion', $registro); ?></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    } else {
                                        ?><td></td>
                                    <td><?php echo "El Menu no posee Perfiles habilitados"; ?></td><?php } ?>
                                </tbody>
                            </table>
                            <button name='BajaPerfiles' type='submit'  class='btn red'> Baja Perfiles</button></p>
                            <br>
                        </form>
                        <form name="FormularioAd" action="<?php echo base_url() . 'Menu/c_menu/AltaPerfiles'; ?>" class="form-horizontal" method="post">
                            <table name="bajas" class="table table-striped table-hover table-bordered" id="tabla2">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Perfiles</th>
                                    </tr>
                                </thead>
                                Perfiles no activos del Menu: <b><?php
                                    foreach ($idmenu as $registro):
                                        echo element('descmenu', $registro);
                                    endforeach;
                                    ?></b>
                                <input type="hidden" name="id_menu" value="<?php echo element('id_menu', $registro) ?>"/>
                                <br>
                                <br>
                                <tbody>
                                    <?php
                                    if (count($bajas) > 0) {
                                        foreach ($bajas as $registro):
                                            ?>
                                            <tr>
                                                <td><input name="habilitar[]" id="habilitar"  type="checkbox" value='<?php echo element("perfil", $registro); ?>'></td>
                                                <td><?php echo element('descripcion', $registro); ?></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    } else {
                                        ?><td></td>
                                    <td><?php echo "El Menu no posee Perfiles deshabilitados"; ?></td><?php } ?>
                                </tbody>
                            </table>
                            <button name='AltaPerfiles' type='submit' class='btn green'> Alta Perfiles</button></p>
                            <?php form_close(); ?>
                        </form>
                        <br>
                        <br>
                        <br>
                        <a href="<?php echo base_url() . 'Menu/c_menu/modificar'; ?>" class="btn blue"><i class="icon-edit"></i>&nbsp;Volver</a>
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
