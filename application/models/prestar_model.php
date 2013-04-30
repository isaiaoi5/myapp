<?php
class Prestar_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function insertar($libro, $usuario, $tipo){
        $data = array(
            'tipoPrestamo'      => $tipo,
            'Estado'            => 1,
            'FechaSolicitud'    => date('Y-m-d H:i:s'),
            'Libro_id'          => $libro,
            'Usuario_id'        => $usuario
        );
        return $this->db->insert('prestar', $data);
    }
    
    function prestarOk($idPrestar){
        $data = array(
            'Estado'    => 2//2 estado prestado
        );
        $this->db->where('idPrestar', $idPrestar);
        return $this->db->update('prestar', $data);
    }

    function cantidad_prestados($id){
        $sql = $this->db->select('*')
                ->where('Estado', 2)//2==Prestado
                ->where('Libro_id', $id)                
                ->get('prestar');
        $data = $sql->num_rows();
        return $data;
    }      
    
    function cantidad_solicitados($id){
        $sql = $this->db->select('*')
                ->where('Estado', 1)//1==Solicitado
                ->where('Libro_id', $id)                
                ->get('prestar');
        $data = $sql->num_rows();
        return $data;
    }
    
    function cantidad_solicitados_todos(){
        $sql = $this->db->select('*')
                ->where('Estado', 1)//1==Solicitado               
                ->get('prestar');
        $data = $sql->num_rows();
        return $data;
    }
    
    function todos_solicitados($limit, $offset){
        $this->db->limit($limit, $offset);
        $query = $this->db->select('*')
                ->where('Estado', 1)//1==Solicitado
                ->get('prestar');
        return $query->result();
    }
    
    function usuarioSolicitud($ciUsuario){
        $query = $this->db->select('*')
                ->where('ci',$ciUsuario)
                ->get('usuario');
        return $query->result();
    }


    function ejemplarId($id){
        $sql = $this->db->select('*')
                ->where('Estado', 2)//2==Prestado
                ->or_where('Estado', 1)//1==Solicitado
                ->where_in('Ejemplar_id', $id)                
                ->get('prestar');
        foreach ($sql->result() as $reg) {
            $data[$reg->Ejemplar_id] = $reg->Ejemplar_id;
        }
        return $data;
    }
    
    function prestadoUsuarios($idUsuario){
        $sql = $this->db->select('*')
                    ->where('Estado', 2)
                    ->where_in('Usuario_id', $idUsuario)
                    ->get('prestar');
        return $sql->result();
    }
    
    function solicitudUsuarios($idUsuario){
        $sql = $this->db->select('*')
                    ->where('Estado', 1)
                    ->where_in('Usuario_id', $idUsuario)
                    ->get('prestar');
        return $sql->result();
    }
    
}