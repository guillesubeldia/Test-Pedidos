<?php
class C_login extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('login/M_login');
    }

    public function Index() {
           //print_r($this->session->all_userdata());
           //die;
        if ($this->session->userdata('is_logged_in') !== true ) {
        
            //El vector 'error' es utilizado como bandera para identificar en que momentos se libera el error
            //Sus valores son 'si' y 'no'.
            $data['error']   =   'no';
            $this->load->view('login/V_cabeceraLogin');
            $this->load->view('login/V_login', $data);
            $this->load->view('login/V_pieLogin');

        } else {
        
            $this->load->view('plantilla/V_cabecera');
            $this->load->view('plantilla/V_menu');
            $this->load->view('plantilla/V_cuerpo');
            $this->load->view('plantilla/V_pie');

            }
        }

    public function Logout() {
        //Destruye la sesion a traves del sistema
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function ValidarEntrada() {
        //Se consulta si los datos ingresados (usuario, password) existen en la BD
        $username                  =  $this->input->post('nombreUsuario');
        $password                  =  SHA1($this->input->post('password'));
        $consulta                  =   $this->M_login->ValidarEntrada($username, $password);

    
        if ($consulta) {

            //Si la consulta confirma que existe el usuario en la BD, se obtienen todos los demas datos
            $datos_usuario   =   $this->M_login->ObtenerDatosUsuario();

			$this->session->set_userdata($datos_usuario);
            redirect(base_url());

        } else {
          //Si los datos ingresados no existen en la BD, se libera un error
          $data['error']   =   'si';
          $this->load->view('login/V_cabeceraLogin');
          $this->load->view('login/V_login', $data);
          $this->load->view('login/V_pieLogin');
        }
    
    }

}
