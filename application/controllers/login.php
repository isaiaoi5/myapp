<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct() {
        parent::__construct(); 
        $this->load->model('Login_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    function index(){
        $this->load->view('login/index');
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
    
    function verificar_login() {
        $this->form_validation->set_rules('username', 'No se permiten numeros', 'required|trim|alpha');
        $this->form_validation->set_rules('password', 'No se permiten caracteres especiales', 'required|trim|alpha_numeric');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $login      = $this->Login_model->verificar_login($username, $password);
            if ($login) {
                $data = array(
                    'is_logged_in'      => TRUE,
                    'nombre_usuario'    => $login[0]->nombre,
                    'nombre'            => $login[0]->nombre,
                    'id'                => $login[0]->idUsuario,
                    'tipoUsuario'       => $login[0]->tipoUsuario,
                );
                $this->session->set_userdata($data);
                redirect('principal');
            } else {
                $this->index();
            }
        }
    }
}