<?php
/*
 * Descripcion: Modulo de prueba de la nueva plantilla.-
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 14/06/2018
 */

class C_plantilla extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function Index() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('plantilla/V_cuerpoBlanco');
      $this->load->view('plantilla/V_pie');
    }

}
