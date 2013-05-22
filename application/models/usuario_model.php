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
    
    function username_check($value){
        $this->db->where('login', $value);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    function password_check($value){
        $this->db->where('password', $value);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
}