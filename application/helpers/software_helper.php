<?php 

function ts_get_head($data=''){
	echo '<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/bootstrap.min.css').'"/>';
	echo '<link rel="stylesheet" type="text/css" href="'.base_url('assets/css/style.css').'"/>';
	echo '<script type="text/javascript" src="'.base_url('assets/jquery/jquery.min.js').'"></script>';
	echo '<script type="text/javascript" src="'.base_url('assets/js/bootstrap.min.js').'"></script>';
	$title=(isset($data['title']))?$data['title']:'Administrator';
	echo '<title>'.$title.'</title>';
}
function ts_get_header($options=array()){
	$username=function(){
		$email=ts_get_username();
		$username=substr($email,0,strpos($email,'@'));
		return ucfirst($username);
	};
	$menu_aktif=function($opt,$aktif) use($options){
		$menu=(isset($opt['aktif_menu']))?$opt['aktif_menu']:1;
		//echo $aktif.':'.$menu.':'.$opt['aktif_menu'].br();
		if($aktif==$menu){
			return 'active';
		}
		return '';
	};
	//echo $menu_aktif($options,5);exit;
	return '<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="'.site_url().'">Toko Software</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="'.($menu_aktif($options,1)).'"><a href="'.site_url(ADMIN_SOFTWARE.'/dashboard').'">HOME<span class="sr-only">(Dashboard)</span></a></li>
			        <li class="dropdown '.($menu_aktif($options,2)).'">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produk <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="'.site_url(ADMIN_SOFTWARE.'/products?addnew').'">New Produk</a></li>
			            <li><a href="'.site_url(ADMIN_SOFTWARE.'/products?aktif').'">Browse Produk</a></li>
			          </ul>
			        </li>
			        <li class="dropdown '.($menu_aktif($options,3)).'">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users<span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="'.site_url(ADMIN_SOFTWARE.'/users?addnew').'">New Users</a></li>
			            <li><a href="'.site_url(ADMIN_SOFTWARE.'/users?aktif').'">Browse Users</a></li>
			          </ul>
			        </li>
			        <li class="'.($menu_aktif($options,4)).'"><a href="'.site_url(ADMIN_SOFTWARE.'/invoice').'">Invoice</a></li>
			        './*<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Invoices<span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li class="divider"></li>
			            <li><a href="#">One more separated link</a></li>
			          </ul>
			        </li>*/'
			      </ul>
			      <form class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <!--button type="submit" class="btn btn-default">Submit</button-->
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#">Link</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th"></span> '.$username().' <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="#">Profil Saya</a></li>
			            <li><a href="#">Aktivitas Saya</a></li>
			            <li class="divider"></li>
			            <li><a href="'.site_url('logout').'">Logout</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>';
}
	
function ts_get_sidebar(){
	$CI =& get_instance();
	$CI->load->view('includes/admin/sidebar');
}

function ts_get_footer(){
}

function ts_get_user_level($level=10){
	$available_level=array('Administrator'=>'00','01'=>'Developer','03'=>'Staf Editor','User'=>'10');
	return array_search($level, $available_level);
}

function form_gender($val){
	echo form_dropdown('jenis_kelamin',['1'=>'Laki-Laki','0'=>'Perempuan'],$val,'class="form-control"');
}

function form_level($val){
	$data=array('00'=>'Administrator','01'=>'Marketing','03'=>'Editor','10'=>'User');
	return form_dropdown('level',$data,$val,'class="form-control"');
}


//end of file