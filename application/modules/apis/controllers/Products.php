<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_products','m');
	}

	function index(){
		$data = json_encode(['status'=>'running','version'=>'1.1']);
		$this->printData($data);
	}

	function printData($data, $type='application/json'){
		$this->output
			 ->set_content_type($type)
			 ->set_output($data);
	}
/*
	products API
	method : GET
*/
	function getCountProducts($where=null){
		$data = $this->m->getCountProducts($where); /* return json data*/
		$this->printData($data);
	}

	function getAllProducts($limit=null, $start=null){
		$data = $this->m->getAllProducts($limit, $start);
		$this->printData($data);
	}

	function getActiveProducts($limit=null, $start=null){
		$data = $this->m->getActiveProducts($limit, $start);
		$this->printData($data);		
	}

	function getInActiveProducts($limit=null, $start=null){
		$data = $this->m->getInActiveProducts($limit, $start);
		$this->printData($data);
	}

	function getCategories($limit=null, $start=null){
		$data = $this->m->getCategories($limit, $start);
		$this->printData($data);
	}

}