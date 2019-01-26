<?php
/*
 * Descripcion: Modulo de persona al sistema.
 * Autor: Plazas, Ricardo Gastón
 * Fecha ultima actualizacion: 11/06/2018
 * Autor actualizacion: Plazas, Ricardo Gastón
 */
class M_persona extends CI_Model{



    public function __construct(){
        parent::__construct();

    }

    Public function LeerTipoDocumentos(){

      $this->db->select('td.id_tipoDocumento, td.descripcion, td.descripcioncorta');
      $this->db->from('pers_tipoDocumento td');
      $this->db->where('td.activo', '1');
      $this->db->order_by("descripcioncorta", "ASC");

      $consulta = $this->db->get();

      if (count($consulta->result()) > 0) {
          return $consulta->result();
      } else {
          return 0;
      }

    }

    Public function LeerTipoSexos(){

        $this->db->select('ts.id_tipoSexo, ts.descripcion');
        $this->db->from('pers_tipoSexo ts');
        $this->db->where('ts.activo', '1');
        $this->db->order_by("descripcion", "ASC");
  
        $consulta = $this->db->get();
  
        if (count($consulta->result()) > 0) {
            return $consulta->result();
        } else {
            return 0;
        }
  
    }


    Public function LeerClientes(){

      $tipoDocumento = $this->input->post('tipoDocumento');
      $numero        = $this->input->post('numero');
      $apellido      = $this->input->post('apellido');
      $nombre        = $this->input->post('nombre');

      $this->db->select('ph.id_personaHumana, ph.apellidos, ph.nombres, DATE_FORMAT (ph.fecha_nacimiento,"%d-%m-%Y") as "fechaNacimiento", td.descripcioncorta, pd.numeroDocumento');
      $this->db->from('pers_personasHumanas ph');
      $this->db->join('pers_personasRol pr', 'ph.id_personaHumana = pr.id_persona');
      $this->db->join('pers_personasDocumento pd', 'pd.id_persona = ph.id_personaHumana');
      $this->db->join('pers_tipoDocumento td', 'td.id_tipoDocumento = pd.id_tipoDocumento');
      if (! empty($tipoDocumento)) {
          $this->db->where('pd.id_tipoDocumento', $tipoDocumento);
      }
      if (! empty($numero)) {
          $this->db->where('pd.numeroDocumento', $numero);
      }
      if (trim($apellido) !== '') { // Si se ha ingresado el NOMBRE
          $this->db->where('MATCH (ph.apellidos) AGAINST ("+' . $apellido . '" IN BOOLEAN MODE)', NULL, FALSE); // se utiliza si se realiza la busqueda con mas de 4 caracteres en este caso es el apellido
      }
      if (trim($nombre) !== '') { // Si se ha ingresado el NOMBRE
          $this->db->where('MATCH (ph.nombres) AGAINST ("+' . $nombre . '" IN BOOLEAN MODE)', NULL, FALSE); // se utiliza si se realiza la busqueda con mas de 4 caracteres en este caso es el nombre
      }

      $this->db->where('pd.id_tipoPersona', '1'); // hacereferencia al tipo de persona humana
      $this->db->where('pr.id_tipoRol', '4'); //Hace referencia a rol de cliente
      $this->db->where('ph.activo', '1');
      $this->db->where('pr.activo', '1');
      $this->db->where('pd.activo', '1');
      $this->db->where('td.activo', '1');
      $this->db->order_by("apellidos", "ASC");

      $consulta = $this->db->get();

      if (count($consulta->result()) > 0) {
          return $consulta->result();
      } else {
          return 0;
      }

    }

    Public function EliminarCliente() {

        $this->db->trans_begin();

        $id_persona = $this->input->post('id_personaHumana');

        $this->db->set('activo', '0');
        $this->db->where('id_personaHumana', $id_persona);
        $this->db->update("pers_personasHumanas");

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->db->trans_off();
            return false;
        } else {
            $this->db->trans_commit();
            $this->db->trans_off();
            return true;
        }
    }

    Public function AgregarCliente() {

        $this->db->trans_begin();

        $tipoDocumento = $this->input->post('TipoDocumento');
        $numeroDocumento = $this->input->post('NumeroDocumento');
        $apellido = $this->input->post('Apellido');
        $nombre = $this->input->post('Nombre');
        $tipoSexo = $this->input->post('TipoSexo');
        $fechaNacimiento = $this->input->post('FechaNacimientoFormateado');
        $tipoPersona = $this->input->post('TipoPersona');
        $tipoRol = $this->input->post('TipoRol');   

            $personasHumanas = array('apellidos' => $apellido,
                                     'nombres' => $nombre,
                                     'id_tipoSexo' => $tipoSexo,
                                     'fecha_nacimiento' => $fechaNacimiento,
                                     'activo' => '1'
                                    );
            $this->db->insert('pers_personasHumanas', $personasHumanas);
            
            $ultimoIdPH = $this->db->insert_id();

            $personasHumanasDocumento = array('id_persona' => $ultimoIdPH,
                                              'id_tipoPersona' => $tipoPersona,
                                              'id_tipoDocumento' => $tipoDocumento,
                                              'numeroDocumento' => $numeroDocumento,
                                              'activo' => '1'
                                    );
            $this->db->insert('pers_personasDocumento', $personasHumanasDocumento);

            $personasHumanasRol = array('id_persona' => $ultimoIdPH,
                                        'id_tipoRol' => $tipoRol,
                                        'activo' => '1'
                                        );
            $this->db->insert('pers_personasRol', $personasHumanasRol);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $this->db->trans_off();
            return false;
        } else {
            $this->db->trans_commit();
            $this->db->trans_off();
            return true;
        }
    }


}
