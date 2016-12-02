<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paket_software extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model','model');
	}

	public function index()
	{
		$data['title']="Malang Software Center";
		//$this->load->view('index', $data);
	}

	


}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
