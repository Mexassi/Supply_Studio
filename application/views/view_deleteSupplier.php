<div class="mioMargin">
	<p class="position">Do you really want to delete</p>
	<h3 class="position"><?php echo stripslashes($supplierName)." "; ?></h3>
	<p class="position">from your list?</p>
	<?php
		$form = array('class' => 'form-login', 'role' => 'form');
		echo form_open('deleteSuppValidation', $form);
		
		$supplierName = array('name' => 'supplierName', 'type' => 'hidden', 'value' => $supplierName);
		echo form_input($supplierName);

		$password = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password', 'required' => 'true');
		echo form_password($password, $this->input->post('password'));
		echo form_error('password', '<p class="mioError">', '</p>');

		$submit = array('class' => 'btn btn-lg btn-danger btn-block', 'value' => 'Delete');
		echo form_submit($submit);
		echo form_close();
	?>
</div>

