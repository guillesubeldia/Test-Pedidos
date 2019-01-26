<!-- INICIO CUERPO -->
<div class="content-wrapper">
  <div class="content-header">
    <h1>Alumnos del Grado</h1>
    <ol class="breadcrumb">
      <li>Cuotas</li>
      <li>Grado</li>
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
            <h3 class="box-title">Datos del Grado</h3>
          </div>
          <div class="box-body">
            <!-- INICIO FORMULARIO DE REGISTRO DE ALUMNOS -->
            <form role="form" action="<?php echo base_url()."/cuota/C_cuota/AltaCuota";?>" method="post">
              <input type="hidden" name="idGrado" id="idGrado" value="<?php echo $idGrado;?>">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Listado Alumnos</label>
                    <select class="form-control select2" name="alumno" onchange="verElemento()" id="alumno" tabindex="1" required>
                      <option value="" selected disabled>Seleccione un alumno</option>
                    <?php
                        foreach ($datosAlumnos->result() as $row):
                            echo '<option value = "' . $row->id_persona . '">' . $row->apellido.', '.$row->nombre.'.DNI: '.$row->numero_documento.'</option>';
                        endforeach;
                        ?>
                    </select>
                      <p class="help-block">Seleccione un alumno para ver el listado de Cuotas.</p>
                  </div>
                <div id="tipoCuota" style="display:none;">
                	<div class="row">
                		<div class="col-md-12">
                			<div class="form-group">
                				<label>Tipo Pago</label>
                				<select class="form-control" onchange="mostrarTabla()" name="tipoPago" id="tipoPago" tabindex="0" required>
                                          <option value="" selected disabled>Seleccione el tipo de pago a realizar.</option>
                                          <?php
                                              foreach ($tipoCuota->result() as $row):
                                                  echo '<option value = "'.$row->id_tipocuota.'">'.$row->descripcion.'</option>';
                                              endforeach;
                                              ?>
                                        </select>
                				<p class="help-block">Seleccione que debe pagar.</p>
                			</div>
                		</div>
                	</div>
                </div>

                <div id="divMontoPago" style="display:none;">

                	<!-- <div class="row">
                		<div class="col-md-12">
                			<div class="form-group">
                				<label>Monto a Pagar</label>
                				<input type="text" min="0" class="form-control" name="montoPago" id="montoPago" required>
                				<p class="help-block">Seleccione que debe pagar.</p>
                			</div>
                		</div>
                	</div> -->

                </div>
                <!-- Solo si selecciona la Cuota mensual, cargar la tabla con los meses adeudados (sin pagar - con pago parcial)  -->
                <div id="tabla" style="display:none;">
                	<div class="row">
                		<div class="col-md-12">
                			<div class="table-toolbar" id="tablaCuotas">
                			</div>
                      <div class="col-md-2">
                          <div class="btn-group">
                              <button type="button" id='checkall' data-checked='false' class="btn btn-default btn-md"><i class="fa fa-check-square-o"></i>Seleccionar todos</button>
                          </div>
                      </div>
                		</div>
                	</div>
                	<!-- Cierro div del hide tabla -->
                </div>
                  <div id="botonPago" style="display:none;">
                      <div class="box-footer">
                        <button type="submit" id="enviarDatos" name="button" class="btn btn-primary pull-right">Pagar</button>
                      </div>
                  </div>
                </div>
                </div>
                <!-- FIN FORMULARIO DE REGISTRO DE ALUMNOS -->
                </div>
<!-- <div class="box-footer">
	<button type="submit" name="button" class="btn btn-primary pull-right">Continuar</button>
</div> -->
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
<script>
//Funcion para seleccionar todos los checkbox
$('#checkall').click(function(){
    var d = $(this).data(); // access the data object of the button
    $(':checkbox').prop('checked', !d.checked); // set all checkboxes 'checked' property using '.prop()'
    d.checked = !d.checked; // set the new 'checked' opposite value to the button's data object
});

function verElemento() {
    var elemento = document.getElementById("alumno").value;
    if (elemento != 0) {
      tipoCuota.style.display = "block";
    }
  }
function mostrarTabla() {
    var select = document.getElementById("tipoPago").value;
    botonPago.style.display = "block";
    divMontoPago.style.display = "block";
      BuscarPrecioPago();
    if (select == 4) {
      BuscarPorParametros();
      tabla.style.display = "block";
      divMontoPago.style.display = "none";
      montoPago.required = false;

    }else{

      tabla.style.display = "none";
    }
  }

  window.onload = function() {
    BuscarPorParametros();

  }
  function BuscarPorParametros() {
  var idAlumno = document.getElementById("alumno").value;
    $.post("<?php echo base_url() ?>/cuota/C_cuota/CargarCuotas",{
      idAlumno:idAlumno,
    },
      function(data) {
        document.getElementById('tablaCuotas').innerHTML = data; //Se muestra el resultado
      });
    }

    function BuscarPrecioPago(){
      var idAlumno = document.getElementById("alumno").value;
      var idGrado = document.getElementById("idGrado").value;
      var tipoPago = document.getElementById("tipoPago").value;
       $.post("<?php echo base_url() ?>/cuota/C_cuota/BuscarPrecio",{
        idAlumno:idAlumno,
        idGrado:idGrado,
        tipoPago:tipoPago,
      },
        function(data) {
          document.getElementById('divMontoPago').innerHTML = data; //Se muestra el resultado
        });
    }
</script>
