<div class="col-xs-12 col-md-12 col-sm-5" id="ts-sidebar-2">
	<div class="col-md-12 ts-sidebar-label" id="sidebar-title">
		<h4 class="">Customer Service</h4>
	</div>
	<img src="<?=base_url((!isset($right))?'assets/images/cs.jpg':'assets/images/cs_right.png')?>" class="img-circle" width="100px" style="margin-left:20%;margin-top:20px">
</div>
<div class="col-xs-12 col-md-12 col-sm-5" id="ts-sidebar-3">
	<b>Contact Person:</b>
	<div class="row ts-contacts">
		<div class="col-md-2 col-xs-2">
			<img src="<?=base_url('assets/images/aim.png')?>" width="20px">
		</div>
		<div class="col-md-9 col-xs-10">085-234-234-112</div>
	</div>
	<div class="row ts-contacts">
		<div class="col-md-2 col-xs-2">
			<img src="<?=base_url('assets/images/aim.png')?>" width="20px">
		</div>
		<div class="col-md-9 col-xs-10">085-234-234-112</div>
	</div>
</div>
<div class="col-xs-12 col-md-12 col-sm-5" id="ts-sidebar-4">
	<div class="col-md-12 ts-sidebar-label" id="sidebar-title">
		<h4 class="">Temukan Kami</h4>
	</div>
	<div class="col-md-12" style="height:100px">
		facebook fanpage
	</div>
	<div class="col-md-12">
		<a class="btn">fb-like</a>
		<a class="btn">fb-share</a>
	</div>
</div>
<div class="col-xs-12 col-md-12 col-sm-5" id="ts-sidebar-4">
	<div class="col-md-12 ts-sidebar-label" id="sidebar-title">
		<h4 class="">Member Area</h4>
	</div>
	<div class="col-md-12">
	<?php 
	if(!isset($_SESSION['member'])){
		echo 	'<a class="btn">Login</a>
				 <a class="btn">Daftar</a>';
	}
	?>
	</div>
</div>