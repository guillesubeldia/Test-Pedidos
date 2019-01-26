<?php
/*
 * Descripcion: Modulo de entrada al sistema.
* Autores: Plazas, Ricardo Gastón.
           Subeldía, Guillermo Daniel.
 * Fecha ultima actualizacion: 11/06/2018
 */
class M_producto extends CI_Model{
    public function __construct(){
        parent::__construct();

    }
    //Consultas para recuperar Registros.
public function ObtenerCategorias(){
  $this->db->select('id_tipoProductoServicio, descripcion');
  $this->db->from('produc_tipoProductoServicio');
  $this->db->where('activo', 1);
  $this->db->where('id_tipoProductoServicioPadre', 0);
  return $this->db->get();
}

public function ObtenerSubCategorias($id){
  $this->db->select('id_tipoProductoServicio,descripcion');
  $this->db->from('produc_tipoProductoServicio');
  $this->db->where('activo', 1);
  $this->db->where('id_tipoProductoServicioPadre', $id);
  return $this->db->get();
}


public function ObtenerProductosServicios(){
  $this->db->select('ps.id_productoServicio, ps.id_tipoContenedor, tps.descripcion as "categoria", ps.descripcion, ps.cups, ps.precioVenta,ps.activo');
  $this->db->from('produc_productosServicios as ps');
  $this->db->join('produc_tipoProductoServicio as tps', 'ps.id_tipoProductoServicio = tps.id_tipoProductoServicio');
  $consulta = $this->db->get();

  if (count($consulta->result()) > 0) {
      return $consulta->result();
  } else {
      return 0;
  }
}

public function ListarCategorias(){
  $this->db->select('id_tipoProductoServicio, categoria, subCategoria');
  $this->db->from('view_categorias');
  $consulta = $this->db->get();

  if (count($consulta->result()) > 0) {
      return $consulta->result();
  } else {
      return 0;
  }
}
//////////////////////////////////////////////////////////////////////////////
//PRODUCTOS SERVICIOS CARGA ELEMENTO//
//////////////////////////////////////////////////////////////////////////////
public function AltaProductoServicio($datosElemento,$tipoElemento){
  $this->db->trans_begin();
  $this->db->insert('produc_productosServicios', $datosElemento);
  //echo json_encode($datosElemento);
  //echo json_encode("1");
  if($tipoElemento == 1){
    $ultimoId = $this->db->insert_id();
    $stockProductos = array(
      'id_productoServicio' => $ultimoId,
      'cantidadActual'      => 0,
      'cantidadMinima'      => 0
    );
    $this->db->insert('produc_stock', $stockProductos);
  }


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
////////////////////////EDITAR ELEMENTO ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
public function RecuperarElemento($id){
  $this->db->select('ps.id_productoServicio, ps.id_tipoContenedor, ps.descripcion, ps.cups, ps.precioCosto, ps.alicuota, ps.ganancia, ps.precioVenta, ps.id_tipoProductoServicio,
  padre.id_tipoProductoServicio AS idPadre, padre.descripcion AS descripcionPadre,
  hijo.id_tipoProductoServicio AS idHijo, hijo.descripcion AS descripcionHijo');
  $this->db->from('produc_productosservicios ps');
  $this->db->join('produc_tipoproductoservicio AS hijo', 'hijo.id_tipoProductoServicio = ps.id_tipoProductoServicio');
  $this->db->join('produc_tipoproductoservicio AS padre', 'hijo.id_tipoProductoServicioPadre = padre.id_tipoProductoServicio');
  $this->db->where('ps.id_productoServicio', $id);
  $this->db->where('ps.activo', '1');
  $consulta = $this->db->get();

  if (count($consulta->result()) > 0) {
      echo json_encode($consulta->result());
      //return $consulta->result();
  } else {
      return 0;
  }
}

public function EditarProductoServicio($datosElemento,$idElemento,$tipoElemento){
  $this->db->trans_begin();
  $this->db->where('id_productoServicio', $idElemento);
  $this->db->update('produc_productosservicios', $datosElemento);
  //COMPROBAR SI TIENE STOCK Y SE QUIERE PASAR DE PRODUCTO A SERVICIO
  if($tipoElemento == 1){
    $stockProductos = array(
      'id_productoServicio' => $idElemento,
      'cantidadActual'      => 0,
      'cantidadMinima'      => 0
    );
    $this->db->insert('produc_stock', $stockProductos);
  }

  if($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->db->trans_off();
      return false;
  }else {
      $this->db->trans_commit();
      $this->db->trans_off();
      return true;
  }
}

//////////////////////// Eliminar Elemento ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
public function EliminarElemento($id){
  $this->db->trans_begin();
  $datos = array('activo' => 0);
  $this->db->where('id_productoServicio', $id);
  $this->db->update('produc_productosservicios', $datos);

  if($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->db->trans_off();
      $data['status'] = '';
      $data['result'] = '<div class="alert alert-danger" role="alert">
				  	<strong>Oh oh!</strong> Ocurrio un error durante la operacion.
				</div>';
  }else{
      $this->db->trans_commit();
      $this->db->trans_off();
      $data['status'] = 'ok';
      $data['result'] = '<div class="alert alert-success" role="alert">
				  	<strong>Felicidades!</strong> La operacion se completo correctamente!
				</div>';
  }
  echo json_encode($data);
}
////////////////////////STOCK ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
public function StockProductos($id){
  //Si el producto no tiene ventas se puede cambiar su stock actual y minimo
  //si el producto ya tiene ventas solamente se puede cambiar el minimo
  //hay que dar la opcion de si el usuario es administrador del software, pueda cambiar todo lo que necesite sin
  //restriccion alguna
  $this->db->select('ps.id_stock, pp.descripcion, ps.cantidadMinima, ps.cantidadActual, 1 as estado');
  $this->db->from('produc_stock ps');
  $this->db->join('produc_productosservicios pp','pp.id_productoservicio = ps.id_productoServicio');
  $this->db->where('ps.id_productoServicio', $id);

  $consulta = $this->db->get();

  if (count($consulta->result()) > 0) {
      echo json_encode($consulta->result());
      //return $consulta->result();
  } else {
      return 0;
  }
}

public function ConsultarStock(){
  /*https://www.codeigniter.com/userguide3/database/query_builder.html#selecting-data
  $this->db->select() accepts an optional second parameter. If you set it to FALSE,
  CodeIgniter will not try to protect your field or table names. This is useful if
  you need a compound select statement where automatic escaping of fields may break them.
  */
  $this->db->select('tps.descripcion AS "tipoproducto",ps.id_productoservicio, ps.descripcion AS "producto", ps.cups, st.cantidadactual, st.cantidadminima,
  CASE WHEN st.cantidadactual > st.cantidadminima
  	THEN
  	0
  	ELSE
  	1
  END
  AS "estadostock"', FALSE);
  $this->db->from('produc_productosservicios AS ps');
  $this->db->join('produc_stock AS st', 'st.id_productoservicio = ps.id_productoservicio');
  $this->db->join('produc_tipoproductoservicio AS tps', 'tps.id_tipoproductoservicio = ps.id_tipoproductoservicio');
  $this->db->where('ps.activo', 1);

  return $this->db->get()->result();
}

public function EditarStock($datos,$id){
  $this->db->trans_begin();
  $this->db->where('id_productoservicio', $id);
  $this->db->update('produc_stock', $datos);
  //COMPROBAR SI TIENE STOCK Y SE QUIERE PASAR DE PRODUCTO A SERVICIO
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

////////////////////////Categorias ////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////
public function CargarCategoria($datos){
    $this->db->trans_begin();
    $this->db->insert('produc_tipoproductoservicio', $datos);
    if($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->db->trans_off();
        return false;
    }else {
        $this->db->trans_commit();
        $this->db->trans_off();
        return true;
    }
}

public function ObtenerCategoriasTest(){
  //SELECT id_tipoProductoServicio, categoria, subCategoria FROM view_categorias
    $this->db->select('id_tipoProductoServicio, categoria, subCategoria');
    $this->db->from('view_categorias');
    return $this->db->get();
}

public function CategoriasDatos($id){
  $this->db->select('id_tipoProductoServicio, categoria, subCategoria');
  $this->db->from('view_categorias');
  $this->db->where('id_tipoProductoServicio',$id);
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

public function EditarCategoria($datos,$id){
  $this->db->trans_begin();
  $this->db->where('id_tipoProductoServicio', $id);
  $this->db->update('produc_tipoproductoservicio', $datos);
  //COMPROBAR SI TIENE STOCK Y SE QUIERE PASAR DE PRODUCTO A SERVICIO
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

public function EliminarCategoria($id){
  // Primero analizo que no tengra productos asignados o es categoria padre de alguna sub categoria:
$this->db->select('categoria.id_tipoproductoservicio');
$this->db->from('produc_tipoproductoservicio AS categoria');
$this->db->join('produc_productosservicios AS elemento', 'elemento.id_tipoproductoservicio = categoria.id_tipoproductoservicio');
$this->db->where('categoria.id_tipoproductoservicio', $id);
$productos = $this->db->get()->num_rows();

$this->db->select('categoria.id_tipoproductoservicio');
$this->db->from('produc_tipoproductoservicio AS categoria');
$this->db->where('categoria.id_tipoproductoservicio', $id);
$categorias = $this->db->get()->num_rows();

  if ($productos > 0 || $categorias > 0) {
    $data['status'] = 'err';
    $data['result'] = '<div class="alert alert-danger" role="alert">
          <strong>Oh oh!</strong> Esta categoria no se puede eliminar.
      </div>';
  }else {
    $this->db->trans_begin();
    $datos = array('activo' => 0);
    $this->db->where('id_tipoProductoServicio', $id);
    $this->db->update('produc_tipoproductoservicio', $datos);

    if($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        $this->db->trans_off();
        $data['status'] = '';
        $data['result'] = '<div class="alert alert-danger" role="alert">
					  	<strong>Oh oh!</strong> Ocurrio un error durante la operacion.
					</div>';

    }else{
        $this->db->trans_commit();
        $this->db->trans_off();
        $data['status'] = 'ok';
        $data['result'] = '<div class="alert alert-success" role="alert">
					  	<strong>Felicidades!</strong> La operacion se completo correctamente!
					</div>';
    }
  }
  echo json_encode($data);
}


////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////PEDIDOS////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
public function ObtenerPedidos(){
  $this->db->select('r.id_recordatorio, tr.descripcion AS tiporecordatorio,  te.descripcion AS tipoestado, r.titulo, r.cuerporecordatorio, DATE_FORMAT(r.fechainicio,"%d-%m-%Y") AS fechainicio, DATE_FORMAT(r.fechafin,"%d-%m-%Y") AS fechafin, r.activo');
  $this->db->from('reco_recordatorio as r');
  $this->db->join('reco_tipoestadorecordatorio AS te', 'te.id_tipoEstadoRecordatorio = r.id_tipoestadorecordatorio');
  $this->db->join('reco_tiporecordatorio AS tr', 'tr.id_tiporecordatorio = r.id_tiporecordatorio');
  $this->db->where('r.activo', 1);
  $this->db->where('tr.id_tiporecordatorio', 1);
  $consulta = $this->db->get();
  if (count($consulta->result()) > 0) {
      return $consulta->result();
  } else {
      return 0;
  }
}

}

/*SELECT stock.id_productoServicio FROM
produc_stock AS stock
JOIN fact_comprobantes_detalle AS comprobante ON comprobante.id_productoservicio = stock.id_productoservicio
WHERE stock.activo = 1 AND comprobante.id_productoServicio = variable
$this->db->select('stock.id_productoServicio');
$this->db->from('produc_stock AS stock');
$this->db->join('fact_comprobantes_detalle AS comprobante', 'comprobante.id_productoservicio = stock.id_productoservicio');
$this->db->where('stock.activo', 1);
$this->db->where('id_productoServicio', $id);

Listado del STOCK completo
SELECT tps.descripcion AS 'tipoproducto', ps.descripcion AS 'producto', ps.cups, st.cantidadactual, st.cantidadminima
FROM produc_productosservicios AS ps
JOIN produc_stock AS st ON st.id_productoservicio = ps.id_productoservicio
JOIN produc_tipoproductoservicio AS tps ON tps.id_tipoproductoservicio = ps.id_tipoproductoservicio




*/
