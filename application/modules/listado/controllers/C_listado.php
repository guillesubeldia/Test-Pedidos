<?php
/*
 * Descripcion: Modulo de entrada y vista de pedidos del sistema.
           Subeldía, Guillermo Daniel.
 * Fecha ultima actualizacion: 30/01/2019
 */

class C_listado extends MX_Controller {

  public function __construct() {
      parent::__construct();
      $this->load->model('listado/M_listado');
      $this->load->model('pedidos/M_pedidos');

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
    $this->load->view('plantilla/V_cabecera');
    $this->load->view('plantilla/V_menu');
    $this->load->view('listado/V_tablaPedidos',$datos);
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

                echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
    foreach($movimientos as $row){


        echo '<tr>';

          echo '<td style="vertical-align:middle;"><center>' . $row->fechamovimiento . '</center></td>';
          echo '<td style="vertical-align:middle;">' . $row->estadopedido . '</td>';
          echo '<td style="vertical-align:middle;">' . $row->dependenciadestino . '</td>';

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


  public function ListaFechas(){
    $desde = $this->input->post("fechaDesde");
    $hasta = $this->input->post("fechaHasta");

     $datos["pedidos"] = $this->M_listado->RecuperarPedidosFecha($desde, $hasta);
     $datos["estadoPedido"] = $this->M_pedidos->RecuperarEstado();
     $datos["dependencia"] = $this->M_pedidos->RecuperarDependencias();
     $datos["tipoMovimiento"] = $this->M_pedidos->RecuperarTipoMovimiento();
     $this->load->view('plantilla/V_cabecera');
     $this->load->view('plantilla/V_menu');
     $this->load->view('listado/V_tablaPedidos',$datos);
     $this->load->view('plantilla/V_pie');

  }
  }
