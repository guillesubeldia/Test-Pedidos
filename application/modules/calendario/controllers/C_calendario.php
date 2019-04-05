<?php
/*
 * Descripcion: Modulo de calendario.-
            Subeldía, Guillermo Daniel.
 
 */

class C_calendario extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('calendario/M_calendario');
    }


    public function index(){
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('calendario/V_cuerpo');
      $this->load->view('plantilla/V_pie');
    }

    public function FechasCalendarios(){
      $eventos = $this->M_calendario->FechasPedidos();
      echo json_encode($eventos);
  }

  public function ObtenerEventos(){
    $fecha = $this->input->post("fecha");
    
    echo json_encode($fecha);

  }

  public function Fecha(){
    $fecha = date_create("Thu Feb 28 2019 21:00:00 GMT-0300");
    echo date_format($fecha,"Y/m/d");

   


  }

}
