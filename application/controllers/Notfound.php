<?php 
class Notfound extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
    } 

    function printData($data, $type='application/json'){
		$this->output
			 ->set_content_type($type)
			 ->set_output($data);
	}

	function index(){
        $this->output->set_status_header('404'); 
		$data = ["message"=>"Method Not Found"];
		$this->printData(json_encode($data));
	}

} 
?>