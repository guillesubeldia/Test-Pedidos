<?php
/*
 * Descripcion: Modulo de entrada al sistema.
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 11/06/2018
 * Autor actualizacion: Plazas, Ricardo Gastón
 */
class M_login extends CI_Model{



    public function __construct(){
        parent::__construct();

    }

    public function ValidarEntrada($username, $password) {
        //Con esta funcion se toman los datos ingresados por el usuario y se comparan con los guardados en la BD
        $this->db->from('usu_usuarios u');
        $this->db->where('u.nombreUsuario', $username);
        $this->db->where('u.contrasenia', $password);
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
                           u.contrasenia,
                           u.activo,
                           p.id_perfil,
                           p.descripcion as "perfilUsuario"');
        $this->db->from('usu_usuarios u');
        $this->db->join('usu_usuarios_perfil up', 'u.id_usuario = up.id_usuario');
        $this->db->join('usu_perfiles p', 'p.id_perfil = up.id_perfil');
        $this->db->where('u.nombreUsuario', $this->input->post('username'));
        $this->db->where('u.contrasenia', SHA1($this->input->post('password')));
        $this->db->where('u.activo', 1);
        $this->db->where('up.activo', 1);
        $this->db->where('p.activo', 1);
        $consulta   =   $this->db->get();

        if (count($consulta->result()) > 0) {
            foreach ($consulta->result() as $resultado):
                //Se arma un array con todos los datos del usuario.
                $datos   =   array('id_usuario'        =>   $resultado->id_usuario,
                                   'nombreUsuario'     =>   $resultado->nombreUsuario,
                                   'contrasenia'       =>   $resultado->contrasenia,
                                   'activo'            =>   $resultado->activo,
                                   'id_perfil'         =>   $resultado->id_perfil,
                                   'perfilUsuario'     =>   $resultado->perfilUsuario,
                                   'recordatorios'     =>   1, //por default esta uno, que quiere decir que no se vieron.
                                   'is_logged_in'      =>   TRUE
                );
                return $datos;
            endforeach;
        }
    }

}
