<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainPage extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model','model');
	}

	public function index()
	{
		$data['title']="Malang Software Center";
		$this->load->view('index', $data);
	}

	function get_domain_available(){
		$data=$this->model->get_domain_available();
		print_r($data->DomainInfo->domainAvailability);
	}

	function kirim_pengajuan(){
		$this->model->kirim_pengajuan();
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
