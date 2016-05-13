<?php
$kodePrd='';$slug='';$namaPrd='';$kategori='';$hargaBeli='';$hargaJual='';$url_demo='';$diskon=0;
// META
$metaName='';$metaTag='';$metaDeskription='';
// DESKRIPSI
$deskripsi_prd='';$deskripsi_dev='';
// IMAGE
$image1='';$image2='';$image3='';$image4='';

$status='empty';
if(isset($product)){
	foreach($produk as $prd){
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
$title=(isset($_GET['addnew']))?'New User':(isset($_GET['detail'])?'Detail User':'Title');
$type=isset($_GET['addnew'])?'addnew':(isset($_GET['detail'])?'update':'');
$id=isset($_GET['id'])?'&id='.$_GET['id']:'';
$button_trash=($_GET['addnew'])?'<a href="'.site_url('produckk_list?trash').'" class="btn btn-danger">Trash</a>':'';
$panel_class=function($status=''){
					return ($status == 1 || $status=='empty')?'primary':'danger';
			}
?>

	<div class="col-md-12">
		<div class="panel panel-<?=$panel_class(isset($status)?$status:'')?>">
		  <div class="panel-heading"><?=$title?></div>
		  <div class="panel-body">
		   <div class="col-md-12">
		   <?php echo validation_errors(); ?>
		    <form id="form-new" method="POST">
		   		<table class="table">
		   			<tr>
		   				<th>Kode Produk</th>
		   				<td id="no-border"><?=form_input('kodePrd',$kodePrd,'class="form-control"')?></td>

		   				<th>Harga Beli</th>
		   				<td id="no-border"><?=form_input('hargaBeli',$hargaBeli,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Nama Produk</th>
		   				<td id="no-border"><?=form_input('namaPrd',$namaPrd,'class="form-control"')?></td>

		   				<th>Harga Jual</th>
		   				<td id="no-border"><?=form_input('hargaJual',$hargaJual,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Kategori</th>
		   				<td id="no-border"><?=form_dropdown('kategori',$categories_array($categories),$kategori,'class="form-control"')?></td>

		   				<th>Diskon</th>
		   				<td id="no-border"><?=form_input('diskon',$diskon,'class="form-control"')?></td>
		   			</tr>
		   			<!--Deskripsi Produk-->
		   			<tr>
		   				<th colspan="4" id="no-border">Deskripsi Produk</th>
		   			</tr>
		   			<tr>
		   				<td colspan="4">
		   					<textarea id="deskripsi_prd" name="deskripsi_prd"><?=$deskripsi_prd?></textarea>
		   				</td>
		   			</tr>

		   			<!--Deskripsi Developer-->
		   			<tr>
		   				<th colspan="4" id="no-border">Deskripsi Untuk Developer</th>
		   			</tr>
		   			<tr>
		   				<td colspan="4">
		   					<textarea id="deskripsi_dev" name="deskripsi_dev"><?=$deskripsi_dev?></textarea>
		   				</td>
		   			</tr>
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
		   			<tr>
		   				<td id="no-border"></td>
		   				<td id="no-border"></td>
		   				<td id="no-border"></td>
		   				<td id="no-border">
		   					<input class="btn btn-primary" type="submit" value="Simpan"/>

		   					<div class="btn-group" style="float:right;margin-right:50px">
			   					<input class="btn btn-warning" type="reset" value="Reset"/>

			   					<a href="#" class="btn btn-danger" onclick="history.back()">Batal</a>
			   					<?php
			   						echo $button_trash;
			   					?>
			   				</div>
		   				</td>
		   			</tr>
		   		</table>
		   	</form>
		   </div>
		  </div>
		</div>
	</div>
