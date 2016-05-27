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
			<div class="col-sm-12 col-md-9">
				<?php 
				if($product){
					$ID=$product->ID;
					$kategori_produk=(isset($product->kategori))?$product->kategori:'Tidak Ada Kategori';
					$kode_produk=$product->kode_produk;
					$nama_produk=$product->nama_produk;
					$harga_jual=$product->harga_jual;
					$diskon=$product->diskon;
					$deskripsi=$product->deskripsi;
					$demo=(isset($product->url_demo))?$product->url_demo:'';
					$gambar1=($product->image1 !== '')?$product->image1:'no-image.png';
					$gambar2=($product->image2 !== '')?$product->image2:'no-image.png';
					$gambar3=($product->image3 !== '')?$product->image3:'no-image.png';
					$gambar4=($product->image4 !== '')?$product->image4:'no-image.png';
				}
				?>
				<div class="row">
					<div class="col-md-4">
						<div class="row" style="margin-top:80px">
							<div class="col-md-2 col-sm-4 col-xs-4"></div>
							<div class="col-md-7 col-sm-4 col-xs-5">
								<?=img(['src'=>(substr($gambar1,0,4)=='http'?$gambar1:'assets/images/'.$gambar1),'width'=>'200px'])?>
							</div>
							<div class="col-md-3 col-sm-4 col-xs-3"></div>
						</div>
						<div class="row">
							<div class="col-md-2 col-sm-4 col-xs-4"></div>
							<div class="col-md-7 col-sm-4 col-xs-5" style="padding-right:0px;"><br>
								<?=img(['src'=>(substr($gambar1,0,4)=='http'?$gambar1:'assets/images/'.$gambar1),'width'=>'40px','class'=>'img'])?>
								<?=img(['src'=>(substr($gambar2,0,4)=='http'?$gambar2:'assets/images/'.$gambar2),'width'=>'40px','class'=>'img'])?>
								<?=img(['src'=>(substr($gambar3,0,4)=='http'?$gambar3:'assets/images/'.$gambar3),'width'=>'40px','class'=>'img'])?>
								<?=img(['src'=>(substr($gambar4,0,4)=='http'?$gambar4:'assets/images/'.$gambar4),'width'=>'40px','class'=>'img'])?>
							</div>
							<div class="col-md-3 col-sm-4 col-xs-3"></div>
						</div>
						<hr/>
						<div class="row">
							<div class="col-md-12">
								<?php 
									if($demo==''){
										echo '<a class="btn btn-default col-md-12" disabled="disabled">Demo Tidak Tersedia</a>';
									}else{
										echo '<a href="'.$demo.'" target="blank" class="btn btn-primary col-md-12">Demo Program</a>';
									}
								?>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<h3><?=$nama_produk?></h3>
							</div>
							<div class="col-md-8">
								<p style="color:orange">Kategori Produk : <?=$kategori_produk?></p>
							</div>
							<div class="col-md-4">
								<p><span style="color:orange">Kode Produk :</span> <b><?=$kode_produk?></b></p>
							</div>
							<div class="col-md-12">
								<?=$deskripsi?>
							</div>
							<div class="col-md-12">
								<p style="color:orange;font-size:14px;padding-top:20px">Jenis Pembuatan : Pre-Order</p>
							</div>
							<div class="col-md-6 col-xs-6 col-sm-6">
								<h3 style="color:#F71E1E">Harga : Rp. <?=number_format($harga_jual,0)?></h3>
							</div>
							<div class="col-md-6 col-xs-6 col-sm-6">
								<!--p>Diskon Bulan Ini: <span style="color:red;font-size:25px"> 20%</span></p-->
								<p>Diskon Khusus Member: <span style="color:red;font-size:25px"> 25%</span></p>
							</div>
							<div class="col-md-12">
								<a href="" class="btn btn-share btn-primary col-md-2 col-sm-1 col-xs-2" style="float:right">Daftar</a>
								<a href="" class="btn btn-share col-md-1 col-sm-1 col-xs-1" style="float:right">Login</a>
							</div>
							<div class="col-md-12">
								<br/>
								Share This:
								<p><span>Facebook</span> | <span>twitter</span> | <span>Google+</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-3">
				<?php $this->load->view('includes/sidebar',['right'=>true]) ?>
			</div>
		</div>
			<?php $this->load->view('includes/footer') ?>
		
	</body>
</html>