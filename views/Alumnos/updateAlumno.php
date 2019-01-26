<!-- INICIO CUERPO -->
<div class="content-wrapper">
  <div class="content-header">
    <h1>Actualizar informaci&oacute;n de alumno</h1>
    <ol class="breadcrumb">
      <li>Alumnos</li>
      <li>Actualizar</li>
    </ol>
  </div>
  <!-- INICIO CONTENT -->
  <section class="content">
    <!-- INICIO ROW -->
    <div class="row">
      <div class="col-md-10">
        <!-- INICIO BOX DE REGISTRO DE ALUMNOS -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Datos del alumno</h3>
          </div>
          <div class="box-body">
            <!-- INICIO FORMULARIO DE REGISTRO DE ALUMNOS -->
            <form role="form" >
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Nombre (*)</label>
                    <input type="text" name="txtNombreAlumno" class="form-control" value="<?php echo $alumno->nombre ?>">
                  </div>

                  <div class="form-group">
                    <label for="">Apellido (*)</label>
                    <input type="text" name="txtApellidoAlumno" class="form-control" value="<?php echo $alumno->apellido ?>">
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Tipo de documento (*)</label>
                        <select name="slctTipoDocumentoAlumno" class="form-control" disabled>
                          <option value="1">DNI</option>
                          <option value="2">Pasaporte</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="">N&uacute;mero de documento (*)</label>
                        <input type="text" name="txtNroDocumentoAlumno" class="form-control" value="<?php echo $alumno->numero_documento ?>" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="">Escuela de origen</label>
                    <input type="text" name="txtEscuelaOrigen" class="form-control" value="<?php echo $alumno->escuela_anterior ?>" disabled>
                  </div>


                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nivel (*)</label>
                        <select class="form-control" name="slctNivel">
                          <option value="-1"></option>
                          <option value="1">Preescolar</option>
                          <option value="2">Primaria</option>
                          <option value="3">Secundaria</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="">Grado (*)</label>
                        <select class="form-control" name="slctGrado">
                          <option value="-1"></option>
                          <option value="1">Primer a&ntilde;o</option>
                          <option value="2">Segundo a&ntilde;o</option>
                          <option value="3">Tercero a&ntilde;o</option>
                          <option value="4">Cuarto a&ntilde;o</option>
                          <option value="5">Quinto a&ntilde;o</option>
                          <option value="6">Sexto a&ntilde;o</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- INICIO INFO PADRES  -->
                <div class="row">
                  <div class="col-md-12">
                    <hr>
                    <h4>Tutores</h4>
                    <hr>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label  class="control-label">Padre</label>
                        <div class="input-group">
                          <select id="padre" name="padre" class="form-control" data-placeholder="Seleccione..." disabled>
                            <option value="1"></option>
                          </select>
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-info form-control" id="editarPadre"><span class="fa fa-edit"></span>&nbsp;Editar</button>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label  class="control-label">Madre</label>
                      <div class="input-group">
                        <select id="madre" name="madre" class="form-control" data-placeholder="Seleccione..." disabled>
                          <option value="1"></option>
                        </select>
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-info form-control" id="agregarPadre"><span class="fa fa-edit"></span>&nbsp;Editar</button>
                        </div>
                      </div>
                    </div>
                </div>

              </div>
              <!--  -->

              <div class="row">
                <div class="col-md-12">
                  <hr>
                  <h4>Informaci&oacute;n de contacto</h4>
                  <hr>
                  <div class="table-scrollable">
                    <table id="tablaContacto" class="table table-striped table-bordered table-advance table-hover">
                      <thead>
                        <tr>
                          <th>Tipo de contacto</th>
                          <th>Contacto</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($contacto as $row) :?>
                          <tr>
                            <td>
                              <select class="form-control" name="slctTipoContacto[]" tabindex="1">
                                <option value="1" <?php echo ($row->rela_tipo_contacto == 1 ? "selected" : "")?>>Tel&eacute;fono fijo</option>
                                <option value="2" <?php echo ($row->rela_tipo_contacto == 2 ? "selected" : "")?>>Tel&eacute;fono celular</option>
                                <option value="3" <?php echo ($row->rela_tipo_contacto == 3 ? "selected" : "")?>>E-mail</option>
                              </select>
                            </td>
                            <td> <input type="text" name="txtContacto[]" class="form-control" value='<?php echo "$row->descripcion" ?>'> </td>
                            <td> <button type="button" class="btn btn-small btn-danger">Eliminar</button> </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <button type="button" class="btn btn-info pull-right">
                    <span class="glyphicon glyphicon-plus"></span>
                    &nbsp;Agregar contacto
                  </button>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <hr>
                  <h4>Domicilio</h4>
                  <hr>
                </div>
               <div class="col-md-12">
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Provincia</label>
                       <select class="form-control" name="">

                       </select>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Localidad</label>
                       <select class="form-control" name="">

                       </select>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label for="">Calle</label>
                       <input type="text" name="" class="form-control" value="<?php echo $domicilio->calle ?>">
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Manzana</label>
                       <input type="text" name="" class="form-control" value="<?php echo $domicilio->manzana ?>">
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">N&uacute;mero</label>
                       <input type="text" name="" class="form-control" value="<?php echo $domicilio->numero ?>">
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Piso</label>
                       <input type="text" name="" class="form-control" value="<?php echo $domicilio->piso ?>">
                     </div>
                   </div>
                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Departamento</label>
                       <input type="text" name="" class="form-control" value="<?php echo $domicilio->departamento ?>">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Observaciones</label>
                       <textarea name="txtObservaciones" rows="3" cols="80" class="form-control" value="<?php echo $domicilio->observacion ?>"></textarea>
                     </div>
                   </div>
                 </div>
               </div>
              </div>
            </form>
            <!-- FIN FORMULARIO DE REGISTRO DE ALUMNOS -->
          </div>
          <div class="box-footer">
            <button type="submit" name="button" class="btn btn-primary pull-right">Continuar</button>
          </div>
        </div>
        <!-- FIN BOX DE REGISTRO DE ALUMNOS -->
      </div>
    </div>
    <!-- FIN ROW -->
  </section>
  <!-- FIN CONTENT -->
</div>
<!-- FIN CUERPO -->
