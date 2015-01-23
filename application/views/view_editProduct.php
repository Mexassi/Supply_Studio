<div class="mioMargin container">
	<div class="margin-sm-v">
		<div class="text-center">Currently editing:</div>
		<h1 class="text-center h2"><?php echo stripslashes($productName)." "; ?></h1>
	</div>
	<?php
		$productName = array('name' => 'productName', 'type' => 'hidden', 'value' => $productName);
		$productPrice = array('class' => 'form-control', 'name' => 'productPrice', 'type' => 'text', 'placeholder' => 'Price');
		$productDescription = array('class' => 'form-control', 'name' => 'productDescription', 'type' => 'number', 'placeholder' => 'Description');
		$password = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Your Account Password', 'required' => 'true');
		$submit = array('class' => 'btn btn-lg btn-primary btn-block', 'value' => 'Update');
	?>

	<?= form_open('editProdValidation', array('class' => 'form-login', 'role' => 'form')) ?>

	<?= form_input($productName) ?>

	<div class="form-group">
		<?= form_input($productPrice, $this->input->post('productPrice')) ?>
		<?= form_error('productPrice', '<p class="mioError">', '</p>') ?>
	</div>
	<div class="form-group">
		<?= form_textarea($productDescription, $this->input->post('productDescription')) ?>
		<?= form_error('supplierPhoneNo', '<p class="mioError">', '</p>') ?>
	</div>
	<div class="form-group">
		<?= form_password($password, $this->input->post('password')) ?>
		<?= form_error('password', '<p class="mioError">', '</p>') ?>
	</div>

	<?= form_submit($submit) ?>
	<?= form_close() ?>

	<?php $submitDelete = array('class' => 'btn btn-sm btn-danger btn-block margin-sm-v', 'value' => 'Delete'); ?>
	<?= form_open('deleteProduct', array('class' => 'form-login', 'role' => 'form')); ?>
	<?= form_input($productName) ?>
	<?= form_submit($submitDelete) ?>
	<?= form_close() ?>
</div>
