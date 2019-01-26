<?php
/*
 * Descripcion: Modulo de prueba de la nueva plantilla.-
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 14/06/2018
 */

class C_venta extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function GestionarVenta() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('venta/V_gestionVenta');
      $this->load->view('plantilla/V_pie');
    }

		public function GestionarProforma() {
			$this->load->view('plantilla/V_cabecera');
			$this->load->view('plantilla/V_menu');
			$this->load->view('venta/V_gestionProforma');
			$this->load->view('plantilla/V_pie');
		}
}
