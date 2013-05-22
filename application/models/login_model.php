<?php
class Login_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function verificar_login($username, $password){
        $this->db->where('login', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('usuario');
        if($query->num_rows() > 0){            
            return $query->result();
        }else{
            return FALSE;
        }
    }
}
