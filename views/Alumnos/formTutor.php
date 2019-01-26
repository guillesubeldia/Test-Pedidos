
<!-- INICIO CUERPO -->
<div class="content-wrapper">
  <div class="content-header">
    <h1>Registro de tutores</h1>
    <ol class="breadcrumb">
      <li>Alumnos</li>
      <li>Tutores</li>
      <li>Registrar</li>
    </ol>
  </div>
  <!-- INICIO CONTENT -->
  <section class="content">
    <!-- INICIO ROW -->
    <div class="row">
      <div class="col-md-10">
        <!-- INICIO BOX DE REGISTRO DE TutorS -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Datos del tutor</h3>
          </div>
          <div class="box-body">
            <!-- INICIO FORMULARIO DE REGISTRO DE TutorS -->
            <form role="form" id="form-tutores" method="post" action="<?php echo base_url() ?>/Alumnos/C_Alumnos/AltaTutor">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Tipo de documento (*)</label>
                        <select name="slctTipoDocumento" class="form-control">
                          <option value="1">DNI</option>
                          <option value="2">Pasaporte</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="">N&uacute;mero de documento (*)</label>
                        <input type="text" name="txtNroDocumento" minlength="7" maxlength="9" required class="form-control">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="">Nombre (*)</label>
                    <input type="text" name="txtNombre" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="">Apellido (*)</label>
                    <input type="text" name="txtApellido" class="form-control"required>
                  </div>



                  <div class="form-group">
                    <label for="txtProfesion">Profesión (*)</label>
                    <input type="text" name="txtProfesion" class="form-control" required>
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
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <select class="form-control" name="slctTipoContacto[]" tabindex="1">
                              <option value="1">Tel&eacute;fono fijo</option>
                              <option value="2">Tel&eacute;fono celular</option>
                              <option value="3">E-mail</option>
                            </select>
                          </td>
                          <td> <input type="text" name="txtContacto[]" class="form-control"> </td>
                          <td> <button type="button" class="btn btn-danger" onclick="eliminarContacto(this)">Eliminar</button> </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <button type="button" class="btn btn-info pull-right" onclick="agregarContacto()">
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
                       <select name="slctProvincia" class="form-control" required>
                         <?php foreach($provincias as $row) :?>
                           <!-- Se agregan los option y se compruebas uno por uno cual es el que debe estar seleccionado por defecto  -->
                           <option
                           <?php
                             echo "value='$row->id_ubicacion'";
                             echo ($id_provincia_default == $row->id_ubicacion ? "selected" : "")
                           ?>>
                             <?php echo $row->descripcion ?>
                           </option>
                         <?php endforeach ?>
                       </select>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Localidad</label>
                       <select class="form-control" name="slctLocalidad" required>
                         <?php foreach($localidades as $row) :?>
                           <!-- Se agregan los option y se compruebas uno por uno cual es el que debe estar seleccionado por defecto  -->
                           <option
                           <?php
                             echo "value='$row->id_ubicacion'";
                             echo ($id_localidad_default == $row->id_ubicacion ? "selected" : "")
                           ?>>
                             <?php echo $row->descripcion ?>
                          </option>
                         <?php endforeach ?>
                       </select>
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label for="">Calle</label>
                       <input type="text" name="txtCalle" class="form-control">
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Manzana</label>
                       <input type="text" name="txtManzana" class="form-control">
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">N&uacute;mero</label>
                       <input type="text" name="txtNumero" class="form-control">
                     </div>
                   </div>

                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Piso</label>
                       <input type="text" name="txtPiso" class="form-control">
                     </div>
                   </div>
                   <div class="col-md-2">
                     <div class="form-group">
                       <label for="">Departamento</label>
                       <input type="text" name="txtDepartamento" class="form-control">
                     </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                       <label for="">Observaciones</label>
                       <textarea name="txtObservaciones" rows="3" cols="80" class="form-control"></textarea>
                     </div>
                   </div>
                 </div>
               </div>
              </div>
            </form>
            <!-- FIN FORMULARIO DE REGISTRO DE TutorS -->
          </div>
          <div class="box-footer">
            <button type="submit" form="form-tutores" name="button" class="btn btn-primary pull-right">Continuar</button>
          </div>
        </div>
        <!-- FIN BOX DE REGISTRO DE TutorS -->
      </div>
    </div>
    <!-- FIN ROW -->
  </section>
  <!-- FIN CONTENT -->
</div>
<!-- FIN CUERPO -->
<script type="text/javascript">
var posicionCampo = 1;
function agregarContacto() {
/* Declaramos una variable llamada nuevaFila y a ella le asignamos la recuperación del elemento HTML designado por el id tablaContacto. En este caso, la tabla en la que manejamos los campos dinámicamente y llamamos a la función insertRow para agregar una fila */
  nuevaFila = document.getElementById("tablaContacto").insertRow(-1);
/* Asignamos a la propiedad id de nuevaFila el valor de posicionCampo, que inicializamos en 1 */
  nuevaFila.id = posicionCampo;
/* Luego en otra variable llamada nuevaCelda, agregaremos una celda a la tabla, mediante la función insertCell */
  nuevaCelda = nuevaFila.insertCell(-1);
/* Con la celda creada, insertamos dinámicamente un campo de texto, el cual almacenaremos en un array llamado nombre, con una posición equivalente a la variable posicionCampo. Una vez terminado, repetimos la acción asignando al array respectivo */
  nuevaCelda.innerHTML ="<td><select name='slctTipoContacto["+ posicionCampo +"]' data-placeholder='Seleccione ...' class='form-control select2' required><option></option><option value='1'>Tel&eacute;fono fijo</option><option value='2'>Tel&eacute;fono celular</option><option value='3'>Email</option></select></td>";
  nuevaCelda = nuevaFila.insertCell(-1);
  nuevaCelda.innerHTML ="<td><input name='txtContacto[" + posicionCampo + "]' type='text' class='form-control' required></td>";
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
