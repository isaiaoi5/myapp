<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Editorial extends CI_Controller{
    function __construct() {
        parent::__construct();        
        $this->load->model('Editorial_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    function registrar(){
        $data['contenido'] = 'editorial/registrar';
        $data['title'] = 'Registrar autor';
        $this->load->view('includes/template', $data);
    }
    
    function registrarModal(){
        $this->load->view('autor/registrar');
    }
    
    function registrarEditorial(){
        $this->form_validation->set_rules('nombre', 'Nombre Autor', 'trim|required');
        $this->form_validation->set_rules('anio', 'Nombre Autor', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->registrarModal();
        } else {
            $nombre          = $this->input->post('nombre');
            $anio            = $this->input->post('anio');
            $insert          = $this->Editorial_model->insertar_editorial($nombre, $anio);
            $this->mensaje($insert);
        }
    }
    
    function mensaje($aux){
        $data['contenido'] = 'mensaje/mensaje';
        $data['title'] = 'Mensaje Libro';
        if( $aux == 1 ){
            $data['mensaje'] = 'Registro guardado correctamente';
        }else{
            $data['mensaje'] = 'A ocurrido un error Vuelva a Intentarlo';
        }       
        $this->load->view('includes/template', $data);
    }
}
