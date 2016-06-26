	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Data Produk 
		  <div class="pull-right"><?=anchor(ADMIN_SOFTWARE.'/products?add_new','Add New')?></div>
		  </div>
		  <div class="panel-body">
		  	<div class="col-md-12" style="margin-bottom:20px">
				<form class="form-inline" method="GET">
				  <div class="form-group">
				    <label for="exampleInputName2"></label>
				    <?php echo form_dropdown('type',[''=>'type','1'=>'aktif','0'=>'trash'],isset($_GET['type'])?$_GET['type']:'','class="form-control"');?>
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
		    		<th>Kategori</th>
		    		<th>Kode</th>
		    		<th>Nama</th>
		    		<th valign="left">Harga</th>
		    		<th>*</th>
		    	</tr>
		    	<?php 
		    	if(isset($products)){
		    		$no=1;
			    	foreach($products as $product){
			    	?>
			    	<tr>
			    		<td><?=$no?></td>
			    		<td><?=anchor(ADMIN_SOFTWARE.'/users?detail&id='.$product->id_user,explode('@',$product->user_email)[0])?></td>
			    		<td><?=$product->kategori?></td>
			    		<td><?=$product->kode_produk?></td>
			    		<td><?=anchor(ADMIN_SOFTWARE.'/products?detail&id='.$product->ID,$product->nama_produk)?></td>
			    		<td style="text-align:right;"><?=str_replace(',','.',number_format($product->harga_jual))?></td>
			    		<td style="text-align:right">
			    			<!--a href="" class="btn btn-default btn-xs" title=""> <span class="glyphicon glyphicon-eye-open"></span></a>
			    			<a href="" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-pencil"></span></a-->
			    			<?php
			    			if($product->status == 1){
			    				echo '<a href="#" class="btn btn-warning btn-xs" title="Trash" onclick="trash_product('.$product->ID.')"> <span class="glyphicon glyphicon-trash"></span> Trash</a>';
			    			}else{
			    				echo '<a href="'.site_url(ADMIN_SOFTWARE.'/products?delete&id='.$product->ID).'" class="btn btn-danger btn-xs" title="Delete"> <span class="glyphicon glyphicon-trash"></span> Delete</a>';
			    			}
			    			?>
			    		</td>
			    	</tr>
			    <?php
			    $no++;
					}
				}else{
				?>
					<tr>
			    		<td colspan="7" style="text-align:center">Tidak Ada Data</td>
			    	</tr>
				<?php
				}
		    	?>
		    	<tr style="border:0px solid;">
		    		<td colspan="7" style="text-align:center;padding:12px;border:0px solid;"><?php echo (isset($pagging))?$pagging:''; ?></td>
		    	</tr>
		    </table>
		    <script type="text/javascript">
		    	function trash_product(id){
		    		var conf=confirm('Hapus?');
		    		if(conf === true && id > 0){
		    			document.location="<?=site_url(ADMIN_SOFTWARE.'/products?trash&id=')?>" + id;
		    		}
		    	}
		    </script>
		  </div>
		</div>
	</div>
