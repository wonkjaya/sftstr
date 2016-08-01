	<div class="col-md-6">
		<div class="panel panel-danger">
		  <div class="panel-heading">User Terbaru</div>
		  <div class="panel-body">
		    <table class="table">
		    	<tr>
		    		<th>No</th>
		    		<th>Email</th>
		    		<th>Level</th>
		    		<th>Dibuat</th>
		    		<th>#</th>
		    	</tr>
		    	
		    	<?php
		    	$no=1;
		    		if($userTerbaru):
		    			foreach($userTerbaru as $row){
		    				echo '<tr>';
		    				echo '<td>'.$no.'</td>';
		    				echo '<td>'.$row->email.'</td>';
		    				echo '<td>'.$row->level.'</td>';
		    				echo '<td>'.$row->created.'</td>';
		    				echo '<td>'.anchor('panel/software/edit_user/'.$row->ID,'Edit','class="btn btn-default btn-xs"').'</td>';
		    				$no++;
		    				echo '</tr>';
		    			}
		    		endif;
		    	?>
		    	<tr><td colspan="5"><?=anchor('panel/software/users','Lihat lebih banyak','class="btn-xs btn-warning"')?></td></tr>
		    	
		    </table>
		  </div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-primary">
		  <div class="panel-heading">Produk Terbaru</div>
		  <div class="panel-body">
		    <table class="table">
		    	<tr>
		    		<th>No</th>
		    		<th>Kode</th>
		    		<th>Nama</th>
		    		<th>Dibuat</th>
		    		<th>#</th>
		    	</tr>
		    	<?php
		    	$no=1;
		    		if($produkTerbaru)
		    			foreach($produkTerbaru as $row){
		    				echo '<tr>';
		    				echo '<td>'.$no.'</td>';
		    				echo '<td>'.$row->kode.'</td>';
		    				echo '<td>'.$row->nama.'</td>';
		    				echo '<td>'.$row->created.'</td>';
		    				echo '<td>'.anchor('panel/software/edit_user/'.$row->ID,'Edit','class="btn btn-default btn-xs"').'</td>';
		    				echo '</tr>';
		    				$no++;
		    			}
		    	?>
		    	<tr><td colspan="5"><?=anchor('panel/software/products','Lihat lebih banyak','class="btn-xs btn-warning"')?></td></tr>
		    </table>
		  </div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">Pembayaran Terbaru</div>
		  <div class="panel-body">
		    Panel content
		  </div>
		</div>
	</div>
