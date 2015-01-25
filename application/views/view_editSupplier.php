<div class="mioMargin container">
	<div class="margin-sm-v">
		<div class="text-center">Currently editing:</div>
		<h1 class="text-center h2"><?= stripslashes($supplierName) ?></h3>
	</div>

	<?php
		$supplierName = array('class' => 'form-control', 'name' => 'supplierName', 'type' => 'hidden', 'value' => $this->input->post('supplierName'));
		$supplierEmail = array(
			'class' => 'form-control',
			'name' => 'supplier_email',
			'type' => 'text',
			'placeholder' => 'Contact Email'
		);
		$supplierPhoneNo = array('class' => 'form-control', 'name' => 'phone_no', 'type' => 'number', 'placeholder' => 'Phone Number');
		$password = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Your Account Password', 'required' => 'true');
		$submit = array('class' => 'btn btn-lg btn-primary btn-block', 'value' => 'Update');
		$formDelete = array('class' => 'form-login', 'role' => 'form');
		$submitDelete = array('class' => 'btn btn-lg btn-danger btn-block', 'value' => 'Delete');
	?>

	<?= form_open('editSuppValidation', array('class' => 'form-login', 'role' => 'form')) ?>

	<?= form_input($supplierName) ?>
	<div class="form-group">
		<?= form_input($supplierEmail, $this->input->post('supplierEmail')) ?>
		<?= form_error('supplier_email', '<p class="mioError">', '</p>') ?>
	</div>
	<div class="form-group">
		<?= form_input($supplierPhoneNo, $this->input->post('supplierPhoneNo')) ?>
		<?= form_error('phone_no', '<p class="mioError">', '</p>') ?>
	</div>
	<div class="form-group">
		<?= form_password($password, $this->input->post('password')) ?>
		<?= form_error('password', '<p class="mioError">', '</p>') ?>
	</div>
	<?= form_submit($submit) ?>
	<?= form_close() ?>

	<?php
		echo form_open('deleteSupplier', array('class' => 'form-login form', 'role' => 'form'));
		$submitDelete = array('class' => 'btn btn-sm btn-danger btn-block', 'value' => 'Delete');
	?>

	<?= form_input($supplierName) ?>
	<div class="form-group margin-sm-v">
		<?= form_submit($submitDelete) ?>
	</div>
	<?= form_close() ?>
</div>
