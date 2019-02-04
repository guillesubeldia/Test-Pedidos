<?php
/*
 * Descripcion: Modulo de entrada y vista de pedidos del sistema.
           Subeldía, Guillermo Daniel.
 * Fecha ultima actualizacion: 30/01/2019
 */

class C_pedidos extends MX_Controller {

  public function __construct() {
      parent::__construct();
      $this->load->model('pedidos/M_pedidos');
  }

public function index(){
  $datos["pedidos"] = $this->M_pedidos->RecuperarPedidos();
  $this->load->view('plantilla/V_cabecera');
  $this->load->view('plantilla/V_menu');
  $this->load->view('pedidos/V_tablaPedidos',$datos);
  $this->load->view('plantilla/V_pie');
  
}

public function CargarPedido(){
  $datos["dependencia"] = $this->M_pedidos->RecuperarDependencias();
  $datos["estado"] = $this->M_pedidos->RecuperarEstado();
  $datos["tipoPedido"] = $this->M_pedidos->RecuperarTipoPedido();
  $datos["tipoMovimiento"] = $this->M_pedidos->RecuperarTipoMovimiento();
  $datos["elemento"] = $this->M_pedidos->RecuperarElemento();
  $this->load->view('plantilla/V_cabecera');
  $this->load->view('plantilla/V_menu');
  $this->load->view('pedidos/V_altaPedido',$datos);
  $this->load->view('plantilla/V_pie');
}

public function LeerPedidos(){
  $pedidos = $this->M_pedidos->RecuperarPedidos();
  if ($pedidos !== 0) {
  foreach ($pedidos as $i => $pedido) {
    $descripcionRecortado = substr($pedido->descripcion, 0, 30)."...";
    // if($pedido->id_tipoContenedor == 1){
    //   $elemento = "Producto";
    //   $stock = "<a class='btn btn-info' href='#' onclick='ModalStock(".$pedido->id_productoServicio.")' role='button'><i class='la la-search'></i>Stock</a> ";
    // }else{
    //   $elemento = "Servicio";
    //   $stock= "";
    // }

    // if($pedido->activo == 1){
    //   $estado = '<a class="btn btn-danger" href="#" onclick="EliminarCategoria('.$pedido->id_productoServicio.')" role="button"><i class="la la-trash"></i>Eliminar</a> ';
    // }else{
    //   $estado = '';
    // }
    echo '<td style="vertical-align:middle;"><center>' . $pedido->fechaalta . '</center></td>';
    echo '<td style="vertical-align:middle;"><center>' . $pedido->dependenciaOrigen . '</center></td>';
    echo '<td style="vertical-align:middle;"><center>' . $pedido->tipoPedido . '</center></td>';
    echo '<td style="vertical-align:middle;"><center>' . $pedido->titulo . '</center></td>';
    echo '<td style="vertical-align:middle;">' . $descripcionRecortado. '</td>';
    echo '<td>';
      echo '<a class="btn btn-primary" title="Editar datos." href="#" onclick="ModalEditar('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Editar</a> ';
      echo '<a class="btn btn-info" title="Ver pedido completo." href="#" onclick="ModalEditar('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Ver</a> ';      
      echo '<a class="btn btn-success" title="Ver movimientos del pedido." href="#" onclick="ModalEditar('.$pedido->id_pedido.')" role="button"><i class="la la-pencil"></i>Movimientos</a> ';
    echo '</td>';
  }
 
}else{
  $mensajeError = '<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
    <div class="m-alert__icon">
      <i class="la la-warning"></i>
      <span></span>
    </div>
    <div class="m-alert__text">
      <strong>
        Los datos ingresados son incorrectos.
      </strong>
        Por favor, verifique e intente nuevamente.
    </div>
    <div class="m-alert__close">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>';
  echo $mensajeError;
}
}

public function LeerElementos(){
  $elementos = $this->M_pedidos->RecuperarElemento();
  if ($elementos !== 0) {
    echo "<option value='' selected disabled>Seleccione ...</option>";
  foreach ($elementos as $i => $elemento) {
    $descripcionRecortado = substr($elemento->descripcion, 0, 30)."...";
    echo '<option value='.$elemento->id_elemento.'>'.$elemento->descripcion.'</option>';
  }
}
}

public function RegistrarPedido(){
  // $this->input->post();
  $tipoPedido = $this->input->post("slcTipoPedido");
  $datosPedido = array(
    'id_tipopedido'       =>  $tipoPedido,
    'titulo'              =>  $this->input->post("txtTitulo"),
    'descripcion'         =>  $this->input->post("txtDescripcion"),
    'dependenciaorigen'   =>  $this->input->post("slcDependencia")
  );
  $idPedido = $this->M_pedidos->AltaPedido($datosPedido);

  $fechaCarga = date("Y-m-d H:i:s");
  //si el tipo pedido no es de soporte, tiene elementos y se tienen que cargar
  if($tipoPedido != 1){
    foreach($this->input->post('slcElemento[]') as $key=>$value){
      $elemento = $this->input->post('slcElemento[]')[$key];
      $cantidad = $this->input->post('txtCantidad[]')[$key];
      $observacion = $this->input->post('txtObservacion[]')[$key];

      $pedidoElementos = array(
      'id_pedido'       => $idPedido,
      'id_elemento'     => $elemento,
      'cantidad'        => $cantidad,
      'observacion'     => $observacion,
      'fecha'           => $fechaCarga
      );

      $this->M_pedidos->AltaElementos($pedidoElementos);
    }
    //una vez que se terminan de cargar todos los productos tengo que redireccionar a una pagina de exito
    //u error
  }
  //si no entra en el if, quiere decir que no tenia elementos para agregar
  redirect(base_url() . "/producto/C_producto/GestionarProductoServicio");
}

}
