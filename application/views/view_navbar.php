<div>
		<div class="navbar navbar-inverse" style="position:fixed; top:80px; width:100%; z-index:100;" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand dropdown-toggle" href="#" data-toggle="dropdown">
						<?php echo " ".$email;?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#">Edit Profile</a>
						</li>
						<li>
							<a href="<?php echo base_url('changePassword');?>">Change Password</a>
						</li>
						<li>
							<a href="<?php echo base_url('logout');?>">Logout</a>
						</li>
					</ul>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="<?php echo $members?>">
							<a href="<?php echo base_url('members');?>">Home</a>
						</li>
						<li class="<?php echo $orders?>">
							<a href="#">Orders</a>
						</li>
						<li class="<?php echo $supplier?>">
							<a href="<?php echo base_url('supplier');?>">Suppliers</a>
						</li>
						<li class="<?php echo $products?>">
							<a href="<?php echo base_url('products');?>">Products</a>
						</li>
						<li class="<?php echo $history?>">
							<a href="#">History</a>
						</li>
						<li class="<?php echo $support?>">
							<a href="#">Support</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>