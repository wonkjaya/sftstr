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

	function getProductCount(){
		$data = $this->m->getProductCount(); /* return json data*/
		$this->printData($data);
	}

	function getAllProducts(){
		$data = $this->m->getAllProducts();
		$this->printData($data);
	}

	function getActiveProducts(){
		$data = $this->m->getActiveProducts();
		$this->printData($data);		
	}

	function getInActiveProducts(){
		$data = $this->m->getInActiveProducts();
		$this->printData($data);
	}

	function getCategories(){
		$data = $this->m->getCategories();
		$this->printData($data);
	}

}