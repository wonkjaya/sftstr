<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_products extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function getQuery(){
		if($_GET){
			if($_GET['limit']){
				$this->db->limit(abs($_GET['limit']));
			}
			if(isset($where)){
				$where = (object) json_decode(urldecode($_GET['where']));
				foreach($where as $key=>$val){
					if($key == 'id') $key = "ID";
					$this->db->where($key,$val);
				}
			}
		}
	}

	function getAllProducts(){
		$this->getQuery();
		$this->db->join('produk_gambar','produk_gambar.id_produk = produk_data.ID','right');
		$query = $this->db->get('produk_data');
		return ($query->num_rows() > 0) ? json_encode(array("data"=>$query->result())) : json_encode(["data"=>null]);
	}

	function getLatestProducts(){
		$this->getQuery();
		$this->db->order_by("p.ID", "DESC");
		$this->db->select(['p.*','pg.image1','pg.image2','pg.image3','pg.image4','pg.image5']);
		$this->db->join('produk_gambar pg','pg.id_produk = p.ID','right');
		$query = $this->db->get('produk_data p');
		return ($query->num_rows() > 0) ? json_encode(array("data"=>$query->result())) : json_encode(["data"=>null]);
	}

	/*function getCountProducts(){
		$this->db->select('count("ID") as total');
		if($where){
			if(is_array($where)){
				$this->db->where($where);
			}
		}
		$total = $this->db->get('produk_data')->row()->total;
		return json_encode(['total'=>$total]);
	}

	function getActiveProducts(){
		$this->db->where(['produk_data.status'=>1]);
		$query = $this->getAllProducts(abs($limit), abs($start));
		return $query;
	}

	function getInActiveProducts(){
		$this->db->where(['produk_data.status'=>0]);
		$query = $this->getAllProducts(abs($limit), abs($start));
		return $query;
	}

	function getCategories(){
		if($limit & $start){
			$this->db->limit(abs($limit), abs($start));
		}elseif($limit){
			$this->db->limit(abs($limit));
		}
		$query = $this->db->get('produk_kategori');
		return ($query->num_rows() > 0) ? json_encode(array("data"=>$query->result())) : json_encode(["data"=>null]);
	}*/
}