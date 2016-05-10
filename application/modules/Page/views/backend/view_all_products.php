<!doctype html>
<html>
	<?php
		$data=(object) array('mode'=>'admin','title'=>'All Products');
		get_head($data);
	?>
	<?php $this->load->view('backend/admin_menu')?>
	<div class="container">
		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			
				<table id="myTable" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Gambar</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Diskripsi</th>
							<th>File Project</th>
							<th>
								<?=anchor(	'admin/products/create',
											'Add Product', 
											['class'=>'btn btn-primary btn-sm'])
								?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($products as $product) : ?>
						<tr>
							<td><?=$product->id?></td>
							<td><?php
								$product_image = [	'src'	=> 'uploads/' . $product->image,
													'height'	=> '50'
													];
								echo img($product_image)
							?></td>
							<td><?=$product->name?></td>
							<td><?=$product->price?></td>
							<td><?=$product->description?></td>
							<td><?='Uploaded'?></td>
							<td>
								<?=anchor(	'admin/products/update/' . $product->id, 
											'Edit',
											['class'=>'btn btn-default btn-sm'])
								?> 
								<?=anchor(	'admin/products/delete/' . $product->id, 
											'Delete',
											['class'=>'btn btn-danger btn-sm',
											 'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'
											])
								?> 
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="col-md-1"></div>
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