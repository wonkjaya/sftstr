<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_products extends CI_Model {

	public function get_all_products($page=1){
		//query semua record di table products
		$this->db->limit(10);
		$this->db->select(['dp.ID','dp.kode_produk','dp.nama_produk','dp.harga_jual','gp.image1','dp.slug as nama_slug']);
		$this->db->join('gambar_produk gp','gp.ID=dp.id_kode_gambar');
		$hasil = $this->db->get('data_produk dp');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}

	function get_detail_product($slug){
		$this->db->limit(1);
		$this->db->select(['dp.*','gp.image1','gp.image2','gp.image3','gp.image4','dp.slug as nama_slug','dsp.deskripsi_produk as deskripsi']);
		$this->db->join('gambar_produk gp','gp.ID=dp.id_kode_gambar');
		$this->db->join('deskripsi_produk dsp','dsp.ID=dp.id_deskripsi');
		$this->db->where('dp.slug',$slug);
		$q=$this->db->get('data_produk dp');
		if(isset($q->row()->ID))return $q->row();
	}
	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('data_produk');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function create($data_products){
		//Query INSERT INTO
		$this->db->insert('data_produk', $data_products);
	}

	public function update($id, $data_products){
		//Query UPDATE FROM ... WHERE id=...
		$this->db->where('id', $id)
				 ->update('data_produk', $data_products);
	}
	
	public function delete($id){
		//Query DELETE ... WHERE id=...
		$this->db->where('id', $id)
				 ->delete('data_produk');
	}
	
}