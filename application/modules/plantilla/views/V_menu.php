<!-- begin::Body -->
  <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
      <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
<!-- BEGIN: Aside Menu ADMINISTRADOR-->
<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"  m-menu-scrollable="0" m-menu-dropdown-timeout="500" >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
          <li class="m-menu__item " aria-haspopup="true" >
            <a  href="<?php echo base_url()?>" class="m-menu__link ">
              <i class="m-menu__link-icon fa fa-home"></i>
              <span class="m-menu__link-title">
                <span class="m-menu__link-wrap">
                  <span class="m-menu__link-text">
                    Inicio
                  </span>
                </span>
              </span>
            </a>
          </li>
          <?php if ($this->session->userdata('id_perfil') == '1') { ?>
          <li class="m-menu__section ">
            <h4 class="m-menu__section-text">
              Administraci&oacute;n Sistema
            </h4>
            <i class="m-menu__section-icon flaticon-more-v3"></i>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
            <i class="m-menu__link-icon fa fa-user"></i>
              <span class="m-menu__link-text">
                Gesti&oacute;n Usuarios
              </span>
              <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
              <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                  <span class="m-menu__link">
                    <span class="m-menu__link-text">
                      Gesti&oacute;n Usuarios
                    </span>
                  </span>
                </li>
                <li class="m-menu__item " aria-haspopup="true" >
                  <a  href="<?php //echo base_url() . 'plantilla/components/base/state.html'; ?>" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                      Usuarios
                    </span>
                  </a>
                </li>
                <li class="m-menu__item " aria-haspopup="true" >
                  <a  href="<?php //echo base_url() . 'plantilla/components/base/typography.html'; ?>" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                      Perfiles
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
            <i class="m-menu__link-icon fa fa-th-list"></i>
              <span class="m-menu__link-text">
                Gesti&oacute;n Men&uacute;es
              </span>
              <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
              <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                  <span class="m-menu__link">
                    <span class="m-menu__link-text">
                      Gesti&oacute;n Men&uacute;es
                    </span>
                  </span>
                </li>
                <li class="m-menu__item " aria-haspopup="true" >
                  <a  href="<?php //echo base_url() . 'plantilla/components/base/state.html'; ?>" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                      Men&uacute;es
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
            <i class="m-menu__link-icon fa fa-gears"></i>
              <span class="m-menu__link-text">
                Gesti&oacute;n de  Configuraci&oacute;n
              </span>
              <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu ">
              <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                  <span class="m-menu__link">
                    <span class="m-menu__link-text">
                      Gesti&oacute;n de  Configuraci&oacute;n
                    </span>
                  </span>
                </li>
                <li class="m-menu__item " aria-haspopup="true" >
                  <a  href="<?php echo base_url() . 'configuracion/C_configuracion/GestionarConfiguracion'; ?>" class="m-menu__link ">
                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                      <span></span>
                    </i>
                    <span class="m-menu__link-text">
                      Configuraciones
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php } ?>
          <!-- Inicio Men&uacute; para usuarios comunes -->
            <li class="m-menu__section ">
              <h4 class="m-menu__section-text">
                Administraci&oacute;n de la Empresa
              </h4>
              <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
              <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-key"></i>
                <span class="m-menu__link-text">
                  Gesti&oacute;n Caja
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                    <span class="m-menu__link">
                      <span class="m-menu__link-text">
                        Gesti&oacute;n Caja
                      </span>
                    </span>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'caja/C_caja/AbrirCaja'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Abrir Caja
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'caja/C_caja/AbrirCaja'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Cerrar Caja
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
              <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-file-text"></i>
                <span class="m-menu__link-text">
                  Gesti&oacute;n Facturaci&oacute;n
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                    <span class="m-menu__link">
                      <span class="m-menu__link-text">
                        Gesti&oacute;n Facturaci&oacute;n
                      </span>
                    </span>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'venta/C_venta/GestionarProforma'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Proforma
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'venta/C_venta/GestionarVenta'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Venta
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
              <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-dollar"></i>
                <span class="m-menu__link-text">
                  Gesti&oacute;n Cobranza
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                    <span class="m-menu__link">
                      <span class="m-menu__link-text">
                        Gesti&oacute;n Cobranza
                      </span>
                    </span>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'liquidacion/C_liquidacion/GestionarLiquidacion'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Cobrar
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'liquidacion/C_liquidacion/GestionarDeudores'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Deudores / Morosos
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'liquidacion/C_liquidacion/GestionarCobradorCliente'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Cobrador / Cliente
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
              <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-shopping-cart"></i>
                <span class="m-menu__link-text">
                  Gesti&oacute;n Compra
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                    <span class="m-menu__link">
                      <span class="m-menu__link-text">
                        Gesti&oacute;n Compra
                      </span>
                    </span>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'compra/C_compra/GestionarCompra'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Compra
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
              <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-suitcase"></i>
                <span class="m-menu__link-text">
                  Gesti&oacute;n Producto / Servicio
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                    <span class="m-menu__link">
                      <span class="m-menu__link-text">
                        Gesti&oacute;n Producto / Servicio
                      </span>
                    </span>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'producto/C_producto/GestionarProductoServicio'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Producto / Servicio
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'producto/C_producto/GestionarCategoria'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Categor&iacute;a
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'producto/C_producto/VerStock'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Stock
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'producto/C_producto/GestionarPedido'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Pedido
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
              <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                <i class="m-menu__link-icon fa fa-male"></i>
                <span class="m-menu__link-text">
                  Gesti&oacute;n de  Personas
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu ">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                  <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                    <span class="m-menu__link">
                      <span class="m-menu__link-text">
                        Gesti&oacute;n de  Personas
                      </span>
                    </span>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'persona/C_persona/GestionarPersonaEmpleado'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Empleado/s
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'persona/C_persona/GestionarPersonaProveedor'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Proveedor/es
                      </span>
                    </a>
                  </li>
                  <li class="m-menu__item " aria-haspopup="true" >
                    <a  href="<?php echo base_url() . 'persona/C_persona/GestionarPersonaCliente'; ?>" class="m-menu__link ">
                      <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                        <span></span>
                      </i>
                      <span class="m-menu__link-text">
                        Cliente/s
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- Fin   Men&uacute; para usuarios comunes -->
        </ul>
      </div>
      <!-- END: Aside Menu ADMINISTRADOR-->
    </div>
    <!-- END: Left Aside -->
