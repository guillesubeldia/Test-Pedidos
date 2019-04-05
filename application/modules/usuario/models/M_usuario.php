<?php
/*
 * Descripcion: Modulo de persona al sistema.
  
 * Fecha ultima actualizacion: 11/06/201
 
 */
class M_usuario extends CI_Model{
public function __construct(){
    parent::__construct();

}


public function RecuperarUsuario(){
    $this->db->select('u.id_usuario, u.nombreusuario,p.descripcion');
    $this->db->from('usuario AS u');
    $this->db->join('perfil AS p', 'p.id_perfil = u.id_perfil');
    $this->db->where('u.id_usuario', $this->session->userdata('id_usuario'));

    return $this->db->get()->result();
}

public function ActualizarPass($id,$datos){
    $this->db->trans_begin();
    $this->db->where('id_usuario', $id);
    $this->db->update('usuario', $datos);
    //echo $this->db->last_query();
    if($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->db->trans_off();
        return false;
    }else{
        $this->db->trans_commit();
        $this->db->trans_off();
        return true;
    }
}


}
