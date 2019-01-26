<?php
foreach($obtenerProveedor->result() as $row):
$idProveedor        = $row->id_persona;

$nombreProveedor = $row->nombre;
$cuitProveedor = $row->cuit;

$calleProveedor = $row->calle;
$numeroProveedor = $row->numero;
$pisoProveedor = $row->piso;
$departamentoProveedor = $row->departamento;
$manzanaProveedor = $row->manzana;
$observacionProveedor = $row->observacion;
endforeach;

foreach($datosProvincias as $row):
$provinciaDescripcion = $row->descripcionpadre;
$idProvincia          = $row->idpadre;
$localidadDescripcion = $row->descripcionhijo;
$idLocalidad          = $row->idhijo;
endforeach;
?>
<script>
$(document).ready(function () {
  $("#provinciaProveedor").change(function () {
      $("#provinciaProveedor option:selected").each(function () {
          provinciaProveedor = $('#provinciaProveedor').val();
          $.post("<?php echo base_url();?>index.php/Proveedores/C_Proveedores/BuscarLocalidad/", {
              provinciaProveedor: provinciaProveedor
          }, function (data) {
              $("#localidadProveedor").html(data);
          });
      });
  });
});
</script>
<!-- INICIO CUERPO -->
<div class="content-wrapper">
  <div class="content-header">
    <h1>Registro de Proveedores</h1>
    <ol class="breadcrumb">
      <li>Proveedor</li>
      <li>Registro</li>
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
            <h3 class="box-title">Datos del Proveedor</h3>
          </div>
          <div class="box-body">
            <!-- INICIO FORMULARIO DE REGISTRO DE ALUMNOS -->
            <form role="form" action="<?php echo base_url()."index.php/Proveedores/C_Proveedores/ActualizarProveedor";?>" method="post">
              <input type="hidden" name="idProveedor" value="<?php echo $idProveedor;?>" class="form-control" required>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label >Nombre Proveedor (*)</label>
                    <input type="text" name="nombreProveedor" value="<?php echo $nombreProveedor;?>" class="form-control" required>
                      <p class="help-block"><?php echo form_error('nombreProveedor'); ?></p>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>CUIT</label>
                        <input type="text" name="cuitProveedor" value="<?php echo $cuitProveedor;?>" class="form-control" required>
                        <p class="help-block"><?php echo form_error('cuitProveedor'); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

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
                          <th>Observacion</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>


                          <?php
                          $i = 1;
                         if(count($datosContacto) > 0){
                           $condicion= "";
                          foreach ($datosContacto as $row):
                            echo '<tr id="'.$i.'">';
                            echo '<td>';
                            echo '<select class="form-control" name="tipoContactoProveedor['.$i.']" tabindex="'.$i.'" required>';
                            echo '<option value = "' . $row->id_tipo_contacto . '">' . $row->tipoContacto . '</option>';
                            echo '</td>';
                            echo '<td> <input required type="text" value="'.$row->descripcion.'" name="contactoProveedor['.$i.']" class="form-control"> </td>';
                            echo '<td> <input required type="text" value="'.$row->observacion.'" name="observacionContactoProveedor['.$i.']" class="form-control"> </td>';
                            echo '<td> <button type="button" value="Eliminar" onclick="eliminarContacto(this)"" class="btn btn-danger">Eliminar</button></td>';
                            echo '</tr>';
                            $i++;
                          endforeach;
                        }else{
                            $condicion = "required";
                        }
                          ?>
                        <tr id="<?php echo $i;?>">
                          <td>
                            <select class="form-control" name="tipoContactoProveedor[<?php echo $i;?>]" tabindex="1" <?php echo $condicion;?>>
                            <?php
                                foreach ($tipoContacto->result() as $row):
                                    echo '<option value = "' . $row->id_tipo_contacto . '">' . $row->descripcion . '</option>';
                                endforeach;
                                ?>
                            </select>
                          </td>
                          <td> <input <?php echo $condicion;?> type="text"  name='contactoProveedor[<?php echo $i;?>]' class="form-control"> </td>
                          <td> <input <?php echo $condicion;?> type="text"  name='observacionContactoProveedor[<?php echo $i;?>]' class="form-control"> </td>
                          <td> <button type="button" value='Eliminar' onclick='eliminarContacto(this)' class="btn btn-danger">Eliminar</button></td>
                        </tr>
                    <?php $contadorProveedor=2; ?>
                      </tbody>
                    </table>
                  </div>
                  <button type="button" onClick="agregarContacto()" class="btn btn-info pull-right">
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
                   <div class="col-md-11">
                     <div class="form-group">
                       <label >Provincia</label>
                       <select class="form-control select2" id="provinciaProveedor" name="provinciaProveedor" required>
                         <option value="<?php echo $idProvincia;?>" selected><?php echo $provinciaDescripcion;?></option>
                         <?php
                             foreach ($obtenerProvincias->result() as $row):
                                 echo '<option value = "' . $row->id_ubicacion . '">' . $row->descripcion . '</option>';
                             endforeach;
                             ?>
                       </select>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-11">
                     <div class="form-group">
                       <label >Localidad</label>
                       <select class="form-control select2" id="localidadProveedor" name="localidadProveedor" required>
                          <option value="<?php echo $idLocalidad;?>" selected><?php echo $localidadDescripcion;?></option>
                       </select>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label >Calle</label>
                       <input  type="text" name="calleProveedor" value="<?php echo $calleProveedor;?>" class="form-control" required>
                       <p class="help-block"><?php echo form_error('calleProveedor'); ?></p>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label >Manzana</label>
                       <input  type="text" name="manzanaProveedor" value="<?php echo $manzanaProveedor;?>" class="form-control" required>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label >N&uacute;mero</label>
                       <input  type="text" name="numeroProveedor" value="<?php echo $numeroProveedor;?>" class="form-control" required>
                       <p class="help-block"><?php echo form_error('numeroProveedor'); ?></p>
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label >Piso</label>
                       <input  type="text" name="pisoProveedor" value="<?php echo $pisoProveedor;?>" class="form-control" required>
                     </div>
                   </div>
                   <div class="col-md-2">
                     <div class="form-group">
                       <label >Departamento</label>
                       <input  type="text" name="departamentoProveedor" value="<?php echo $departamentoProveedor;?>" class="form-control" required>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label >Observaciones</label>
                       <textarea name="observacionProveedor" rows="3" cols="80" class="form-control" required><?php echo $observacionProveedor;?></textarea>
                     </div>
                   </div>
                 </div>
               </div>
              </div>

            <!-- FIN FORMULARIO DE REGISTRO DE ALUMNOS -->
          </div>
          <div class="box-footer">
            <button type="submit" name="button" class="btn btn-primary pull-right">Continuar</button>
          </div>
        </div>

        </form>
        <!-- FIN BOX DE REGISTRO DE ALUMNOS -->
      </div>
    </div>
    <!-- FIN ROW -->
  </section>
  <!-- FIN CONTENT -->
