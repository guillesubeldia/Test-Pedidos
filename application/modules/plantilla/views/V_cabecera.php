<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			E-SELL | Sistema de Gesti&oacute;n
		</title>
		<meta name="description" content="Modal examples">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="<?php echo base_url() . 'plantilla/plugins/jquery.min.js'; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url() . 'plantilla/js/webfont.js'; ?>"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
    <!--begin::Base Styles -->
		<link href="<?php echo base_url() . 'plantilla/css/vendors.bundle.css'; ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() . 'plantilla/css/style.bundle.css'; ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() . 'plantilla/plugins/datatables/datatables.bundle.css'; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . 'plantilla/plugins/select2/select2.css'; ?>" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?php echo base_url() . 'plantilla/img/logo/favicon.ico'; ?>" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<!-- BEGIN: Header -->
			<header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
                  <a href="<?php echo base_url()?>" class="m-brand__logo-wrapper">
                    <!-- <img alt="" src="<?php //echo base_url() . 'plantilla/img/logo/logo.png'; ?>" width="100" height="100"/> -->
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<!-- BEGIN: Left Aside Minimize Toggle -->
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
							<!-- BEGIN: Responsive Header Menu Toggler -->
									<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<!-- END -->
			<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>
						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<!-- BEGIN: Horizontal Menu -->
							<button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
								<i class="la la-close"></i>
							</button>
							<?php if (($this->session->userdata('id_perfil') == '1') && ($this->session->userdata('id_perfil') == '2')) { ?>
							<div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
								<ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
									<li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
										<a  href="javascript:;" class="m-menu__link m-menu__toggle">
											<i class="m-menu__link-icon flaticon-line-graph"></i>
											<span class="m-menu__link-text">
												Informes
											</span>
											<i class="m-menu__hor-arrow la la-angle-down"></i>
											<i class="m-menu__ver-arrow la la-angle-right"></i>
										</a>
										<div class="m-menu__submenu  m-menu__submenu--fixed m-menu__submenu--left" style="width:1000px">
											<span class="m-menu__arrow m-menu__arrow--adjust"></span>
											<div class="m-menu__subnav">
												<ul class="m-menu__content">
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Informes Financieros
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="<?php //echo base_url() . 'plantilla/header/actions.html'; ?>" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-map"></i>
																	<span class="m-menu__link-text">
																		Informes Anuales
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="<?php //echo base_url() . 'plantilla/header/actions.html'; ?>" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-1"></i>
																	<span class="m-menu__link-text">
																		Márgenes Financieros
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="<?php //echo base_url() . 'plantilla/header/actions.html'; ?>" class="m-menu__link ">
																	<i class="m-menu__link-icon flaticon-graphic-2"></i>
																	<span class="m-menu__link-text">
																		Informes de Ingresos / Egresos
																	</span>
																</a>
															</li>
														</ul>
													</li>
													<li class="m-menu__item">
														<h3 class="m-menu__heading m-menu__toggle">
															<span class="m-menu__link-text">
																Informes de Recursos Humanos
															</span>
															<i class="m-menu__ver-arrow la la-angle-right"></i>
														</h3>
														<ul class="m-menu__inner">
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="<?php //echo base_url() . 'plantilla/header/actions.html'; ?>" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Directorio
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="<?php //echo base_url() . 'plantilla/header/actions.html'; ?>" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Empleados
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="<?php //echo base_url() . 'plantilla/header/actions.html'; ?>" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Clientes
																	</span>
																</a>
															</li>
															<li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
																<a  href="<?php //echo base_url() . 'plantilla/header/actions.html'; ?>" class="m-menu__link ">
																	<i class="m-menu__link-bullet m-menu__link-bullet--dot">
																		<span></span>
																	</i>
																	<span class="m-menu__link-text">
																		Informes salariales
																	</span>
																</a>
															</li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<?php } ?>
							<!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<i class="flaticon-search-1"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner ">
													<div class="m-dropdown__header">
														<form  class="m-list-search__form">
															<div class="m-list-search__form-wrapper">
																<span class="m-list-search__form-input-wrapper">
																	<input id="m_quicksearch_input" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Buscar...">
																</span>
																<span class="m-list-search__form-icon-close" id="m_quicksearch_close">
																	<i class="la la-remove"></i>
																</span>
															</div>
														</form>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
															<div class="m-dropdown__content"></div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1">
