<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publicaciones extends CI_Controller {
	var $data = array();

    function __construct() {
        parent::__construct();	
        $this->load->model('publicaciones_model');
    }

	public function ver_publicaciones($pagina=null) {

		if(!isset($pagina)){
			$pagina=1;
		}

		$this->load->model('publicaciones_model');
		$datos['tipo_pagina'] = "listar_publicaciones";
		$datos['publicaciones']  = $this->publicaciones_model->obtener_publicaciones($pagina);
		$datos['cantidad']  = $this->publicaciones_model->obtener_cantidad_publicaciones();
		$datos['pagina']  = $pagina;

		$this->load->view('publicaciones_view', $datos);
	}

	public function ver_publicacion($id) {
		if(isset($id)){
			$this->load->model('publicaciones_model');
			$datos['tipo_pagina'] = "leer_publicacion";
			$datos['publicacion']  = $this->publicaciones_model->ver_publicacion($id);
		}
		$this->load->view('publicaciones_view', $datos);
	}

	public function crear_publicacion(){
		$data = $this->input->post();
		if($data){
			$datos["grabar"]=1;
			$this->load->model('publicaciones_model');
			$this->publicaciones_model->crear_publicacion($data);
		}
		$datos['tipo_pagina'] = "crear_publicacion";
		$this->load->view('publicaciones_view', $datos);
	}
	

}
