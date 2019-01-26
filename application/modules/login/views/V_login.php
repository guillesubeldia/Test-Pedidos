<div class="m-grid m-grid--hor m-grid--root m-page">
  <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: url(<?php echo base_url() . 'plantilla/img/bg/bg-3.jpg'; ?>);">
    <div class="m-login__wrapper-1 m-portlet-full-height">
      <div class="m-login__wrapper-1-1">
        <div class="m-login__contanier">
          <div class="m-login__content">
            <div class="m-login__logo">
              <a href="#">
                <img src="<?php echo base_url() . 'plantilla/img/logo/logo.png'; ?>">
              </a>
            </div>
            <div class="m-login__title">
              <h3>
                Sistema de Gesti&oacute;n Administrativa
              </h3>
            </div>
            <div class="m-login__desc">

            </div>
            <!-- <div class="m-login__form-action">
              <button type="button" id="m_login_signup" class="btn btn-outline-focus m-btn--pill">
                Obtener una cuenta
              </button>
            </div> -->
          </div>
        </div>
        <div class="m-login__border">
          <div></div>
        </div>
      </div>
    </div>
    <div class="m-login__wrapper-2 m-portlet-full-height">
      <div class="m-login__contanier">
        <div class="m-login__signin">
          <div class="m-login__head">
            <h3 class="m-login__title">
              Ingrese a su cuenta
            </h3>
          </div>
          <form class="m-login__form m-form" method="post" action="<?php echo base_url() . 'login/C_login/ValidarEntrada'; ?>">
            <!-- CONDICION QUE PROVIENE DEL CONTROLADOR, LA CUAL SI RECIBE UN RESULTADO 'SI' SE MUESTRA EL MENSAJE. LA VARIABLE $error
                 POR DEFECTO TIENE EL VALOR '0' -->
                <?php if ($error == 'si') { ?>
                      <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="m-alert__icon">
                          <i class="la la-warning"></i>
                          <span></span>
                        </div>
                        <div class="m-alert__text">
                          <strong>
                            Los datos ingresados son incorrectos.
                          </strong>
                            Por favor, verifique e intente nuevamente.
                        </div>
                        <div class="m-alert__close">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                <?php } ?>
              
            <div class="form-group m-form__group">
              <input class="form-control m-input m-login__form-input--last" placeholder="Usuario" id ="username" name="username" autocomplete="off">
            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input m-login__form-input--last" type="Password" placeholder="Contraseña"  id="password" name="password">
            </div>
            <!-- <div class="row m-login__form-sub">
              <div class="col m--align-left">
                <label class="m-checkbox m-checkbox--focus">
                  <input type="checkbox" name="remember">
                  Recu&eacute;rdame
                  <span></span>
                </label>
              </div>
              <div class="col m--align-right">
                <a href="javascript:;" id="m_login_forget_password" class="m-link">
                  Contraseña olvidada?
                </a>
              </div>
            </div> -->
            <center>
            <div class="m-login__form-action">
              <!-- m_login_signin_submit -->
              <button id="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                Entrar
              </button>
            </div>
            </center>
          </form>
        </div>
        <!-- <div class="m-login__signup">
          <div class="m-login__head">
            <h3 class="m-login__title">
              Reg&iacute;strate
            </h3>
            <div class="m-login__desc">
              Ingrese sus detalles para crear su cuenta:
            </div>
          </div>
          <form class="m-login__form m-form" action="">
            <div class="form-group m-form__group">
              <input class="form-control m-input" type="text" placeholder="Nombre Completo" name="fullname">
            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input" type="password" placeholder="Contraseña" name="password">
            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirmar Contraseña" name="rpassword">
            </div>
            <div class="m-login__form-sub">
              <label class="m-checkbox m-checkbox--focus">
                <input type="checkbox" name="agree">
                Estoy de acuerdo
                <a href="#" class="m-link m-link--focus">
                  con los términos y condiciones
                </a>
                .
                <span></span>
              </label>
              <span class="m-form__help"></span>
            </div>
            <div class="m-login__form-action">
              <button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                Reg&iacute;strate
              </button>
              <button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
                Cancelar
              </button>
            </div>
          </form>
        </div> -->
        <!-- <div class="m-login__forget-password">
          <div class="m-login__head">
            <h3 class="m-login__title">
              Contraseña olvidada?
            </h3>
            <div class="m-login__desc">
              Ingrese su correo electr&oacute;nico para restablecer su contraseña:
            </div>
          </div>
          <form class="m-login__form m-form" action="">
            <div class="form-group m-form__group">
              <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
            </div>
            <div class="m-login__form-action">
              <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                Solicitud
              </button>
              <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom ">
                Cancelar
              </button>
            </div>
          </form>
        </div> -->
      </div>
    </div>
  </div>
</div>
<!-- end:: Page -->

<script>


</script>
