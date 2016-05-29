<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# digunakan untuk non admin

class Software extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_software','model');
		$this->load->helper('helper');
		$this->load->library('cart');
	}

	public function index()
	{
		$data['products'] = $this->model->get_all_products();
		$this->load->view('index', $data);
	}

	function detail($slug){
		$data['product']=$this->model->get_detail_product($slug);
		$this->load->view('detail',$data);
	}
	
	/*public function add_to_cart($product_id)
	{
		$product = $this->model->find($product_id);
		$data = array(
					   'id'      => $product->id,
					   'qty'     => 1,
					   'price'   => $product->price,
					   'name'    => $product->name
					);

		$this->cart->insert($data);
		redirect(base_url());
	}
	
	public function cart(){
		// displays what currently inside the cart
		//print_r($this->cart->contents());
		$this->load->view('show_cart');
	}
	
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}
	*/

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */