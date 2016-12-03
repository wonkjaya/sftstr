<?php
if(isset($_GET['id']) and isset($_GET['detail'])) $this->session->set_flashdata('id_produk',$_GET['id']);

$kodePrd='';$slug='';$namaPrd='';$kategori='';$hargaBeli='';$hargaJual='';$url_demo='';$diskon=0;
// META
$metaName='';$metaTag='';$metaDeskription='';
// DESKRIPSI
$deskripsi_prd='';//$deskripsi_dev='';
// IMAGE
$image1='';$image2='';$image3='';$image4='';$image5='';

$status='empty';
if(isset($products)){
	$url_action=ADMIN_SOFTWARE.'/products?update';
	foreach($products as $prd){//print_r($prd);
		if($i=1){
			$kodePrd=$prd->kode_produk;
			$slug=$prd->slug;
			$namaPrd=$prd->nama_produk;
			$kategori=$prd->id_kategori;
			//$hargaBeli=$prd->harga_beli;
			$hargaJual=$prd->harga_jual;
			$diskon=$prd->diskon;
			$url_demo=$prd->url_demo;
			// DESKRIPSI
			$deskripsi_prd=$prd->deskripsi_produk;
			//$deskripsi_dev=$prd->deskripsi_developer;
			//manualbook
			$manualbook=$prd->manual_book;
			$file_software=$prd->url_demo;
			// IMAGE
			$path_image=base_url('/uploads/software/file-images').'/';
			$image1=$prd->image1;
			$image2=$prd->image2;
			$image3=$prd->image3;
			$image4=$prd->image4;
			$image5=$prd->image5;
		}
		// META
		$meta[$prd->key_meta]=$prd->value;
	}
	//print_r($meta);
}
/*if(isset($categories)){
	print_r($categories);
	foreach($categories as $cat){
		$categories_array[$cat->ID]=$cat->name;
	}
}*/
$categories_array=function ($categories){
	if(isset($categories)){
		foreach($categories as $cat){
			$data[$cat->ID]=$cat->name;
		}
		return $data;
	}
};
$title=(isset($_GET['addnew']))?'Produk Baru':(isset($_GET['detail'])?'Produk Detail':'Title');
$type=isset($_GET['addnew'])?'addnew':(isset($_GET['detail'])?'update':'');
$id=isset($_GET['id'])?'&id='.$_GET['id']:'';
$button_trash=isset($_GET['detail'])?'<a href="'.site_url(ADMIN_SOFTWARE.'products?trash').'" class="btn btn-danger">Trash</a>':'';
$panel_class=function($status=''){
					return ($status == 1 || $status=='empty')?'primary':'danger';
			};
