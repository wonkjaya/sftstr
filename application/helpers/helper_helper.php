<?php
function connect_internet(){
	$connected=@fsockopen("http://google.com",443);
	if($connected){
		$is_con='true';
		fclose($connected);
	}else{
		$is_con='false';
	}
	return $is_con;
}
function get_head($data){
	$internet_check=connect_internet();
	if($data->mode == 'view'){
		echo '<head>
				<title>'.$data->title.'</title>
				<link rel="stylesheet" href="'.base_url('assets/css/bootstrap.min.css').'" />
				<link rel="stylesheet" href="'.base_url('assets/css/style.css').'" />
				<script src="'.base_url('assets/jquery/jquery.min.js').'"></script>
				<script src="'.base_url('assets/js/bootstrap.min.js').'"></script>
			</head>';
	}else{
		echo '<head>
			<title>'.$data->title.'</title>
			
			<script type="text/javascript" language="javascript" src="'.base_url('assets/jquery/jquery.min.js').'"></script>
			<script type="text/javascript" language="javascript" src="'.base_url('assets/js/jquery.dataTables.min.js').'"></script>
			<script type="text/javascript" language="javascript" src="'.base_url('assets/js/dataTables.bootstrap.js').'"></script>
			
			<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/bootstrap.min.css').'">
			<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/dataTables.bootstrap.css').'">
			<link rel="stylesheet" href="'.base_url('assets/css/style.css').'" />
		</head>';
	}
}

function get_footer($data){
	if($data->mode == 'view'){
		echo '<div class="row footer">
				<div class="col-md-12 col-sm-12">
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-12 footer-1">categories</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12 footer-1">categories</div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12 footer-1">categories</div>
						</div>
					</div>
				</div>
			</div>';
	}else{
		echo '<nav class="navbar navbar-default" style="margin-top:30px;margin-bottom:0px;border-radius:0px;padding-top:20px">
				<div class="col-md-12 col-sm-12">
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-12"></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12"></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-12">Created By Rohman_ahmad</div>
						</div>
					</div>
				</div>
			</nav>';
	}
}

//end of file