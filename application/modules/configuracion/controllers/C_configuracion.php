<?php
/*
 * Descripcion: Modulo de configuracion del sistema.-
 */

class C_configuracion extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menudb');
      $this->load->view('configuracion/V_gestionConfiguracion');
      $this->load->view('plantilla/V_pie');
    }

}
