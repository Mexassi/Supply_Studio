<div class="mioMargin">
	<br>
	<p class="position">Please enter your email address</p>
	<?php
		$form = array('class' => 'form-login', 'role' => 'form');
		echo form_open('forgotValidation', $form);
		echo validation_errors('<p class="mioError">', '</p>');
		$email = array('class' => 'form-control', 'name' => 'email', 'type' => 'email', 'placeholder' => 'Email', 'required' => 'true');
		echo form_input($email);

		$submit_attribute = array('class' => 'btn btn-lg btn-primary btn-block', 'value' => 'Reset');
		echo form_submit($submit_attribute);
		echo form_close();
	?>
	<br>
	<p class="position">Click <a href="index">here</a> to login</p>
</div>