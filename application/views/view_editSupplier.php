<div class="mioMargin container">
	<p class="position">You are currently editing</p>
	<h3 class="position"><?php echo stripslashes($supplierName)." "; ?></h3>
	<p class="position">from your supplier list</p>
	<?php
		$form = array('class' => 'form-login', 'role' => 'form');
		echo form_open('editSuppValidation', $form);
		
		$supplierName = array('name' => 'supplierName', 'type' => 'hidden', 'value' => $supplierName);
		echo form_input($supplierName);

		$supplierEmail = array('class' => 'form-control', 'name' => 'supplierEmail', 'type' => 'text', 'placeholder' => 'Supplier  email');
		echo form_input($supplierEmail, $this->input->post('supplierEmail'));
		echo form_error('supplierEmail', '<p class="mioError">', '</p>');

		$supplierPhoneNo = array('class' => 'form-control', 'name' => 'supplierPhoneNo', 'type' => 'number', 'placeholder' => 'Supplier Phone no');
		echo form_input($supplierPhoneNo, $this->input->post('supplierPhoneNo'));
		echo form_error('supplierPhoneNo', '<p class="mioError">', '</p>');

		$password = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password', 'required' => 'true');
		echo form_password($password, $this->input->post('password'));
		echo form_error('password', '<p class="mioError">', '</p>');

		$submit = array('class' => 'btn btn-lg btn-success btn-block', 'value' => 'Update');
		echo form_submit($submit);
		echo form_close();

		$formDelete = array('class' => 'form-login', 'role' => 'form');
		echo form_open('deleteSupplier', $form);

		//$supplierName = array('name' => 'supplierName', 'type' => 'hidden', 'value' => $supplierName);
		echo form_input($supplierName);

		$submitDelete = array('class' => 'btn btn-lg btn-danger btn-block', 'value' => 'Delete');
		echo form_submit($submitDelete);
		echo form_close();
	?>
</div>
