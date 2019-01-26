
<div class="m-grid m-grid--hor m-grid--root m-page">
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(../../../plantilla/img/bg/bg-1.jpg);">
    <div class="m-grid__item m-grid__item--fluid m-login__wrapper">
      <div class="m-login__container">
        <div class="m-login__logo">
          <a href="#">
            <img src="<?php echo base_url() . 'plantilla/img/logo/logo.png'; ?>">
          </a>
        </div>
        <div class="m-login__signin">
          <div class="m-login__head">
            <h3 class="m-login__title">
              Iniciar sesi&oacute;n
            </h3>
          </div>
          <form class="m-login__form m-form" action="">
            <div class="form-group m-form__group">
              <input class="form-control m-input"   type="text" placeholder="Email" name="email" autocomplete="off">
            </div>
            <div class="form-group m-form__group">
              <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Contraseña" name="password">
            </div>
            <div class="row m-login__form-sub">
              <div class="col m--align-left m-login__form-left">
                <label class="m-checkbox  m-checkbox--light">
                  <input type="checkbox" name="remember">
                  Recu&eacute;rdame
                  <span></span>
                </label>
              </div>
              <div class="col m--align-right m-login__form-right">
                <a href="javascript:;" id="m_login_forget_password" class="m-link">
                  Contraseña olvidada ?
                </a>
              </div>
            </div>
            <div class="m-login__form-action">
              <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                Entrar
              </button>
            </div>
          </form>
        </div>
        <div class="m-login__signup">
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
            <div class="row form-group m-form__group m-login__form-sub">
              <div class="col m--align-left">
                <label class="m-checkbox m-checkbox--light">
                  <input type="checkbox" name="agree">
                  Estoy de acuerdo
                  <a href="#" class="m-link m-link--focus">
                  con los términos y Condiciones
                  </a>
                  .
                  <span></span>
                </label>
                <span class="m-form__help"></span>
              </div>
            </div>
            <div class="m-login__form-action">
              <button id="m_login_signup_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                Reg&iacute;strate
              </button>
              &nbsp;&nbsp;
              <button id="m_login_signup_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
                Cancelar
              </button>
            </div>
          </form>
        </div>
        <div class="m-login__forget-password">
          <div class="m-login__head">
            <h3 class="m-login__title">
              Contraseña olvidada ?
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
              <button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                Solicitud
              </button>
              &nbsp;&nbsp;
              <button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
                Cancelar
              </button>
            </div>
          </form>
        </div>
        <div class="m-login__account">
          <span class="m-login__account-msg">
            A&uacute;n no tienes una cuenta ?
          </span>
          &nbsp;&nbsp;
          <a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">
            Reg&iacute;strate
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end:: Page -->

<div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">
											Modal title
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
										</button>
									</div>
									<div class="modal-body">
										<p>
											Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
										</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">
											Close
										</button>
										<button type="button" class="btn btn-primary">
											Save changes
										</button>
									</div>
								</div>
							</div>
</div>

<script type="text/javascript">

  function IngresarAlSistemaDeGestion(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if ((username != " ") && (password != " ")){
      $.post("<?php echo base_url() ?>login/C_login/ValidarEntrada",{
        username:username,
        password:password
      },
        function (data) {
          if ((data == '0') || (data == 0)){
            $('#m_modal_6').modal('show');
          }
        }
      );
    }else{
      $('#m_modal_6').modal('show');
    }
  }

</script>
