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
      //poner control de acceso aqui, con el session
    if($this->session->userdata('id_perfil') == 3 ){
      echo redirect(base_url());
    }
    $is_logged_in = $this->session->userdata('is_logged_in');
    if (!isset($is_logged_in) || $is_logged_in != true) {
       echo redirect(base_url());
    } else {
        return true;
    }
  }

  public function index(){
    $datos["pedidos"] = $this->M_pedidos->RecuperarPedidos();
    $datos["estadoPedido"] = $this->M_pedidos->RecuperarEstado();
    $datos["dependencia"] = $this->M_pedidos->RecuperarDependencias();
    $datos["tipoMovimiento"] = $this->M_pedidos->RecuperarTipoMovimiento();

    $datos["tipoPedidoTecnico"]  =$this->M_pedidos->RecuperarTipoPedidoTecnico();

   
    $this->load->view('plantilla/V_cabecera');
    $this->load->view('plantilla/V_menu');
    $this->load->view('pedidos/V_tablaPedidos',$datos);
    // $this->load->view('pedidos/V_popUp',$datos);
    $this->load->view('plantilla/V_pie');
  }

  public function CargarPedido(){
    $datos["dependencia"]     = $this->M_pedidos->RecuperarDependencias();
    $datos["estado"]          = $this->M_pedidos->RecuperarEstado();
    $datos["tipoPedido"]      = $this->M_pedidos->RecuperarTipoPedido();
    $datos["tipoMovimiento"]  = $this->M_pedidos->RecuperarTipoMovimiento();
    $datos["elemento"]        = $this->M_pedidos->RecuperarElemento();
    
    $this->load->view('plantilla/V_cabecera');
    $this->load->view('plantilla/V_menu');
    $this->load->view('pedidos/V_altaPedido',$datos);
    $this->load->view('plantilla/V_pie');
  }

  public function ListaFechas(){
    
    $desde = date("Y-m-d", strtotime($this->input->post("fechaDesde")));;
    $hasta = date("Y-m-d", strtotime($this->input->post("fechaHasta")));;

     $datos["estadoPedido"]   = $this->M_pedidos->RecuperarEstado();
     $datos["pedidos"]        = $this->M_pedidos->RecuperarPedidosFecha($desde, $hasta);
     $datos["dependencia"]    = $this->M_pedidos->RecuperarDependencias();
     $datos["tipoMovimiento"] = $this->M_pedidos->RecuperarTipoMovimiento();
     $this->load->view('plantilla/V_cabecera');
     $this->load->view('plantilla/V_menu');
     $this->load->view('pedidos/V_tablaPedidos',$datos);
     $this->load->view('plantilla/V_pie');
  }



  public function LeerPedidos(){
    $pedidos = $this->M_pedidos->RecuperarPedidos();
    if ($pedidos !== 0) {
    foreach ($pedidos as $i => $pedido) {
      $descripcionRecortado = substr($pedido->descripcion, 0, 30)."...";
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
    $fechaCarga = date("Y-m-d H:i:s");
    $datosPedido = array(
      'id_tipopedido'       =>  1,
      'id_pedidotecnico'    =>  null,
      'solicita'            =>  $this->input->post("txtSolicitante"),
      'retira'              =>  null,
      'titulo'              =>  $this->input->post("txtTitulo"),
      'descripcion'         =>  $this->input->post("txtDescripcion"),
      'dependenciaorigen'   =>  $this->input->post("slcDependencia"),
      'numeroservicio'      =>  null,
      'fechaservicio'       =>  null,
      'aud_fechaalta'       =>  $fechaCarga,
      'aud_usuarioalta'     =>  $this->session->userdata('nombreUsuario'),
    );
    $idPedido = $this->M_pedidos->AltaPedido($datosPedido);


    //si no entra en el if, quiere decir que no tenia elementos para agregar
    redirect(base_url() . "/pedidos/C_pedidos/");
  }


  public function TablaMovimientos(){
   $idPedido = $this->input->post("idPedido");
    //$idPedido = 3 ;
    $movimientos = $this->M_pedidos->MovimientoPedido($idPedido);
    echo '<table id="tablaMovimientoPedidos" class="table table-bordered table-hover">';
      echo '<br>';
              echo '<thead>';
                echo '<tr>';
                  echo '<th style="text-align: center;">Fecha Movimiento</th>';
                  echo '<th style="text-align: center;">Estado</th>';
                  echo '<th>Dependencia Destino</th>';
                  echo '<th>Acciones</th>';
                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
    foreach($movimientos as $row){
      if ($row === end($movimientos) && $row->estado != 4) {
        $acciones =  '<a class="btn btn-danger" title="Finalizar" href="#" onClick="FinalizarMovimiento('.$row->id_pedido.')" role="button"><i class="la la-pencil"></i>Finalizar</a> ';
      }else{
        $acciones =  '';
      }

        echo '<tr>';

          echo '<td style="vertical-align:middle;"><center>' . $row->fechamovimiento . '</center></td>';
          echo '<td style="vertical-align:middle;">' . $row->estadopedido . '</td>';
          echo '<td style="vertical-align:middle;">' . $row->dependenciadestino . '</td>';
          echo '<td><center>'.$acciones.'</center></td>';
        echo '</tr>';
    }
      //Armar un buen body con todos los datos a cargar dentro del modal, data table incluida
      echo  '</tbody>';
      echo '</table>';
  }

  public function DatosMovimiento(){
    $id = $this->input->post("idPedido");
    $this->M_pedidos->DatosMovimiento($id);
  }

public function NuevoMovimiento(){
  if($this->input->post('idtipoPedido') == 1){
      $fechaCarga = date("Y-m-d H:i:s");
      $datosMovimiento = array(
        'id_estadopedido'    => $this->input->post('slctEstadoMovimiento'),
        'fechamovimiento'    => $this->input->post('fechaMovimiento'),
        'id_pedido'          => $this->input->post('idPedido'),
        'id_tipomovimiento'  => $this->input->post('slctTipoMovimiento'),
        'dependenciadestino' => $this->input->post('slctDestino'),
        'aud_fechaalta'       =>  $fechaCarga,
        'aud_usuarioalta'     =>  $this->session->userdata('nombreUsuario'),
      );

      $this->M_pedidos->AltaMovimientos($datosMovimiento);
  }else{
    //primero insertamos los datos del movimiento que se va a realizar
    $fechaCarga = date("Y-m-d H:i:s");
      $datosMovimiento = array(
        'id_estadopedido'    => $this->input->post('slctEstadoMovimiento'),
        'fechamovimiento'    => $this->input->post('fechaMovimiento'),
        'id_pedido'          => $this->input->post('idPedido'),
        'id_tipomovimiento'  => $this->input->post('slctTipoMovimiento'),
        'dependenciadestino' => $this->input->post('slctDestino'),
        'aud_fechaalta'       =>  $fechaCarga,
        'aud_usuarioalta'     =>  $this->session->userdata('nombreUsuario'),
      );

      $this->M_pedidos->AltaMovimientos($datosMovimiento);
    //segundo actualizamos el estado del pedido tecnico
      $id = $this->input->post('idPedido');
      $datosPedido = array(
        'id_pedidotecnico'    =>  $this->input->post('idPedidoTecnico'),
        'retira'              =>  $this->input->post('retira'),
        'numeroservicio'      =>  $this->input->post('numeroServicio'),
        'fechaservicio'       =>  $this->input->post('fechaServicio'),
        'aud_fechamodi'       =>  $fechaCarga,
        'aud_usuariomodi'     =>  $this->session->userdata('nombreUsuario'),
      );

      $this->M_pedidos->EditarPedido($datosPedido,$id);
  } 

  redirect(base_url() . "/pedidos/C_pedidos/");
}

public function FinalizarMovimiento(){
  $fechaCarga = date("Y-m-d H:i:s");
  $datosMovimiento = array(
    'id_estadopedido'     =>  4, //finalizado
    'fechamovimiento'     =>  $fechaCarga,
    'id_pedido'           =>  $this->input->post('idPedido'),
    'id_tipomovimiento'   =>  4, //ciclo completado
    'dependenciadestino'  =>  126, //mdh
    'aud_fechaalta'       =>  $fechaCarga,
    'aud_usuarioalta'     =>  $this->session->userdata('nombreUsuario'),
  );
  $consulta = $this->M_pedidos->AltaMovimientos($datosMovimiento);
  if ($consulta == true) {
    $data['status'] = 'ok';
    $data['result'] = 'ok';
  } else {
    $data['status'] = 'error';
    $data['result'] = '';
  }
  echo json_encode($data);
}

  public function EditarPedido($idPedido){
    $datos["elementosPedido"] = $this->M_pedidos->ElementosPedido($idPedido);
    $datos["datosPedido"] = $this->M_pedidos->DatosPedido($idPedido);

   // $datos["pedidos"] = $this->M_pedidos->RecuperarPedidos();
   // $datos["estadoPedido"] = $this->M_pedidos->RecuperarEstado();
    //$datos["tipoMovimiento"] = $this->M_pedidos->RecuperarTipoMovimiento();
    $datos["tipoPedidoArray"] = $this->M_pedidos->RecuperarTipoPedido();
    $datos["dependenciaArray"] = $this->M_pedidos->RecuperarDependencias();
    $datos["elemento"] = $this->M_pedidos->RecuperarElemento();
    $this->load->view('plantilla/V_cabecera');
    $this->load->view('plantilla/V_menu');
    $this->load->view('pedidos/V_editarPedido',$datos);
    $this->load->view('plantilla/V_pie');
  }

public function ActualizarPedido(){


  $idPedido = $this->input->post("idPedido");
  $tipoPedido = $this->input->post("slcTipoPedido");
  $fechaServicio = date("Y-m-d", strtotime($this->input->post("txtFechaServicio")));

  $fechaCarga = date("Y-m-d H:i:s");
  $datosPedido = array(
    'id_tipopedido'       =>  $tipoPedido, 
    'id_pedidotecnico'    =>  $this->input->post("slcTipoPedido"),
    'solicita'            =>  $this->input->post("txtSolicitante"),
    'retira'              =>  $this->input->post("txtRetira"),
    'titulo'              =>  $this->input->post("txtTitulo"),
    'descripcion'         =>  $this->input->post("txtDescripcion"),
    'dependenciaorigen'   =>  $this->input->post("slcDependencia"),
    'numeroservicio'      =>  $this->input->post("txtNumeroServicio"),
    'fechaservicio'       =>  $fechaServicio,
    'aud_fechamodi'       =>  $fechaCarga,
    'aud_usuariomodi'     =>  $this->session->userdata('nombreUsuario'),
  );
  $this->M_pedidos->EditarPedido($datosPedido,$idPedido);
  //si el tipo pedido no es de soporte, tiene elementos y se tienen que cargar
  if($tipoPedido != 1 && !empty($this->input->post('slcElemento[]')) ){
    


    foreach($this->input->post('slcElemento[]') as $key=>$value){
      $elemento = $this->input->post('slcElemento[]')[$key];
      $cantidad = $this->input->post('txtCantidad[]')[$key];
      $marca = $this->input->post('txtMarca[]')[$key];
      $modelo = $this->input->post('txtModelo[]')[$key];
      $numeroSerie = $this->input->post('txtNumeroSerie[]')[$key];
      $observacion = $this->input->post('txtObservacion[]')[$key];
    //Si no esta este dato, todos se van a insertar. Si esta solamente se va a actualizar
    
    if(!empty($this->input->post('idElemento[]')[$key])){
   
      $idDetallePedido = $this->input->post('idElemento[]')[$key];
      $pedidoElementos = array(
        //'id_pedido'       => $idPedido,
        'id_elemento'     => $elemento,
        'cantidad'        => $cantidad,
        'marca'           => $marca,
        'modelo'          => $modelo,
        'numeroSerie'     => $numeroSerie,
        'observacion'     => $observacion,
        'aud_usuariomodi' => $this->session->userdata('nombreUsuario'),
        'aud_fechamodi'   => $fechaCarga
        );
        
        //aca hago el update con esos dos datos.
        $this->M_pedidos->EditarPedidoDetalle($pedidoElementos, $idDetallePedido);
    }else{
     $pedidoElementos = array(
      'id_elemento'     => $elemento,
      'cantidad'        => $cantidad,
      'marca'           => $marca,
      'modelo'          => $modelo,
      'numeroSerie'     => $numeroSerie,
      'observacion'     => $observacion,
      'aud_usuarioalta' => $this->session->userdata('nombreUsuario'),
      'aud_fechaalta'   => $fechaCarga
      );
      
        //aca voy a hacer el insert.
      $this->M_pedidos->AltaElementosTecnico($pedidoElementos,$idPedido);
      }
    }
  }
  
  //redireccionar
  redirect(base_url() . "/pedidos/C_pedidos/");
}

  public function EliminarElemento(){
  $id = $this->input->post("idElemento");
  //para la tabla detallepedido tego que ponerlo como inactivo
  $consulta = $this->M_pedidos->EliminarElemento($id);

  if ($consulta == true) {
    $data['status'] = 'ok';
    $data['result'] = 'Ejecutado correctamente';
  } else {
    $data['status'] = 'error';
    $data['result'] = 'Errores';
  }
  echo json_encode($data);
}

 

  /*Servicio tecnico */
  public function ServicioTecnico(){
    $datos["dependencia"]     = $this->M_pedidos->RecuperarDependencias();
    $datos["estado"]          = $this->M_pedidos->RecuperarEstado();
    $datos["tipoMovimiento"]  = $this->M_pedidos->RecuperarTipoMovimiento();
    $datos["elemento"]        = $this->M_pedidos->RecuperarElemento();

    $datos["tipoPedidoTecnico"] = $this->M_pedidos->RecuperarTipoPedidoTecnico();
    
    $this->load->view('plantilla/V_cabecera');
    $this->load->view('plantilla/V_menu');
    $this->load->view('pedidos/V_altaServicioTecnico',$datos);
    $this->load->view('plantilla/V_pie');
  }

public function RegistrarServicioTecnico(){
//formateo la fecha, para evitar errores en la bd
  $fechaServicio = date("Y-m-d", strtotime($this->input->post("txtFechaServicio")));

  $fechaCarga = date("Y-m-d H:i:s");
  $datosPedido = array(
    'id_tipopedido'       =>  2, //soporte tecnico
    'id_pedidotecnico'    =>  $this->input->post("slcTipoPedido"),
    'solicita'            =>  $this->input->post("txtSolicitante"),
    'retira'              =>  $this->input->post("txtRetira"),
    'titulo'              =>  $this->input->post("txtTitulo"),
    'descripcion'         =>  $this->input->post("txtDescripcion"),
    'dependenciaorigen'   =>  $this->input->post("slcDependencia"),
    'numeroservicio'      =>  $this->input->post("txtNumeroServicio"),
    'fechaservicio'       =>  $fechaServicio,
    'aud_fechaalta'       =>  $fechaCarga,
    'aud_usuarioalta'     =>  $this->session->userdata('nombreUsuario'),
  );
  
  $idPedido = $this->M_pedidos->AltaPedidoTecnico($datosPedido);
    foreach($this->input->post('slcElemento[]') as $key=>$value){
      $elemento = $this->input->post('slcElemento[]')[$key];
      $cantidad = $this->input->post('txtCantidad[]')[$key];
      $marca = $this->input->post('txtMarca[]')[$key];
      $modelo = $this->input->post('txtModelo[]')[$key];
      $numeroSerie = $this->input->post('txtNumeroSerie[]')[$key];
      $observacion = $this->input->post('txtObservacion[]')[$key];

      $pedidoElementos = array(
      'id_elemento'     => $elemento,
      'cantidad'        => $cantidad,
      'marca'           => $marca,
      'modelo'          => $modelo,
      'numeroSerie'     => $numeroSerie,
      'observacion'     => $observacion,
      'aud_usuarioalta' => $this->session->userdata('nombreUsuario'),
      'aud_fechaalta'   => $fechaCarga
      );
      
      $this->M_pedidos->AltaElementosTecnico($pedidoElementos ,$idPedido);
    }
    if($this->input->post("slcTipoPedido") == 1){
      // redirect(base_url() . "/pedidos/C_pedidos/GeneraRecibo/".$idPedido);
    }else{
      // redirect(base_url() . "/pedidos/C_pedidos/GeneraComprobante/".$idPedido);
    }

     $datos["pedidos"] = $this->M_pedidos->RecuperarPedidos();
    $datos["estadoPedido"] = $this->M_pedidos->RecuperarEstado();
    $datos["dependencia"] = $this->M_pedidos->RecuperarDependencias();
    $datos["tipoMovimiento"] = $this->M_pedidos->RecuperarTipoMovimiento();

    $datos["tipoPedidoTecnico"]  =$this->M_pedidos->RecuperarTipoPedidoTecnico();

   
    $this->load->view('plantilla/V_cabecera');
    $this->load->view('plantilla/V_menu');
    $this->load->view('pedidos/V_tablaPedidos',$datos);
    // $this->load->view('plantilla/V_popUp',$datos);
    $this->load->view('plantilla/V_pie');
    
}

public function popup(){
  $datos["idPedido"] = 21;
  
  $this->load->view('plantilla/V_popUp',$datos);
 
}

public function GeneraComprobante($idpedido){
  $this->M_pedidos->CrearBarcode($idpedido);
  $datos["elementosPedido"] = $this->M_pedidos->ElementosPedido($idpedido);
  $datos["datosPedido"] = $this->M_pedidos->DatosPedido($idpedido);
  $this->load->view('pedidos/boleta',$datos);
}

public function GeneraRecibo($idpedido){
  $this->M_pedidos->CrearBarcode($idpedido);
  $datos["elementosPedido"] = $this->M_pedidos->ElementosPedido($idpedido);
  $datos["datosPedido"] = $this->M_pedidos->DatosPedido($idpedido);
  $this->load->view('pedidos/Comprobante',$datos);
}


}