$target='?'.$type;
$url=isset($url_action)?$url_action:$this->uri->uri_string().$target;
?>


	<div class="col-md-12">
		<div class="panel panel-<?=$panel_class(isset($status)?$status:'')?>">
		  <div class="panel-heading"><h3><?=$title?></h3></div>
		  <div class="panel-body">
		   <?php echo form_open_multipart($url); ?>
		    <div class="col-md-12">
		    	<?=(isset($_SESSION['insert_success']))
		    		?'<div class="alert alert-success">Produk Berhasil Di input.</div>':''?>
		    </div>
		    <div class="col-md-6">
		    <?php echo validation_errors(); ?>
		   		<table class="table">
		   			<tr>
		   				<th id="no-border">Kode Produk</th>
		   				<td id="no-border">
		   					<div class="input-group">
								<span class="input-group-addon" id="basic-addon2">MS-</span>
								<?=form_input('kodePrd',$kodePrd,'class="form-control"')?>
							</div>
						</td>
		   			</tr>
		   			<tr>
		   				<th id="no-border">Nama Produk</th>
		   				<td id="no-border"><?=form_input('namaPrd',$namaPrd,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th id="no-border">Harga</th>
		   				<td id="no-border">
		   				<div class="input-group">
							<span class="input-group-addon" id="basic-addon2">Rp. </span>
							<?=form_input('hargaJual', $hargaJual, 'class="form-control"')?></td>
						</div>
		   			</tr>
		   			<tr>
		   				<th id="no-border">Kategori</th>
		   				<td id="no-border"><?=form_dropdown('kategori',$categories_array($categories),$kategori,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th id="no-border">Diskon</th>
		   				<td id="no-border">
		   					<div class="input-group">
		   						<?=form_input('diskon', $diskon, 'class="form-control" aria-describedby="basic-addon2"')?>
							  <span class="input-group-addon" id="basic-addon2">%</span>
							</div>
		   				</td>
		   			</tr>
		   			<tr>
		   				<th colspan=2 id="no-border">Gambar</th>
		   			</tr>
		   			<tr>
		   				<td id="no-border" colspan="2">
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=!empty($image1)?$path_image.$image1:base_url('assets/images/no-image.png')?>" width="60px" id="image1">
		   						<?=form_upload('image1','','class="ts-upload"')?>
		   					</div>
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=!empty($image2)?$path_image.$image2:base_url('assets/images/no-image.png')?>" width="60px" id="image2">
		   						<?=form_upload('image2','','class="ts-upload"')?>
		   					</div>
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=!empty($image3)?$path_image.$image3:base_url('assets/images/no-image.png')?>" width="60px" id="image3">
		   						<?=form_upload('image3','','class="ts-upload"')?>
		   					</div>
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=!empty($image4)?$path_image.$image4:base_url('assets/images/no-image.png')?>" width="60px" id="image4">
		   						<?=form_upload('image4','','class="ts-upload"')?>
		   					</div>
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=!empty($image5)?$path_image.$image5:base_url('assets/images/no-image.png')?>" width="60px" id="image5">
		   						<?=form_upload('image5','','class="ts-upload"')?>
		   					</div>
		   					<script type="text/javascript">
		   						function readURL(input) {
		   							var id=$(input).attr('name');
								    if (input.files && input.files[0]) {
								        var reader = new FileReader();
								        reader.onload = function (e) {
								            $('#'+id).attr('src', e.target.result);
								        }
								        reader.readAsDataURL(input.files[0]);
								    }
								}
								$("[name='image1'],[name='image2'],[name='image3'],[name='image4'],[name='image5']").change(function(){
								    readURL(this);
								});

		   					</script>
		   				</td>
		   			</tr>
		   			<tr>
		   				<th id="no-border">ManualBook</th>
		   				<td id="no-border">
		   					<?= form_upload("buku_panduan",'','class="form-control" accept=".pdf"');?>
		   					<span id="helpBlock" class="help-block ts-help">Only *.PDF or Compressed file</span>
		   					<?=isset($manualbook)?'<p>Current File: '.$manualbook.'</p>':''?>
		   				</td>
		   			</tr>
		   			<tr>
		   				<th id="no-border">File</th>
		   				<td id="no-border">
		   					<input type="file" name="file_software" accept=".zip,.rar,.gz" class="form-control">
		   					<span id="helpBlock" class="help-block ts-help">Only *.PDF or Compressed file</span>
		   					<?=isset($file_software)?'<p>Current File: '.$file_software.'</p>':''?>
		   				</td>
		   			</tr>
		   			<!--Deskripsi Produk-->
		   			
		   		</table>
		    </div>
		    <div class="col-md-6">
		    	
   				<label>Deskripsi Produk</label>
   				<textarea id="deskripsi_prd" name="deskripsi_prd"><?=$deskripsi_prd?></textarea>
   				<!--label style="margin-top: 20px;">Deskripsi developer</label>
   				<textarea id="deskripsi_dev" name="deskripsi_dev"><?=$deskripsi_dev?></textarea-->
		   			<script type="text/javascript" src="<?=base_url('assets/tinymce/tiny_mce.js')?>"></script>
		   			<script type="text/javascript">
		   			$(document).ready(function(){
		   				tinymce.init({
						  selector: '#deskripsi_prd',  // change this value according to your HTML
						    width: '100%',
						    height: 200

						});
		   			});
		   			</script>
		   		<h3>Meta Fields</h3>
		   		<label>Keywords</label>
		   		<input type="text" name="meta[keywords]" class="form-control" placeholder="keyword1,keyword2,..." value="<?=isset($meta['keywords'])?$meta['keywords']:''?>">

		   		<label>Description</label>
		   		<textarea type="text" name="meta[description]" class="form-control" style="height: 100px" placeholder="max 160 karakter" maxlength="160"><?=isset($meta['description'])?$meta['description']:''?></textarea>
		    </div>
		    <div class="col-md-4" style="margin-top:30px;">
		    	<input class="btn btn-primary" type="submit" value="Simpan"/>

				<div class="btn-group" style="float:right;margin-right:50px">
					<input class="btn btn-default" type="reset" value="Reset"/>

					<a href="#" class="btn btn-warning" onclick="history.back()">Batal</a>
					<?php
						echo $button_trash;
					?>
				</div>
		    </div>
		   </form>
		  </div>
		</div>
	</div>
