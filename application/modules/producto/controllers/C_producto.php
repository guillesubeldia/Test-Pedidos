<?php
/*
 * Descripcion: Modulo de producto/Servicio.-
 * Autores: Plazas, Ricardo Gastón.
            Subeldía, Guillermo Daniel.
 * Fecha ultima actualizacion: 07/07/2018
 */

class C_producto extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('producto/M_producto');
    }

    public function BuscarSubCategoria() {
        if ($this->input->post('categoriaPadre')) {
            $id = $this->input->post('categoriaPadre');
            $subCategoria = $this->M_producto->ObtenerSubCategorias($id);
                echo '<option value="" selected disabled>Seleccione una Sub Categoria</option>';
            foreach ($subCategoria->result() as $row):

                echo '<option value="' . $row->id_tipoProductoServicio . '">' . $row->descripcion . '</option>';
            endforeach;
        }
    }

//////////////////////////////////////////////////////////////////////////////
//PRODUCTOS SERVICIOS//
//////////////////////////////////////////////////////////////////////////////
public function GestionarProductoServicio(){
  $datos['categorias']       = $this->M_producto->ObtenerCategorias();
  $datos['productoServicio'] = $this->M_producto->ObtenerProductosServicios();

  $this->load->view('plantilla/V_cabecera');
  $this->load->view('plantilla/V_menu');
  $this->load->view('producto/V_tablaProductoServicio',$datos);
  $this->load->view('plantilla/V_pie');
}

