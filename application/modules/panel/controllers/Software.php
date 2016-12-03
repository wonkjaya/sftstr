<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Software extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(['Software','admin']);
		$this->load->model('software_model','model');
		ts_is_login(true);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function index(){
		$this->dashboard();
	}

	function dashboard(){
		$data['data_content']='Dashboard';
		$data['data']=array(
			'produkTerbaru'=>$this->model->pilih_produk_terbaru(5), // limit 5,
			'userTerbaru'=>$this->model->pilih_user_terbaru(5), // limit 5
		);
		$data['aktif_menu']=1; //dashboard
		$this->load->view('Index',$data);
	}

	function products(){
		if(isset($_GET['update'])){
			$this->model->update_product();
		}elseif(isset($_GET['detail'])){
			$this->load->helper('form');
			$data['data_content']='Product_form';
			$data['data']=array(
				'products'=>$this->model->get_product(),
				'categories'=>$this->model->get_categories()
			);
		}elseif(isset($_GET['addnew'])){
			$this->model->save_new_product();
			$this->load->helper('form');
			$data['data_content']='Product_form';
			$data['data']=array(
				'categories'=>$this->model->get_categories()
			);
		}elseif(isset($_GET['trash'])){
			$this->model->trash_product($single=true);
		}elseif(isset($_GET['delete'])){
			$this->model->delete_product();
		}elseif(isset($_GET['activate'])){
			$this->model->activate_product();
		}else{
			$data['data_content']='Product_list';
			$data['data']=array(
				'products'=>$this->model->get_product_list(),
				'pagging'=>$this->set_pagging($this->model->get_total_products(),'product_list')
			);
			$data['cats']=$this->model->get_categories($is_user=false); // not filter by user
			$data['users']=$this->model->get_user(); // filter by user
			$this->load->helper('form');
		}
		$data['aktif_menu']=2; //products
		$this->load->view('Index',$data);
	}

	function users(){
		$this->model->save_user();
		if(isset($_GET['detail'])){
			if(isset($_GET['id'])) $this->session->set_flashdata('id_user',$_GET['id']);
			$this->load->helper('form');
			$data['data_content']='User_form';
			$data['data']=array(
				'user'=>$this->model->get_user(),
			);
		}elseif(isset($_GET['addnew'])){
			$this->load->helper('form');
			$data['data_content']='User_form';
			$data['data']=array(
				'title'=>'Add New',
			);
		}elseif(isset($_GET['trash'])){
			$this->model->trash_user();
		}elseif(isset($_GET['delete'])){
			$this->model->delete_user_permanent();
		}else{
			$this->load->helper('form');
			$data['data_content']='User_list';
			$data['data']=array(
				'users'=>$this->model->get_user_list(),
				'pagging'=>$this->set_pagging($this->model->get_total_users(),'users')
			);
		}
		$data['aktif_menu']=3; //users
		$this->load->view('Index',$data);
	}

	function invoice(){
		$data['data_content']='Invoice';
		$data['data']=array(
			
		);
		$data['aktif_menu']=4; //invoice
		$this->load->view('Index',$data);
	}

	function set_pagging($total=0,$base=''){
		$this->load->library('pagination');
		$config['base_url'] = site_url($base);
		$config['total_rows'] = $total;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$config['num_links'] = 5;
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a><b>';
		$config['cur_tag_close'] = '</b></a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}
	
}
