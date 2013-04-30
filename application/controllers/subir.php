<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Subir extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        //ruta absoluta para subir las imágenes
        $data['rutaAbsolutaSubir'] = base_url().'/subir/index/upload';

        //cargar la vista
        $data['contenido']  = 'subir/subir';
        $data['title']      = 'Solicitar Libro';
        $this->load->view('includes/template', $data);
    }

    public function upload() {
        //crear la ruta absoluta
        $targetPath = base_url().'uploads';

        if (!empty($_FILES)) {
            $nombreArchivo = $_FILES['Filedata']['name'];
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetFile = $targetPath . $nombreArchivo;
            if (move_uploaded_file($tempFile, $targetFile)) {
                
            }
        }
        echo 1;
    }

}
