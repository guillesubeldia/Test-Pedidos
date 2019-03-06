<?php
foreach($usuario as $row):
    $idUsuario          = $row->id_usuario;
    $nombreUsuario      = $row->nombreusuario;
    $descripcion        = $row->descripcion;
endforeach;
?>
<!-- INICIO CUERPO -->
<div class="content-wrapper">
  <div class="content-header">
    <h1>Perfil de Usuario</h1>
    <ol class="breadcrumb">
      <li>Perfil</li>
      <li>Modificar</li>
    </ol>
  </div>
  <!-- INICIO CONTENT -->
  <section class="content">
    <!-- INICIO ROW -->
    <div class="row">
      <div class="col-md-12">
        <!-- INICIO BOX DE REGISTRO DE usuario -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Datos del Usuario</h3>
          </div>
          <div class="box-body">
            <!-- INICIO FORMULARIO DE REGISTRO DE usuario -->
            <form role="form" method="post" onsubmit="return Validar();" id="form-pedido" action="<?php echo base_url() . 'usuario/C_usuario/ActualizarPass'?>" autocomplete="off">
              
              <div class="row">

                <div class="col-md-12">

                  <div class="form-group">
                    <label for="">Nombre Usuario</label>
                    <input type="text" name="txtNombreUsuario" id="nombreUsuario" value="<?php echo $nombreUsuario;?>" class="form-control" disabled>
                  </div>

                  <div class="form-group">
                    <label for="">Perfil</label>
                    <input type="text" name="txtDescripcion" value="<?php echo $descripcion;?>" class="form-control" disabled>
                  </div>

                </div>
              </div>
            

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input onkeyup="check();" type="password" minlength="5" title="Mínimo 5 caracteres" value="" id="confirmarPassword" class="form-control" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="">Repetir Contraseña</label>
                        <input onkeyup="check();" type="password" minlength="5" title="Mínimo 5 caracteres" name="password" id="password" value="" class="form-control" autocomplete="off">
                        <span id="message"></span>
                    </div>
            <input type="hidden" value="<?php echo $idUsuario;?>" name="txtUsuario">
            <input type="hidden" value="" id="txtEstado" name="txtEstado">

                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <!-- <button type="submit" form="form-pedido" name="button" class="btn btn-primary pull-right">Finalizar</button> -->
                    <button onClick="VerificarEstado()" class="btn btn-primary pull-right">Verificar</button>
                </div>
            </div>



            </div>
            </form>
            <!-- FIN FORMULARIO DE REGISTRO DE usuario -->
          </div>
        </div>
        <!-- FIN BOX DE REGISTRO DE usuario -->
      </div>
    </div>
    <!-- FIN ROW -->
  </section>
  <!-- FIN CONTENT -->
</div>
<!-- FIN CUERPO -->
<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirmarPassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Coinciden';

    document.getElementById('txtEstado').value = "1";
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'No Coinciden';
    document.getElementById('txtEstado').value = "0";
  }

switch(document.getElementById('password').value) { 
case '12345':
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Incremente la dificultad de la contraseña';
    document.getElementById('txtEstado').value = "0";
    break;  
case 'qwerty':
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Incremente la dificultad de la contraseña';
    document.getElementById('txtEstado').value = "0";
    break;  
case 'asdfg':
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Incremente la dificultad de la contraseña';
    document.getElementById('txtEstado').value = "0";
    break;
  default:
    
    } 
}

function Validar(){
var longitud = document.getElementById('password').value;
if (longitud.length < 5 ) {
    document.getElementById('txtEstado').value = "0";
}
if(document.getElementById('nombreUsuario').value == document.getElementById('password').value ){
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Su nombre y contraseña deben ser diferentes!';
    document.getElementById('txtEstado').value = "0";
}
var estado = document.getElementById('txtEstado').value;

if(estado == 1){
    return true; 
}else{
    return false; 
}
  
}
</script>