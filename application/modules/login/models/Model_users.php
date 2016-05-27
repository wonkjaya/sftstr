<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model {

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

}