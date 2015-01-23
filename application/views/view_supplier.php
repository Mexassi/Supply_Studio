<div class="container mioMargin">
	<div class="jumbotron mioFont" >
		<h3 style="text-align:center;">Your Suppliers List</h3>
		<p class="mioCenter" style="font-size:13px;">Found <?php echo $suppNo;?> suppliers</p>
		<br>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<?php
						/*
						  For each field returned by the query a table header is echoed with a
						  link (called by the anchor method in the Codeigniter library). The link
						  reload the page sorting the data by asc the first time is clicked and then it
						  alternates the sorting
						*/
						  $data = array('class' => 'mioTbhead');
							foreach ($fields as $fieldsName => $field){
								if($sortBy == $fieldsName){
									$tHeaderOpen = "<th class='sort".$sortOrder."'>";
								}
								else{
									$tHeaderOpen = "<th>";
								}
								echo $tHeaderOpen.anchor(base_url("supplier/$fieldsName/".
									(($sortOrder == "asc" && $sortBy == $fieldsName) ? "desc" : "asc")
									),$field, $data)."</th>";
							}
						?>
					</tr>
				</thead>

				<?php
					//to be concatenated with target id so each div has a different id
					$i = 0;

					foreach ($supplierList as $row){
						//incrementing id number
						$i++;
						$id = "target".$i;
						//storing value of supplier Company Name return from db
						$value = stripslashes($row['supplierCompanyName']);
						$emailLabel = "<li class='subTableHeader'>Email</li>";
						$phoneLabel = "<li class='subTableHeader'>Phone no</li>";
						$email = "<li>".$row['supplierEmail']."</li>";
						$phoneNo = "<li>".$row['supplierPhoneNo']."</li>";
						$divInfo = "<div class='mioHidden' id='".$id."'>";
						$addProduct = "<li><button class='btn-sm btn-success' type='button' onclick=\"$('#addProduct".$i."').toggle();\">+ product</button></li>";
						//embedding bootstrap jquery function
						$button = "<button class='btn-sm btn-info' type='button' onclick=\"$('#".$id."').toggle();\">".$value."</button>";
						$div = "<div class='mioHidden' id='addProduct".$i."'>";
						$formOpen = form_open('productValidation');
						$product = array('class' => 'form-control', 'name' => 'productName', 'type' => 'text', 'placeholder' => 'Product name', 'required' => 'true');
						$formProduct = form_input($product);
						$description = array('class' => 'form-control', 'name' => 'productDescription', 'placeholder' => 'Product description', 'required' => 'true');
						$formDescription = form_textarea($description);
						$price = array('class' => 'form-control', 'name' => 'productPrice', 'type' => 'text', 'placeholder' => 'Price', 'required' => 'true');
						$formPrice = form_input($price);
						$supplier = array('name' => 'supplierName', 'type' => 'hidden', 'value' => $row['supplierCompanyName']);
						$formSupplier = form_input($supplier);
						$submit = array('class' => 'btn-sm btn-success btn-block', 'value' => '+');
						$formSubmit = form_submit($submit);
						$formClose = form_close();
						$info = "<li class='subTableHeader'>add a product to ".$value."</li>";


						echo "<tr>";
						echo "<td>".$button.$divInfo."<ul class='tableInfo'>".$emailLabel.$email.$phoneLabel.$phoneNo."<br>"
							 .$addProduct.$div."<ul class='tableInfo'>".$info."<br><li>".$formOpen.$formProduct.$formDescription.$formPrice.$formSupplier.$formSubmit.$formClose."</li>"."</ul></div></ul></div></td>";

						echo "<td>".$row['supplierPaidAmount']."</td>";

						echo "<td>";
						echo form_open('editSupplier');
						$supplierName = array('name' => 'supplierName', 'type' => 'hidden', 'value' => $row['supplierCompanyName']);
						echo form_input($supplierName);
						$submit = array('class' => 'btn-sm btn-primary', 'value' => 'edit');
						echo form_submit($submit);
						echo form_close();
						echo "</td>";
						echo "</tr>";
					}	
				?>
			</table>
				<?php
					if(strlen($pagination)){
						echo "<div class='mioCenter'>Pages: ".$pagination."</div>";
					}
				?>
		</div>
		<br>
		<div class="container">
		<?php
			$form = array('class' => '', 'role' => 'form');
			echo form_open('supplierValidation', $form);
			
			$supplierName = array('class' => 'form-control', 'name' => 'supplierName', 'type' => 'text', 'placeholder' => 'Supplier name', 'required' => 'true');
			echo form_input($supplierName, $this->input->post('supplierName'));
			echo form_error('supplierName', '<p class="mioError">', '</p>');

			$supplierEmail = array('class' => 'form-control', 'name' => 'supplierEmail', 'type' => 'text', 'placeholder' => 'Supplier  email', 'required' => 'true');
			echo form_input($supplierEmail, $this->input->post('supplierEmail'));
			echo form_error('supplierEmail', '<p class="mioError">', '</p>');

			$supplierPhoneNo = array('class' => 'form-control', 'name' => 'supplierPhoneNo', 'type' => 'number', 'placeholder' => 'Supplier Phone no', 'required' => 'true');
			echo form_input($supplierPhoneNo, $this->input->post('supplierPhoneNo'));
			echo form_error('supplierPhoneNo', '<p class="mioError">', '</p>');

			$submit = array('class' => 'btn-sm btn-success btn-block', 'value' => '+');
			echo form_submit($submit);
			echo form_close();
		?>
		</div>	
	</div>
</div>