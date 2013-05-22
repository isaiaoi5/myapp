<?php
class Digital_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function insertar_libro_digital($nombre_libro, $nombre, $area, $descripcion, $direccion, $tipo_archivo, $autor, $editorial){
        $data = array(
                      'titulo'                  => $nombre_libro,
                      'nombre'                  => $nombre,
                      'area'                    => $area,
                      'descripcion'             => $descripcion,
                      'direccion'               => $direccion,
                      'tipo_archivo'            => $tipo_archivo,
                      'Autor_id'                => $autor,
                      'Editorial_id'            => $editorial,
        );
        return $this->db->insert('libro_digital', $data);
    } 

    function nombre_check($value){//para validar si el nombre de usuario existe
        $this->db->where('titulo', $value);
        $query = $this->db->get('libro_digital');
        if($query->num_rows() > 0){
            return FALSE;//falso
        }else{
            return TRUE;//verdadero            
        }
    }

    function contarLibrosDigitales(){
        return $this->db->count_all_results('libro_digital');
    }

    function librosDigitales($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('libro_digital');
        return $query->result();
    }
    
}
