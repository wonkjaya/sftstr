<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->helper('admin');
		ts_is_login(true); // check if login
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_login2');
		} else {
			$this->load->model('model_users');
			$valid_user = $this->model_users->check_credential();
			
			if($valid_user == FALSE)
			{
				$this->session->set_flashdata('error','Wrong Username / Password!');
				redirect('login');
			} else {
				// if the username and password is a match
				$this->session->set_userdata('username', $valid_user->user_email);
				$this->session->set_userdata('level', $valid_user->user_level);
				
				switch($valid_user->user_level){
					case '00' : //admin
								redirect('panel/software'); 
								break;
					case '10' : //users
								redirect('panel/software');
								break;
					default: break; 
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	function test(){
		$this->load->view('side');
	}
}