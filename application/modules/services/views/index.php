<!DOCTYPE html>
<html lang="en">
	<?php
		$data=(object) array('mode'=>'view','title'=>'Home');
		get_head($data);
	?>
	<body class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<?php $this->load->view('includes/top_menu') ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 col-md-3 hidden-xs">
				<?php $this->load->view('includes/sidebar') ?>
			</div>
			<div class="col-sm-9 col-md-9">
				<!-- Tampilkan semua produk -->
				<div class="row" style="box-sizing:">
				<!-- looping products -->
				  <?php foreach($products as $product) : ?>
				  <div class="col-sm-3 col-md-3 col-xs-12">
					<div class="thumbnail">
					  <?php
					  $slug=$product->nama_slug.'-jpg';
					  if($product->image1 == '') {
					  	$image=base_url('img/noimage/sm/'.$slug);
					  }else{
					  	$image=$product->image1;
					  	$dotpos=strpos($image,'.');
					  	$imageName=substr($image,0,$dotpos);
					  	$type=substr($image,$dotpos+1,strlen($image));
					  	$image=base_url('img/software/sm/'.$imageName.'/'.$type.'/'.$slug);
					  }
					  
					  echo img([
						'src'		=> $image,
						'style'		=> 'max-width: 100%; max-height:100%; height:150px'
					  ])?>
					  <div class="caption row">
						<p class="col-md-12" style="font-size:20px;"><?=substr($product->nama_produk,0,17)?></p>
						<p class="col-md-5" style="color:#DACECE;font-size:12px;"><?=$product->kode_produk?></p>
						<p class="col-md-7" style="color:#DACECE;font-size:12px;">Rp. <?=number_format($product->harga_jual,0)?></p>
						<p class="col-md-12">
							<?=anchor(SOFTWARE_URL.'/detail/' . $product->nama_slug, 'Lihat' , [
								'class'	=> 'btn btn-primary col-md-6',
								'role'	=> 'button'
							])?>
							<?=anchor(SOFTWARE_URL.'/add_to_cart/' . $product->ID, 'Beli' , [
								'class'	=> 'btn btn-warning right col-md-5',
								'style' => 'margin-left:3px',
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
			
			<div class="col-xs-12 visible-xs">
					<?php $this->load->view('includes/sidebar') ?>
			</div>
		</div>
			<?php $this->load->view('includes/footer') ?>
		
	</body>
</html>