<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    function registrar(){
        $data['contenido']      = 'usuario/registrar';
        $data['title']          = 'Registrar Libro';
        $this->load->view('includes/template', $data);
    }
    
    function registrarUsuario(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|strtoupper|alpha');
        $this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|strtoupper|alpha_numeric');
        $this->form_validation->set_rules('ci', 'Cedula de identidad', 'trim|required|numeric');
        $this->form_validation->set_rules('login', 'Nombre de Usuario', 'trim|required|alpha_numeric|callback__username_check');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|alpha_numeric|md5');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('alpha', 'El campo %s solo puede contener letras');
        $this->form_validation->set_message('alpha_numeric', 'El campo %s solo puede contener letras y números');
        $this->form_validation->set_message('_username_check', 'El campo %s ya Existe porfavor Elija otro');
        
        if ($this->form_validation->run() == FALSE) {
            $this->registrar();
        } else {
            $nombre         = $this->input->post('nombre');
            $apellido       = $this->input->post('apellido');
            $ci             = $this->input->post('ci');
            $tipoUsuario    = $this->input->post('tipoUsuario');
            $login          = $this->input->post('login');
            $password       = $this->input->post('password');;
            $insert = $this->Usuario_model->registrar_usuario($nombre, $apellido, $ci, $tipoUsuario, $login, $password);
            $this->mensaje($insert);
        }
    }
    
    function _username_check($value){
        return $this->Usuario_model->username_check2($value);
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