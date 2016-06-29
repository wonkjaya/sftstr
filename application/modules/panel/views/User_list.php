	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading">Data User 
		  <div class="pull-right"><?=anchor(ADMIN_SOFTWARE.'/users?add_new','Add New')?></div>
		  </div>
		  <div class="panel-body">
		  	<div class="col-md-12" style="margin-bottom:20px">
				<form class="form-inline" method="GET">
				  <div class="form-group">
				    <label for="exampleInputName2"></label>
				    <?php echo form_dropdown('type',[''=>'type','1'=>'aktif','0'=>'nonaktif','2'=>'trash'],isset($_GET['type'])?$_GET['type']:'','class="form-control"');?>
				  </div>
				  <div class="form-group">
				  	
				  </div>
				  <button type="submit" class="btn btn-default">Filter</button>
				</form>		  		
		  	</div>
		    <table class="table table-bordered">
		    	<tr>
		    		<th>#</th>
		    		<th>Tanggal</th>
		    		<th>Email</th>
		    		<th>Nama Lengkap</th>
		    		<th>Nomor Telp</th>
		    		<th>*</th>
		    	</tr>
		    	<?php 
		    	if(isset($users)){
		    		$no=1;
			    	foreach($users as $user){
			    	?>
			    	<tr>
			    		<td><?=$no?></td>
			    		<td><?=$user->user_registered_date?></td>
			    		<td><?=anchor(ADMIN_SOFTWARE.'/users?detail&id='.$user->ID,$user->user_email)?></td>
			    		<td><?=$user->nama_lengkap?></td>
			    		<td><?=anchor(ADMIN_SOFTWARE.'/users?detail&id='.$user->ID,$user->nomor_telp)?></td>
			    		<td style="text-align:right">
			    			<!--a href="" class="btn btn-default btn-xs" title=""> <span class="glyphicon glyphicon-eye-open"></span></a>
			    			<a href="" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-pencil"></span></a-->
			    			<?php
			    			if($user->user_status == 1){
			    				echo '<a href="#" class="btn btn-warning btn-xs" title="Trash" onclick="trash_user('.$user->ID.')"> <span class="glyphicon glyphicon-trash"></span> Trash</a>';
			    			}else{
			    				echo '<a href="'.site_url(ADMIN_SOFTWARE.'/users?delete&id='.$user->ID).'" class="btn btn-danger btn-xs" title="Delete"> <span class="glyphicon glyphicon-trash"></span> Delete</a>';
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
		    	function trash_user(id){
		    		var conf=confirm('Hapus?');
		    		if(conf === true && id > 0){
		    			document.location="<?=site_url(ADMIN_SOFTWARE.'/users?trash&id=')?>" + id;
		    		}
		    	}
		    </script>
		  </div>
		</div>
	</div>
