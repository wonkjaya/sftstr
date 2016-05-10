<!DOCTYPE html>
<html lang="en">
	<?php
		$data=(object) array('mode'=>'view','title'=>'Home');
		get_head($data);
	?>
	<body class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<?php $this->load->view('layout/top_menu') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 col-md-3">
				<?php $this->load->view('layout/sidebar') ?>
			</div>
			<div class="col-sm-9 col-md-9">
				<!-- Tampilkan semua produk -->
				<div class="row" style="box-sizing:">
				<!-- looping products -->
				  <?php foreach($products as $product) : ?>
				  <div class="col-sm-3 col-md-3">
					<div class="thumbnail">
					  <?=img([
						'src'		=> 'uploads/' . $product->image,
						'style'		=> 'max-width: 100%; max-height:100%; height:100px'
					  ])?>
					  <div class="caption">
						<h3 style="min-height:60px;"><?=$product->name?></h3>
						<p><?=$product->description?></p>
						<p>
							<?=anchor('welcome/detail/' . $product->slug, 'Lihat' , [
								'class'	=> 'btn btn-primary',
								'role'	=> 'button'
							])?>
							<?=anchor('welcome/add_to_cart/' . $product->id, 'Buy' , [
								'class'	=> 'btn btn-warning right',
								'role'	=> 'button'
							])?>
						</p>
					  </div>
					</div>
				  </div>
				  <?php endforeach; ?>
				<!-- end looping -->
				</div>
			</div>
		</div>
			<?php $this->load->view('layout/footer') ?>
		
	</body>
</html>