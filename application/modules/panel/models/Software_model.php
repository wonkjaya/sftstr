<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Software_model extends CI_Model {

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
		if(isset($_GET['cat'])){
			if($_GET['cat'] != '')$this->db->where('produk_kategori.name',str_replace('-',' ',$_GET['cat']));
		}
		if(isset($_GET['user'])){
			if($_GET['user'] != '')$this->db->where('users.ID',$_GET['user']);
		}
		if(isset($_GET['type'])){
			$status=($_GET['type']==0?0:1);
		}else{
			$status=1;
		}
		$this->db->where('produk_data.status',$status);
		$this->db->select(['produk_data.ID','id_user','user_email','kode_produk','nama_produk','harga_jual','diskon','produk_kategori.name as kategori','produk_data.status']);
		$this->db->join('users','users.ID=produk_data.id_user','left');
		$this->db->join('produk_kategori','produk_kategori.ID=produk_data.id_kategori','left');
		$q=$this->db->get('produk_data');
		if($q->num_rows() > 0)return $q->result();
	}

	function get_product(){
		if(isset($_GET['id'])){
			$this->db->limit(10); // jika dilimit 1 maka hasilnya kurang lengkap
			$this->db->where('pd.ID',$_GET['id']);
			$this->db->select(['pd.*','mt.key_meta','mt.value','dsc.deskripsi_produk','dsc.manual_book','pg.image1','pg.image2','pg.image3','pg.image4','pg.image5']);
			$this->db->join('produk_meta mt','mt.id_produk=pd.ID');
			$this->db->join('produk_deskripsi dsc','dsc.id_produk=pd.ID');
			$this->db->join('produk_gambar pg','pg.id_produk=pd.ID');
			$q=$this->db->get('produk_data pd');
			if($q->num_rows()>0){
				return $q->result();
			}
		}
	}

	function get_categories($is_user=false){ // jika true maka mencari kategori yang hanya dipakai oleh user post
		if($is_user==true){
			$this->db->select(['cat.ID','cat.name']);
			$this->db->join('produk_data dp','dp.id_kategori=cat.ID','right');
			$this->db->group_by('cat.ID');
			$cat=$this->db->get('produk_kategori cat');
			if($cat->num_rows() > 0){
				return $cat->result();
			}
		}else{
			$this->db->select(array('ID','name'));
			$q=$this->db->get('produk_kategori');
			if($q->num_rows() > 0){
				return $q->result();
			}
		}
	}

	function get_total_products(){
		$this->db->select(['count(ID) as count']);
		$count=$this->db->count_all('produk_data');
		return $count;
	}

	function get_user_list(){
		$page=($this->uri->segment(2) > 0)?$this->uri->segment(2):0;
		$this->db->limit(20,$page);
		$type=isset($_GET['type'])?$_GET['type']:0;
		if(isset($_GET['aktif']) OR $type==1){
			$this->db->where('u.user_status','1'); // active
		}else{
			$this->db->where('u.user_status','0'); // nonaktif
		}
		$this->db->where('user_email <>',ts_get_username());
		$this->db->where('user_status <>','00');
		$this->db->select(['u.ID','u.user_status','user_email','nama_lengkap','user_registered_date','nomor_telp']);
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
		if(isset($_GET['id']))$id=$_GET['id'];
		if($id > 0){
			$this->db->where('u.ID',$id);
			$this->db->limit(1);
			$this->db->select(['u.ID','u.user_email as email','u.user_registered_date as dibuat','u.user_level as level','u.user_status','ud.id_ktp','ud.nama_lengkap','ud.alamat','ud.jenis_kelamin','ud.nomor_telp','u.user_registered_date']);
			$this->db->join('user_detail ud','ud.id_user=u.ID','left');
		}else{
			$this->db->select(['ID','user_email']);
			$this->db->where('user_status',1);
		}
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
		if($_POST){// print_r($_POST);exit;
			$noktp=$this->input->post('ktp');
			$email=$this->input->post('email');
			$nama=$this->input->post('nama_lengkap');
			$notelp=$this->input->post('no_telp');
			$alamat=$this->input->post('alamat');
			$jenis_kelamin=$this->input->post('jenis_kelamin');
			$level=$this->input->post('level');
			$password=$this->input->post('password');
			$file_gambar=$this->upload_profile_picture();
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
			}elseif(isset($_GET['add_new'])){
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
			//redirect($url);
		}
	}

	function trash_user(){
		$this->db->where('ID',$_GET['id']);
		$this->db->update('users',['user_status'=>'0']);
		redirect($this->uri->uri_string());
	}

	function get_id_user($username=''){
		$username=!empty($username)?$usename:$this->session->userdata('username');
		$this->db->limit(1);
		$this->db->select('ID');
		$this->db->where('user_email',$username);
		$q=$this->db->get('users');
		return ($q->num_rows() > 0)?$q->row()->ID:'';
	}

	function save_new_product(){
		if($_POST){//return;
			$this->load->library('form_validation');
			$this->form_validation->set_rules('kodePrd', 'Kode Produk', 'required');
			$this->form_validation->set_rules('namaPrd', 'Nama Produk', 'required');
			$this->form_validation->set_rules('deskripsi_prd', 'Deskripsi Produk', 'required');
			//$this->form_validation->set_rules('deskripsi_dev', 'Deskripsi Developer', 'required');//kodePrd|namaPrd|deskripsi_prd|deskripsi_dev
			$this->form_validation->set_message('required','<span style="color:red">{field} Tidak Boleh Kosong!</span>');
			if($this->form_validation->run() == FALSE){
				return FALSE;
			}
			//print_r($_FILES);
			$produk['id_user']=$this->get_id_user();
			$produk['kode_produk']=$this->input->post('kodePrd');
			$produk['nama_produk']=$this->input->post('namaPrd');
			$produk['slug']=str_replace(' ', '-', $produk['nama_produk'].'-'.$produk['kode_produk']);
			$produk['id_kategori']=$this->input->post('kategori');
			//$harga_beli_produk=$this->input->post('hargaBeli');
			$produk['harga_jual']=$this->input->post('hargaJual');
			$produk['diskon']=$this->input->post('diskon');
			$data['deskripsi_produk']=$this->input->post('deskripsi_prd');
			//$deskripsi_dev=$this->input->post('deskripsi_dev');
			// upload files
			$produk['url_demo']=$this->upload_file_software();
			// insert produk
			$id_produk=$this->insert_produk($produk);
			// insert new deskripsi
			$data['manual_book']=$this->upload_manual_book();
			$this->insert_description($id_produk,$data);
			// meta
			$this->insert_meta($id_produk);
			// update produk
			//$this->update_produk($id_produk,$data);
			// insert images
			$images=$this->upload_gambar(); 
			$this->insert_images($id_produk,$images);
		redirect('panel/software/products?addnew') ;
		}
	}

