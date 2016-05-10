<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
	
	function get_domain_available(){
		$domain=($_GET['domain'])?$_GET['domain']:'';
		$url='https://www.whoisxmlapi.com/whoisserver/WhoisService?cmd=GET_DN_AVAILABILITY&domainName='.$domain.'&username=rohman&password=allahis1&getMode=DNS_AND_WHOIS&outputFormat=JSON';
		$result=file_get_contents($url);
        return json_decode($result);
	}

	function kirim_pengajuan(){
		if($_GET){
			$domain = $this->input->get('domain');
			$nomor = $this->input->get('nomor');
			$deskripsi = $this->input->get('deskripsi');
			if($nomor != ''){
				$keluhan=json_encode(array('domain'=>$domain,'deskripsi'=>$deskripsi));
				$data=['nomor_telpon'=>$nomor,'keluhan'=>$keluhan];
				$this->db->insert('pengajuan_pelanggan',$data);
			}
		}
	}
	
}
