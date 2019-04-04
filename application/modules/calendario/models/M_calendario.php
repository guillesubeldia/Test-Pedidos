<?php
/*
 * Descripcion: Modulo de entrada al sistema.
* Autores: Plazas, Ricardo Gastón.
           Subeldía, Guillermo Daniel.
 * Fecha ultima actualizacion: 11/06/2018
 */
class M_calendario extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

public function FechasPedidos(){
    $query = ("SELECT p.id_pedido AS 'id',p.titulo AS 'title', DATE_FORMAT(dp.fecha, '%Y-%m-%d') AS 'start',
                CASE p.id_tipopedido
                WHEN  1 THEN '#f56954'
                WHEN  2 THEN '#3c8dbc' 
                WHEN  3 THEN '#00a65a' 
                END AS backgroundColor,
                
                CASE p.id_tipopedido
                WHEN  1 THEN '#f56954'
                WHEN  2 THEN '#3c8dbc' 
                WHEN  3 THEN '#00a65a' 
                END AS borderColor
        
                FROM  detallepedido AS dp
                JOIN pedido AS p ON p.id_pedido=dp.id_pedido
                
                ORDER BY dp.fecha DESC
                LIMIT 15");

    return $this->db->query($query)->result();
}


}
