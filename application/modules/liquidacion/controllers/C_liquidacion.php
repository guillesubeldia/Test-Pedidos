<?php
/*
 * Descripcion: Modulo de liquidacion.-
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 07/07/2018
 */

class C_liquidacion extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function GestionarLiquidacion() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('liquidacion/V_gestionLiquidacion');
      $this->load->view('plantilla/V_pie');
    }

    public function GestionarDeudores() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('liquidacion/V_gestionDeudores');
      $this->load->view('plantilla/V_pie');
    }

    public function GestionarCobradorCliente() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('liquidacion/V_gestionCobradorCliente');
      $this->load->view('plantilla/V_pie');
    }

}
