<!DOCTYPE html>
<html lang="en">
	<?php
		$data=(object) array('mode'=>'admin','title'=>'Login Pengguna');
		get_head($data);
	?>
	<body class="container-fluid">
		<?php $this->load->view('layout/top_menu') ?>
		
		<div class="row">
			<div class="col-md-3 hidden-xs"></div>
			<div class="col-md-4 col-xs-12">
				<div><?=validation_errors()?></div>
				<div><?=$this->session->flashdata('error')?></div>
				<?=form_open('login', ['class'=>'form-horizontal'])?>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" name="username">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
					  <input type="password" class="form-control" name="password">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <div class="checkbox">
						<label>
						  <input type="checkbox"> Remember me
						</label>
					  </div>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default">Sign in</button>
					</div>
				  </div>
				<?=form_close()?>
				
			</div>
			<div class="col-md-5 hidden-xs"></div>
		</div>
		
	</body>
</html>