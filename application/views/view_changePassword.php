<div class="mioMargin">
		<form class="form-login" role="form" method="post" action="validateChangePasswd" style="z-index:-1;">
			<p class="position">Reset your password</p>
			<input type="password" class="form-control" placeholder="Old password" name="oldPassword" required autofocus>
			<?php echo form_error('oldPassword', '<p class="mioError">', '</p>');?>
			<input type="password" class="form-control" placeholder="New password" name="newPassword" required>
			<?php echo form_error('newPassword', '<p class="mioError">', '</p>');?>
			<input type="password" class="form-control" placeholder="Repeat New password" name="repeatNewPassword" required>
			<?php echo form_error('repeatNewPassword', '<p class="mioError">', '</p>');?>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Change it</button>
		</form>
	</div>