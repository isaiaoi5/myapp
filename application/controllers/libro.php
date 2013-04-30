<?php
class Libro extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Libro_model');
        $this->load->model('Dewey_model');
        $this->load->model('Autor_model');
        $this->load->model('Editorial_model');
        $this->load->model('Ejemplar_model');
        $this->load->model('Prestar_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    function index(){        
        $data['contenido'] = 'libro/index';
        $data['title'] = 'Home Libro';
        $this->load->view('includes/template', $data);
    }
    
    function registrar(){        
        $data['contenido'] = 'libro/registrar';
        $data['title']          = 'Registrar Libro';
        $data['dptos']          = $this->Dewey_model->devolver_nivel1();        
        $data['prov_js']        = $this->Dewey_model->devolver_nivel2_js();
        $data['autores']        = $this->Autor_model->devolver_autor();
        $data['editoriales']    = $this->Editorial_model->devolver_editorial();
        $this->load->view('includes/template', $data);
    }
    
    function niv2(){
        $coddep = $this->input->get('idNivel1');
        $this->Dewey_model->devolver_nivel2($coddep);
        
    }
    
    function registrarLibro(){
        $this->form_validation->set_rules('libro', 'Titulo Libro', 'trim|required');
        $this->form_validation->set_rules('apel', 'Apellido del Libro', 'trim|required|strtoupper|min_length[3]|max_length[5]');
        $this->form_validation->set_rules('descripcion', 'Descripción del Libro', 'trim|required');
        $this->form_validation->set_rules('cant', 'Numero Dewey', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('min_length', 'El campo %s Tiene que tener por lo menos %d Caracteres');
        
        if ($this->form_validation->run() == FALSE) {
            $this->registrar();
        } else {
            $libro          = $this->input->post('libro');
            $apel           = $this->input->post('apel');
            $cant           = $this->input->post('cant');
            $precio         = $this->input->post('precio');
            $estado         = $this->input->post('estado');
            $autor          = $this->input->post('autor');
            $editorial      = $this->input->post('editorial');            
            $descripcion    = $this->input->post('descripcion');  
            $area           = $this->input->post('area');
            $insert = $this->Libro_model->insertar_libro($libro, $apel, $cant, $autor, $editorial, $area, $descripcion);  
            $id_libro = $this->db->insert_id();
            for($i=1; $i<=$cant; $i++){
                $this->Ejemplar_model->insertar($precio, $estado, $id_libro);
            }
            
            $this->mensaje($insert);
        }
    }
    
    function mostrar($offset=''){
        $limit = 8;
        $total = $this->Libro_model->contarLibros();
        $resultado = $this->Libro_model->libros($limit, $offset);
        foreach ($resultado as $valor) {
            $valor->Autor_id        = $this->Autor_model->devolver_un_autor($valor->Autor_id);
            $valor->Editorial_id    = $this->Editorial_model->devolver_una_editorial($valor->Editorial_id);
            $valor->contador        = $this->Ejemplar_model->cantidad($valor->idLibro);
            $valor->prestados1      = $this->Prestar_model->cantidad_prestados($valor->idLibro);
            $valor->solicitado      = $this->Prestar_model->cantidad_solicitados($valor->idLibro);
            $ides                   = $this->Ejemplar_model->ejemplaresA($valor->idLibro);            
            $valor->precio          = $this->Ejemplar_model->precio($ides);
        }
        $data['libros'] = $resultado;
        
        $this->load->library('pagination');
        $config['base_url']     = base_url().'libro/mostrar/';
        $config['total_rows']   = $total;
        $config['per_page']     = $limit;
        $config['uri_segment']  = '3';
        $this->pagination->initialize($config);
        $i = 0 + $offset;
        
        $data['num']        = $i;
        $data['enlaces']    = $this->pagination->create_links();
        $data['contenido']  = 'libro/mostrar';
        $data['title']      = 'Registrar Libro';
        $this->load->view('includes/template', $data);
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