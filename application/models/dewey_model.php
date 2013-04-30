<?php
class Dewey_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function devolver_nivel1(){
        $sql = $this->db->query('select idNivel1, codigo, nombre, descripcion from nivel1');
        //return $sql->result_array();
        foreach ($sql->result() as $reg) {
            $data[$reg->idNivel1] = $reg->nombre;
        }
        return $data;
    }
    
    function devolver_nivel2($coddep){
        $sql = $this->db->select('idNivel2, codigo, nombre')
                ->where('Nivel1_idNivel1', $coddep)
                ->get('nivel2');
        foreach ($sql->result() as $reg) {
            $data[$reg->idNivel2] = $reg->nombre;
        }        
        echo json_encode($data);
    }
    
    function devolver_nivel2_js(){
        $sql = $this->db->select('idNivel2')->get('nivel2');
        $retorna = "";
        foreach ($sql->result() as $reg) {
            $sql1 = $this->db->select('idArea, codigo, Nombre')
                    ->where('Nivel2_idNivel2', $reg->idNivel2)
                    ->get('area');
            $cadena = "";
            $arreglo = $sql1->result_array();
            for( $i = 0; $i<count($arreglo); $i++){
                if( $i != 0 )$cadena.=",";
                $cadena.= "new Array(".$arreglo[$i]['idArea'].", '". $arreglo[$i]['Nombre']."','".$arreglo[$i]['codigo']."')";  
            }
            $retorna .= "var prov_{$reg->idNivel2} = new Array({$cadena});\n";
        }
        return $retorna;
    }
    
}
