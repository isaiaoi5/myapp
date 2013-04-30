<?php
class Prestar extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Libro_model');
        $this->load->model('Autor_model');
        $this->load->model('Editorial_model');
        $this->load->model('Ejemplar_model');
        $this->load->model('Usuario_model');
        $this->load->model('Prestar_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    function solicitar(){
        $data['contenido']  = 'prestar/buscar_libro';
        $data['title']      = 'Solicitar Libro';
        $data['autores']    = $this->Autor_model->devolver_autor();
        $this->load->view('includes/template', $data);
    }
    
    function prestarOk($idPrestar, $idUsuario){
        $resul = $this->Prestar_model->prestarOk($idPrestar);
        if ($resul == 1) {
            $this->mostrarSolicitudUsuario($idUsuario);
        }
        else{
            $this->mensaje(2);
        }
    }
    
    function solicitarUna($libro, $usuario){
        $data['contenido']  = 'prestar/solicitar';
        $data['title']      = 'Solicitar Libro';
        $data['libro']      = $libro;
        $data['usuario']    = $usuario;
        $this->load->view('includes/template', $data);
    }
    
    function buscarLibro($tipo){
        switch ($tipo) {
            case 1:
                $this->form_validation->set_rules('buscar', 'Titulo Libro', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->solicitar();
                } else {
                    $libro          = $this->input->post('buscar');
                    $this->mostrarResultado($libro, 1);
                }
                break;
            case 2:
                $this->form_validation->set_rules('autor', 'Autor Libro', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $this->solicitar();
                } else {
                    $libro          = $this->input->post('autor');
                    $this->mostrarResultado($libro, 2);
                }
                break;
            default:
                echo 1;
                break;
        }  
    }
    
    function mostrarResultado($libro, $tipo, $offset=''){
        
            $limit = 5;
            $total = $this->Libro_model->contarLibrosTitulo2($libro, $tipo); 
            switch ($tipo) {
                case 1:               
                    $resultado = $this->Libro_model->librosTitulo($limit, $offset, $libro);
                    break;
                case 2:
                    $resultado = $this->Libro_model->librosAutor($limit, $offset, $libro);
                    break;
            }            
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
                $config['base_url']     = base_url().'prestar/mostrarResultado/'.$libro.'/'.$tipo.'/';
                $config['total_rows']   = $total;
                $config['per_page']     = $limit;
                $config['uri_segment']  = '5';
                $this->pagination->initialize($config);
                $i = 0 + $offset;

                $data['num']        = $i;
                $data['enlaces']    = $this->pagination->create_links();
                $data['contenido']  = 'prestar/mostrar';
                $data['title']      = 'Busqueda de Libro';
                $this->load->view('includes/template', $data);
    }
    
    function solicitarPrestamo($libro, $usuario){
        $this->form_validation->set_rules('tipo', 'Titulo Libro', 'trim|required');
         if ($this->form_validation->run() == FALSE) {
            $this->buscarLibro();
        } else {
            $tipo          = $this->input->post('tipo');
            $insert = $this->Prestar_model->insertar($libro, $usuario, $tipo);
            $this->mensaje($insert);
        }            
    }
    
    function mostrarSolicitud($offset=''){
        //$offset=''
        $limit      = 10;
        $total      = $this->Prestar_model->cantidad_solicitados_todos();
        $resultado  = $this->Prestar_model->todos_solicitados($limit, $offset);
        foreach ($resultado as $value) {
            $value->usuario = $this->Usuario_model->devolverUsuario($value->Usuario_id);
            $value->libro   = $this->Libro_model->devolverLibros($value->Libro_id);
        }
        
        $data['libros'] = $resultado;
        $this->load->library('pagination');
        $config['base_url']     = base_url().'prestar/mostrarSolicitud/';
        $config['total_rows']   = $total;
        $config['per_page']     = $limit;
        $config['uri_segment']  = '3';
        $this->pagination->initialize($config);
        $i = 0 + $offset;
        
        $data['num']        = $i;
        $data['enlaces']    = $this->pagination->create_links();
        $data['contenido']  = 'prestar/mostrarSolicitados';
        $data['title']      = 'Registrar Libro';
        $this->load->view('includes/template', $data);
    }
    
    function mostrarPrestarUsuario($idUsuario){
        $libros = $this->Prestar_model->prestadoUsuarios($idUsuario);
        foreach ($libros as $var) {
            //echo $var->FechaSolicitud.'-';
            $aux = $this->Libro_model->devolverLibros($var->Libro_id);
            foreach ($aux as $val) {
                //echo $val->titulo.' '.$val->apellido.' '.$val->descripcion;
                $var->titulo        = $val->titulo;
                $var->apellido      = $val->apellido;
                $var->descripcion   = $val->descripcion;
            }
        }
        $data['libros']     = $libros;
        $data['contenido']  = 'prestar/mostrarLibrosUsuario';
        $data['title']      = 'Libros prestados';
        $this->load->view('includes/template', $data);
    }
    
    function mostrarSolicitudUsuario($idUsuario){
        $libros = $this->Prestar_model->solicitudUsuarios($idUsuario);
        foreach ($libros as $var) {
            //echo $var->FechaSolicitud.'-';
            $aux = $this->Libro_model->devolverLibros($var->Libro_id);
            $var->contador          = $this->Ejemplar_model->cantidad($var->Libro_id);
            $var->prestados1        = $this->Prestar_model->cantidad_prestados($var->Libro_id);
            $var->solicitado        = $this->Prestar_model->cantidad_solicitados($var->Libro_id);
            foreach ($aux as $val) {
                //echo $val->titulo.' '.$val->apellido.' '.$val->descripcion;
                $var->titulo        = $val->titulo;
                $var->apellido      = $val->apellido;
                $var->descripcion   = $val->descripcion;
            }
        }
        $data['libros']     = $libros;
        $data['contenido']  = 'prestar/mostrarLibrosSolicitadosUsuario';
        $data['usuario']    = $this->Usuario_model->devolverUsuario($idUsuario);
        $data['idUsuario']  = $idUsuario;
        $data['title']      = 'Libros prestados';
        $this->load->view('includes/template', $data);
    }
    
    function buscarSolicitud(){        
        $data['contenido']  = 'prestar/buscar_solicitud';
        $data['title']      = 'Libros Solicitados';
        $this->load->view('includes/template', $data);
    }
    
    function buscarSolicitudUsuario() {
        $this->form_validation->set_rules('buscar', 'C.I. Estudiante', 'trim|required|numeric|max_length[8]|min_length[7]');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('numeric', 'El campo %s debe contener solo numeros.');
        $this->form_validation->set_message('max_length', 'El campo %s no puede superar los %d caracteres de longitud.');
        $this->form_validation->set_message('min_length', 'El campo %s debe ser de almenos %d caracteres.');
        if ($this->form_validation->run() == FALSE) {
            $this->buscarSolicitud();
        } else {
            $ciUsuario = $this->input->post('buscar');
            $idUsuario = $this->Prestar_model->usuarioSolicitud($ciUsuario);
            foreach ($idUsuario as $value) {
                $this->mostrarSolicitudUsuario($value->idUsuario); 
            }
            //$this->mostrarSolicitudUsuario(1);            
        }
    }



    function mensaje($aux){
        $data['contenido'] = 'mensaje/mensaje';
        $data['title'] = 'Mensaje Libro';        
        if( $aux == 3 ){
            $data['mensaje'] = 'No se Encontraron Resultados';
        }
        if( $aux == 1 ){
            $data['mensaje'] = 'Libro Solicitado Exisotasamente';
        }
        if( $aux == 2 ){
            $data['mensaje'] = 'No se pudo realizar el prestamo intentelo mas tarde';
        }
        $this->load->view('includes/template', $data);
    }
    
}
