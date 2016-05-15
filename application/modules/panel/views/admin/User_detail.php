<?php
$status='empty';
if(isset($user)){
	if($user != false){
		foreach ($user as $u) {
			$ID=$u->ID;
			$ktp=$u->id_ktp;
			$email=$u->email;
			$nama=$u->nama_lengkap;
			$alamat=$u->alamat;
			$jenis_kelamin=$u->jenis_kelamin;
			$nomor_telp=$u->nomor_telp;
			$dibuat=$u->dibuat;
			$level=$u->level;
			$status=$u->user_status;
		}
	}
}
$title=(isset($_GET['addnew']))?'New User':(isset($_GET['detail'])?'Detail User':'Title');
$type=isset($_GET['addnew'])?'addnew':(isset($_GET['detail'])?'update':'');
$id=isset($_GET['id'])?'&id='.$_GET['id']:'';
$panel_class=function($status=''){
					return ($status == 1 || $status=='')?'primary':'danger';
				}
?>

	<div class="col-md-12">
		<div class="panel panel-<?=$panel_class(isset($status)?$status:'')?>">
		  <div class="panel-heading"><?=$title?></div>
		  <div class="panel-body">
			  <form id="form" method="POST" action="?<?=$type.$id?>">
			   <div class="col-md-6">
			    <table class="table">
				    	<tr>
				    		<th id="no-border" width="150px">Level</th>
				    		<td id="no-border"><?=form_level((isset($level))?$level:'')?></td>
				    		<th id="no-border" id=""></th>
				    	</tr>
				    	<tr>
				    		<th id="no-border">No KTP</th>
				    		<td id="no-border"><?=form_input('noktp',(isset($ktp))?$ktp:'','class="form-control"')?></td>
				    		<th id="no-border" id=""></th>
				    	</tr>
				    	<tr>
				    		<th id="no-border">Email</th>
				    		<td id="no-border"><?=form_input('email',(isset($email))?$email:'','class="form-control"')?></td>
				    		<th id="no-border" id=""></th>
				    	</tr>
				    	<tr>
				    		<th id="no-border">Nama</th>
				    		<td id="no-border"><?=form_input('nama',(isset($nama))?$nama:'','class="form-control"')?></td>
				    		<th id="no-border" id=""></th>
				    	</tr>
				    	<tr>
				    		<th id="no-border">Nomor Telp</th>
				    		<td id="no-border"><?=form_input('notelp',(isset($nomor_telp))?$nomor_telp:'','class="form-control"')?></td>
				    		<th id="no-border" id=""></th>
				    	</tr>
			    </table>
			   </div>
			   <div class="col-md-6">
			    <table class="table">
				    	<?php
				    	if(!isset($_GET['addnew'])){
				    		?>
					    	<tr>
					    		<th id="no-border">Dibuat </th>
					    		<td id="no-border"><?=(isset($dibuat))?$dibuat:''?></td>
					    		<th id="no-border" id=""></th>
					    	</tr>
				    		<?php
				    	}
				    	?>
				    	<tr>
				    		<th id="no-border">Alamat</th>
				    		<td id="no-border"><?=form_textarea('alamat',(isset($alamat))?$alamat:'','class="form-control" style="height:100px;"')?></td>
				    		<th id="no-border" id=""></th>
				    	</tr>
				    	<tr>
				    		<th id="no-border">Jenis Kelamin</th>
				    		<td id="no-border"><?php form_gender((isset($jenis_kelamin))?$jenis_kelamin:0)?></td>
				    		<th id="no-border" id=""></th>
				    	</tr>
				    	<tr>
				    		<th id="no-border">Password</th>
				    		<td id="no-border" colspan="2"><?=form_input(['type'=>'Password','id'=>'password','name'=>'password','placeholder'=>'Password','autocomplete'=>'off','class'=>'form-control'])?></td>
				    	</tr>
				    	<tr>
				    		<th id="no-border">Kofirmasi Pass</th>
				    		<td id="no-border" colspan="2"><?=form_input(['type'=>'Password','id'=>'conPassword','placeholder'=>'Konformasi Password','class'=>'form-control'])?></td>
				    	</tr>
			    	<tr>
			    		<th id="no-border"></th>
			    		<td id="no-border" colspan="2">
			    		<?php
			    		$delete=($status==1)?site_url('users?trash&'.$id):site_url('users?delete&id='.$id);
			    		?>
				    		<script type="text/javascript">
				    		function permanen_delete(){
				    			var url="<?=$delete?>";
				    			var conf=confirm('Hapus Permanen?');
				    			if(conf === true){
				    				document.location=url;
				    			}
				    		}
				    		</script>
				    		<div class="btn-group" style="float:right;margin-right:50px">
				    			<a class="btn btn-danger" href="#" onclick="permanen_delete();">Trash</a>
				    			<a class="btn btn-warning" href="#" onclick="history.back();">Back</a>
				    		</div>
			    			<div class="btn-group">
				    			<?=($status==0 && $status !== 'empty')?'<a class="btn btn-default btn-xs" href="'.site_url('users?restore&id='.$id).'">Pulihkan</a>':''?>
				    			<button class="btn btn-primary" onclick="document.getElementById('form').submit();">Simpan</button>
				    		</div>
			    		</td>
			    	</tr>
			    </table>
			   </div>
			  </form>
		  </div>
		</div>
	</div>
