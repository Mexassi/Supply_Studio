<div class="mioMargin">
	<p class="position">All the fields are required</p>
	<?php
		$form_attribute = array('class' => 'form-login', 'role' => 'form', 'style' => 'z-index:-1;');
			echo form_open('registerValidation', $form_attribute);

			$companyEmail = array('class' => 'form-control',
			 			   'name' => 'companyEmail', 
			 			   'type' => 'email', 
			 			   'placeholder' => 'Company email', 
			 			   'required' => 'true'
			 			   );

			echo form_input($companyEmail, $this->input->post('companyEmail'));
			echo form_error('companyEmail', '<p class="mioError">', '</p>');

			$phoneNo = array('class' => 'form-control', 
							  'name' => 'phoneNo', 
							  'type' => 'number', 
							  'placeholder' => 'Phone no', 
							  'required' => 'true'
							  );

			echo form_input($phoneNo, $this->input->post('phoneNo'));
			echo form_error('phoneNo', '<p class="mioError">', '</p>');

			$companyName = array('class' => 'form-control', 
							     'name' => 'companyName', 
							     'type' => 'text', 
							     'placeholder' => 'Company name', 
							     'required' => 'true'
							     );

			echo form_input($companyName, $this->input->post('companyName'));
			echo form_error('companyName', '<p class="mioError">', '</p>');

			$companyStreetName = array('class' => 'form-control', 
									   'name' => 'companyStreetName', 
									   'type' => 'text', 
									   'placeholder' => 'Company street name', 
									   'required' => 'true'
									   );

			echo form_input($companyStreetName, $this->input->post('companyStreetName'));
			echo form_error('companyStreetName', '<p class="mioError">', '</p>');

			$companyStreetNo = array('class' => 'form-control',
									 'name' => 'companyStreetNo', 
									 'type' => 'number', 
									 'placeholder' => 'Company street no', 
									 'required' => 'true'
									 );

			echo form_input($companyStreetNo, $this->input->post('companyStreetNo'));
			echo form_error('companyStreetNo', '<p class="mioError">', '</p>');

			$companySuburb = array('class' => 'form-control', 
								   'name' => 'companySuburb', 
								   'type' => 'text', 
								   'placeholder' => 'Company suburb', 
								   'required' => 'true'
								   );

			echo form_input($companySuburb, $this->input->post('companySuburb'));
			echo form_error('companySuburb', '<p class="mioError">', '</p>');

			$companyPostCode = array('class' => 'form-control',
									 'name' => 'companyPostCode', 
									 'type' => 'number', 
									 'placeholder' => 'Company post code', 
									 'required' => 'true'
									 );

			echo form_input($companyPostCode, $this->input->post('companyPostCode'));
			echo form_error('companyPostCode', '<p class="mioError">', '</p>');

			$options = array('' => 'select',
							 'nsw' => 'NSW',
							 'act' => 'ACT',
							 'vic' => 'VIC',
							 'qsl' => 'QSL',
							 'sa' => 'SA',
							 'we' => 'WE',
							 'nt' => 'NT',
							 'taz' => 'TAZ');

			$optionAttribute = 'class = "input-lg"';
			echo form_dropdown('state', $options, '', $optionAttribute);
			echo form_error('state', '<p class="mioError">', '</p>');

			$password = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password', 'required' => 'true'
				);
			echo form_password($password);
			echo form_error('password', '<p class="mioError">', '</p>');

			$repeatPassword = array('class' => 'form-control', 'name' => 'repeatPassword', 'placeholder' => 'Repeat password', 'required' => 'true'
				);
			echo form_password($repeatPassword);
			echo form_error('repeatPassword', '<p class="mioError">', '</p>');
				
			$submit = array('class' => 'btn btn-lg btn-primary btn-block', 'value' => 'Register');
			echo form_submit($submit);
			echo form_close();
	?>
	<p class="position">Click <a href="index">here</a> to login</p>
</div>