</div>
<!-- FIN CUERPO -->


<script type="text/javascript" language="javascript">
/* Partimos por definir una variable llamada posicionCampo. Esta variable servirá como índices para marcar cuantos campos se han agregado dinámicamente. La inicializamos en 1, ya que la primera llamada ocurrirá cuando no hayan campos agregados */
var posicionCampo = <?php echo $contadorProveedor;?>;
/* Declaramos la función agregarContacto( ) */
function agregarContacto() {
/* Declaramos una variable llamada nuevaFila y a ella le asignamos la recuperación del elemento HTML designado por el id tablaContacto. En este caso, la tabla en la que manejamos los campos dinámicamente y llamamos a la función insertRow para agregar una fila */
    nuevaFila = document.getElementById("tablaContacto").insertRow(-1);
/* Asignamos a la propiedad id de nuevaFila el valor de posicionCampo, que inicializamos en 1 */
    nuevaFila.id = posicionCampo;
/* Luego en otra variable llamada nuevaCelda, agregaremos una celda a la tabla, mediante la función insertCell */
    nuevaCelda = nuevaFila.insertCell(-1);
/* Con la celda creada, insertamos dinámicamente un campo de texto, el cual almacenaremos en un array llamado nombre, con una posición equivalente a la variable posicionCampo. Una vez terminado, repetimos la acción asignando al array respectivo */
    nuevaCelda.innerHTML ="<td><div class='col-md-12'><select name='tipoContactoProveedor["+ posicionCampo +"]' data-placeholder='Seleccione ...' class='form-control select2' required><option></option>  <?php   foreach ($tipoContacto->result() as $row):   echo '<option value = ' . $row->id_tipo_contacto . '>' . $row->descripcion . '</option>';          endforeach;         ?></select></div></td>";
    nuevaCelda = nuevaFila.insertCell(-1);
    nuevaCelda.innerHTML ="<td><div class='col-md-12'><input required name='contactoProveedor[" + posicionCampo + "]' type='text' class='form-control' required></div></td>";

    nuevaCelda = nuevaFila.insertCell(-1);
    nuevaCelda.innerHTML ="<td><div class='col-md-12'><input required name='observacionContactoProveedor[" + posicionCampo + "]' type='text' class='form-control' required></div></td>";
/* Finalmente añadimos una última celda para las acciones y ahí agregamos un botón llamado Eliminar, el cual al ser presionado (definiendo la propiedad onClick), llamará a una función eliminarContacto, pasando como parámetro la fila correspondiente */
    nuevaCelda = nuevaFila.insertCell(-1);
    nuevaCelda.innerHTML = "<td><input type='button' value='Eliminar' onclick='eliminarContacto(this)' class='btn btn-danger'></td>";
/* Incrementamos el valor de posicionCampo para que empiece a contar de la fila siguiente */
    posicionCampo++;
}
/* Definimos la función eliminarContacto, la cual se encargará de quitar la fila completa del formulario. No es necesario hacer modificaciones sobre este código */
function eliminarContacto(obj) {
    var oTr = obj;
    while(oTr.nodeName.toLowerCase() != 'tr') {
        oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
}
</script>
