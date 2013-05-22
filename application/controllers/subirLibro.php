<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SubirLibro extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Digital_model');
        $this->load->model('Dewey_model');
        $this->load->model('Autor_model');
        $this->load->model('Editorial_model');
        $this->load->helper('form');
        $this->load->helper('download');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }
    
    function digital(){
        $data['contenido'] = 'digital/digital';
        $data['title']          = 'Subir Libro';
        $data['dptos']          = $this->Dewey_model->devolver_nivel1();        
        $data['prov_js']        = $this->Dewey_model->devolver_nivel2_js();
        $data['autores']        = $this->Autor_model->devolver_autor();
        $data['editoriales']    = $this->Editorial_model->devolver_editorial();
        $this->load->view('includes/template', $data);
    }
    
    function registrarLibroDigital(){
        $this->form_validation->set_rules('area', 'Titulo Libro', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('descripcion', 'Descripción del Libro', 'trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        $this->form_validation->set_message('min_length', 'El campo %s Tiene que tener por lo menos %d Caracteres');
        if ($this->form_validation->run() == FALSE) {
            $this->digital();
        } else {
            if ($this->nombre_check1($_FILES['file']['name']) == FALSE) {
                $this->digital();
            }else{
                $config_file = array(
                        'upload_path'   => './files/',
                        'allowed_types' => 'jpg|txt|doc|docx|xls|xlsx|pdf',
                        //'file_name'     => $this->input->post('titulo'),
                        'overwrite'     => false,
                        'max_size'      => 0,
                        'max_width'     => 0,
                        'max_height'    => 0,
                        'max_filename'  => 0,
                        'encrypt_name'  => true,
                        'remove_spaces' => true,
                );
                $this->upload->initialize($config_file);
                if(!$this->upload->do_upload('file')){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message_upload', $error.'file: '.$_FILES['file']['name']);
                    $this->session->set_flashdata('message_type', 'alert-error');
                }else{
                    $data_info = $this->upload->data();
                    $nombre_libro = $data_info['orig_name'];
                    $direccion = base_url().'files/'.$data_info['file_name'];
                    $tipo_archivo = $data_info['file_ext'];
                    $autor          = $this->input->post('autor');
                    $nombre         = $data_info['raw_name'];
                    $editorial      = $this->input->post('editorial');            
                    $descripcion    = $this->input->post('descripcion');
                    $area           = $this->input->post('area');
                    $insert = $this->Digital_model->insertar_libro_digital($nombre_libro, $nombre, $area, $descripcion, $direccion, $tipo_archivo, $autor, $editorial);
                    $this->session->set_flashdata('message_upload','el archivo se subio correctamente'.$data_info['file_path']);                
                    $this->session->set_flashdata('message_type', 'alert-success');
                    $data_info = $this->upload->data();
                    $this->session->set_flashdata('file_data', $data_info);
                    if($data_info['is_image'] == 1){
                        $this->create_thumb($data_info);
                    }
                }
                redirect('subirLibro/digital');
            }
        }
    }
    
    private function nombre_check1($value){
        return $this->Digital_model->nombre_check($value);
    }

    private function create_thumb($file){
        $config_image = array(
            'source_image'      => $file['full_path'],
            'create_thumb'      => true,
            'thumb_marker'      => '_ciThumb',
            'maintain_ratio'    => true,
            'width'             => 150,
            'height'            => 150,
            'master_dim'        => auto,
            'new_image'         => $file['file_path'].'miniaturas/'
        );
        $this->load->library('image_lib', $config_image);
        $this->image_lib->resize();
    }
    

    function mostrarDigital($offset=''){
        $limit = 8;
        $total = $this->Digital_model->contarLibrosDigitales();
        $resultado = $this->Digital_model->librosDigitales($limit, $offset);
        foreach ($resultado as $valor) {
            $valor->Autor_id        = $this->Autor_model->devolver_un_autor($valor->Autor_id);
            $valor->Editorial_id    = $this->Editorial_model->devolver_una_editorial($valor->Editorial_id);
        }
        $data['libros'] = $resultado;

        $this->load->library('pagination');
        $config['base_url']     = base_url().'subirLibro/mostrarDigital/';
        $config['total_rows']   = $total;
        $config['per_page']     = $limit;
        $config['uri_segment']  = '3';
        $this->pagination->initialize($config);
        $i = 0 + $offset;
        
        $data['num']        = $i;
        $data['enlaces']    = $this->pagination->create_links();
        $data['contenido']  = 'digital/mostrarDigital';
        $data['title']      = 'Registrar Libro';
        $this->load->view('includes/template', $data);
    }

    function descargar($data1, $name1){
        $data = file_get_contents(base_url().'files/'.$data1); 
        $name = $name1;
        force_download($name, $data);
        $this->mostrarDigital();
    }

}
