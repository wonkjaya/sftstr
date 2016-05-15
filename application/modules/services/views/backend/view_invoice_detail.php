<!doctype html>
<html>
	<?php
	$data=(object) array('mode'=>'admin','title'=>'Detail Invoice');
	get_head($data);
	?>
	<?php $this->load->view('backend/admin_menu')?>
	<div class="container">
		<!-- dalam div row harus ada col yang maksimum nilainya 12 -->
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			
                <h3>Items Ordered in Invoice #<?=$invoice->id?></h3>
				<table id="myTable" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Product ID</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                            $total = 0;
                            foreach($orders as $order) : 
                            $subtotal = $order->qty * $order->price;
                            $total += $subtotal;
                        ?>
						<tr>
							<td><?=$order->product_id?></td>
							<td><?=$order->product_name?></td>
							<td class="text-right"><?=$order->qty?></td>
							<td class="text-right"><?=str_replace(',','.',number_format($order->price))?></td>
							<td class="text-right"><?=str_replace(',','.',number_format($subtotal))?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="right">Total</td>
                            <td class="text-right"><?=str_replace(',','.',number_format($total))?></td>
                        </tr>
                    </tfoot>
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
