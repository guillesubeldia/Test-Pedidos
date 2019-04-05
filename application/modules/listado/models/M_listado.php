<?php
/*
 * Descripcion: Modulo de entrada y vista de pedidos del sistema.
           Subeldía, Guillermo Daniel.
 * Fecha ultima actualizacion: 30/01/2019
 */
class M_listado extends CI_Model{
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

public function RecuperarPedidosFecha($desde,$hasta){
    $this->db->select("p.id_pedido, tp.descripcion AS 'tipoPedido',DATE_FORMAT(p.fechaalta, '%d/%m/%Y %H:%i') as fechaalta , p.titulo, p.descripcion, dep.descripcion AS 'dependenciaOrigen'");
    $this->db->from("pedido AS p");
    $this->db->join("tipopedido as tp", "tp.id_tipopedido = p.id_tipopedido");
    $this->db->join("dependencia AS dep", "dep.id_dependencia = p.dependenciaorigen");
    $this->db->where("p.activo",1);
    $this->db->where("p.fechaalta <=",$hasta);
    $this->db->where("p.fechaalta >=",$desde);

    $this->db->limit(50);



    $consulta = $this->db->get();
    //echo $this->db->last_query();
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

public function MovimientoPedido($idPedido){
    $this->db->select("p.id_pedido,
    tp.descripcion AS tipopedido,
    tmov.descripcion AS tipomovimiento,
    ep.descripcion AS estadopedido,
    ep.id_estadopedido as estado,
    DATE_FORMAT(mp.fechamovimiento, '%d/%m/%Y %H:%i') AS fechamovimiento,mp.id_movimientopedido,
    dest.descripcion AS 'dependenciadestino'");
    $this->db->from("pedido AS p");
    $this->db->join("tipopedido AS tp","tp.id_tipopedido = p.id_tipopedido");
    $this->db->join("movimientopedido AS mp","mp.id_pedido = p.id_pedido");
    $this->db->join("tipomovimiento AS tmov","tmov.id_tipomovimiento = mp.id_tipomovimiento");

    $this->db->join("estadopedido AS ep","ep.id_estadopedido = mp.id_estadopedido");
    $this->db->join("dependencia AS dest","dest.id_dependencia = mp.dependenciadestino");
    $this->db->where("p.activo",1);
    $this->db->where("mp.activo",1);
    $this->db->where("p.id_pedido", $idPedido);

   return  $this->db->get()->result();
}

public function DatosMovimiento($id){
    $this->db->select("p.id_pedido, p.titulo,p.descripcion, p.fechaalta, dep.descripcion AS dependencia, tp.descripcion AS tipopedido");
    $this->db->from("pedido AS p");
    $this->db->join("dependencia AS dep","p.dependenciaorigen = dep.id_dependencia");
    $this->db->join("tipopedido AS tp","p.id_tipopedido = tp.id_tipopedido");
    $this->db->where("p.id_pedido",$id);
    $this->db->where("p.activo",1);
    $consulta = $this->db->get();
    if (count($consulta->result()) > 0) {
      $data['status'] = 'ok';
      $data['result'] = $consulta->result();
    } else {
      $data['status'] = 'err';
      $data['result'] = '';
    }
    echo json_encode($data);
  }
public function DatosPedido($idPedido){
    $this->db->select("p.id_pedido,p.titulo, p.descripcion,
    tp.id_tipopedido,tp.descripcion AS tipopedido,
    dest.id_dependencia,dest.descripcion AS 'dependenciaorigen'");
    $this->db->from("pedido AS p");
    $this->db->join("tipopedido AS tp","tp.id_tipopedido = p.id_tipopedido");
    $this->db->join("dependencia AS dest","dest.id_dependencia = p.dependenciaorigen");
    $this->db->where("p.activo",1);
    $this->db->where("p.id_pedido",$idPedido);

    return $this->db->get()->result();
}

public function ElementosPedido($idPedido){
    $this->db->select('dp.cantidad, el.descripcion,dp.observacion');
    $this->db->from('detallepedido as dp');
    $this->db->join('elemento as el','dp.id_elemento = el.id_elemento');
    $this->db->where('dp.id_pedido',$idPedido);

    return $this->db->get()->result();

}



}
