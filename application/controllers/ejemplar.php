<?php
class Ejemplar extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Ejemplar_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    function  registrarL(){
        $data['contenido']      = 'ejemplar/registrarL';
        $data['title']          = 'Registrar Ejemplar';
        $this->load->view('includes/template', $data);
    }


    function registrar(){
        $this->form_validation->set_rules('precio', 'Precio Libro', 'trim|required');
        $this->form_validation->set_rules('estado', 'Estado Libro', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->registrarL();
        } else {
            $precio          = $this->input->post('precio');
            $estado           = $this->input->post('estado');
            $id           = $this->input->post('id');
            $insert = $this->Ejemplar_model->insertar($precio, $estado, $id);
        }
    }
    
}