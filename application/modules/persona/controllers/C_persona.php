<?php
/*
 * Descripcion: Modulo de personas.-
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 07/07/2018
 */

class C_persona extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('persona/M_persona');
    }

    public function GestionarPersonaCliente() {

      $tipoDocumentos = $this->M_persona->LeerTipoDocumentos();

      $CombotipoDocumentos = array(
          '' => ''
      );

      foreach ($tipoDocumentos as $tipoDocumento) :
          $CombotipoDocumentos[$tipoDocumento->id_tipoDocumento] = $tipoDocumento->descripcion.' ['.$tipoDocumento->descripcioncorta.']';
      endforeach
      ;

      $datos['TipoDocumentos'] = $CombotipoDocumentos;

      $tipoSexos = $this->M_persona->LeerTipoSexos();

      $CombotipoSexos = array(
          '' => ''
      );

      foreach ($tipoSexos as $tipoSexo) :
          $CombotipoSexos[$tipoSexo->id_tipoSexo] = $tipoSexo->descripcion;
      endforeach
      ;

      $datos['TipoSexos'] = $CombotipoSexos;

      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('persona/V_gestionPersonaCliente', $datos);
      $this->load->view('plantilla/V_pie');
    }

    Public function LeerClientesParametros(){

      $clientes = $this->M_persona->LeerClientes();

      if ($clientes !== 0) {
          echo '<center>';
          echo '<table class = "table table-striped table-bordered table-hover dataTable">';
          echo '<thead>';
          echo '<tr>';
          echo '<th style = "text-align: center;" class = "noSort">APELLIDO Y NOMBRE</th>';
          echo '<th style = "text-align: center;" class = "noSort">IDENTIFICADOR</th>';
          echo '<th style = "text-align: center;" class = "noSort">FECHA NACIMIENTO</th>';
          echo '<th style = "text-align: center;" class = "noSort"></th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
          foreach ($clientes as $i => $cliente) {
            echo '<tr>';
                echo '<input  type="hidden" name="id_personaHumana' . $i . '" id="id_personaHumana' . $i . '" value=' . $cliente->id_personaHumana . '>';
                echo '<td align="center" style="vertical-align:middle;"><center>' . $cliente->apellidos . ', ' . $cliente->nombres . '</center></td>';
                if($cliente->numeroDocumento == "0"){
                  echo '<td align="center" style="vertical-align:middle;"><center></center> --- </td>';
                }else{
                  echo '<td align="center" style="vertical-align:middle;"><center></center>' . $cliente->descripcioncorta . ': ' . $cliente->numeroDocumento . '</td>';
                }
                if($cliente->fechaNacimiento == "00/00/0000"){
                  echo '<td align="center" style="vertical-align:middle;"><center> --- </center></td>';
                }else{
                  echo '<td align="center" style="vertical-align:middle;"><center>' . $cliente->fechaNacimiento . '</center></td>';
                }
                echo '<td>';
                  echo '<div class="col">';
                  echo  '<div class="btn-group dropleft">';
                  echo    '<button type="button" class="btn btn-outline-metal m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="la 	la-cog"></i></button>';
                  echo    '<div class="dropdown-menu">';
                  echo      '<a class="dropdown-item" href="#">Datos B&aacute;sico</a>';
                  echo      '<div class="dropdown-divider"></div>';
                  echo      '<a class="dropdown-item" href="#">Contacto</a>';
                  echo      '<a class="dropdown-item" href="#">Domicilio</a>';
                  echo      '<div class="dropdown-divider"></div>';
                  echo      '<a class="dropdown-item" href="#" onclick="InicializarModalEliminarCliente('. $i .')">Eliminar Cliente</a>';
                  echo    '</div>';
                  echo  '</div>';
                  echo '</div>';
                echo '</td>';
            echo '</tr>';
          }
            echo '</tbody>';
            echo '</table>';
            echo '</center>';
      }else{
            echo   '<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">';
            echo   '<div class="m-alert__icon"><i class="la la-warning"></i><span></span></div>';
            echo   '<div class="m-alert__text">';
            echo      '<strong>Los datos ingresados son incorrectos.</strong>Por favor, verifique e intente nuevamente.';
            echo   '</div>';
            echo   '<div class="m-alert__close">';
            echo      '<button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"></button>';
            echo   '</div>';
            echo   '</div>';
          }
    }

    Public function AgregarCliente(){

      $cliente = $this->M_persona->AgregarCliente();

      if (($cliente == 1) || ($cliente == '1')) {
          echo 1;
      }else{
          echo 0;
      }
  }

    Public function EliminarCliente(){

        $cliente = $this->M_persona->EliminarCliente();

        if (($cliente == 1) || ($cliente == '1')) {
            echo 1;
        }else{
            echo 0;
        }
    }

		public function GestionarPersonaProveedor() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('persona/V_gestionPersonaProveedor');
      $this->load->view('plantilla/V_pie');
    }

    public function GestionarPersonaEmpleado() {
      $this->load->view('plantilla/V_cabecera');
      $this->load->view('plantilla/V_menu');
      $this->load->view('persona/V_gestionPersonaEmpleado');
      $this->load->view('plantilla/V_pie');
    }

}
