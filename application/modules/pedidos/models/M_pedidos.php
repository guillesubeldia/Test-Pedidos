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
  //  echo $this->db->last_query();    die;
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
    $this->db->order_by("descripcion","asc");

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
    $this->db->select("p.id_pedido,p.id_tipopedido, p.titulo,p.descripcion, p.fechaalta, dep.descripcion AS dependencia, tp.descripcion AS tipopedido,p.numeroservicio, p.fechaservicio,pd.descripcion AS pedidotecnico, p.retira, p.solicita");
    $this->db->from("pedido AS p");
    $this->db->join("dependencia AS dep","p.dependenciaorigen = dep.id_dependencia");
    $this->db->join("tipopedido AS tp","p.id_tipopedido = tp.id_tipopedido");
    $this->db->join('pedidotecnico AS pd', 'pd.id_pedidotecnico = p.id_pedidotecnico', 'left');

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

public function ElementosPedido($idPedido){
    $this->db->select("e.id_elemento,dp.id_detallepedido, dp.id_elementodetalle, e.descripcion AS nombreelemento, ed.cantidad, ed.observacion,,
ed.marca, ed.modelo, ed.numeroserie");
    $this->db->from("detallepedido AS dp");
    $this->db->join("elementodetalle AS ed","dp.id_elementodetalle = ed.id_elementodetalle");
    $this->db->join("elemento AS e","e.id_elemento = ed.id_elemento");
    $this->db->where("dp.activo",1);
    $this->db->where("dp.id_pedido",$idPedido);

    return $this->db->get()->result();
}

public function DatosPedido($idPedido){
    $this->db->select("p.barcode,p.id_pedido,p.titulo, p.descripcion, p.solicita ,p.retira, p.numeroservicio, DATE_FORMAT(p.fechaservicio, '%d/%m/%Y') as fechaservicio, p.id_pedidotecnico, pt.descripcion as pedidotecnico,
                        tp.id_tipopedido,tp.descripcion AS tipopedido,
                        dest.id_dependencia,dest.descripcion AS 'dependenciaorigen'");
    $this->db->from("pedido AS p");
    $this->db->join("tipopedido AS tp","tp.id_tipopedido = p.id_tipopedido");
    $this->db->join("dependencia AS dest","dest.id_dependencia = p.dependenciaorigen");
    $this->db->join("pedidotecnico AS pt","pt.id_pedidotecnico = p.id_pedidotecnico");
    $this->db->where("p.activo",1);
    $this->db->where("p.id_pedido",$idPedido);

    return $this->db->get()->result();
}
/////////////////////////////////ALTAS Y MODIFICACIONES//////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////
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
    $this->db->insert('detallepedido', $pedidoElementos);
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

public function AltaMovimientos($datosMovimiento){
    $this->db->trans_begin();
    //Cargo uno por uno los elementos que figuran dentro del detalle del pedido
    $this->db->insert('movimientopedido', $datosMovimiento);
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

public function EditarPedido($datosPedido,$id){
$this->db->trans_begin();
$this->db->where('id_pedido', $id);
$this->db->update('pedido', $datosPedido);
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
public function EditarPedidoDetalle($pedidoElementos, $idDetallePedido){
    $this->db->trans_begin();
    $this->db->where('id_elementodetalle', $idDetallePedido);
    $this->db->update('elementodetalle', $pedidoElementos);

    /*
     $detallePedido = array(
                    'id_pedido'          => $idPedido,
                    'id_elementodetalle' => $idElemento);


    $this->db->insert('detallepedido', $detallePedido);
    */ 



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

//baja
public function EliminarDetallePedido($id,$detallePedido){
    $this->db->where('id_elementodetalle', $id);
    $this->db->update('detallepedido', $detallePedido);
    
   echo $this->db->last_query();
}

public function EliminarElemento($id){
    $this->db->trans_begin();
    //primero pongo como inactivo en la tabla detallepedido
    $this->db->set('activo', '0');
    $this->db->where('id_elementodetalle', $id);
    $this->db->update('detallepedido');
    //luego como inactivo el elemento de la tabla elementodetalle

    $fechaCarga = date("Y-m-d H:i:s");

    $this->db->set('activo', '0');
    $this->db->set('aud_fechamodi', $fechaCarga);
    $this->db->set('aud_usuariomodi', $this->session->userdata('nombreUsuario'));
    $this->db->where('id_elementodetalle', $id);
    $this->db->update('elementodetalle');

   

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
/* PEDIDOS TECNICOSSSS*/
public function RecuperarTipoPedidoTecnico(){
    $this->db->select("id_pedidotecnico, descripcion");
    $this->db->from("pedidotecnico");
    $this->db->where("activo",1);

    $consulta = $this->db->get();
    if (count($consulta->result()) > 0) {
        return $consulta->result();
    } else {
        return 0;
    }
}

public function AltaPedidoTecnico($datosPedido){
    $this->db->trans_begin();
    //inserto todo el contenido del pedido
    $this->db->insert('pedido', $datosPedido);
    $idPedido = $this->db->insert_id();
    // creo el primer movimiento del pedido que es el ingreso
    $fechaHoy = date("Y-m-d H:i:s");
    $movimentoPedido = array(
        'id_estadopedido'   => 1, //ingresado
        'fechamovimiento'   => $fechaHoy,
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


public function AltaElementosTecnico($pedidoElementos,$idPedido){
    $this->db->trans_begin();
    //Cargo uno por uno los elementos que figuran dentro del detalle del pedido
    $this->db->insert('elementodetalle', $pedidoElementos);

    //luego de esto, me quedo con el id, y lo inserto en la tabla detallepedido 
    $idElemento = $this->db->insert_id();
    $detallePedido = array(
                    'id_pedido'          => $idPedido,
                    'id_elementodetalle' => $idElemento);


    $this->db->insert('detallepedido', $detallePedido);
    
    

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


public function CrearBarcode($idpedido){
    
    $this->db->select("barcode");
    $this->db->from("pedido");
    $this->db->where("id_pedido",$idpedido);
    $consultaBarcode = $this->db->get()->row();

    if($consultaBarcode->barcode != null){
        
    }else{
        $this->db->select('CONCAT(id_pedido,DATE_FORMAT(fechaalta, "%c%e%y")) AS newbarcode');
        $this->db->from("pedido");
        $this->db->where("id_pedido",$idpedido);
        $consultaBarcode = $this->db->get()->row();

        $this->db->set('barcode', $consultaBarcode->newbarcode);
        $this->db->where('id_pedido', $idpedido);
        $this->db->update('pedido');
    }
   
}

}
