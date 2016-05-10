<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Madministrator extends CI_Model {

	public function check_credential()
	{
		$email = set_value('email');
		$password = set_value('password');
		
		$hasil = $this->db->where('user_email', $email)
						  ->where('user_pass', md5($password))
						  ->limit(1)
						  ->get('users');
		
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

	function get_product_list(){
		$page=($this->uri->segment(2) > 0)?$this->uri->segment(2):0;
		$this->db->limit(20,$page);
		$this->db->select(['ID','id_user','kode_produk','nama_produk','harga_jual']);
		$q=$this->db->get('data_produk');
		if($q->num_rows() > 0)return $q->result();
	}

	function get_product(){

		if(isset($_GET['id'])){
			$this->db->where('ID',$_GET['id']);
		}
	}

	function get_categories(){
		$this->db->select(array('ID','name'));
		$q=$this->db->get('kategori_produk');
		if($q->num_rows() > 0){
			return $q->result();
		}
	}

	function get_total_products(){
		$this->db->select(['count(ID) as count']);
		$count=$this->db->count_all('data_produk');
		return $count;
	}

	function get_user_list(){
		$page=($this->uri->segment(2) > 0)?$this->uri->segment(2):0;
		$this->db->limit(20,$page);
		if(isset($_GET['aktif'])){
			$this->db->where('u.user_status','1'); // active
		}else{
			$this->db->where('u.user_status','0'); // nonaktif
		}
		$this->db->where('user_email <>',ts_get_username());
		$this->db->select(['u.ID','u.user_level','user_email','nama_lengkap','user_registered_date','nomor_telp']);
		$this->db->join('user_detail ud','ud.id_user=u.ID','left');
		$q=$this->db->get('users u');
		if($q->num_rows() > 0)return $q->result();
	}

	function get_total_users(){
		$this->db->select(['count(ID) as count']);
		$count=$this->db->count_all('users');
		return $count;
	}

	function get_user(){
		$id=0;
		if($_GET['id'])$id=$_GET['id'];
		$this->db->where('u.ID',$id);
		$this->db->limit(1);
		$this->db->select(['u.ID','u.user_email as email','u.user_registered_date as dibuat','u.user_level as level','u.user_status','ud.id_ktp','ud.nama_lengkap','ud.alamat','ud.jenis_kelamin','ud.nomor_telp']);
		$this->db->join('user_detail ud','ud.id_user=u.ID','left');
		$q=$this->db->get('users u');
		if($q->num_rows() > 0){
			return $q->result();
		}
		return false;
	}

	function restore($id_user=''){
		if($id_user !== ''){
			$this->db->update('users',['user_status'=>1],['ID'=>$id_user]);
			redirect('users?nonaktif');
		}
	}

	function delete_user_permanent($id_user=''){
		$id_user=$_GET['id'];
		if($id_user !== ''){
			$this->db->delete('users',['ID'=>$id_user]);
			redirect('users?nonaktif');
		}
	}

	function save_user(){
		$id_user=(isset($_GET['id']))?$this->input->get('id'):'';
		if(isset($_GET['restore']))$this->restore($id_user); // hanya jika restore
		if($_POST){
			$noktp=$this->input->post('noktp');
			$email=$this->input->post('email');
			$nama=$this->input->post('nama');
			$notelp=$this->input->post('notelp');
			$alamat=$this->input->post('alamat');
			$jenis_kelamin=$this->input->post('jenis_kelamin');
			$level=$this->input->post('level');
			$password=$this->input->post('password');
			$data_detail=[
				'id_ktp'=>$noktp,
				'nama_lengkap'=>$nama,
				'nomor_telp'=>$notelp,
				'alamat'=>$alamat,
				'jenis_kelamin'=>$jenis_kelamin,
			];
			$data_user=['user_email'=>$email,'user_level'=>$level];
			if($password !== ''){
				$data_user['user_pass']=md5($password);
			}
			if(isset($_GET['update'])){
				$this->db->where('ID',$id_user);
				$update_1=$this->db->update('users',$data_user);
				if($update_1){
					$this->db->where('id_user',$id_user);
					$this->db->update('user_detail',$data_detail);
				}
			}elseif(isset($_GET['addnew'])){
				// insert into users
				$this->db->insert('users',$data_user);
				$id_user=$this->db->insert_id();

				$data_detail['id_user']=$id_user;
				$this->db->insert('user_detail',$data_detail);
			}
			if($id_user == ''){
				$url=$this->uri->uri_string().'?aktif';
			}else{
				$url=$this->uri->uri_string().'?detail&id='.$id_user;
			}
			redirect($url);
		}
	}

	function trash_user(){
		$this->db->where('ID',$_GET['id']);
		$this->db->update('users',['user_status'=>'0']);
		redirect($this->uri->uri_string());
	}

	function save_new_product(){
		if($_POST){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('kodePrd', 'Kode Produk', 'required');
			$this->form_validation->set_rules('namaPrd', 'Nama Produk', 'required');
			$this->form_validation->set_rules('deskripsi_prd', 'Deskripsi Produk', 'required');
			$this->form_validation->set_rules('deskripsi_dev', 'Deskripsi Developer', 'required');//kodePrd|namaPrd|deskripsi_prd|deskripsi_dev
			$this->form_validation->set_message('required','<span style="color:red">{field} Tidak Boleh Kosong!</span>');
			if($this->form_validation->run() == FALSE){
				return FALSE;
			}
			$kode_produk=$this->input->post('kodePrd');
			$nama_produk=$this->input->post('namaPrd');
			$kategori_produk=$this->input->post('kategori');
			$harga_beli_produk=$this->input->post('hargaBeli');
			$harga_jual_produk=$this->input->post('hargaJual');
			$diskon_produk=$this->input->post('diskon');
			$deskripsi_produk=$this->input->post('deskripsi_prd');
			$deskripsi_dev=$this->input->post('deskripsi_dev');
			
			// insert new deskripsi

		}
	}

}