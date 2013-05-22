<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct() {
        parent::__construct(); 
        $this->load->model('Login_model');
        $this->load->model('Usuario_model');
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
        $this->form_validation->set_rules('username', 'Nombre de Usuario', 'required|trim|alpha|callback__username_check');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|alpha_numeric|callback__password_check');
        $this->form_validation->set_message('required', 'El %s es requerido');
        $this->form_validation->set_message('alpha', 'El %s solo permite Letras');
        $this->form_validation->set_message('alpha_numeric', 'El %s solo permite letras y números');
        $this->form_validation->set_message('_username_check', 'el %s no es correcto');
        $this->form_validation->set_message('_password_check', 'el %s no es correcto');
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
    
    function _username_check($value){
        return $this->Usuario_model->username_check($value);
    }
    
    function _password_check($value){
        return $this->Usuario_model->password_check($value);;
    }
    
}