<!-- Animacion para cambiar alerta notificacion-->
											<a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-music-2"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" >
														<span class="m-dropdown__header-title" style="color:black">
															 <font id="headCantidadRecordatorio" color="red">#</font> Notificaciones Nuevas
														</span>
													 <span class="m-dropdown__header-subtitle">
														 <font id="headCantidadRecordatorio" color="red"><a href="<?php echo base_url() . 'recordatorio/C_recordatorio/';?>">Ver Todos</a></font>
														</span>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
																<li class="nav-item m-tabs__item">
																	<a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
																		Alertas
																	</a>
																</li>
																<li class="nav-item m-tabs__item" onClick="RecordatorioTipo(2)">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
																		Pagos
																	</a>
																</li>
																<li class="nav-item m-tabs__item" onClick="RecordatorioTipo(1)">
																	<a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
																		Pedidos
																	</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div id="headerListarRecordatorios">

																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div id="headerListarTipoRecordatorios1">

																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
																	<div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
																		<div class="m-list-timeline m-list-timeline--skin-light">
																			<div class="m-list-timeline__items">
																				<div id="headerListarTipoRecordatorios2">

																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
												<span class="m-nav__link-icon">
													<i class="flaticon-share"></i>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(../../plantilla/img/misc/quick_actions_bg.jpg); background-size: cover;">
														<span class="m-dropdown__header-title">
															Acciones R&aacute;pidas
														</span>
														<span class="m-dropdown__header-subtitle">
															Atajos
														</span>
													</div>
													<div class="m-dropdown__body m-dropdown__body--paddingless">
														<div class="m-dropdown__content">
															<div class="data" data="false" data-max-height="380" data-mobile-max-height="200">
																<div class="m-nav-grid m-nav-grid--skin-light">
																	<div class="m-nav-grid__row">
																		<a href=href="<?php echo base_url()."producto/C_producto/ReporteStock";?>" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-statistics"></i>
																			<span class="m-nav-grid__text">
																				 Reporte Stock
																			</span>
																		</a>
																		<a href="<?php echo base_url()."recordatorio/C_recordatorio/CrearRecordatorio";?>" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-add"></i>
																			<span class="m-nav-grid__text">
																				Agregar Nuevo Recordatorio
																			</span>
																		</a>
																	</div>

																	<div class="m-nav-grid__row">
																		<a href="<?php echo base_url()."persona/C_persona/GestionarPersonaCliente";?>" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-users"></i>
																			<span class="m-nav-grid__text">
																				Agregar Persona
																			</span>
																		</a>

																		<a href="<?php echo base_url()."producto/C_producto/CargarProductoServicio";?>" class="m-nav-grid__item">
																			<i class="m-nav-grid__icon flaticon-truck"></i>
																			<span class="m-nav-grid__text">
																				Agregar Producto/Servicio
																			</span>
																		</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="<?php echo base_url() . 'plantilla/img/users/user4.jpg'; ?>" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
												<span class="m-topbar__username m--hide">
													Nick
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url(../../plantilla/img/misc/user_profile_bg.jpg); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<img src="<?php echo base_url() . 'plantilla/img/users/user4.jpg'; ?>" class="m--img-rounded m--marginless" alt=""/>
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	Mark Andre
																</span>
																<a href="" class="m-card-user__email m--font-weight-300 m-link">
																	mark.andre@gmail.com
																</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Secci&oacute;n
																	</span>
																</li>
																<li class="m-nav__item">
																	<a href="<?php //echo base_url() . 'plantilla/header/profile.html'; ?>" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					Mi Perfil
																				</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="<?php //echo base_url() . 'plantilla/header/profile.html'; ?>" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-share"></i>
																		<span class="m-nav__link-text">
																			Actividad
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="<?php //echo base_url() . 'plantilla/header/profile.html'; ?>" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-chat-1"></i>
																		<span class="m-nav__link-text">
																			Mensajes
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
																	<a href="<?php //echo base_url() . 'plantilla/header/profile.html'; ?>" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-info"></i>
																		<span class="m-nav__link-text">
																			Preguntas M&aacute;s Frecuentes
																		</span>
																	</a>
																</li>
																<li class="m-nav__item">
																	<a href="<?php //echo base_url() . 'plantilla/header/profile.html'; ?>" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																		<span class="m-nav__link-text">
																			Centro de Ayuda
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit"></li>
																<li class="m-nav__item">
                                  <center>
                                  <a href="<?php echo base_url() . 'login/C_login/Logout'; ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                    Cerrar Sesi&oacute;n
                                  </a>
                                  </center>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>
			<!-- END: Header -->
