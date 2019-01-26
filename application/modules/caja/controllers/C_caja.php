<?php
/*
 * Descripcion: Modulo de prueba de la nueva plantilla.-
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 14/06/2018
 */

class C_caja extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function AbrirCaja() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('caja/V_abrirCaja');
      $this->load->view('plantilla/V_pie');
    }

    public function CerrarCaja() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('caja/V_cerrarCaja');
      $this->load->view('plantilla/V_pie');
    }

}
