	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading">
		  	<h3 style="width:50%">Data Produk</h3> 
		  </div>
		  <div class="panel-body">
		  	<div class="col-md-6">
		  	<?php
		  		$type=isset($_GET['t'])?$_GET['t']:'';
		  	?>
		  		<div class="btn-group">
		  			<a href="?t=all" class="btn btn-<?=($type=='all' || $type=='')?'primary':'default';?>">All</a>
		  			<a href="?t=aktif" class="btn btn-<?=($type=='aktif')?'primary':'default';?>">Aktif</a>
		  			<a href="?t=nonaktif" class="btn btn-<?=($type=='nonaktif')?'primary':'default';?>">Non Aktif</a>
		  			<a href="?t=trash" class="btn btn-<?=($type=='trash')?'primary':'default';?>">Trash</a>
		  		</div>
		  	</div>
		  	<script>
				/*$('#myStateButton').on('click', function () {
					$(this).button('complete') // button text will be "finished!"
				})*/
				</script>
		  	<div class="col-md-6" style="margin-bottom:20px">
					<form class="form-inline" method="GET">
						<div class="form-group">
						  <label for="exampleInputName2">Filter :</label>
						  <?php 
						  	if(isset($users)){
						  		foreach($users as $user){
						  			$user_list[$user->ID]=explode('@',$user->user_email)[0];
						  		}
						  	}
						  	echo form_dropdown('user',$user_list,isset($_GET['user'])?$_GET['user']:'','class="form-control"');?>
						</div>
						<!--div class="form-group">
						  <label for="exampleInputName2"></label>
						  <?php echo form_dropdown('type',[''=>'type','1'=>'aktif','0'=>'trash'],isset($_GET['type'])?$_GET['type']:'','class="form-control"');?>
						</div-->
						<div class="form-group">
						  <?php 
						  if(isset($cats)){//print_r($cats);
						  	$kategori['']='kategori';
						  	foreach($cats as $cat){
						  		$slug=strtolower(str_replace(' ','-',$cat->name));
						  		$kategori[$slug]=$cat->name;
						  	}
						  }
						  echo form_dropdown('cat',$kategori,isset($_GET['cat'])?$_GET['cat']:'','class="form-control"');?>
						</div>
						<div class="form-group">
							
						</div>
						<button type="submit" class="btn btn-default">Filter</button>
					</form>		  		
		  	</div> <!--col-md-6-->
		    <table class="table table-bordered">
		    	<tr>
		    		<th class="hidden-xs">#</th>
		    		<th class="hidden-xs">User</th>
		    		<th class="hidden-xs">Kategori</th>
		    		<th class="hidden-xs">Kode</th>
		    		<th class="hidden-xs">Nama</th>
		    		<th valign="left" class="hidden-xs">Harga</th>
		    		<th class="hidden-xs">
		    			<?=anchor(ADMIN_SOFTWARE.'/products?addnew','Add New',
		    				'class="btn btn-xs btn-primary pull-right"')?>
		    		</th>
		    	</tr>
		    	<?php 
		    	if(isset($products)){
		    		$no=1;
			    	foreach($products as $product){
			    	?>
			    	<tr>
			    		<td class="hidden-xs"><?=$no?></td>
			    		<td class="hidden-xs">
			    			<?=anchor(ADMIN_SOFTWARE.'/users?detail&id='.$product->id_user,
			    				explode('@',$product->user_email)[0])?>
			    		</td>
			    		<td class="hidden-xs">
			    			<?=$product->kategori?>
			    		</td>
			    		<td class="hidden-xs">
			    			<?=$product->kode_produk?>
			    		</td>
			    		<td>
			    			<div class="panel-default">
							  <div class="panel-heading kode-produk show-xs hidden-md hidden-lg">
							  	<i><?=$product->kode_produk?></i>
							  	<i class="pull-right"><?=$product->kategori?></i>
							  </div>
							  <div class="panel-body">
							    <?=anchor(ADMIN_SOFTWARE.'/products?detail&id='.$product->ID,$product->nama_produk)?>
							  </div>
							  <div class="panel-body kode-produk show-xs hidden-md hidden-lg">
								  <div class="col-xs-6">
								  	<i>publisher: admin</i>
								  </div>
								  <div class="col-xs-6">
								  	<a href="" class="btn btn-default btn-xs" title=""> 
					    				<i class="glyphicon glyphicon-eye-open"></i>
					    				<span class="hidden-xs">Preview</span>
					    			</a>
					    			<a href="" class="btn btn-warning btn-xs"> 
					    				<i class="glyphicon glyphicon-pencil"></i>
					    				<span class="hidden-xs">Edit</span>
					    			</a>
					    			<?php
					    			if($product->status == 1){
					    				echo '<a href="#" class="btn btn-danger btn-xs" title="Trash" onclick="trash_product('.$product->ID.')" style="margin-top:2px"> <i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Trash</span></a>';
					    			}else{
					    				echo ' <a href="'.site_url(ADMIN_SOFTWARE.'/products?activate&id='.$product->ID).'" class="btn btn-primary btn-xs" style="margin-top:2px" title="Aktifkan"> <i class="glyphicon glyphicon-floppy-saved"></i> <span class="hidden-xs">Aktifkan</span></a> ';
					    				echo '<a href="'.site_url(ADMIN_SOFTWARE.'/products?delete&id='.$product->ID).'" style="margin-top:2px" class="btn btn-danger btn-xs" title="Delete"> <i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Delete</span></a>';
					    			}
					    			?>
								  </div>
							  	
							  </div>
							</div>
			    		</td>
			    		<td style="text-align:right;" class="hidden-xs">
			    			<?=str_replace(',','.',number_format($product->harga_jual))?>
			    		</td>
			    		<td style="text-align:right" class="hidden-xs">
			    			<a href="" class="btn btn-default btn-xs" title=""> 
			    				<i class="glyphicon glyphicon-eye-open"></i>
			    				<span class="hidden-xs">Preview</span>
			    			</a>
			    			<a href="" class="btn btn-warning btn-xs"> 
			    				<i class="glyphicon glyphicon-pencil"></i>
			    				<span class="hidden-xs">Edit</span>
			    			</a>
			    			<?php
			    			if($product->status == 1){
			    				echo '<a href="#" class="btn btn-danger btn-xs" title="Trash" onclick="trash_product('.$product->ID.')" style="margin-top:2px"> <i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Trash</span></a>';
			    			}else{
			    				echo ' <a href="'.site_url(ADMIN_SOFTWARE.'/products?activate&id='.$product->ID).'" class="btn btn-primary btn-xs" style="margin-top:2px" title="Aktifkan"> <i class="glyphicon glyphicon-floppy-saved"></i> <span class="hidden-xs">Aktifkan</span></a> ';
			    				echo '<a href="'.site_url(ADMIN_SOFTWARE.'/products?delete&id='.$product->ID).'" style="margin-top:2px" class="btn btn-danger btn-xs" title="Delete"> <i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">Delete</span></a>';
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
