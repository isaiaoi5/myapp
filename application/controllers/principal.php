<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Principal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->_is_logged_in();
    }

    function index() {
        $data['contenido'] = 'principal/index';
        $data['title'] = 'Biblioteca UPDS';
        $this->load->view('includes/template', $data);
    }

    function _is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        $id_usuario = $this->session->userdata('id');
        if ($is_logged_in != TRUE or $id_usuario == '') {
            redirect('usuario/login');
        }
    }

}