# TRANSACTIONS
	function insert_meta($id_produk){
		if(isset($_POST['meta'])){
			$metas=['keywords','description'];
			foreach ($metas as $meta) {
				if($_POST['meta'][$meta]){
					$mt['id_produk']=$id_produk;
					$mt['key_meta']=$meta;
					$mt['value']=$this->input->post('meta')[$meta];
					$this->db->insert('produk_meta',$mt);
				}
			}
		}
	}

	function insert_produk($produk){
		$this->db->insert('produk_data',$produk);
		return $this->db->insert_id();
	}

	function insert_description($id_produk,$data){ // data = array('id_produk','deskipsi_produk','manual_book')
		$data['id_produk']=$id_produk;
		$this->db->insert('produk_deskripsi',$data);
		return true;
	}

	function insert_images($id_produk,$images){
		$data['id_produk']=$id_produk;
		for($i=0;$i<=count($images)-1;$i++){
			$n=$i+1;
			//echo '$data[image'. $n .']=$images['.$i.']'.br();
			$data["image$n"]=$images[$i];
		}
		//print_r($data);
		$this->db->insert('produk_gambar',$data);
		$this->session->set_flashdata('insert_success','true');
	}
# END TRANSACTIONS

# UPLOAD ZONE

	function upload_profile_picture(){
		$config['upload_path']          = FCPATH.'/uploads/profile_pic/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 400; ///400kB
        $config['max_width']            = 1024; //1024px
        $config['max_height']           = 768; //768px
        $config['file_name']			= time();
        $config['overwrite']			= true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image_profile')){
        	$data=$this->upload->data();
        	return $data['file_name'];
        }else{
            $error = $this->upload->display_errors();
            die('profile_pic : '.$error);
        }
	}

	function upload_file_software($filename=''){ // UPLOAD FILE SOFTWARE
        unset($config);
    	$username=$this->session->userdata('username');
		$config['upload_path']          = FCPATH.'/uploads/software/file-software/';
    	$config['file_name']			= (!empty($filename)?$filename:'software-'.time());
        $config['allowed_types']        = 'zip|rar|tar.gz';
        $config['overwrite']			= true;
        //$config['max_size']             = 12000;
        if(!empty($_FILES['file_software']['tmp_name'])){
	        $this->load->library('upload', $config);
	        if ($this->upload->do_upload('file_software')){
	        	$data=$this->upload->data();
	        	return $data['file_name'];
	        }else{
	            $error = $this->upload->display_errors();
	            die('file_software : '.$error);
	        }
	    }else{
	    	return $filename;
	    }
        $config=null;
	}

	function upload_gambar($images=''){
        unset($config);
        //echo '# upload_gambar'.br();
		$config['upload_path']          = FCPATH.'/uploads/software/file-images/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 100; ///100kB
        $config['max_width']            = 1024; //1024px
        $config['max_height']           = 768; //768px
        $config['overwrite']			= true;

        $imagename=array('image1','image2','image3','image4','image5');
        //$time=date('ymdgis');
        $files=array();
        $time=time();
        $i=1;
       // print_r($images);
        foreach($imagename as $image){
        	$config['file_name']=isset($images[$image])?$images[$image]:$image.'-'.$time;
        	$config['reset']=true;
        	$this->load->library('upload');
        	$this->upload->initialize($config);

        	if($_FILES[$image]['tmp_name'] != ''):
		        if ( ! $this->upload->do_upload($image)) // gambar berbentuk array
		        {
		            $error = array('error' => $this->upload->display_errors());
		            die($image .' : '.$error);
		        }else{
		        	$data=$this->upload->data();
		        	array_push($files, $data['file_name']);
		        	//print_r($data);
		        }
		    else:
		        array_push($files, $images['image'.$i]);

		    endif;
		    $i++;
        }
        $config=null;
        return $files;
	}

	function upload_manual_book($manual_book=''){ // UPLOAD FILE PDF
        unset($config);
        //echo '# manual_book'.br();
		$config['upload_path']          = FCPATH.'/uploads/software/file-books/';
        $config['allowed_types']        = 'pdf|zip|rar|tar.gz';
        $config['overwrite']			= true;
        //$config['max_size']             = 3000; // 3MB
        //$time=date('ymdgis');
        $config['file_name']=(!empty($manual_book))?$manual_book:'manual_book-'.time();
        if(!empty($_FILES['buku_panduan']['tmp_name'])){
	        $this->load->library('upload');
	        $this->upload->initialize($config);
	        if ( ! $this->upload->do_upload('buku_panduan')) // file manual
	        {
	        	//print_r($_FILES['buku_panduan']);
	            $error = $this->upload->display_errors();
	            die('buku_panduan : '.$error);
	        }else{
	        	$data=$this->upload->data();
	        	return $data['file_name'];
	        }
        }else{
        	return (isset($manual_book))?$manual_book:'';
        }
        $config=null;
	}

