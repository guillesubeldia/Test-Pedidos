<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="">Inicio</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Usuarios</span>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Empleados</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject bold uppercase"> Tabla Empleados</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="<?php echo base_url().'/Administracion/Persona/EnanUsua01Controller/AltaPersona'?>" class="btn sbold green"> Agrear Personas
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>










                        </div>
                        <table id="tablaDinamica" cellspacing="0"  class="table table-striped table-bordered" >
                          <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>DNI</th>
                                  <th>CUIL/CUIT</th>
                                  <th>Contacto</th>
                                  <th>Fecha de Alta</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>Nombre</th>
                                  <th>DNI</th>
                                  <th>CUIL/CUIT</th>
                                  <th>Contacto</th>
                                  <th>Fecha de Alta</th>
                                  <th>Acciones</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            <?php foreach ($obtenerEmpleados->result() as $row): ?>
                            <tr>
                                 <td><?php echo $row->enanusua01_nombre.", ".$row->enanusua01_apellido; ?></td>
                                 <td><?php echo $row->enanusua01_dni; ?></td>
                                 <td><?php echo $row->enanusua01_cuilt; ?></td>
                                 <td><a aria-hidden="true">Contacto</a></td>
                                 <td><?php echo $row->enanusua04_falta; ?></td>
                                 <td>
                                   <a href="<?php echo base_url()."Usuarios/C_Usuarios/AltaUsuario/".base64_encode($row->id_enanusua04);?>" aria-hidden="true" title="Crear Usuario" class="icon-user-follow"><?php echo "&nbsp";?></a>
                                 </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php foreach ($obtenerUsuariosEmpleados->result() as $row): ?>
                            <tr>
                                 <td><?php echo $row->enanusua01_nombre.", ".$row->enanusua01_apellido; ?></td>
                                 <td><?php echo $row->enanusua01_dni; ?></td>
                                 <td><?php echo $row->enanusua01_cuilt; ?></td>
                                 <td><a aria-hidden="true">Contacto</a></td>
                                 <td><?php echo $row->enanusua04_falta; ?></td>
                                 <td>
                                   <a href="EditarPerfiles/<?php echo base64_encode($row->rela_enanusua04);?>" aria-hidden="true" title="Editar" class="icon-pencil"><?php echo "&nbsp";?></a>
                                   <a href="<?php echo base_url()."Usuarios/C_Usuarios/ReestablecerPassword/".base64_encode($row->rela_enanusua04);?>" aria-hidden="true" title="Reestablecer Contraseña" class="icon-refresh"><?php echo "&nbsp";?></a>
                                   <a href="EliminarUsuario/<?php echo base64_encode($row->rela_enanusua04);?>" aria-hidden="true" title="Eliminar Usuario" class="icon-trash"><?php echo "&nbsp";?></a>
                                 </td>
                            </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
