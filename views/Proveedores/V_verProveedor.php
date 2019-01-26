<?php
foreach($proveedor as $row):
$nombre   = $row->nombre;
$cuit     = $row->cuit;
$calle    = $row->calle;
$numero   = $row->numero;
$piso     = $row->piso;
$manzana     = $row->manzana;
$piso     = $row->piso;
$departamento     = $row->departamento;
$observacion     = $row->observacion;
endforeach;

foreach($provincia as $row):
$provincia  = $row->descripcionpadre;
$localidad  = $row->descripcionhijo;
endforeach;

?>


<!-- INICIO CUERPO -->
<div class="content-wrapper">
  <div class="content-header">
    <h1>Informaci&oacute;n del Proveedor</h1>
    <ol class="breadcrumb">
      <li>Proveedor</li>
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
              <h3 class="box-title">Informaci&oacute;n Proveedor</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="">Nombre: </label>
                        <input type="text" class="form-control" value="<?php echo $nombre;?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="">N&uacute;mero de cuit: </label>
                        <input type="text" class="form-control" value="<?php echo $cuit;?>" readonly>
                      </div>
                    </div>
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
                              <td><?php echo $row->tipoContacto ?></td>
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
                       <input type="text" name="" value="<?php echo $provincia;?>" class="form-control" readonly>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Localidad:</label>
                       <input type="text" name="" value="<?php echo $localidad;?>" class="form-control" readonly>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label for="">Calle:</label>
                       <input type="text" value="<?php echo $calle; ?>" class="form-control" readonly>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Manzana:</label>
                       <input type="text" value="<?php echo $manzana; ?>" class="form-control" readonly>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">N&uacute;mero:</label>
                       <input type="text" value="<?php echo $numero; ?>" class="form-control" readonly>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Piso:</label>
                       <input type="text" value="<?php echo $piso; ?>" class="form-control" readonly>
                     </div>
                   </div>
                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Departamento:</label>
                       <input type="text" value="<?php echo $departamento; ?>" class="form-control" readonly>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Observaciones:</label>
                       <textarea name="txtObservaciones" rows="3" cols="80" class="form-control"readonly><?php echo $observacion; ?></textarea>
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
