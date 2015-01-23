<div class="mioMargin container">
	<p class="position">You are currently editing</p>
	<h3 class="position"><?php echo stripslashes($productName)." "; ?></h3>
	<p class="position">from your product list</p>
	<?php
		$form = array('class' => 'form-login', 'role' => 'form');
		echo form_open('editProdValidation', $form);
		
		$productName = array('name' => 'productName', 'type' => 'hidden', 'value' => $productName);
		echo form_input($productName);

		$productPrice = array('class' => 'form-control', 'name' => 'productPrice', 'type' => 'text', 'placeholder' => 'Product price');
		echo form_input($productPrice, $this->input->post('productPrice'));
		echo form_error('productPrice', '<p class="mioError">', '</p>');

		$productDescription = array('class' => 'form-control', 'name' => 'productDescription', 'type' => 'number', 'placeholder' => 'Product description');
		echo form_textarea($productDescription, $this->input->post('productDescription'));
		echo form_error('supplierPhoneNo', '<p class="mioError">', '</p>');

		$password = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password', 'required' => 'true');
		echo form_password($password, $this->input->post('password'));
		echo form_error('password', '<p class="mioError">', '</p>');

		$submit = array('class' => 'btn btn-lg btn-success btn-block', 'value' => 'Update');
		echo form_submit($submit);
		echo form_close();

		$formDelete = array('class' => 'form-login', 'role' => 'form');
		echo form_open('deleteProduct', $form);

		//$supplierName = array('name' => 'supplierName', 'type' => 'hidden', 'value' => $supplierName);
		echo form_input($productName);

		$submitDelete = array('class' => 'btn btn-lg btn-danger btn-block', 'value' => 'Delete');
		echo form_submit($submitDelete);
		echo form_close();
	?>
</div>
