
<!-- INICIO CUERPO -->
<div class="content-wrapper">
  <div class="content-header">
    <h1>Informaci&oacute;n del alumno</h1>
    <ol class="breadcrumb">
      <li>Alumnos</li>
      <li>Tutores</li>
      <li>Detalle</li>
    </ol>
  </div>
  <!-- INICIO CONTENT -->
  <section class="content">
    <!-- INICIO ROW -->
    <div class="row">
      <div class="col-md-7">
        <!-- INICIO BOX INFO -->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informaci&oacute;n personal</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Tipo de documento: </label>
                        <input type="text" name="" class="form-control" value="<?php echo $alumno->tipo_documento ?>" readonly>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="">N&uacute;mero de documento: </label>
                        <input type="text" class="form-control" value="<?php echo $alumno->numero_documento ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="">Nombre: </label>
                    <input type="text" class="form-control" value="<?php echo $alumno->nombre ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="">Apellido: </label>
                    <input type="text" class="form-control" value="<?php echo $alumno->apellido ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="">Grado: </label>
                    <input type="text" class="form-control" value="<?php echo $alumno->grado ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="">Nivel: </label>
                    <input type="text" class="form-control" value="<?php echo $alumno->nivel ?>" readonly>
                  </div>

                </div>
              </div>
            </div>
            <div class="box-footer">

            </div>
        </div>
        <!-- FIN BOX INFO -->
      </div>
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-12">
            <!-- INICIO BOX CONTACTO-->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Contacto</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <?php if(count($contacto) > 0) : ?>
                        <table class="table datatable">
                          <thead>
                            <tr>
                              <th>Tipo</th>
                              <th>Contacto</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($contacto as $row) :?>
                            <tr>
                              <td><?php echo $row->tipo ?></td>
                              <td><?php echo $row->descripcion ?></td>
                            </tr>
                          <?php endforeach ?>
                          </tbody>
                        </table>
                      <?php else : ?>
                        <div class="callout callout-default">
                          Sin informaci&oacute;n de contacto
                        </div>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
            </div>
            <!-- FIN BOX CONTACTO -->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- INICIO BOX HERMANOS-->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Hermanos</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <?php if(count($hermanos) > 0) : ?>
                        <table class="table datatable">
                          <thead>
                            <tr>
                              <th>Documento</th>
                              <th>Apellido</th>
                              <th>Nombre</th>
                              <th>Curso</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($hermanos as $row) :?>
                              <tr>
                                <td><?php echo $row->numero_documento ?></td>
                                <td><?php echo $row->apellido ?></td>
                                <td><?php echo $row->nombre ?></td>
                                <td><?php echo $row->grado . "-" . $row->nivel ?></td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      <?php else : ?>
                        <div class="callout callout-default">
                          No tiene hermanos registrados hasta el momento
                        </div>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
                <div class="box-footer">

                </div>
            </div>
            <!-- FIN BOX HERMANOS -->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- INICIO BOX TUTORES-->
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tutores</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <?php if(false) : //TODO Cambiar mas adelante. Temporalmene se queda así?>
                        <table class="table datatable">
                          <thead>
                            <tr>
                              <th>Documento</th>
                              <th>Apellido</th>
                              <th>Nombre</th>
                              <th>Curso</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($hermanos as $row) :?>
                              <tr>
                                <td><?php echo $row->numero_documento ?></td>
                                <td><?php echo $row->apellido ?></td>
                                <td><?php echo $row->nombre ?></td>
                                <td><?php echo $row->grado . "-" . $row->nivel ?></td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      <?php else : ?>
                        <div class="callout callout-default">
                          Pendiente de programar...
                        </div>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
                <div class="box-footer">

                </div>
            </div>
            <!-- FIN BOX TUTORES -->
          </div>
        </div>
      </div>
    </div>
    <!-- FIN ROW -->
    <!-- INICIO ROW DOMICILIO -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Domicilio</h3>
            </div>
            <div class="box-body">
              <div class="row">
               <div class="col-md-12">
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Provincia:</label>
                       <input type="text" name="" value="" class="form-control" readonly>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Localidad:</label>
                       <input type="text" name="" value="" class="form-control" readonly>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label for="">Calle:</label>
                       <input type="text" value="<?php echo $domicilio->calle ?>" class="form-control" readonly>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Manzana:</label>
                       <input type="text" value="<?php echo $domicilio->manzana ?>" class="form-control" readonly>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">N&uacute;mero:</label>
                       <input type="text" value="<?php echo $domicilio->numero ?>" class="form-control" readonly>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Piso:</label>
                       <input type="text" value="<?php echo $domicilio->piso ?>" class="form-control" readonly>
                     </div>
                   </div>
                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Departamento:</label>
                       <input type="text" value="<?php echo $domicilio->departamento ?>" class="form-control" readonly>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Observaciones:</label>
                       <textarea name="txtObservaciones" rows="3" cols="80" class="form-control"readonly><?php echo $domicilio->observacion ?></textarea>
                     </div>
                   </div>
                 </div>
               </div>
              </div>
            </div>
            <div class="box-footer">

            </div>
          </div>
        </div>
      </div>
    <!-- FIN ROW DOMICILIO -->
  </section>
  <!-- FIN CONTENT -->
</div>
<!-- FIN CUERPO -->
