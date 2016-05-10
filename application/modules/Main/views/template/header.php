<!DOCTYPE html>
<html lang="en">
<head>
<title>Home - Malangsoftware.com</title>
<meta name="description" content="Jasa pembuatan software(desktop atau website), pemasangan komputer kantor dan jaringan komputer (warnet,kantor,dll)">
<meta name="keywords" content="software-malang,pembuatan-website,pembuatan-software,pemasangan-komputer,pemasangan-jaringan">
<meta name="author" content="malangsoftware.com">
<meta charset="utf-8">
<link rel="stylesheet" href="<?=base_url('assets/main-page/css/reset.css')?>" type="text/css" media="all">
<link rel="stylesheet" href="<?=base_url('assets/main-page/css/layout.css')?>" type="text/css" media="all">
<link rel="stylesheet" href="<?=base_url('assets/main-page/css/style.css')?>" type="text/css" media="all">
<script type="text/javascript" src="<?=base_url('assets/main-page/js/maxheight.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/main-page/js/jquery-1.4.2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/main-page/js/cufon-yui.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/main-page/js/cufon-replace.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/main-page/js/Myriad_Pro_300.font.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/main-page/js/Myriad_Pro_400.font.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/main-page/js/jquery.faded.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/main-page/js/jquery.jqtransform.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/main-page/js/script.js')?>"></script>

<!--[if lt IE 7]>
<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
</head>
<body id="page1" onLoad="new ElementMaxHeight();">
<div class="tail-top">
<!-- header -->
	<header>
		<div class="container">
			<div class="header-box">
				<div class="left">
				<?php 
				$menus=array(
					(object) array('id'=>'1','title'=>'Home','link'=>'#'),
					(object) array('id'=>'2','title'=>'Paket Pemasangan','link'=>'#'),
					(object) array('id'=>'3','title'=>'Konsultasi','link'=>'#'),
					(object) array('id'=>'4','title'=>'Hubungi Kami','link'=>'#'),
				)
				?>
					<div class="right">
						<nav>
							<ul>
								<?php 
								$current=1;
								foreach($menus as $menu){
									$class=($menu->id==$current)?'current':'';
									echo '<li class="'.$class.'">'.anchor('#',$menu->title).'</li>';
								}
								?>
							</ul>
						</nav>
						<h1><a href="index.html"><span>Malang</span>Software</a></h1>
					</div>
				</div>
			</div>
			<span class="top-info">Call/SMS	+ 62 853 3014 5854  &nbsp; l  &nbsp; <a href="#">Penawaran Kami</a> &nbsp; l &nbsp; <a href="#">Pencarian</a></span>
			<!--form action="" id="login-form">
				<fieldset>
					<span class="text">
						<input type="text" value="Username" onFocus="if(this.value=='Username'){this.value=''}" onBlur="if(this.value==''){this.value='Username'}">
					</span>
					<span class="text">
						<input type="password" value="Password" onFocus="if(this.value=='Password'){this.value=''}" onBlur="if(this.value==''){this.value='Password'}">
					</span>
					<a href="#" class="login" onClick="document.getElementById('login-form').submit()"><span><span>Login</span></span></a>
					<span class="links"><a href="#">Forgot Password?</a><br/><a href="#">Register</a></span>
				</fieldset>
			</form-->
		</div>
	</header>