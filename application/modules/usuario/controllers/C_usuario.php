<?php
/*
 * Descripcion: Modulo de Usuarios.-
 * Fecha ultima actualizacion: 07/03/2019
 */

class C_usuario extends MX_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('usuario/M_usuario');
}

public function index(){
  $datos['usuario']=$this->M_usuario->RecuperarUsuario();
  $this->load->view('plantilla/V_cabecera');
  $this->load->view('plantilla/V_menu');
  $this->load->view('usuario/V_perfil',$datos);
  $this->load->view('plantilla/V_pie');
}

public function ActualizarPass(){
  $id   = $this->input->post("txtUsuario");
  $pass = SHA1($this->input->post("password"));
  $datos = array(
    'claveusuario' => $pass
  );
  
  $this->M_usuario->ActualizarPass($id,$datos);
  redirect(base_url() . "/Login/C_Login/Logout");
}

}
