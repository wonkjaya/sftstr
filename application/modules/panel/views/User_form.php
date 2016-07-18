<?php
if(isset($_GET['id']) and isset($_GET['detail'])) $this->session->set_flashdata('id_produk',$_GET['id']);
	$ID='';
	$email='';
	$register_date='';
	$lvl='';
	$ktp='';
	$nama_lengkap='';
	$alamat='';
	$jenis_kelamin='';
	$nomor_telp='';
	$password='';
	$profile_pic='';
	$status=1;

if(isset($user)){
	$url_action=ADMIN_SOFTWARE.'/users?update';
	foreach($user as $usr){
		if($i=1){
		//print_r($usr);
			$ID=$usr->ID;
			$email=$usr->email;
			$register_date=$usr->dibuat;
			$lvl=$usr->level;
			$ktp=$usr->id_ktp;
			$nama_lengkap=$usr->nama_lengkap;
			$alamat=$usr->alamat;
			$jenis_kelamin=$usr->jenis_kelamin;
			$nomor_telp=$usr->nomor_telp;
			$password=$usr->user_pass;
			$profile_pic=$usr->profile_pic;
			$status=0;
		}
	}
	//print_r($meta);
}


$title=(isset($_GET['add_new']))?'User Baru':(isset($_GET['detail'])?'User Detail':'Title');
$type=isset($_GET['add_new'])?'add_new':(isset($_GET['detail'])?'update':'');
$id=isset($_GET['id'])?'&id='.$_GET['id']:'';
$button_trash=isset($_GET['detail'])?'<a href="'.site_url(ADMIN_SOFTWARE.'products?trash').'" class="btn btn-danger">Trash</a>':'';
$panel_class=function($status=''){
					return ($status == 1 || $status=='empty')?'primary':'danger';
			};
$target='?'.$type;
$button_submit_title=isset($_GET['add_new'])?'Save':(isset($_GET['detail'])?'Update':'');
$url=isset($url_action)?$url_action:$this->uri->uri_string().$target;
?>


	<div class="col-md-12">
		<div class="panel panel-<?=$panel_class(isset($status)?$status:'')?>">
		  <div class="panel-heading"><?=$title?></div>
		  <div class="panel-body">
		   <?php echo form_open_multipart($url); ?>
		    <div class="col-md-12"><?=(isset($_SESSION['insert_success']))?'Produk Berhasil Di input.':''?></div>
		    <div class="col-md-5">
		    <?php echo validation_errors(); ?>
		   		<table class="table">
		   			<tr>
		   				<th>Nama Lengkap</th>
		   				<td id="no-border"><?=form_input('nama_lengkap',$nama_lengkap,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Email</th>
		   				<td id="no-border"><?=form_input('email',$email,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>KTP</th>
		   				<td id="no-border"><?=form_input('ktp',$ktp,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Level</th>
		   				<td id="no-border"><?=form_level($lvl)?></td>
		   			</tr>
		   			<tr>
		   				<th>No Telp</th>
		   				<td id="no-border"><?=form_input('no_telp',$nomor_telp,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Jenis Kelamin</th>
		   				<td id="no-border"><?=form_dropdown('jenis_kelamin',['L'=>'Laki-Laki','P'=>'Perempuan'],$jenis_kelamin,'class="form-control"')?></td>
		   			</tr>
		   			<tr>
		   				<th>Password</th>
		   				<td id="no-border"><?=form_input('password','','class="form-control"')?>
		   				<p class="">kosongi jika tidak diubah</p>
		   				</td>
		   			</tr>
	   			</table>
   			</div>
   			<div class="col-md-5">
	   			<table class="table">
		   			<tr>
		   				<th>Alamat</th>
		   				<td id="no-border"><?=form_textarea('alamat',$alamat,'class="form-control" style="height:80px"')?></td>
		   			</tr>
		   			<tr>
		   				<th colspan=2>Profile Picture</th>
		   			</tr>
		   			<tr>
		   				<td id="no-border" colspan="2">
		   					<div class="img-rounded ts-image-profile">
		   						<img src="<?=!empty($profile_pic)?base_url('uploads/profile_pic/'.$profile_pic):base_url('assets/images/no-image.png')?>" width="150px" id="image_profile">
		   						<?=form_upload('image_profile','','class="ts-upload-picture"')?>
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
								$("[name='image_profile']").change(function(){
								    readURL(this);
								});

		   					</script>
		   				</td>
		   			</tr>
		   			<tr>
		   				<td></td>
		   				<td colspan="1" style="text-align:right">
		   					<input type="button" class="btn btn-danger" value="Batal" onclick="history.back()" />
		   					<input type="reset" class="btn btn-default" value="Reset" />
		   					<input type="submit" class="btn btn-primary" value="<?=$button_submit_title?>" />
		   				</td>
		   			</tr>
		   		</table>
		    </div>
		    
		   </form>
		  </div>
		</div>
	</div>
</div>