<?php

class Menues{
    private $ci;
    function __construct() {
        $this->ci =& get_instance();
    }

public function armar_menues($id_perfil) {
    //consulto menú y armo arrays por niveles
    $menu1 = array();
    $menu2 = array();
    $menu3 = array();
    $menu4 = array();
    $this->ci->db->select('m.*');
    $this->ci->db->from('menu  m');
    $this->ci->db->join('menu_perfiles b','b.menu=m.id_menu');
    $this->ci->db->where('b.perfil',$id_perfil);
    $this->ci->db->order_by('m.nivel', 'm.orden','m.referencia');
    $query = $this->ci->db->get();

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $nivel = $row->nivel;
            switch ($nivel) {
                case 1:
                    $menu1[$row->id_menu]['id_menu']         = $row->id_menu;
                    $menu1[$row->id_menu]['descripcion']     = "&nbsp;" . $row->descripcion;
                    $menu1[$row->id_menu]['referencia']      = $row->referencia;
                    $menu1[$row->id_menu]['orden']           = $row->orden;
                    $menu1[$row->id_menu]['hijode']          = $row->hijode;
                    $menu1[$row->id_menu]['icono']           = $row->icono;
                    break;
                case 2:
                    $menu2[$row->id_menu]['id_menu']         = $row->id_menu;
                    $menu2[$row->id_menu]['descripcion']     = "&nbsp;" . $row->descripcion;
                    $menu2[$row->id_menu]['referencia']      = $row->referencia;
                    $menu2[$row->id_menu]['orden']           = $row->orden;
                    $menu2[$row->id_menu]['hijode']          = $row->hijode;
                    $menu2[$row->id_menu]['icono']           = $row->icono;
                    break;
                case 3:
                    $menu3[$row->id_menu]['id_menu']         = $row->id_menu;
                    $menu3[$row->id_menu]['descripcion']     = "&nbsp;" . $row->descripcion;
                    $menu3[$row->id_menu]['referencia']      = $row->referencia;
                    $menu3[$row->id_menu]['orden']           = $row->orden;
                    $menu3[$row->id_menu]['hijode']          = $row->hijode;
                    $menu3[$row->id_menu]['icono']           = $row->icono;
                    break;

            }
        }
    }
    $query->free_result();
    $tipoMenu=1;
        switch ($tipoMenu) {
        case 1: return $this->ArmarMenuLateral($menu1,$menu2,$menu3,$menu4);
        }

}

    // Funcion busca elementos
    function search($array, $key, $value) {
            $results = array();
            if (is_array($array)) {
                if (isset($array[$key]) && $array[$key] == $value) {
                    $results[] = $array;
                }
                foreach ($array as $subarray) {
                    $results = array_merge($results, $this->search($subarray, $key, $value));
                }
            }
            return $results;
    }
    function ArmarMenuLateral($menu1,$menu2,$menu3,$menu4){
        // Recorro nivel 1
        $html_out = '';
        $html_out = "\n<!-- BEGIN SIDEBAR -->";
        $html_out = "\n<!-- Inicia nivel 1-->";
        foreach ($menu1 as $mimenu1) {
            $arr = $menu2;
            $temp = array();
            $temp = $this->search($arr, 'hijode', $mimenu1['id_menu']); //busca hijos del nivel 1 style="color: green;  font-size: 24px;"
            if (!empty($temp)) {
                $html_out .= "";
                $html_out .="<li class='treeview'><a href='".base_url().$mimenu1['referencia']."'>\n
                    					<i class='" . $mimenu1['icono'] . "'></i>\n
                    					<span>" . $mimenu1['descripcion'] . "</span>\n
                                        <span class='fa fa-angle-left pull-right'></span>
                                                    </a>\n<!-- Abre elemento nivel 1 -->";
            }else{
            $html_out .="<li><a href='".base_url().$mimenu1['referencia']."'>\n
					<i class='" . $mimenu1['icono'] . "'></i>\n
					<span>" . $mimenu1['descripcion'] . "</span>\n
                        </a>\n<!-- Abre elemento nivel 1 -->";
            }
            if (!empty($temp)) {
                $html_out .="<ul class='treeview-menu'>";
                foreach ($temp as $mimenu2) {
                    $html_out .="<li><a href='".base_url().$mimenu2['referencia']."'>\n
                                    <i class='" . $mimenu2['icono'] . "'></i>\n
                                    <span>" . $mimenu2['descripcion'] . "</span>\n
                                    </a>\n<!--Abre elemento nivel 2-->";
                    // $html_out .="\n<li>".$mimenu2['descripcion']." id: ".$mimenu2['id_menu']." orden: ".$mimenu2['orden']." hijode: ".$mimenu2['hijode']."\n<!--abre elemento nivel 2-->"; //elemento de nivel 2
                    $arr = $menu3;
                    $temp2 = array();
                    $temp2 = $this->search($arr, 'hijode', $mimenu2['id_menu']); // Busca hijos de nivel 2
                    if (!empty($temp2)) {
                        $html_out .="\n<ul class='treeview-menu'>";
                        foreach ($temp2 as $mimenu3) {
                            $html_out .="<li><a href='".base_url().$mimenu3['referencia']."'><i class='" . $mimenu3['icono'] . "'></i>" . $mimenu3['descripcion'] . "</a></li>\n<!--abre elemento nivel 3-->";
                            // $html_out .="\n  <li>".$mimenu3['descripcion']." id: ".$mimenu3['id_menu']." orden: ".$mimenu3['orden']." hijode: ".$mimenu3['hijode']."<!--abre elemento nivel 3-->\n"; //elemento de nivel 3
                            $arr = $menu4;
                            $temp3 = array();
                            $temp3 = $this->search($arr, 'referencia', $mimenu3['id_menu']); // busca hijos de nivel 3
                            if (!empty($temp3)) {
                                $html_out .="\n  <ul class='treeview-menu'><!--Abre 4to nivel-->";
                                foreach ($temp3 as $mimenu4) {
                                    $html_out .="<li><a href='".base_url().$mimenu4['referencia']."'>\n
					<i class='" . $mimenu4['icono'] . "'></i>\n
					<span>" . $mimenu4['descripcion'] . "</span>\n
                                        </a>\n<!-- Abre elemento nivel 4-->";
                                    // $html_out .= "\n<li>".$mimenu4['descripcion']." id: ".$mimenu4['id_menu']." orden: ".$mimenu4['orden']." hijode: ".$mimenu4['hijode']."</li><!--cierra elemento nivel 4-->  "; //elemento de nivel 4
                                }
                                $html_out .= "</ul><!--cierra 4to nivel-->\n";
                            }
                            $html_out .= "</li><!--cierra elemento nivel 3-->\n";
                        }
                        $html_out .= "</ul><!--cierra 3er nivel-->\n";
                    }
                    $html_out .= "</li><!--cierra elemento nivel 2-->";
                }
                $html_out .= "</ul><!--cierra 2do nivel-->\n";
            }
            $html_out .= "</li><!--nivel1-->\n";
        } // Fin recorrida nivel 1
        // $html_out .= " </ul><!-- Cierra 1er nivel-->\n";
        $html_out .= "\n<!-- END SIDEBAR -->";
        return $html_out;
    }


    function ConsultarMenuIzquierda($id_perfil){
            $accion ="SELECT m.* FROM menu AS m
              JOIN menu_perfiles AS b
              ON b.menu=m.id_menu
              AND  b.perfil='1'
              ORDER BY nivel, hijode, orden";
       $query = $this->ci->db->query($accion);
        if ($query->num_rows() > 0) {
                    return TRUE; // CONTIENE menu
        }else{
            return FALSE; // NO CONTIENE menu
        }

    }




}
// Fin clase armar menu
