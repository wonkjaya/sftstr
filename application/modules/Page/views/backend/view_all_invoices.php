<!doctype html>
<html>
	<?php
	$data=(object) array('mode'=>'admin','title'=>'Invoice');
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
							<th>Invoice ID</th>
                            <th>Date</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($invoices as $invoice) : ?>
						<tr>
							<td><?=$invoice->id?></td>
							<td><?=$invoice->date?></td>
							<td><?=$invoice->due_date?></td>
							<td><?=$invoice->status?></td>
                            <td>
                                <?=anchor(	'admin/invoices/detail/' . $invoice->id, 
											'Details',
											['class'=>'btn btn-default btn-sm'])
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
