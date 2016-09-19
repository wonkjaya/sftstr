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
				//print_r($product);
					$ID=$product->ID;
					$kategori_produk=(isset($product->kategori))?$product->kategori:'Tidak Ada Kategori';
					$kode_produk=$product->kode_produk;
					$nama_produk=ucwords($product->nama_produk);
					$harga_jual=$product->harga_jual;
					$diskon=$product->diskon;
					$deskripsi=$product->deskripsi;
					$demo=(isset($product->url_demo))?site_url('services/software/download/'.str_replace('.zip','',$product->url_demo)):'';
					$slug=$product->nama_slug.'-jpg';
					
					$gambar_utama=($product->image1 !== '')?
						base_url('img/software/'.
							substr($product->image1,0,strpos($product->image1,'.')).'/'.
							substr($product->image1,strpos($product->image1,'.')+1,strlen($product->image1)).'/'.
							'195x250/'.
							$slug):
								base_url('img/noimage/md/195x250/'.$slug);
					
					$gambar1=($product->image1 !== '')?
						base_url('img/software/'.
							substr($product->image1,0,strpos($product->image1,'.')).'/'.
							substr($product->image1,strpos($product->image1,'.')+1,strlen($product->image1)).'/'.
							'45x45/'.
							$slug):
								base_url('img/noimage/45x45/'.$slug);
					$gambar2=($product->image2 !== '')?
						base_url('img/software/'.
							substr($product->image1,0,strpos($product->image1,'.')).'/'.
							substr($product->image1,strpos($product->image1,'.')+1,strlen($product->image1)).'/'.
							'45x45/'.
							$slug):
								base_url('img/noimage/45x45/'.$slug);
					$gambar3=($product->image3 !== '')?
						base_url('img/software/'.
							substr($product->image1,0,strpos($product->image1,'.')).'/'.
							substr($product->image1,strpos($product->image1,'.')+1,strlen($product->image1)).'/'.
							'45x45/'.
							$slug):
								base_url('img/noimage/45x45/'.$slug);
					$gambar4=($product->image4 !== '')?
						base_url('img/software/'.
							substr($product->image1,0,strpos($product->image1,'.')).'/'.
							substr($product->image1,strpos($product->image1,'.')+1,strlen($product->image1)).'/'.
							'45x45/'.
							$slug):
								base_url('img/noimage/45x45/'.$slug);
					
				}
				?>
				<div class="row">
					<div class="col-md-4">
						<div class="row" style="margin-top:80px">
							<div class="col-md-2 col-sm-4 col-xs-4"></div>
							<div class="col-md-7 col-sm-4 col-xs-5">
								<?=img(['src'=>$gambar_utama])?>
							</div>
							<div class="col-md-3 col-sm-4 col-xs-3"></div>
						</div>
						<div class="row">
							<div class="col-md-2 col-sm-4 col-xs-4"></div>
							<div class="col-md-8 col-sm-4 col-xs-5 offset-3" style="padding-right:0px;"><br>
								<?=img(['src'=>$gambar1,'class'=>'img'])?>
								<?=img(['src'=>$gambar2,'class'=>'img'])?>
								<?=img(['src'=>$gambar3,'class'=>'img'])?>
								<?=img(['src'=>$gambar4,'class'=>'img'])?>
							</div>
							<!--div class="col-md-3 col-sm-4 col-xs-3"></div-->
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
								<p>Diskon:<span style="color:red;font-size:25px"><?=$diskon?>%</span>, Khusus Member: <span style="color:red;font-size:25px"> 10%</span></p>
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
