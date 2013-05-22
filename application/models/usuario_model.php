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
    
    function username_check($value){//para validar si el nombre de usuario existe
        $this->db->where('login', $value);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    function username_check2($value){//para validar que no haya dos nombres de usuario identicos
        $this->db->where('login', $value);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0){
            return FALSE;
        }else{
            return TRUE;
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
    
    function registrar_usuario($nombre, $apellido, $ci, $tipoUsuario, $login, $password){
        $data = array(
                      'nombre'                  => $nombre,
                      'apellido'                => $apellido,
                      'ci'                      => $ci,
                      'tipoUsuario'             => $tipoUsuario,
                      'login'                   => $login,
                      'password'                => $password,
        );
        return $this->db->insert('usuario', $data);
    }
    
}