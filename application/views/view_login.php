<section class="login">
	<img class="register-logo" src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo">
	<div class="register-wrapper container">
		<h1 class="text-center">Login</h1>
		<?php
			$form = array('class' => 'form-login', 'role' => 'form');
			echo form_open('loginValidation', $form);
			echo validation_errors('<p class="mioError">', '</p>');
		?>
		<div class="form-group">
		<?php
			$email = array('class' => 'form-control input-lg', 'name' => 'email', 'type' => 'email', 'placeholder' => 'Email', 'required' => 'true');
			echo form_input($email, $this->input->post('email'));
		?>
		</div>
		<div class="form-group">
		<?php
			$password = array('class' => 'form-control input-lg', 'name' => 'password', 'placeholder' => 'Password');
			echo form_password($password);
		?>
		</div>
		<?php
			$submit_attribute = array('class' => 'btn btn-lg btn-primary btn-block', 'value' => 'Login');
			echo form_submit($submit_attribute);
			echo form_close();
		?>
		<div class="text-right margin-sm-v">
			<a href="registrationUser" class="btn btn-default btn-sm">Register</a>
			<a href="registrationUser" class="btn btn-default btn-sm">Forgot Password</a>
		</div>
	</div>
</section>
