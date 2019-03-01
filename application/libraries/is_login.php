<?php

class is_login {
    private $ci;
    function __construct() {
        $this->ci =& get_instance();
    }
   Public Function Is_logged_in(){
                $Is_logged_in = $this->ci->session->userdata('Is_logged_in');
                if(!isset($Is_logged_in)|| $Is_logged_in != true){  // PREGUNTA SI EL USUARIO SE ENCUENTRA LOGUEADO
                   echo redirect(base_url()); // NO SE ENCUENTRA LOGUEADO
                    die();
                }else{
                    return true;                // SE ENCUENTRA LOGUEADO
                }
    }

    Public Function Logout(){
                $this->ci->session->sess_destroy(); //DESTRUYE LA SESION.
                redirect(base_url()) ;              // REDIRECCIONA AL LOGIN
    }
    // INICIO FUNCION PARA DETERMINAR SI UN USUARIO TIENE ACCESO A UN DETERMINADO MODULO!

    function ControlAccesoModulos($direccion){
        $usuarioPerfil = $this->ci->session->userdata('id_perfil');
        if($this->ExistenciaDireccion($direccion) === TRUE){
            if ($this->ConsultaAcceso($direccion,$usuarioPerfil) === TRUE){ // CONSULTA SI EL USUARIO LOGUEADO TIENE ACCESO A ESE MODULO
                 base_url().$direccion; // SI TIENE ACCESO. SE LO DIRECCIONA
             }else{
                $datos['texto'] = "<div class = 'alert alert-error'>ERROR: NO POSEE ACCESO A ESA DIRECCION!</div> ";
                $datos['metodo'] = '';
                $this->ci->load->view('plantilla/v_cabecera');
                $this->ci->load->view('plantilla/v_menu');
                $this->ci->load->view('v_mensajes', $datos);
                $this->ci->load->view('plantilla/v_pie');

             }
       }else{
            base_url().$direccion; // SI TIENE ACCESO. SE LO DIRECCIONA
       }
    }

    function ExistenciaDireccion($direccion){
         $consulta = "SELECT *
                      FROM menues
                      WHERE referencia = '".$direccion."'";
        $query = $this->ci->db->query($consulta);
        if ($query->num_rows() == 0){
            return FALSE;// NO EXISTE DIRECCION EN LA BD.
        }else{
            return TRUE;// EXISTE DIRECCION TIENE . PASA AL SIGUIENTE FILTRO
        }
    }

    function ConsultaAcceso($direccion,$usuarioPerfil){
        $consulta = "SELECT *
                    FROM menues m
                    LEFT JOIN menues_perfiles me ON m.id_menu = me.menu
                    WHERE referencia = '".$direccion."' and perfil =".$usuarioPerfil;
        $query = $this->ci->db->query($consulta);
        if ($query->num_rows() == 0){
            return FALSE;// NO TIENE ACCESO
        }else{
            return TRUE;// TIENE ACCESO
        }
    }

     // FIN FUNCION PARA DETERMINAR SI UN USUARIO TIENE ACCESO A UN DETERMINADO MODULO!


}
?>
