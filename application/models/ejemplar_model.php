<?php
class Ejemplar_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function cantidad($idLibro){
        $sql = $this->db->select('estadoEjemplar, prestado, precio')
                ->where('Libro_id', $idLibro)
                ->get('ejemplar');
        $data = $sql->num_rows();
        return $data;
    }
    
    function cantidad_solicitados($idLibro){
        $sql = $this->db->select('estadoEjemplar, prestado, precio')
                ->where('Libro_id', $idLibro)
                ->where('prestado',3)
                ->get('ejemplar');
        $data = $sql->num_rows();
        return $data;
    }
    
    function precio($idLibros){
        $sql = $this->db->select('idEjemplar, precio')
                ->where_in('idEjemplar', $idLibros)
                ->get('ejemplar');
        foreach ($sql->result() as $reg) {
            $data[$reg->idEjemplar] = $reg->precio;
        }
        return $data;
    }
    
    function idEjemplares($idLibro){
        $sql = $this->db->select('idEjemplar, estadoEjemplar, prestado, precio')
                ->where('Libro_id', $idLibro)
                ->where('prestado',0)
                ->limit(1)
                ->get('ejemplar');
        return $sql->result();
    }
    
    function ejemplaresA($idLibro){
        $sql = $this->db->select('*')
                ->where('Libro_id', $idLibro)
                ->get('ejemplar');
        foreach ($sql->result() as $reg) {
            $data[$reg->idEjemplar] = $reg->idEjemplar;
        }
        return $data;
    }
    
    function ejemplaresB($ejem, $libro){
        $sql = $this->db->select('*')
                ->where('Libro_id', $libro)
                ->where_not_in('idEjemplar', $ejem)
                ->limit(1)
                ->get('ejemplar');
        if($sql->num_rows()<=0){
            $sql1 = $this->db->select('*')
                ->where('Libro_id', $libro)
                ->limit(1)
                ->get('ejemplar');
            foreach ($sql1->result() as $reg) {
            $data = $reg->idEjemplar;
        }
        }else{
        foreach ($sql->result() as $reg) {
            $data = $reg->idEjemplar;
        }
        }
        return $data;
    }


    function insertar($precio, $estado, $id){
        $data = array(
                      'estadoejemplar'          => $estado,
                      'precio'                  => $precio,
                      'Libro_id'                => $id,
                      'prestado'                => 0,
        );
        return $this->db->insert('ejemplar', $data);
    }
    
    function actualizar($idEjemplar){
        $data = array(
                      'prestado'    => 3
        );
        $this->db->where('idEjemplar', $idEjemplar);
        return $this->db->update('ejemplar',$data);
    }
}
