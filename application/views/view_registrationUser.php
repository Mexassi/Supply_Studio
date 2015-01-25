<?php
	$form_attribute = array(
		'class' => 'form-login form-horizontal',
		'role' => 'form',
		'name' => 'register',
		'method' => 'POST'
	);
	$email = array(
		'class' => 'form-control input-lg',
		'name' => 'email',
		'type' => 'email',
		'placeholder' => 'Your Personal Email',
		'required' => 'true'
	);
	$password = array(
		'class' => 'form-control input-lg',
		'name' => 'password',
		'placeholder' => 'Password',
		'required' => 'true'
	);
	$submit = array(
		'class' => 'btn btn-lg btn-primary btn-block',
		'value' => 'Register'
	);
?>

<section class="register">
	<img class="register-logo" src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo">
	<div class="register-wrapper container">
		<h1 class="text-center">Sign up for Supply Studio</h1>

		<?= form_open('registerValidation', $form_attribute) ?>
			<div class="form-group">
				<div class="col-sm-6"><?= form_input($email) ?></div>
				<div class="col-sm-6"><?= form_password($password) ?></div>
				<p class="col-sm-12"><em>You can set up your company details or your additional personal details later.</em></p>
				<?= form_error('email', '<p class="mioError">', '</p>') ?>
				<?= form_error('password', '<p class="mioError">', '</p>') ?>
			</div>
			<fieldset>
				<legend>Your First Business</legend>
				<div class="form-group">
					<div class="col-sm-6"><input type="text" name="businessName" class="form-control input-lg" placeholder="Business Name" /></div>
					<div class="col-sm-6"><input type="tel" name="businessPhone" class="form-control input-lg" placeholder="Business Phone Number" /></div>
				</div>
				<?= form_error('businessName', '<p class="mioError">', '</p>') ?>
				<?= form_error('businessPhone', '<p class="mioError">', '</p>') ?>
				<div class="form-group">
					<p>Choose a plan:</p>
					<label class="register-plan col-sm-6 col-md-3">
						<input class="register-plan-radio" name="planType" type="radio" value="free" checked="true">
						<div class="register-plan-wrapper text-center">
							<div class="register-plan-name">Free</div>
							<div class="register-plan-price">$0</div>
							<ul class="register-plan-info">
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
							</ul>
						</div>
					</label>
					<label class="register-plan col-sm-6 col-md-3">
						<input class="register-plan-radio" name="planType" type="radio" value="micro">
						<div class="register-plan-wrapper text-center">
							<div class="register-plan-name">Micro</div>
							<div class="register-plan-price">$2/month</div>
							<ul class="register-plan-info">
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
							</ul>
						</div>
					</label>
					<label class="register-plan col-sm-6 col-md-3">
						<input class="register-plan-radio" name="planType" type="radio" value="basic">
						<div class="register-plan-wrapper text-center">
							<div class="register-plan-name">Basic</div>
							<div class="register-plan-price">$5/month</div>
							<ul class="register-plan-info">
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
							</ul>
						</div>
					</label>
					<label class="register-plan col-sm-6 col-md-3">
						<input class="register-plan-radio" name="planType" type="radio" value="pro">
						<div class="register-plan-wrapper text-center">
							<div class="register-plan-name">Pro</div>
							<div class="register-plan-price">$9/month</div>
							<ul class="register-plan-info">
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
								<li>Lorem Ipsum dolor sit</li>
							</ul>
						</div>
					</label>
				</div>
			</fieldset>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Register!</button>
		</form>
	</div>
</section>
