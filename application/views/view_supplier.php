<div class="container">
	<button data-toggle="modal" data-target="#addSupplierModal" class="btn btn-primary btn-block btn-add">New <svg class="icon icon-xs icon-plus"><use xlink:href="#icon-plus"></use></svg></button>
	<div class="table-responsive">
		<table id="suppliersTable" class="table-order table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Supplier</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Orders Made</th>
					<th>Total Paid</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody id="suppliersTableContent" class="suppliers-table-content">
				<?php $i = 1; ?>
				<?php foreach ($supplierList as $supplier): ?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= stripslashes($supplier['supplier_name']) ?></td>
						<td><?= $supplier['supplier_email'] ?></td>
						<td><?= $supplier['phone_no'] ?></td>
						<td></td>
						<td><?= /*$supplier['supplierPaidAmount']*/ "" ?></td>
						<td>
							<?php
								echo form_open('editSupplier');
								$supplierName = array('name' => 'supplierName', 'type' => 'hidden', 'value' => $supplier['supplier_name']);
								echo form_input($supplierName);
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
