<?php
/*
 * Descripcion: Modulo de entrada al sistema.
 
 */
class M_login extends CI_Model{



    public function __construct(){
        parent::__construct();

    }

    public function ValidarEntrada($username, $password) {
        //Con esta funcion se toman los datos ingresados por el usuario y se comparan con los guardados en la BD
        $this->db->from('usuario u');
        $this->db->where('u.nombreUsuario', $username);
        $this->db->where('u.claveUsuario', $password);
        $this->db->where('u.activo', 1);
        $consulta = $this->db->get();

      
        if ($consulta->num_rows() == 1) :
            //Usuario y contraseña existentes
            return TRUE;
        else:
            //Usuario no existente
            return FALSE;
        endif;
    }

    public function ObtenerDatosUsuario(){
        $this->db->select('u.id_usuario,
                           u.nombreUsuario,
                           u.claveUsuario,
                           u.activo,
                           p.id_perfil,
                           p.descripcion as "perfilUsuario"');
        $this->db->from('usuario u');
        $this->db->join('perfil p', 'p.id_perfil = u.id_perfil');
        $this->db->where('u.nombreUsuario', $this->input->post('nombreUsuario'));
        $this->db->where('u.claveUsuario', SHA1($this->input->post('password')));
        $this->db->where('u.activo', 1);
        $this->db->where('p.activo', 1);
        $consulta   =   $this->db->get();

       
        if (count($consulta->result()) > 0) {
            foreach ($consulta->result() as $resultado):
                //Se arma un array con todos los datos del usuario.
                $datos   =   array('id_usuario'        =>   $resultado->id_usuario,
                                   'nombreUsuario'     =>   $resultado->nombreUsuario,
                                   'claveUsuario'      =>   $resultado->claveUsuario,
                                   'activo'            =>   $resultado->activo,
                                   'id_perfil'         =>   $resultado->id_perfil,
                                   'perfilUsuario'     =>   $resultado->perfilUsuario,
                                   'is_logged_in'      =>   TRUE
                );
                return $datos;
            endforeach;
        }
    }

}
