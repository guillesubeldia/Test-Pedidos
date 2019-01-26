<?php
/*
 * Descripcion: Modulo de recordatorios del sistema.
 * Autor: Subeldia, Guillermo Daniel
 * Fecha ultima actualizacion: 05/12/2018
 * Autor actualizacion:
 */
class M_recordatorio extends CI_Model{
    public function __construct(){
        parent::__construct();

    }

public function LeerEstadoRecordatorios(){
  $this->db->select('te.id_tipoestadorecordatorio, te.descripcion, te.activo');
  $this->db->from('reco_tipoestadorecordatorio te');
  $this->db->where('te.activo', '1');
  $consulta = $this->db->get();
  if (count($consulta->result()) > 0) {
      return $consulta->result();
  } else {
      return 0;
  }
}
public function LeerTipoRecordatorios(){
  $this->db->select('tr.id_tiporecordatorio, tr.descripcion, tr.activo');
  $this->db->from('reco_tiporecordatorio tr');
  $this->db->where('tr.activo', '1');
  $consulta = $this->db->get();
  if (count($consulta->result()) > 0) {
    return $consulta->result();
  }else {
    return 0;
  }
}

public function ObtenerRecordatorios(){
  $this->db->select('r.id_recordatorio, tr.descripcion AS tiporecordatorio,  te.descripcion AS tipoestado, r.titulo, r.cuerporecordatorio, DATE_FORMAT(r.fechainicio,"%d-%m-%Y") AS fechainicio, DATE_FORMAT(r.fechafin,"%d-%m-%Y") AS fechafin, r.activo');
  $this->db->from('reco_recordatorio as r');
  $this->db->join('reco_tipoestadorecordatorio AS te', 'te.id_tipoEstadoRecordatorio = r.id_tipoestadorecordatorio');
  $this->db->join('reco_tiporecordatorio AS tr', 'tr.id_tiporecordatorio = r.id_tiporecordatorio');
  $this->db->where('r.activo', 1);
  $this->db->where('r.id_tipoestadorecordatorio', 1);
  $consulta = $this->db->get();

  if (count($consulta->result()) > 0) {
      return $consulta->result();
  } else {
      return 0;
  }
}

public function ObtenerRecordatoriosCurso(){
  $this->db->select('r.id_recordatorio, tr.descripcion AS tiporecordatorio,  te.descripcion AS tipoestado, r.titulo, r.cuerporecordatorio, DATE_FORMAT(r.fechainicio,"%d-%m-%Y") AS fechainicio, DATE_FORMAT(r.fechafin,"%d-%m-%Y") AS fechafin, r.activo');
  $this->db->from('reco_recordatorio as r');
  $this->db->join('reco_tipoestadorecordatorio AS te', 'te.id_tipoEstadoRecordatorio = r.id_tipoestadorecordatorio');
  $this->db->join('reco_tiporecordatorio AS tr', 'tr.id_tiporecordatorio = r.id_tiporecordatorio');
  $this->db->where('r.activo', 1);
  $this->db->where('r.id_tipoestadorecordatorio not in (1,8)'); //iniciado y finalizado
  $consulta = $this->db->get();

  if (count($consulta->result()) > 0) {
      return $consulta->result();
  } else {
      return 0;
  }
}
public function ObtenerRecordatoriosFin(){
  $this->db->select('r.id_recordatorio, tr.descripcion AS tiporecordatorio,  te.descripcion AS tipoestado, r.titulo, r.cuerporecordatorio, DATE_FORMAT(r.fechainicio,"%d-%m-%Y") AS fechainicio, DATE_FORMAT(r.fechafin,"%d-%m-%Y") AS fechafin, r.activo');
  $this->db->from('reco_recordatorio as r');
  $this->db->join('reco_tipoestadorecordatorio AS te', 'te.id_tipoEstadoRecordatorio = r.id_tipoestadorecordatorio');
  $this->db->join('reco_tiporecordatorio AS tr', 'tr.id_tiporecordatorio = r.id_tiporecordatorio');
  $this->db->where('r.activo', 1);
  $this->db->where('r.id_tipoestadorecordatorio = 8'); //iniciado y finalizado
  $consulta = $this->db->get();
  if (count($consulta->result()) > 0) {
      return $consulta->result();
  } else {
      return 0;
  }
}

public function AltaRecordatorio($datos){
  $this->db->trans_begin();
  $this->db->insert('reco_recordatorio', $datos);

  if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->db->trans_off();
      //return false;
      $respuesta = ["estado" => "2"];//error
  } else {
      $this->db->trans_commit();
      $this->db->trans_off();
      //return true;
      $respuesta = ["estado" => "1"];//ok
  }