# END UPLOAD ZONE
	function update_product(){
		if($_POST){
			// id produk
			//print_r($_SESSION);
			//print_r($_FILES);
			$id_produk=$this->session->flashdata('id_produk');
			if(!empty($id_produk)){
				$this->db->select(['pdt.ID','url_demo','manual_book','image1','image2','image3','image4','image5']);
				$this->db->join('produk_deskripsi pd','pd.id_produk=pdt.ID');
				$this->db->join('produk_gambar pg','pg.id_produk=pdt.ID');
				$this->db->where('pdt.ID',$id_produk);
				$this->db->limit(1);
				$q=$this->db->get('produk_data pdt');
			}
			if(isset($q)){
				if($q->num_rows() > 0){
					$row=$q->row();
					$ID=$row->ID;
					$url_demo=$row->url_demo;
					$manual_book=$row->manual_book;
					$images['image1']=$row->image1;
					$images['image2']=$row->image2;
					$images['image3']=$row->image3;
					$images['image4']=$row->image4;
					$images['image5']=$row->image5;
				}
			}else{
				exit('data tidak cocok!');
			}
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('kodePrd', 'Kode Produk', 'required');
			$this->form_validation->set_rules('namaPrd', 'Nama Produk', 'required');
			$this->form_validation->set_rules('deskripsi_prd', 'Deskripsi Produk', 'required');
			//$this->form_validation->set_rules('deskripsi_dev', 'Deskripsi Developer', 'required');//kodePrd|namaPrd|deskripsi_prd|deskripsi_dev
			$this->form_validation->set_message('required','<span style="color:red">{field} Tidak Boleh Kosong!</span>');
			if($this->form_validation->run() == FALSE){
				return FALSE;
			}
			//print_r($_FILES);
			$produk['id_user']=$this->get_id_user();
			$produk['kode_produk']=$this->input->post('kodePrd');
			$produk['nama_produk']=$this->input->post('namaPrd');
			$produk['slug']=str_replace(' ', '-', $produk['nama_produk'].'-'.$produk['kode_produk']);
			$produk['id_kategori']=$this->input->post('kategori');
			//$harga_beli_produk=$this->input->post('hargaBeli');
			$produk['harga_jual']=$this->input->post('hargaJual');
			$produk['diskon']=$this->input->post('diskon');
			$deskripsi['deskripsi_produk']=$this->input->post('deskripsi_prd');
			//$deskripsi_dev=$this->input->post('deskripsi_dev');
			$meta['keywords']=$this->input->post('meta')['keywords'];
			$meta['description']=$this->input->post('meta')['description'];
			// upload files
			$produk['url_demo']=$this->upload_file_software($url_demo);
			// insert new deskripsi
			$deskripsi['manual_book']=$this->upload_manual_book($manual_book);
			// meta
			// insert images
			$gambar['images']=$this->upload_gambar($images); 
			$this->update_all($id_produk,$produk,$deskripsi,$gambar,$meta);
		}
	}

	function update_all($id_produk,$produk,$deskripsi,$gambar,$meta){
		//cek id_produk
		if(!empty($id_produk)){
			// update data produk
			if(is_array($produk)){
				$this->db->where('ID',$id_produk);
				$this->db->update('produk_data',$produk);
			}
			// update deskripsi
			if(is_array($deskripsi)){
				$this->db->where('id_produk',$id_produk);
				$this->db->update('produk_deskripsi',$deskripsi);
			}
			// update gambar
			if(is_array($gambar)){
				$i=1;
				foreach($gambar['images'] as $key=>$val){
					$data['image'.$i]=$val;
					$i++;
				}
					$this->db->where('id_produk',$id_produk);
					$this->db->update('produk_gambar',$data);
			}
			// update meta
			//print_r($meta);
			if(is_array($meta)){
				foreach ($meta as $key => $value) {
					$this->db->where(['id_produk'=>$id_produk,'key_meta'=>$key]);
					$this->db->update('produk_meta',['value'=>$value]);
				}
			}
			redirect('panel/software/products/');
		}

	}
// END UPDATE

	function trash_product(){
		if($_GET['id']){
			$id=$_GET['id'];
			$this->db->where('ID',$id);
			$this->db->update('produk_data',['status'=>'0']);
		}
		redirect(ADMIN_SOFTWARE.'/products');
	}

	function delete_product(){
		$id=isset($_GET['id'])?$_GET['id']:'';
		if(!empty($id)){
			$this->db->where('ID',$id);
			$this->db->delete('produk_data');
			$this->load->library('user_agent');
			redirect($this->agent->referrer());
		}
		die('id_tidak boleh kosong');
	}

}