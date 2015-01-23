<br>
	<p class="mioInfo mioMargin">Manage your orders using MioSystem,</p>
	<p class="mioInfo">a smart way to place your big orders!</p>
	<div>
		<p class="position">Get started and <a href="registrationUser">register</a>! It's quick and easy!</p>
			<?php
				$form = array('class' => 'form-login', 'role' => 'form');
				echo form_open('loginValidation', $form);
				echo validation_errors('<p class="mioError">', '</p>');
				$email = array('class' => 'form-control', 'name' => 'email', 'type' => 'email', 'placeholder' => 'Email', 'required' => 'true');
				echo form_input($email, $this->input->post('email'));

				$password = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password');
				echo form_password($password);
				
				$submit_attribute = array('class' => 'btn btn-lg btn-primary btn-block', 'value' => 'Login');
				echo form_submit($submit_attribute);
				echo form_close();
			?>
		<p class="position">Have you <a href="forgotPassword">forgot your password</a>?</p>
	</div>