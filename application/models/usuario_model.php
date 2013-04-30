<?php
class Usuario_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function devolverUsuario($id){
        $sql = $this->db->select('nombre, apellido')
                ->where('idUsuario', $id)
                ->get('usuario');
        foreach ($sql->result() as $reg) {
            $data = $reg->nombre." ".$reg->apellido;
        }
        return $data;
    }
    
}