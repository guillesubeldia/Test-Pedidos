<?php
/*
 * Descripcion: Modulo de entrada y vista de pedidos del sistema.
           Subeldía, Guillermo Daniel.
 * Fecha ultima actualizacion: 30/01/2019
 */
class M_pedidos extends CI_Model{
    public function __construct(){
        parent::__construct();

    }
    //Consultas para recuperar Registros.
    
public function RecuperarPedidos(){
    $this->db->select("p.id_pedido, tp.descripcion AS 'tipoPedido',DATE_FORMAT(p.fechaalta, '%d/%m/%Y %H:%i') as fechaalta , p.titulo, p.descripcion, dep.descripcion AS 'dependenciaOrigen'");
    $this->db->from("pedido AS p");
    $this->db->join("tipopedido as tp", "tp.id_tipopedido = p.id_tipopedido");
    $this->db->join("dependencia AS dep", "dep.id_dependencia = p.dependenciaorigen");
    $this->db->where("p.activo",1);
    $this->db->limit(50);

    $consulta = $this->db->get();
    if (count($consulta->result()) > 0) {
        return $consulta->result();
    } else {
        return 0;
    }
}

public function RecuperarDependencias(){
    $this->db->select("id_dependencia, descripcion");
    $this->db->from("dependencia");
    $this->db->where("activo",1);

    $consulta = $this->db->get();
    if (count($consulta->result()) > 0) {
        return $consulta->result();
    } else {
        return 0;
    }
}

public function RecuperarEstado(){
    $this->db->select("id_estadopedido, descripcion");
    $this->db->from("estadopedido");
    $this->db->where("activo",1);

    $consulta = $this->db->get();
    if (count($consulta->result()) > 0) {
        return $consulta->result();
    } else {
        return 0;
    }
}

public function RecuperarTipoPedido(){
    $this->db->select("id_tipopedido, descripcion");
    $this->db->from("tipopedido");
    $this->db->where("activo",1);

    $consulta = $this->db->get();
    if (count($consulta->result()) > 0) {
        return $consulta->result();
    } else {
        return 0;
    }
}

public function RecuperarTipoMovimiento(){
    $this->db->select("id_tipomovimiento, descripcion");
    $this->db->from("tipomovimiento");
    $this->db->where("activo",1);

    $consulta = $this->db->get();
    if (count($consulta->result()) > 0) {
        return $consulta->result();
    } else {
        return 0;
    }
}


public function RecuperarElemento(){
    $this->db->select("id_elemento, descripcion");
    $this->db->from("elemento");
    $this->db->where("activo",1);

    $consulta = $this->db->get();
    if (count($consulta->result()) > 0) {
        return $consulta->result();
    } else {
        return 0;
    }
}





public function AltaPedido($datosPedido){
    $this->db->trans_begin();
    //inserto todo el contenido del pedido
    $this->db->insert('pedido', $datosPedido);
    $idPedido = $this->db->insert_id();
    // creo el primer movimiento del pedido que es el ingreso
    $fechaHoy = date("Y-m-d H:i:s");
    $movimentoPedido = array(
        'id_estadopedido'   => 1, //ingresado
        'fechamovimiento'    => $fechaHoy,
        'id_pedido'	        => $idPedido,
        'id_tipomovimiento' => 1, //nuevo ingreso
        'dependenciadestino'=> 126, //ministerio desarrollo humano
        'activo'            => 1
    );
    $this->db->insert('movimientopedido',$movimentoPedido);

    //si todo va correcto devuelvo el id del pedido, para usarlo
    if($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->db->trans_off();
        return false;
    }else {
        $this->db->trans_commit();
        $this->db->trans_off();
        return $idPedido;
    }
}

public function AltaElementos($pedidoElementos){
    $this->db->trans_begin();
    //Cargo uno por uno los elementos que figuran dentro del detalle del pedido
    $this->db->insert('detallepedido', $datosPedido);
    if($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->db->trans_off();
        return FALSE;
    }else {
        $this->db->trans_commit();
        $this->db->trans_off();
        return TRUE;
    }
}


}