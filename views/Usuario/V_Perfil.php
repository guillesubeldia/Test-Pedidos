<?php
foreach($usuario->result() as $row):
$usuario = $row->nombrepersona;
$perfil = $row->perfilusuario;
endforeach;
?>

<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url()?>"><b>Maradona</b> Sys</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Actualizar Contraseña</p>

    <form action="<?php echo base_url()."index.php/Usuario/C_Usuario/CambiarPassword";?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" value="<?php echo $usuario;?>" class="form-control" placeholder="Full name" readonly>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="confirm_password" placeholder="Confirme password" name="confirmapassword">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



    <a href="<?php echo base_url();?>" class="text-center">No quiero actualizar mi password</a>
  </div>
  <!-- /.form-box -->
</div>

<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Las passwords no coinciden");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
