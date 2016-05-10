<?php
if($mode == 'edit'){
	$id 			= $product->id;
	$action 		='admin/products/update/' . $id;
	$title_form 	= 'Edit';
	if($this->input->post('is_submitted')){
		$name			= set_value('name');
		$description	= set_value('description');
		$catatan_developer	= set_value('dev_description');
		$price			= set_value('price');
	} else {
		$name			= $product->name;
		$description	= $product->description;
		$catatan_developer	= $product->catatan_developer;
		$price			= $product->price;
	}
}else{
	$id 			= '';
	$name			= '';
	$description	= '';
	$catatan_developer	= '';
	$price			= '';
	$stock			= '';
	$action 		= 'admin/products/create';
	$title_form 	= 'Tambah';
}
?>
<!doctype html>
<html>
	<?php
		$data=(object) array('mode'=>'admin','title'=>'Edit Product');
		get_head($data);
	?>
	<?php $this->load->view('backend/admin_menu')?>
	<div class="container-fluid">
		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->
		<div class="row">
			<div class="col-md-6">
				<h3><?=$title_form?> Produk</h3><hr/>
				<div><?= validation_errors() ?></div>
				<?= form_open_multipart($action, ['class'=>'form-horizontal']) ?>
					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-4  control-label">Nama Produk</label>
						<div class="col-sm-7">
						  <input type="text" class="form-control" name="name" placeholder="" value="<?= $name ?>">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-4  control-label">Harga</label>
						<div class="col-sm-7">
						  <input type="text" class="form-control" name="price" placeholder="" value="<?= $price ?>">
						  <p style="color:orange;font-size:10px">*) Jumlah uang yang anda dapatkan (-) 30% sebagai bagi hasil dan (-) 5% untuk iklan.</p>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-4 control-label">Gambar Produk</label>
						<div class="col-sm-7">
						  <input type="file" class="form-control" name="userfile" >
						</div>
					  </div>				
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-4  control-label">Diskripsi</label>
						<div class="col-sm-7">
						  <textarea class="form-control" name="description" rows="16"><?= $description ?></textarea>
						</div>
					  </div>
			</div>
			<div class="col-md-6">
				<h3>Catatan Developer</h3><hr/>					
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-2  control-label">File Project</label>
						<div class="col-sm-10">
							<p>
								<input type="radio" name="file_project" onclick="show_hide('upload_file')">Upload
								<input type="radio" name="file_project" onclick="show_hide('link_file')" selected>Link
							</p>
						  <input type="file" class="form-control" name="file_project" id="upload_file" >
						  <input type="text" class="form-control" name="file_project_link" id="link_file" placeholder="atau Link File">
						  <p style="color:orange;font-size:10px">*) Catatan: [*.zip,*.rar,*.tar|gz]
						  	<ul style="color:orange;font-size:10px">
						  		<li>Anda Diwajibkan Menuliskan cara dan bagaimana program dijalankan dengan lengkap Pada file README.TXT</li>
						  		<li>Software anda akan diperiksa oleh tim developer kami untuk kelayakan penggunaan.</li>
						  		<li>Hak cipta Anda dilindungi oleh kami.</li>
						  		<li>Software anda tidak akan kami publikasi kecuali pembeli sudah membeli</li>
						  	</ul>
						  </p>
						  <script type="text/javascript">
						  	$('#upload_file').hide()

						  function show_hide(id){
						  	if(id==='upload_file'){
						  		$('#link_file').hide()
						  		$('#upload_file').show()
						  	}else{
						  		$('#link_file').show()
						  		$('#upload_file').hide()
						  	}
						  }
						  </script>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-2  control-label">Diskripsi</label>
						<div class="col-sm-10">
						  <textarea class="form-control" name="description" cols="6" style="height:200px;"><?= $catatan_developer ?></textarea>
						  <p style="color:orange;font-size:10px">Deskripsi ini untuk tim developer kami sebagai catatan tambahan.</p>
						</div>
					  </div>
					  
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10" style="margin-top:20px;">
						  <input type="hidden" name="is_submitted" value="1" />
						  <input type="submit" class="btn btn-default" value="Simpan"/>
						  <a href="<?=site_url('admin/products')?>" class="btn btn-danger" style="float:right">Kembali</a>
						</div>
					  </div>
					
				<?= form_close() ?>
			</div>
		</div>
		
		
		<script>
			$(document).ready(function(){
				$('#myTable').DataTable();
			});
		</script>
	</div>
	<?php
	get_footer($data);
	?>
</html>