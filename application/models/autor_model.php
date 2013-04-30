<?php

class Autor_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function devolver_autor(){
        $sql = $this->db->query('select idAutor, nombre, apellido from autor');
        //return $sql->result_array();
        foreach ($sql->result() as $reg) {
            $data[$reg->idAutor] = $reg->nombre." ".$reg->apellido;
        }
        return $data;
    }
    
    function devolver_un_autor($id){
        $sql = $this->db->select('nombre, apellido')
                ->where('idAutor', $id)
                ->get('autor');
        foreach ($sql->result() as $reg) {
            $data = $reg->nombre." ".$reg->apellido;
        }
        return $data;
    }
    
    function insertar_autor($nombre, $apellido){
        $data = array(
                      'nombre'                  => $nombre,
                      'apellido'                    => $apellido,
        );
        return $this->db->insert('autor', $data);
    } 
}
