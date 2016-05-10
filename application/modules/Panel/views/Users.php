<?php
$title=(isset($_GET['aktif']))?'Data User':'User Trash';
$panel_class=(isset($_GET['aktif']))?'primary':'danger';
?>
	<div class="col-md-12">
		<div class="panel panel-<?=$panel_class?>">
		  <div class="panel-heading"><?=$title?> <?=(isset($_GET['aktif']))?'<a href="?addnew" class="" style="float:right;color:#fff">Add New</a>':''?></div>
		  <div class="panel-body">
		    <table class="table table-bordered table-hover">
		    	<tr>
		    		<th>#</th>
		    		<th>Email</th>
		    		<th class="hidden-sm">Registered</th>
		    		<th>Nama</th>
		    		<th class="hidden-xs hidden-sm">Nomor telp</th>
		    		<th>Level</th>
		    		<th>*</th>
		    	</tr>
		    	<?php 
		    	if(isset($users)){
		    		$no=1;
			    	foreach($users as $user){
			    	?>
			    	<tr>
			    		<td><?=$no?></td>
			    		<td><?=anchor('users/?detail&id='.$user->ID,$user->user_email)?></td>
			    		<td class="hidden-sm"><?=$user->user_registered_date?></td>
			    		<td><?=$user->nama_lengkap?></td>
			    		<td class="hidden-xs hidden-sm"><?=str_replace('0','+62',substr($user->nomor_telp,0,1)).str_replace(',','-',number_format($user->nomor_telp))?></td>
			    		<td><?=ts_get_user_level($user->user_level)?></td>
			    		<td style="text-align:right">
			    			<a href="<?=site_url('users/?detail&id='.$user->ID)?>" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-eye-open" title="Detail"></span></a>
			    			<?=(isset($_GET['nonaktif']))?'<a href="'.site_url('users/?restore&id='.$user->ID).'" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-refresh" title="Restore"></span></a>':''?>
			    			<a href="<?=site_url('users/?trash&id='.$user->ID)?>" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash" title="Delete"></span></a>
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
		  </div>
		</div>
	</div>
