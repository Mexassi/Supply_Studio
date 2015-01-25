<div class="container">
	<button data-toggle="modal" data-target="#addProductModal" class="btn btn-primary btn-block btn-add">New <svg class="icon icon-xs icon-plus"><use xlink:href="#icon-plus"></use></svg></button>
	<div class="table-responsive">
		<table id="productsTable" class="table-order table table-hover">
			<colgroup></colgroup>
			<colgroup></colgroup>
			<colgroup></colgroup>
			<colgroup></colgroup>
			<colgroup></colgroup>
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Price</th>
					<th>Supplier</th>
					<th>Last Order</th>
					<th>Total Ordered</th>
					<th>Total Paid</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody id="productsTableContent" class="products-table-content">
			<?php $i = 1; ?>
			<?php foreach ($productList as $row): ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= stripslashes($row['product_name']) ?></td>
					<td><?= '$' . number_format($row['product_price'], 2) ?></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<?php
							// Edit form access
							echo form_open('editProduct');
							$productName = array('name' => 'productName', 'type' => 'hidden', 'value' => $row['product_name']);
							echo form_input($productName);
							$submit = array('class' => 'btn btn-xs btn-default', 'value' => 'Edit');
							echo form_submit($submit);
							echo form_close();
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
