<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# untuk non admin

class Model_software extends CI_Model {

	public function get_all_products($page=1){
		//query semua record di table products
		$this->db->limit(10);
		$this->db->select(['dp.ID','dp.kode_produk','dp.nama_produk','dp.harga_jual','gp.image1','dp.slug as nama_slug']);
		$this->db->join('produk_gambar gp','gp.ID=dp.id_kode_gambar');
		$hasil = $this->db->get('produk_data dp');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}

	function get_detail_product($slug){
		$this->db->limit(1);
		$this->db->select(['dp.*','gp.image1','gp.image2','gp.image3','gp.image4','dp.slug as nama_slug','dsp.deskripsi_produk as deskripsi']);
		$this->db->join('produk_gambar gp','gp.ID=dp.id_kode_gambar');
		$this->db->join('produk_deskripsi dsp','dsp.ID=dp.id_deskripsi');
		$this->db->where('dp.slug',$slug);
		$q=$this->db->get('produk_data dp');
		if(isset($q->row()->ID))return $q->row();
	}
	
	public function find($id){
		//Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('produk_data');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
}