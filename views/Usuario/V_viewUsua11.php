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
                    <span>Perfiles</span>
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
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase">Tabla Lista de Perfiles</span>
                        </div>
                    </div>
                    <div class="portlet-body">




                        <div id="agregarPerfil" class="modal fade" tabindex="-1" data-width="760">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Alta Perfil</h4>
                            </div>
                            <form action="<?php echo base_url() . "Usuarios/C_Usuarios/CargarPerfil";?>" method="post"  class="form-horizontal">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <h4>Nombre Perfil</h4> </p>
                                        <p>
                                            <input name="descripcionPerfil" class="form-control" type="text" required>
                                          <span class="help-block"><font color="blue">Solo caracteres alfabeticos.</font></span>
                                         </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-outline dark">Cerrar</button>
                                <button type="submit" class="btn green">Agregar</button>
                            </div>
                            </form>
                        </div>



                      <!-- /.modal -->
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                      <a class="btn red btn-outline sbold" data-toggle="modal" href="#agregarPerfil">Agregar Perfiles<i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table cellspacing="0"  class="table table-striped table-bordered" >
                          <thead>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>Nombre</th>
                                  <th>Acciones</th>
                              </tr>
                          </tfoot>
                          <tbody>
                            <?php foreach ($perfiles->result() as $row): ?>
                            <tr>
                                 <td><?php echo $row->enanusua11_descripcion; ?></td>
                                 <td>
                                   <a href="<?php echo base_url()."Usuarios/C_Usuarios/EditarPerfil/".base64_encode($row->id_enanusua11);?>" class="btn sbold blue" aria-hidden="true"><i class="icon-pencil"> Editar</i></a>
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
