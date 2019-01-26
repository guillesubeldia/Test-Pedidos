<?php
/*
 * Descripcion: Modulo de configuracion del sistema.-
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 07/07/2018
 */

class C_compra extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function GestionarCompra() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('compra/V_gestionCompra');
      $this->load->view('plantilla/V_pie');
    }

}
