	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Data Produk 
		  <div class="pull-right"><?=anchor(ADMIN_SOFTWARE.'/products?add_new','Add New')?></div>
		  </div>
		  <div class="panel-body">
		  	<div class="col-md-12" style="margin-bottom:20px">
				<form class="form-inline" method="GET">
				  <div class="form-group">
				    <label for="exampleInputName2">Filter :</label>
				    <?php echo form_dropdown('type',[''=>'type','1'=>'aktif','0'=>'nonaktif','2'=>'trash'],'','class="form-control"');?>
				  </div>
				  <div class="form-group">
				    <?php 
				    if(isset($cats)){//print_r($cats);
				    	$kategori['']='kategori';
				    	foreach($cats as $cat){
				    		$kategori[$cat->ID]=$cat->name;
				    	}
				    }
				    echo form_dropdown('cat',$kategori,'','class="form-control"');?>
				  </div>
				  <div class="form-group">
				  	
				  </div>
				  <button type="submit" class="btn btn-default">Filter</button>
				</form>		  		
		  	</div>
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
			    		<td><?=anchor(ADMIN_SOFTWARE.'/products?detail&id='.$product->ID,$product->nama_produk)?></td>
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
