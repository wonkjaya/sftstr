	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Data Semua Produk 
		  <div class="pull-right"><?=anchor('product_list?add_new','Add New')?></div>
		  </div>
		  <div class="panel-body">
		    <table class="table table-bordered">
		    	<tr>
		    		<th>#</th>
		    		<th>User</th>
		    		<th>Kode</th>
		    		<th>Nama</th>
		    		<th>Harga</th>
		    		<th>*</th>
		    	</tr>
		    	<?php 
		    	if(isset($products)){
		    		$no=1;
			    	foreach($products as $product){
			    	?>
			    	<tr>
			    		<td><?=$no?></td>
			    		<td><?=$product->id_user?></td>
			    		<td><?=$product->kode_produk?></td>
			    		<td><?=anchor('product_list?detail&id='.$product->ID,$product->nama_produk)?></td>
			    		<td style="text-align:right"><?=number_format($product->harga_jual)?></td>
			    		<td style="text-align:right">
			    			<a href="" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-eye-open"></span></a>
			    			<a href="" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-pencil"></span></a>
			    			<a href="" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash"></span></a>
			    		</td>
			    	</tr>
			    <?php
			    $no++;
					}
				}else{
				?>
					<tr>
			    		<td colspan="5" style="text-align:center">Tidak Ada Data</td>
			    	</tr>
				<?php
				}
		    	?>
		    	<tr style="border:0px solid;">
		    		<td colspan="5" style="text-align:center;padding:12px;border:0px solid;"><?php echo (isset($pagging))?$pagging:''; ?></td>
		    	</tr>
		    </table>
		  </div>
		</div>
	</div>
