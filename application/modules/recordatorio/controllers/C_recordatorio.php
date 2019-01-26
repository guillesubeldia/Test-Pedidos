<?php
/*
 * Descripcion: Modulo de prueba de la nueva plantilla.-
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 14/06/2018
 */

class C_recordatorio extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('recordatorio/M_recordatorio');
    }

    public function Index() {
      $datos["tipoRecordatorio"]    = $this->M_recordatorio->LeerTipoRecordatorios();
      $datos["estadoRecordatorio"]  = $this->M_recordatorio->LeerEstadoRecordatorios();

      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('recordatorio/V_gestionRecordatorio', $datos);
      $this->load->view('plantilla/V_pie');
    }
//////////TABLAS DE LOS RECORDATORIOS///////////////////////////////////
////////////////////////////////////////////////////////////////////////
public function TablaNuevos(){
  $recordatorios = $this->M_recordatorio->ObtenerRecordatorios();
  if ($recordatorios !== 0) {
  echo '<center>';
  echo '<table class = "table table-striped table-bordered table-hover dataTable">';
  echo '<thead>';
    echo '<tr>';
      echo '<th style = "text-align: center;" class = "noSort">Tipo Recordatorio</th>';
      echo '<th style = "text-align: center;" class = "noSort">Estado</th>';
      echo '<th style = "text-align: center;" class = "noSort">Titulo</th>';
      echo '<th style = "text-align: center;" class = "noSort">Descripcion</th>';
      echo '<th style = "text-align: center;" class = "noSort">Fecha Inicio</th>';
      echo '<th style = "text-align: center;" class = "noSort">Fecha Fin</th>';
      echo '<th style = "text-align: center;" class = "noSort">Acciones</th>';
    echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  foreach ($recordatorios as $i => $row) {
    echo '<tr>';
        echo '<td align="center" style="vertical-align:middle;"><center>' . $row->tiporecordatorio . '</center></td>';
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

    public function TablaRecordatoriosCurso(){
      $recordatorios = $this->M_recordatorio->ObtenerRecordatoriosCurso();
      if ($recordatorios !== 0) {
      echo '<center>';
      echo '<table class = "table table-striped table-bordered table-hover dataTable">';
      echo '<thead>';
        echo '<tr>';
          echo '<th style = "text-align: center;" class = "noSort">Tipo Recordatorio</th>';
          echo '<th style = "text-align: center;" class = "noSort">Estado</th>';
          echo '<th style = "text-align: center;" class = "noSort">Titulo</th>';
          echo '<th style = "text-align: center;" class = "noSort">Descripcion</th>';
          echo '<th style = "text-align: center;" class = "noSort">Fecha Inicio</th>';
          echo '<th style = "text-align: center;" class = "noSort">Fecha Fin</th>';
          echo '<th style = "text-align: center;" class = "noSort">Acciones</th>';
        echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      foreach ($recordatorios as $i => $row) {
        echo '<tr>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->tiporecordatorio . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->tipoestado . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->titulo . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->cuerporecordatorio . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->fechainicio . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->fechafin . '</center></td>';
            echo '<td>';
            //echo '<button type= "button" class="btn btn-icon-only btn-circle green tooltips" data-original-title="" data-placement="top"><i class="fa fa-info"></i></button>';
            echo '<a class="btn btn-primary" onclick="LeerRecordatorio('.$row->id_recordatorio.')" role="button"><i class="la la-pencil"></i>Ver</a> ';
            echo '<a class="btn btn-danger"  onclick="ModalFinalizar('.$row->id_recordatorio.')" role="button"><i class="la la-check-square "></i>Finalizar</a> ';
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

    public function TablaRecordatoriosFinalizados(){
      $recordatorios = $this->M_recordatorio->ObtenerRecordatoriosFin();
      if ($recordatorios !== 0) {
      echo '<center>';
      echo '<table class = "table table-striped table-bordered table-hover dataTable">';
      echo '<thead>';
        echo '<tr>';
          echo '<th style = "text-align: center;" class = "noSort">Tipo Recordatorio</th>';
          echo '<th style = "text-align: center;" class = "noSort">Estado</th>';
          echo '<th style = "text-align: center;" class = "noSort">Titulo</th>';
          echo '<th style = "text-align: center;" class = "noSort">Descripcion</th>';
          echo '<th style = "text-align: center;" class = "noSort">Fecha Inicio</th>';
          echo '<th style = "text-align: center;" class = "noSort">Fecha Fin</th>';
          echo '<th style = "text-align: center;" class = "noSort">Acciones</th>';
        echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      foreach ($recordatorios as $i => $row) {
        echo '<tr>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->tiporecordatorio . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->tipoestado . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->titulo . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->cuerporecordatorio . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->fechainicio . '</center></td>';
            echo '<td align="center" style="vertical-align:middle;"><center>' . $row->fechafin . '</center></td>';
            echo '<td>';
            //echo '<button type= "button" class="btn btn-icon-only btn-circle green tooltips" data-original-title="" data-placement="top"><i class="fa fa-info"></i></button>';
            echo '<a class="btn btn-primary" href="#" onclick="LeerRecordatorio('.$row->id_recordatorio.')" role="button"><i class="la la-pencil"></i>Ver</a> ';
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

public function CrearRecordatorio(){
  $datos["recordatorio"] = $this->M_recordatorio->LeerTipoRecordatorios() ;
  $this->load->view('plantilla/V_cabecera');
  $this->load->view('plantilla/V_menu');
  $this->load->view('recordatorio/V_crearRecordatorio',$datos);
  $this->load->view('plantilla/V_pie');
}
public function AltaTipoRecordatorio(){
  $datos = array(
    'descripcion' => $this->input->post('descripcion'),
    'activo'      => 1
  );
}

public function AltaRecordatorio(){

  $datos = array(
          'id_persona'                => 1, //$this->session->user_data(id_persona)
          'id_tiporecordatorio'       => $this->input->post('id_tiporecordatorio'),
          'id_tipoestadorecordatorio' => 1,
          'titulo'                    => $this->input->post('titulo'),
          'cuerpoRecordatorio'        => $this->input->post('recordatorio'),
          'fechaInicio'               => $this->input->post('fechaInicio'),
          'fechaFin'                  => $this->input->post('fechaFin'),
          'activo'                    => 1
          );
  $this->M_recordatorio->AltaRecordatorio($datos);
}

///---------------------------------------------------------------------------//
///------------------Funciones solo para el alert del Header------------------//
///---------------------------------------------------------------------------//
public function ActualizarEstado(){
  //probar si con diferentes sessiones funciona, o actualiza todas por igual
  $this->session->set_userdata('recordatorios', '1');
}
public function ContarRecordatorios(){
  $this->M_recordatorio->ContarRecordatorios();
}
public function RecordatoriosNuevos(){
  $recordatorios= $this->M_recordatorio->RecordatoriosNuevos();
  if ($recordatorios !== 0) {
  foreach ($recordatorios as $row){
    echo '<div class="m-list-timeline__item">
                <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                  <a href="" class="m-list-timeline__text">';
                    echo $row->titulo;
        echo      '</a>
                <span class="m-list-timeline__time">';
                    echo $row->descripcion;
        echo   '</span>
            </div>';
  }
}else{
    $mensajeError = '<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                      <div class="m-list-timeline__item">
                              <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                <a class="m-list-timeline__text">
                                  No hay notificaciones Nuevas
                                </a>
                              <span class="m-list-timeline__time">
                              </span>
                      </div>';
    echo $mensajeError;
    }
}

public function RecuperarPorTipo(){
  $id = $this->input->post('tipoRecordatorio');
  $recordatorios = $this->M_recordatorio->RecordatoriosTipo($id);
  if ($recordatorios !== 0) {
  foreach ($recordatorios as $row){
    $mensaje = '<div class="m-list-timeline__item">
                <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                  <a href="" class="m-list-timeline__text">
                    '.$row->titulo.'
                    </a>
                <span class="m-list-timeline__time">
                    '.$row->descripcion.'
                </span>
            </div>';
  }
}else{
    $mensaje = '<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                      <div class="m-list-timeline__item">
                              <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                <a class="m-list-timeline__text">
                                  No hay notificaciones Nuevas
                                </a>
                              <span class="m-list-timeline__time">
                              </span>
                      </div>';

    }

    $data['estado'] = 'ok';
    $data['resultado'] = $mensaje;
    echo json_encode($data);
}
///---------------------------------------------------------------------------//
///------------------FIN Funciones solo para el alert del Header------------------//
///---------------------------------------------------------------------------//



public function test(){
  $id= 1;
  $datos["recordatorio"] = $this->M_recordatorio->VerRecordatorio($id);
  $this->load->view('plantilla/V_cabecera');
  $this->load->view('plantilla/V_menu');
  $this->load->view('recordatorio/V_test',$datos );
  $this->load->view('plantilla/V_pie');
}

public function LeerRecordatorio(){
  $id = $this->input->post('recordatorio');
  $recordatorios = $this->M_recordatorio->VerRecordatorio($id);
  $data['estado'] = 'ok';
  $data['resultado'] = $recordatorios;
  echo json_encode($data);
}


  public function VerRecordatorio(){
    $id = $this->input->post('idRecordatorio');
    $datos["recordatorio"] = $this->M_recordatorio->VerRecordatorio($id);

    $this->load->view('plantilla/V_cabecera');
    $this->load->view('plantilla/V_menu');
    $this->load->view('recordatorio/V_verRecordatorio');
    $this->load->view('plantilla/V_pie');
  }

  public function ActualizarRecordatorio(){
    $id = $this->input->post('id_recordatorio');
    $tipoRecordatorio = $this->input->post('selectEstadoRecordatorio');
    // if($tipoRecordatorio == 8){
    //   $estadoRecordatorio = 0;
    // }else {
    //   $estadoRecordatorio = 1;
    // }
//tengo que ver la manera de poner el recordatorio en inactivo, capaz lo dejo solo para hacerlo via bd
    $datos = array(
      'id_persona'                => $this->session->userdata("id_usuario"),
      'id_tiporecordatorio'       => $this->input->post('selectTipoRecordatorio'),
      'id_tipoestadorecordatorio' => $this->input->post('selectEstadoRecordatorio'),
      'titulo'                    => $this->input->post('tituloRecordatorio'),
      'cuerpoRecordatorio'        => $this->input->post('textoRecordatorio'),
      'fechaFin'                  => $this->input->post('fechaFin'),
      'activo'                    => 1
    );

    $this->M_recordatorio->ActualizarRecordatorio($id, $datos);
  }

  public function FinalizarRecordatorio(){
    $id = $this->input->post('finalizarRecordatorio');
    $this->M_recordatorio->FinalizarRecordatorio($id);

  }

}