public function LeerProductoServicio(){
  $proveedores = $this->M_producto->ObtenerProductosServicios();
  if ($proveedores !== 0) {
  echo '<center>';
  echo '<table class = "table table-striped table-bordered table-hover dataTable">';
  echo '<thead>';
  echo '<tr>';
  echo '<th style = "text-align: center;" class = "noSort">Elemento</th>';
  echo '<th style = "text-align: center;" class = "noSort">Categoria</th>';
  echo '<th style = "text-align: center;" class = "noSort">Descripcion</th>';
  echo '<th style = "text-align: center;" class = "noSort">Codigo</th>';
  echo '<th style = "text-align: center;" class = "noSort">Precio</th>';
  echo '<th style = "text-align: center;" class = "noSort">Acciones</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  foreach ($proveedores as $i => $proveedor) {
    if($proveedor->id_tipoContenedor == 1){
      $elemento = "Producto";
      $stock = "<a class='btn btn-info' href='#' onclick='ModalStock(".$proveedor->id_productoServicio.")' role='button'><i class='la la-search'></i>Stock</a> ";
    }else{
      $elemento = "Servicio";
      $stock= "";
    }
    if($proveedor->activo == 1){
      $estado = '<a class="btn btn-danger" href="#" onclick="EliminarCategoria('.$proveedor->id_productoServicio.')" role="button"><i class="la la-trash"></i>Eliminar</a> ';
    }else{
      $estado = '';
    }
    echo '<tr>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $elemento . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $proveedor->categoria . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $proveedor->descripcion . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $proveedor->cups . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $proveedor->precioVenta . '</center></td>';
        echo '<td>';
        //echo '<button type= "button" class="btn btn-icon-only btn-circle green tooltips" data-original-title="" data-placement="top"><i class="fa fa-info"></i></button>';
        echo '<a class="btn btn-primary" href="#" onclick="ModalEditar('.$proveedor->id_productoServicio.')" role="button"><i class="la la-pencil"></i>Editar</a> ';
        echo $stock;
        echo $estado;
        echo '</td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';
  echo '</center>';
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


// ALTA ///////////////////////////////////////////////////
//////////////////////////////////////////////////////////
    public function CargarProductoServicio() {
      $datos['categorias'] = $this->M_producto->ObtenerCategorias();
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('producto/V_gestionProductoServicio',$datos);
      $this->load->view('plantilla/V_pie');
    }

public function AltaProductoServicio(){
  $tipoElemento = $this->input->post('tipoElemento');
  if($tipoElemento == 1){
    //es un producto
    $datosElemento = array(
      'id_tipoContenedor'       => $tipoElemento,
      'descripcion'             => $this->input->post('nombreElemento'),
      'cups'                    => $this->input->post('cups'),
      'precioCosto'             => $this->input->post('precioCosto'),
      'ganancia'                => $this->input->post('ganancia'),
      'precioVenta'             => $this->input->post('precioVenta'),
      'id_tipoProductoServicio' => $this->input->post('subCategoria')
    );

    $this->M_producto->AltaProductoServicio($datosElemento,$tipoElemento);
    //cuando se da de alta, tiene que enviar a la vista de carga de stock
  }else{
    //es un servicio
    $datosElemento = array(
      'id_tipoContenedor'       => $tipoElemento,
      'descripcion'             => $this->input->post('nombreElemento'),
      'cups'                    => $this->input->post('cups'),
      'precioCosto'             => 0,
      'ganancia'                => 0,
      'precioVenta'             => $this->input->post('precioVenta'),
      'id_tipoProductoServicio' => $this->input->post('subCategoria')
    );
      $this->M_producto->AltaProductoServicio($datosElemento,$tipoElemento);
  }
}

//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
//Editar
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////

public function EditarProductoServicio($id){
  $datos['categorias']          = $this->M_producto->ObtenerCategorias();
  $datos['recuperarElemento']   = $this->M_producto->RecuperarElemento($id);
}

public function ActualizarDatos(){
  $idElemento = $this->input->post('idElemento');
  $tipoElemento = $this->input->post('tipoElemento');

  if($tipoElemento == 1){
    //es un producto
    $datosElemento = array(
      'id_tipoContenedor'       => $tipoElemento,
      'descripcion'             => $this->input->post('nombreElemento'),
      'cups'                    => $this->input->post('cups'),
      'precioCosto'             => $this->input->post('precioCosto'),
      'ganancia'                => $this->input->post('ganancia'),
      'precioVenta'             => $this->input->post('precioVenta'),
      'id_tipoProductoServicio' => $this->input->post('subCategoria')
    );

  }else{
    //es un servicio
    $datosElemento = array(
      'id_tipoContenedor'       => $tipoElemento,
      'descripcion'             => $this->input->post('nombreElemento'),
      'cups'                    => $this->input->post('cups'),
      'precioCosto'             => 0,
      'ganancia'                => 0,
      'precioVenta'             => $this->input->post('precioVenta'),
      'id_tipoProductoServicio' => $this->input->post('subCategoria')
    );
    //
  }
  $respuesta = $this->M_producto->EditarProductoServicio($datosElemento,$idElemento,$tipoElemento);
//falta validaciones de errores y demas
    redirect(base_url() . "/producto/C_producto/GestionarProductoServicio");

}

public function EliminarElemento(){
  $id = $this->input->post('idElemento');
  $this->M_producto->EliminarElemento($id);
}
//////////////////////////////////////////////////////////////////////////////
//CATEGORIA//
//////////////////////////////////////////////////////////////////////////////
    public function GestionarCategoria() {
      $datos['categorias'] = $this->M_producto->ObtenerCategorias();
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('producto/V_tablaCategoria',$datos);
      $this->load->view('plantilla/V_pie');
    }
    public function LeerCategorias(){
      $categorias = $this->M_producto->ListarCategorias();
      if ($categorias !== 0) {
      echo '<center>';
      echo '<table class = "table table-striped table-bordered table-hover dataTable">';
      echo '<thead>';
      echo '<tr>';
      echo '<th style = "text-align: center;">Categoria</th>';
      echo '<th style = "text-align: center;" class = "noSort">Sub Categoria</th>';
      echo '<th style = "text-align: center;" class = "noSort">Acciones</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      foreach ($categorias as $i => $categoria) {
        echo '<tr>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $categoria->categoria . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $categoria->subCategoria. '</center></td>';
            echo '<td  align="center">';
            //echo '<button type= "button" class="btn btn-icon-only btn-circle green tooltips" data-original-title="" data-placement="top"><i class="fa fa-info"></i></button>';
            echo "<a class='btn btn-primary' onClick='recuperarCategoria(".$categoria->id_tipoProductoServicio.")' title='Editar Categoria' href='#' role='button'><i class='la la-search'></i>Editar</a> &nbsp;";
            echo "<a class='btn btn-danger' onClick='EliminarCategoria(".$categoria->id_tipoProductoServicio.")' title='Editar Categoria' href='#' role='button'><i class='la la-trash'></i>Eliminar</a>";
            echo '</td>';
        echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';
      echo '</center>';
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
//////////////////////////////////////////////////////////////////////////////
//ALTA CATEGORIA//
//////////////////////////////////////////////////////////////////////////////
    public function AltaCategoria(){
      $tipoCarga = $this->input->post("tipoCarga");
      if($tipoCarga == 1){
        $datos = array(
          'id_tipoProductoServicioPadre'  => 0,
          'descripcion'                   => $this->input->post("categoria"),
          'activo'                        => 1
        );
      }else{//subcategoria
        $datos = array(
          'id_tipoProductoServicioPadre'  => $this->input->post("categoriaPadre"),
          'descripcion'                   => $this->input->post("subCategoria"),
          'activo'                        => 1
        );
      }

      $this->M_producto->CargarCategoria($datos);
      redirect(base_url() . "/producto/C_producto/CargarProductoServicio");
    }
//////////////////////////////////////////////////////////////////////////////
//EDITAR CATEGORIA//
//////////////////////////////////////////////////////////////////////////////

public function EditarCategoria(){
  //si tipo editar es uno, se va a cambiar solamente el nombre de la categorias
  //si tipo editar es dos, se puede cambiar la categoria padre, y se puede cambiar el nombre,
  //inclusive la categoria padre que tiene, ahi voy a tener que verificar si tiene value se cambia, sino no.
  $tipo = $this->input->post('tipoEditar');
  $id = $this->input->post('idCategoria');
  if($tipo == 1){
    $datos = array(
      'descripcion' => $this->input->post('descripcionCategoria')
    );
  }else{
    $padre = $this->input->post('selectCategoria');
      if($padre != ''){
        $datos = array(
          'id_tipoProductoServicioPadre'  => $padre,
          'descripcion' => $this->input->post('descripcionSubCategoria')
        );
      }else{
        $datos = array(
          'descripcion' => $this->input->post('descripcionSubCategoria')
        );
      }
  }
  $this->M_producto->EditarCategoria($datos,$id);
}

//////////////////////////////////////////////////////////////////////////////
//Eliminar CATEGORIA//
//////////////////////////////////////////////////////////////////////////////
public function EliminarCategoria(){
  $id = $this->input->post('idCategoria');
  $this->M_producto->EliminarCategoria($id);
}

//////////////////////////////////////////////////////////////////////////////
//Stock//
//////////////////////////////////////////////////////////////////////////////
public function GestionarStock($id){
  //echo "funciona".$id;
  $datos['recuperarStock']   = $this->M_producto->StockProductos($id);
}

public function VerStock(){
  $this->load->view('plantilla/V_cabecera');
  $this->load->view('plantilla/V_menu');
  $this->load->view('producto/V_tablaStock');
  $this->load->view('plantilla/V_pie');
}


public function TablaStock(){
  $stockProducto = $this->M_producto->ConsultarStock();
  // print_r($stockProducto);
  if ($stockProducto !== 0) {
  echo '<center>';
  echo '<table class="table table-bordered table-hover dataTable">';
  echo '<thead>';
  echo '<tr>';
  echo '<th style="text-align: center;">Categoria</th>';
  echo '<th style="text-align: center;" class="noSort">Producto</th>';
  echo '<th style="text-align: center;" class="noSort">Codigo</th>';
  echo '<th style="text-align: center;" class="noSort">Cantidad Actual</th>';
  echo '<th style="text-align: center;" class="noSort">Cantidad Minima</th>';
  echo '<th style="text-align: center;" class="noSort">Acciones</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
    foreach ($stockProducto as $i => $stock){
      if($stock->estadostock == 1){
        echo '<tr bgcolor="#fc97b2">';
      }else{
        echo '<tr>';
      }
        echo '<td align="center" style="vertical-align:middle;"><center>' . $stock->tipoproducto . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $stock->producto. '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $stock->cups. '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $stock->cantidadactual. '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $stock->cantidadminima. '</center></td>';
        echo '<td  align="center">';
        echo "<a class='btn btn-primary' onClick='EditarStock(".$stock->id_productoservicio.")' title='Editar Stock' href='#' role='button'><i class='la la-search'></i>Editar</a> &nbsp;";
        echo '</td>';
      echo '</tr>';
    }
  echo '</tbody>';
  echo '</table>';
  echo '</center>';
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
public function ActualizarStock(){
  //url a donde voy a madar despues de hacer el update
  $url = $this->input->post('recargar');
  $id = $this->input->post('id_stock');
  $datos = array(
    'cantidadactual'      => $this->input->post('cantidadActual'),
    'cantidadminima'      => $this->input->post('cantidadMinima')
  );

  $this->M_producto->EditarStock($datos,$id);
  redirect(base_url() . "/producto/C_producto/".$url);
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////PEDIDOS/////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

public function GestionarPedido() {
  $this->load->view('plantilla/V_cabecera');
  $this->load->view('plantilla/V_menu');
  $this->load->view('producto/V_gestionPedido');
  $this->load->view('plantilla/V_pie');
}



public function TablaPedidos(){
   $pedidos = $this->M_producto->ObtenerPedidos();
  if ($pedidos !== 0) {
  echo '<center>';
  echo '<table class = "table table-striped table-bordered table-hover dataTable">';
  echo '<thead>';
    echo '<tr>';
      // echo '<th style = "text-align: center;" class = "noSort">Tipo Recordatorio</th>';
      echo '<th style = "text-align: center;" class = "noSort">Estado</th>';
      echo '<th style = "text-align: center;" class = "noSort">Titulo</th>';
      echo '<th style = "text-align: center;" class = "noSort">Descripcion</th>';
      echo '<th style = "text-align: center;" class = "noSort">Fecha Inicio</th>';
      echo '<th style = "text-align: center;" class = "noSort">Fecha Fin</th>';
      echo '<th style = "text-align: center;" class = "noSort">Acciones</th>';
    echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  foreach ($pedidos as $i => $row) {
    echo '<tr>';
        // echo '<td align="center" style="vertical-align:middle;"><center>' . $row->tiporecordatorio . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $row->tipoestado . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $row->titulo . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $row->cuerporecordatorio . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $row->fechainicio . '</center></td>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $row->fechafin . '</center></td>';
        echo '<td>';
        //echo '<button type= "button" class="btn btn-icon-only btn-circle green tooltips" data-original-title="" data-placement="top"><i class="fa fa-info"></i></button>';
        echo '<a class="btn btn-primary" onclick="LeerRecordatorio('.$row->id_recordatorio.')" role="button"><i class="la la-pencil"></i>Ver</a>';
        echo '<a class="btn btn-danger" onclick="ModalFinalizar('.$row->id_recordatorio.')" role="button"><i class="la la-check-square "></i>Finalizar</a>';
        echo '</td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';
  echo '</center>';
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
    public function test(){
      $datos['categorias']          = $this->M_producto->ObtenerCategorias();
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('producto/V_test', $datos);
      $this->load->view('plantilla/V_pie');
    }

    public function testDatosTablas(){
      $datos = $this->M_producto->ObtenerCategoriasTest();
      echo "<table border='1' ><tr>";
      echo "<td align=center><b>Categoria</b></td>";
      echo "<td align=center><b>Sub Categoria</b></td>";
      foreach ($datos->result() as $row ){
        echo "<tr>";
        echo "<td>".$row->categoria."</td>";
        echo "<td>".$row->subCategoria."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }

    public function testDatosInputs(){
      $id = $this->input->post('idCategoria');
      //$id = 2;
      $this->M_producto->CategoriasDatos($id);
    }

    public function testsession(){
      //setear las notificaciones en 1 cuando inicia en el sistema,
      //las notificaciones van a aparecer si tienen productos que estan bajos de stock o directamente
      //no tienen stock.
      //tambien si hay pedidos de productos tienen que aparecer en la parte superior.
      $datos   =   array('id_usuario'        =>   1,
                         'nombreUsuario'     =>   "testNotificaciones",
                         'contrasenia'       =>   "451262",
                         'activo'            =>   1,
                         'id_perfil'         =>   1,
                         'perfilUsuario'     =>   1,
                         'notificaciones'    =>   1,
                         'is_logged_in'      =>   TRUE
      );
      $this->session->set_userdata($datos);
      echo "esta es la sesion vieja:";
      echo "<br>";
      print_r($this->session->userdata);
      echo "<br>";
      echo "<br>";
      //cuando el usuario le de a la opcion "marcar como leidos", el icono de notificaciones tiene que desaparecer
      //pero solamente para esa session que esta iniciada, cuando la cierre y la vuelva a abrir, las notificaciones van a seguir
      //apareciendo
      $this->session->set_userdata('notificaciones', 0);
      echo "<br>";
      echo "<br>";
      echo "Cambie el session";
      echo "<br>";
      print_r($this->session->userdata);
    }








}
