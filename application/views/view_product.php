<div class="container mioMargin">
	<div class="jumbotron mioFont">
		<h3 style="text-align:center;">Your Suppliers List <?php echo $test;?></h3>
		<p class="mioCenter" style="font-size:13px;">Found  suppliers</p>
		<p class="mioCenter" style="font-size:15px;">Click on a supplier to add to it a product</p>
		<br>
		<div class="container mioCenter">
			<?php
				
				$form = array('class' => 'form-login', 'role' => 'form');
				echo form_open('products', $form);
				$i = 1;
				$data[0] = "Select";
				foreach ($supplierList as $row){
					$data[$i] = stripslashes($row['supplierCompanyName']);
					$i++;
				}
				$option = array_combine($data, $data);
				echo form_dropdown('supplierName', $option)."<br>";
				$submitSelect = array('class' => 'btn-sm btn-primary ', 'value' => 'show');
				echo "<br>".form_submit($submitSelect);
				echo form_close();
				
			?>
			<div>
				
			</div>
			
		</div>	
	</div>
	<div class='jumbotron mioFont'>
		<h3 style="text-align:center;">Your Products List</h3>
		<p class="mioCenter" style="font-size:13px;">Found <?php echo $prodNo;?> products</p>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<?php
		
						  $data = array('class' => 'mioTbhead');
							foreach ($productFields as $productFieldsName => $productField){
								if($sortBy == $productFieldsName){
									$tHeaderOpen = "<th class='sort".$sortOrder."'>";
								}
								else{
									$tHeaderOpen = "<th>";
								}
								echo $tHeaderOpen.anchor(base_url("products/$productFieldsName/".
									(($sortOrder == "asc" && $sortBy == $productFieldsName) ? "desc" : "asc")
									),$productField, $data)."</th>";
							}
						?>
					</tr>
				</thead>
				<?php

					$i = 0;

					foreach ($productList as $row) {
						//incrementing id number
						$i++;
						$id = "target".$i;
						$value = stripslashes($row['productName']);
						$pricelLabel = "<li class='subTableHeader'>Price</li>";
						$descriptLabel = "<li class='subTableHeader'>Description</li>";
						$price = "<li>".$row['price']."</li>";
						$description = "<li>".$row['description']."</li>";
						$divInfo = "<div class='mioHidden' id='".$id."'>";
						//embedding bootstrap jquery function
						$button = "<button class='btn-sm btn-warning' type='button' onclick=\"$('#".$id."').toggle();\">".$value."</button>";
						
						echo "<tr>";
						echo "<td>".$button.$divInfo."<ul class='tableInfo'>".$pricelLabel.$price.$descriptLabel.$description."</ul></div></td>";
						//echo "<td>".stripslashes($this->supplierModel->getSupplierName($row['supplierId']))."</td>";

						echo "<td>";
						echo form_open('editProduct');
						$productName = array('name' => 'productName', 'type' => 'hidden', 'value' => $row['productName']);
						echo form_input($productName);
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
	</div>
</div>

