<?php
$kodePrd='';$slug='';$namaPrd='';$kategori='';$hargaBeli='';$hargaJual='';$url_demo='';$diskon=0;
// META
$metaName='';$metaTag='';$metaDeskription='';
// DESKRIPSI
$deskripsi_prd='';$deskripsi_dev='';
// IMAGE
$image1='';$image2='';$image3='';$image4='';

$status='empty';
if(isset($products)){
	foreach($products as $prd){//print_r($prd);
		$kodePrd=$prd->kode_produk;
		$slug=$prd->slug;
		$namaPrd=$prd->nama_produk;
		$kategori=$prd->id_kategori;
		$hargaBeli=$prd->harga_beli;
		$hargaJual=$prd->harga_jual;
		$diskon=$prd->diskon;
		$url_demo=$prd->url_demo;

		// META
		$metaName=$prd->meta_name;
		$metaTag=$prd->meta_tag;
		$metaDeskription=$prd->meta_description;

		// DESKRIPSI
		$deskripsi_prd=$prd->deskripsi_produk;
		$deskripsi_dev=$prd->deskripsi_developer;

		// IMAGE
		$image1=$prd->image1;
		$image2=$prd->image2;
		$image3=$prd->image3;
		$image4=$prd->image4;

	}
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
$button_trash=isset($_GET['addnew'])?'<a href="'.site_url('produckk_list?trash').'" class="btn btn-danger">Trash</a>':'';
$panel_class=function($status=''){
					return ($status == 1 || $status=='empty')?'primary':'danger';
			};
$target='?'.$type;
?>


	<div class="col-md-12">
		<div class="panel panel-<?=$panel_class(isset($status)?$status:'')?>">
		  <div class="panel-heading"><?=$title?></div>
		  <div class="panel-body">
		   <?php echo form_open_multipart($this->uri->uri_string().$target); ?>
		    <div class="col-md-4">
		    <?php echo validation_errors(); ?>
		   		<table class="table">
		   			<tr>
		   				<th>Nama Produk</th>
		   				<td id="no-border"><?=form_input('namaPrd',$namaPrd,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Kode Produk</th>
		   				<td id="no-border"><?=form_input('kodePrd',$kodePrd,'class="form-control"')?></td>
		   			</tr>
		   			<!--tr>
		   				<th>Harga Beli</th>
		   				<td id="no-border"><?=form_input('hargaBeli',$hargaBeli,'class="form-control"')?></td>
		   			</tr-->
		   			<tr>
		   				<th>Harga</th>
		   				<td id="no-border"><?=form_input('hargaJual',$hargaJual,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Kategori</th>
		   				<td id="no-border"><?=form_dropdown('kategori',$categories_array($categories),$kategori,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Diskon</th>
		   				<td id="no-border"><?=form_input('diskon',$diskon,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th colspan=2>Gambar</th>
		   			</tr>
		   			<tr>
		   				<td id="no-border" colspan="2">
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=base_url('assets/images/no-image.png')?>" width="60px" id="image1">
		   						<?=form_upload('image1','','class="ts-upload"')?>
		   					</div>
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=base_url('assets/images/no-image.png')?>" width="60px" id="image2">
		   						<?=form_upload('image2','','class="ts-upload"')?>
		   					</div>
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=base_url('assets/images/no-image.png')?>" width="60px" id="image3">
		   						<?=form_upload('image3','','class="ts-upload"')?>
		   					</div>
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=base_url('assets/images/no-image.png')?>" width="60px" id="image4">
		   						<?=form_upload('image4','','class="ts-upload"')?>
		   					</div>
		   					<div class="img-rounded ts-image-preview">
		   						<img src="<?=base_url('assets/images/no-image.png')?>" width="60px" id="image5">
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
		   			<!--Deskripsi Produk-->
		   			
		   		</table>
		    </div>
		    <div class="col-md-8">
		    	
   				<label>Deskripsi Produk</label>
   				<textarea id="deskripsi_prd" name="deskripsi_prd"><?=$deskripsi_prd?></textarea>
   				<label style="margin-top: 20px;">Deskripsi developer</label>
   				<textarea id="deskripsi_dev" name="deskripsi_dev"><?=$deskripsi_dev?></textarea>
		   			<script type="text/javascript" src="<?=base_url('assets/tinymce/tiny_mce.js')?>"></script>
		   			<script type="text/javascript">
		   			$(document).ready(function(){
		   				tinymce.init({
						  selector: 'textarea',  // change this value according to your HTML
						    width: '100%',
						    height: 300,
						    toolbar: 'insert file undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'

						});
		   			});
		   			</script>
		    </div>
		    <div class="col-md-4">
		    	<input class="btn btn-primary" type="submit" value="Simpan"/>

				<div class="btn-group" style="float:right;margin-right:50px">
					<input class="btn btn-warning" type="reset" value="Reset"/>

					<a href="#" class="btn btn-danger" onclick="history.back()">Batal</a>
					<?php
						echo $button_trash;
					?>
				</div>
		    </div>
		   </form>
		  </div>
		</div>
	</div>
