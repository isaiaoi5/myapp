<?php

class Editorial_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function devolver_editorial(){
        $sql = $this->db->query('select idEditorial, Nombre, anio from editorial');
        //return $sql->result_array();
        foreach ($sql->result() as $reg) {
            $data[$reg->idEditorial] = $reg->Nombre.' '.$reg->anio;
        }
        return $data;
    }
    
    function devolver_una_editorial($id){
        $sql = $this->db->select('Nombre, anio')
                ->where('idEditorial', $id)
                ->get('editorial');
        foreach ($sql->result() as $reg) {
            $data = $reg->Nombre.' '.$reg->anio;
        }
        return $data;
    }
    
    function insertar_editorial($nombre, $anio){
        $data = array(
                      'Nombre'  => $nombre,
                      'anio'    => $anio
        );
        return $this->db->insert('editorial', $data);
    } 
}