  echo json_encode($respuesta);
}


public function ActualizarRecordatorio($id,$datos){
  $this->db->trans_begin();
  $this->db->where('id_recordatorio', $id);
  $this->db->update('reco_recordatorio', $datos);
  if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->db->trans_off();
      //return false;
      $datos = ["estado" => "2"];//error
  } else {
      $this->db->trans_commit();
      $this->db->trans_off();
      //return true;
      $datos = ["estado" => "1"];//ok
  }

  echo json_encode($datos);
}

public function VerRecordatorio($id){
  $this->db->select('r.id_recordatorio,r.id_tiporecordatorio, tr.descripcion AS "descrecordatorio", r.id_tipoestadorecordatorio, ter.descripcion AS "descestadorecordatorio", r.titulo, r.cuerpoRecordatorio AS textorecordatorio, DATE_FORMAT(r.fechainicio, "%Y-%m-%d") AS fechainicio, DATE_FORMAT(r.fechafin, "%Y-%m-%d") AS fechafin');
  $this->db->from('reco_recordatorio AS r');
  $this->db->join('reco_tiporecordatorio AS tr', 'tr.id_tipoRecordatorio = r.id_tiporecordatorio');
  $this->db->join('reco_tipoestadorecordatorio AS ter', 'ter.id_tipoestadorecordatorio = r.id_tipoestadorecordatorio');
  $this->db->where('r.id_recordatorio', $id);
  $consulta = $this->db->get();
  if (count($consulta->result()) > 0) {
      return $consulta->result();
  } else {
      return 0;
  }
}

public function FinalizarRecordatorio($id){
  $this->db->trans_begin();
  $this->db->where('id_recordatorio', $id);
  $datos= array(
    'id_tipoestadorecordatorio' => 8 //estado finalizado
  );
  $this->db->update('reco_recordatorio', $datos);
  if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->db->trans_off();
      //return false;
      $datos = ["estado" => "2"];//error
  } else {
      $this->db->trans_commit();
      $this->db->trans_off();
      //return true;
      $datos = ["estado" => "1"];//ok
  }
  echo json_encode($datos);
}


















///---------------------------------------------------------------------------//
///------------------Funciones solo para el alert del Header------------------//
///---------------------------------------------------------------------------//
public function ContarRecordatorios(){
  $this->db->select('SUM(id_recordatorio) as cantidadrecordatorio');
  $this->db->from('reco_recordatorio');
  $this->db->where('id_tipoestadorecordatorio', 1);
  $this->db->where('activo', 1);
  $consulta = $this->db->get();
  if (count($consulta->result()) > 0) {
    $data['estado'] = 'ok';
    $data['resultado'] =  $consulta->result();
  } else {
    $data['estado'] = '';
    $data['resultado'] = '';
  }
  echo json_encode($data);
}

public function RecordatoriosNuevos(){
  $this->db->select('titulo, cuerpoRecordatorio AS descripcion, DATE_FORMAT(fechainicio,"%d-%m-%Y") AS fechainicio');
  $this->db->from('reco_recordatorio');
  $this->db->where('id_tipoestadorecordatorio', 1);
  $this->db->where('activo', 1);
  $this->db->order_by('fechainicio', 'desc');
  $this->db->limit('6');
  $consulta = $this->db->get();
  if (count($consulta->result()) > 0) {
    return $consulta->result();
  } else {
    return 0;
  }
}

public function RecordatoriosTipo($id){
  $this->db->select('titulo, cuerpoRecordatorio AS descripcion, DATE_FORMAT(fechainicio,"%d-%m-%Y") AS fechainicio');
  $this->db->from('reco_recordatorio');
  $this->db->where('id_tipoestadorecordatorio', 1);
  $this->db->where('activo', 1);
  $this->db->order_by('fechainicio', 'desc');
  //recibo el id del tipo recordatorio que quiero recuperar.
  $this->db->where('id_tiporecordatorio', $id);
  $this->db->limit('6');

  $consulta = $this->db->get();
  if (count($consulta->result()) > 0) {
    return $consulta->result();
  } else {
    return 0;
  }

}


}
