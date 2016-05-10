<!DOCTYPE html>
<html>
<head>
	<?php 
		ts_get_head(); 
	?>
</head>
<body class="container-fluid">
	<?php 
		$data['aktif_menu']=$aktif_menu;
		echo ts_get_header($data);
	?>
	<div class="row">
		<!--div class="col-md-2 col-sm-4">
			<?//=ts_get_sidebar()?>
		</div> <!--Sidebar-->
		<div class="col-md-12 col-sm-12">
			<?php 
				$this->load->view($data_content,$data);
			?>
		</div> <!--container-->
	</div>
	<?php
	$this->load->view('includes/footer');
	?>
</body>
</html>