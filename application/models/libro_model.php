<?php

class Libro_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function insertar_libro($libro, $apel, $cant, $autor, $editorial, $area, $descripcion){
        $data = array(
                      'titulo'                  => $libro,
                      'area'                    => $area,
                      'apellido'                => $apel,
                      'descripcion'             => $descripcion,
                      'cantidad'                => $cant,
                      'Autor_id'                => $autor,
                      'Editorial_id'            => $editorial,
        );
        return $this->db->insert('libro', $data);
    }    
    
    function contarLibros(){
        return $this->db->count_all_results('libro');
    }
    
    function contarLibrosTitulo($titulo){
        $sql = $this->db->select('*')
                ->like('titulo', $titulo)
                ->get('libro');
        $data = $sql->num_rows();
        return $data;
    }
    
    function contarLibrosTitulo2($titulo, $tipo){
        switch ($tipo){
            case 1:
                $sql = $this->db->select('*')
                        ->like('titulo', $titulo)
                        ->get('libro');
                $data = $sql->num_rows();
                break;
            case 2:
                $sql = $this->db->select('*')
                        ->like('Autor_id', $titulo)
                        ->get('libro');
                $data = $sql->num_rows();
                break;
            case 3:
                $sql = $this->db->select('*')
                            ->like('Editorial_id', $titulo)
                            ->get('libro');
                $data = $sql->num_rows();
                break;
        }
        
        return $data;
    }
    
    function libros($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('libro');
        return $query->result();
    }
    
    function librosTitulo($limit, $offset, $titulo) {
        $this->db->limit($limit, $offset);
        $query = $this->db->select('*')
                ->like('titulo', $titulo)
                ->get('libro');
        return $query->result();
    }
    
    function librosAutor($limit, $offset, $autor){
        $this->db->limit($limit, $offset);
        $query = $this->db->select('*')
                ->like('Autor_id', $autor)
                ->get('libro');
        return $query->result();
    }


    function devolverLibros($id){
        $query = $this->db->select('*')
                ->where('idLibro',$id)
                ->get('libro');
        return $query->result();
    }
}
