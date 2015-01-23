<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	*  disabling Cache storage of the pages so that each time there is a change
	*  an http request is sent. This makes the web app more secure
	*/
	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0"); // Proxies.
	/*
		 NOTE
		---------------------------------------------------------------------------------------
		|
		|  	sort list per supplier on products page works fine but the logic is worng: it sorts by supplier id
		|  	and it shows the supplier name so it is not sorted in alphabetical order.. need to be fixed
		|
		|	to store and retreive password the system use the sha1 encryption. Need to upgrade to bcrypt
		|	which is more secure
		|
		|
		|
		---------------------------------------------------------------------------------------
	*/
class Supply_Studio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 * This is the default controller
	 */
	public function index(){
		$this->loginPage();
	}

	/**
	*  printing login page
	*/
	public function loginPage(){
		if ($this->session->userdata('isLoggedIn')) {
			redirect('members');
		}
		else {
			$data['title'] = "Supply Studio";
			$this->load->view('view_header', $data);
			$this->load->view('view_login');
			$this->load->view('view_footer');
		}
	}

	/**
	*  printing registration user page
	*/
	public function registrationUser(){

		$data['title'] = "Get Started";
		$this->load->view('view_header', $data);
		$this->load->view('view_registrationUser');
		$this->load->view('view_footer');
	}

	/**
	*  printing forgot password page
	*/
	public function forgotPassword(){

		$data['title'] = "Reset Password";
		$this->load->view('view_header', $data);
		$this->load->view('view_forgot');
		$this->load->view('view_footer');
	}

	/**
	*  printing members page if the user
	*  is logged in otherwise redirects to login page
	*/
	public function members(){
		if($this->session->userdata('isLoggedIn')){
			$data['title'] = "Members home";
			$this->load->view('view_header', $data);
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$companyName = $this->userModel->getFromUsers("companyName", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "active";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$data['companyName'] = $companyName;
			$this->load->view('view_dash_header', $data);
			$this->load->view('view_memberHome', $data);
			$this->load->view('view_footer');
		}
		else{
			redirect('restricted');
		}
	}

	public function products($sortBy = 'productName', $sortOrder = 'asc', $offset = 0){
		if($this->session->userdata('isLoggedIn')){
			$result = null;
			$limit = 20;

			$data['productFields'] = array(
				"productName" => "Product"
			);

			$data['title'] = "Products";
			$this->load->view('view_header', $data);
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "active";
			$data['history'] = "";
			$data['support'] = "";

			$this->load->model('supplierModel');
			$supplier = $this->supplierModel->getSuppliersByName($this->session->userdata('userId'));
			$data['supplierList'] = $supplier['rows'];
			$this->load->library('pagination');
			$this->load->model('productModel');
			//if the posted variable does not exists
			if(($this->input->post('supplierName') == "Select") || ($this->input->post('supplierName') !== true)){
				//get all product from db
				$data['test'] = "select selected";
				$result = $this->productModel->getProducts($this->session->userdata('userId'), $limit, $offset, $sortBy, $sortOrder);
			}
			//posted variable exists
			else{
				$data['test'] = "select not selected";
				//get all products by supplier id which passed as a posted variable
				$result = $this->productModel->getProductsBySupp($this->session->userdata('userId'), $limit, $offset, $sortBy, $sortOrder, $this->input->post('supplierName'));
			}
			$data['productList'] = $result['rows'];
			$data['prodNo'] = $result['num_rows'];

			$config = array();
			$config['first_url'] = base_url().'products';
			$config['first_link'] = 'First';
			$config['base_url'] = site_url("products/$sortBy/$sortOrder");
			$config['total_rows'] = $data['prodNo'];
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;

			$this->pagination->initialize($config);

			$data['pagination'] = $this->pagination->create_links();
			$data['sortOrder'] = $sortOrder;
			$data['sortBy'] = $sortBy;

			$companyName = $this->userModel->getFromUsers("companyName", "userId", $this->session->userdata('userId'));
			$data['companyName'] = $companyName;

			$this->load->view('view_dash_header', $data);
			$this->load->view('view_product', $data);
			$this->load->view('modals/add-product', $data);
			$this->load->view('view_footer');

		}
		else{
			redirect('restricted');
		}
	}
	/**
	*  printing change password page if the user
	*  is logged in otherwise redirects to login page
	*/
	public function changePassword(){
		if($this->session->userdata('isLoggedIn')){
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['title'] = "Change password";
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$this->load->view('view_header', $data);
			$this->load->view('view_navbar', $data);
			$this->load->view('view_changePassword');
			$this->load->view('view_footer');
		}
		else{
			redirect('restricted');
		}
	}

	/**
	*  printing supplier page if the user
	*  is logged in otherwise redirects to login page
	*/
	public function suppliers($sortBy = 'supplierCompanyName', $sortOrder = 'asc', $offset = 0){
		if($this->session->userdata('isLoggedIn')){

			$limit = 20;

			//set data field to be printed in supplier page
			$data['fields'] = array(
				"supplierCompanyName" => "Supplier",
				"supplierPaidAmount" => "Paid amount"
				);

			$data['title'] = "Supplier";
			$this->load->view('view_header', $data);
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "active";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$this->load->model('supplierModel');
			$result = $this->supplierModel->getSuppliers($this->session->userdata('userId'), $limit, $offset, $sortBy, $sortOrder);
			$data['supplierList'] = $result['rows'];
			$data['suppNo'] = $result['num_rows'];
			$data['limit'] = $limit;
			//set pagination
			$this->load->library('pagination');
			$config = array();
			$config['first_url'] = base_url().'supplier';
			$config['first_link'] = 'First';
			$config['base_url'] = site_url("supplier/$sortBy/$sortOrder");
			$config['total_rows'] = $data['suppNo'];
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$data['sortOrder'] = $sortOrder;
			$data['sortBy'] = $sortBy;

			$companyName = $this->userModel->getFromUsers("companyName", "userId", $this->session->userdata('userId'));
			$data['companyName'] = $companyName;

			$this->load->view('view_dash_header', $data);
			$this->load->view('view_supplier', $data);
			$this->load->view('modals/add-supplier', $data);
			$this->load->view('view_footer');
		}
		else{
			redirect('restricted');
		}
	}

	public function editProduct(){
		if($this->session->userdata('isLoggedIn')){
			$data['title'] = "Edit Product";
			$this->load->view('view_header', $data);
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$data['productName'] = $this->input->post('productName');
			$this->load->view('view_navbar', $data);
			$this->load->view('view_editProduct', $data);
			$this->load->view('view_footer');

		}
		else{
			redirect('restricted');
		}
	}
	public function editSupplier(){
		if($this->session->userdata('isLoggedIn')){
			$data['title'] = "Edit supplier";
			$this->load->view('view_header', $data);
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$data['supplierName'] = $this->input->post('supplierName');
			$this->load->view('view_navbar', $data);
			$this->load->view('view_editSupplier', $data);
			$this->load->view('view_footer');
		}
		else{
			redirect('restricted');
		}
	}
	/**
	*  printing delete supplier page if the user
	*  is logged in otherwise redirects to login page
	*/
	public function deleteSupplier(){
		if($this->session->userdata('isLoggedIn')){
			$data['title'] = "Delete supplier";
			$this->load->view('view_header', $data);
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$data['supplierName'] = $this->input->post('supplierName');
			$this->load->view('view_navbar', $data);
			$this->load->view('view_deleteSupplier', $data);
			$this->load->view('view_footer');
		}
		else{
			redirect('restricted');
		}
	}

	public function editProdValidation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('productPrice', 'Product price', 'trim|required');
		$this->form_validation->set_rules('productDescription', 'Product description', 'trim|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check[$this->input->post("password")]');

		if($this->form_validation->run()){
			$data['title'] = "Update product";
			$this->load->view('view_header', $data);
			$this->load->model('supplierModel');
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$this->load->view('view_navbar', $data);
			$this->load->model('productModel');
			if($this->productModel->updateProduct($this->session->userdata('userId'))){
				echo "<div class='mioMargin'><p class='mioSuccess'>Product update successful</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='products'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
			else{
				echo "<div class='mioMargin'><p class='mioError'>Could not update changes at this time</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='products'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
		}
		else{
			$this->editProduct();
		}
	}
	public function editSuppValidation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('supplierEmail', 'Supplier email', 'trim|xss_clean|valid_email|is_unique[suppliers.supplierEmail]|max_length[100]');
		$this->form_validation->set_rules('supplierPhoneNo', 'Supplier phone no', 'trim|is_natural');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check[$this->input->post("password")]');

		if($this->form_validation->run()){
			$data['title'] = "Update supplier";
			$this->load->view('view_header', $data);
			$this->load->model('supplierModel');
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$this->load->view('view_navbar', $data);
			if($this->supplierModel->updateSupplier($this->session->userdata('userId'))){
				echo "<div class='mioMargin'><p class='mioSuccess'>Supplier update successful</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='supplier'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
			else{
				echo "<div class='mioMargin'><p class='mioError'>Could not update changes at this time</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='members'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
		}
		else{
			$this->editSupplier();
		}
	}
	/**
	*  if the password entered is correct
	*  deletes supplier from database
	*/
	public function deleteSuppValidation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check[$this->input->post("password")]');

		if($this->form_validation->run()){
			$data['title'] = "Delete supplier";
			$this->load->view('view_header', $data);
			$this->load->model('supplierModel');
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$this->load->view('view_navbar', $data);
			if($this->supplierModel->deleteSupplier($this->session->userdata('userId'))){
				echo "<div class='mioMargin'><p class='mioSuccess'>Supplier deleted from database</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='supplier'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
			else{
				echo "<div class='mioMargin'><p class='mioError'>Could not delete supplier from database at this time</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='members'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
		}
		else{
			$this->deleteSupplier();
		}

	}

	/**
	*  if the password entered and the form validation are correct
	*  updates the user password
	*/
	public function validateChangePasswd(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('oldPassword', 'Old password', 'required|trim|callback_check[$this->input->post("oldPassword")]');
		$this->form_validation->set_rules('newPassword', 'New password', 'trim|required|min_length[6]|max_length[16]|');
		$this->form_validation->set_rules('repeatNewPassword', 'Repeat new password', 'trim|required|matches[newPassword]');

		if($this->form_validation->run()){
			$data['title'] = "Password reset";
			$this->load->view('view_header', $data);
			$this->load->model('userModel');
			$email = $this->userModel->getFromUsers("companyEmail", "userId", $this->session->userdata('userId'));
			$companyName = $this->userModel->getFromUsers("companyName", "userId", $this->session->userdata('userId'));
			$data['email'] = $email;
			$data['members'] = "";
			$data['orders'] = "";
			$data['supplier'] = "";
			$data['products'] = "";
			$data['history'] = "";
			$data['support'] = "";
			$this->load->view('view_navbar', $data);
			if($this->userModel->updateUserPassword($this->input->post('newPassword'), $this->session->userdata('userId'))){
				echo "<div class='mioMargin'><p class='mioSuccess'>Password update successful</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='members'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
			else{
				echo "<div class='mioMargin'><p class='mioError'>Could not update database at this time</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='members'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
		}
		else{
			$this->changePassword();
		}
	}

	/**
	*  if the email entered exists it generate
	*  a new password and send it to the user by email
	*/
	public function forgotValidation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_reset');

		if ($this->form_validation->run()){
			$this->load->model('userModel');
			//generate random password
			$newPassword = $this->userModel->generatePassword();
			$userEmail = $this->input->post('email');
			//$userId = $this->userModel->getFromUsers('userId', 'companyEmail', $userEmail);
			$data['title'] = "Reset password";
			$this->load->view('view_header', $data);
			if($this->userModel->updateUserPassword($newPassword, $this->userModel->getFromUsers('userId', 'companyEmail', $userEmail))){
				//send an email
				$this->load->library('email', array('mailtype' => 'html'));
				$this->email->from('support@miosystem.com', 'MioSystem Team');
				$this->email->to($userEmail);
				$this->email->subject("Reset password");

				$message = "<p>This message contains your new password.</p>";
				$message .= "<p>For security reasons, do not forget to change it next time you login.</p>";
				$message .= "<p>Your new password is: <b>".$newPassword."</b></p>";
				$message .= "<p>This is an auto-generated message, do not reply. If you wish to contact us, go to (webpage-link-to-be-entered)</p>";

				$this->email->message($message);
				if($this->email->send()){
					echo "<div class='mioMargin'><p class='mioSuccess'>The Email has been sent</p></div>";
					echo "<br><p class='mioInfo'>Click <a href='mioSystem'>here</a> to go back</p>";
					$this->load->view('view_footer');
				}
				else{
					echo "<div class='mioMargin'><p class='mioError'>We could not send you the Email</p></div>";
					echo "<br><p class='mioInfo'>Click <a href='mioSystem'>here</a> to go back</p>";
					$this->load->view('view_footer');
				}
			}
			else{
				echo "<div class='mioMargin'><p class='mioError'>We could not update database</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='mioSystem'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
		}
		else{
			$this->forgotPassword();
		}
	}

	/**
	*  loading library for form validation and setting rules for each field
	*  if rules are respected  the script redirect to the members function
	*  otherwise the login page is loaded again
	*/
	public function loginValidation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_auth');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run()){
			$this->load->model('userModel');
			$userId = $this->userModel->getFromUsers("userId", "companyEmail", $this->input->post('email'));
			$data = array('userId' => $userId, 'isLoggedIn' => 1);
			$this->session->set_userdata($data);

			redirect('members');
		}
		else{
			$this->loginPage();
		}
	}


	public function registerValidation(){

		$this->load->library('form_validation');
		$this->load->model('userModel');
		$this->form_validation->set_rules('companyEmail', 'Email', 'trim|required|valid_email|is_unique[users.companyEmail]|max_length[100]');
		$this->form_validation->set_rules('phoneNo', 'Mobile no', 'trim|required|is_natural');
		$this->form_validation->set_rules('companyName', 'Company name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('companyStreetName', 'Company street name', 'trim|required|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('companyStreetNo', 'Company street no', 'trim|required|is_natural');
		$this->form_validation->set_rules('companySuburb', 'company suburb', 'trim|required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('companyPostCode', 'Company post code', 'trim|required|is_natural|exact_length[4]');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[16]|');
		$this->form_validation->set_rules('repeatPassword', 'Repeat password', 'trim|required|matches[password]');

		if($this->form_validation->run()){
			//generate a random key
			$key = sha1(uniqid());
			$this->load->library('email', array('mailtype' => 'html'));
			$this->email->from('registration@miosystem.com', 'MioSystem Team');
			$this->email->to($this->input->post('companyEmail'));
			$this->email->subject("Activate your account.");

			$message = "<p>Thank you for the registration</p>";
			$message .= "<p>You are one step closer to use MioSystem.</p>";
			$message .= "<p>Click <a href='".base_url()."registerUser/$key'>here</a> to complete your registration</p>";
			$message .= "<p>This is an auto-generated message, do not reply. If you wish to contact us, go to (webpage-link-to-be-entered)</p>";

			$this->email->message($message);

			$data['title'] = "Temporary registration";
			$this->load->view('view_header',$data);
			//add them to the temp_user table
			if($this->userModel->addTempUser($key)){
				//send an email to the user
				if($this->email->send()){
					echo "<div class='mioMargin'><p class='mioSuccess'>The Email has been sent</p></div>";
					echo "<br><p class='mioInfo'>Click <a href='mioSystem'>here</a> to go back</p>";
					$this->load->view('view_footer');
				}
				else{
					echo "<div class='mioMargin'><p class='mioError'>We could not send you the Email</p></div>";
					echo "<br><p class='mioInfo'>Click <a href='mioSystem'>here</a> to go back</p>";
					$this->load->view('view_footer');
				}
			}
			else{
				echo "<div class='mioMargin'><p class='mioError'>Database connection problem. Try again later</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='mioSystem'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
		}
		else{
			$this->registrationUser();
		}
	}

	public function supplierValidation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('supplierName', 'Supplier name', 'required|trim|is_unique[suppliers.supplierCompanyName]|min_length[3]|max_length[50]');
		$this->form_validation->set_rules('supplierEmail', 'Supplier email', 'trim|required|xss_clean|valid_email|is_unique[suppliers.supplierEmail]|max_length[100]');
		$this->form_validation->set_rules('supplierPhoneNo', 'Supplier phone no', 'trim|required|is_natural');

		if($this->form_validation->run()){
			$this->load->model('supplierModel');
			if($this->supplierModel->addSupplier($this->session->userdata('userId'))){
				echo "success";
				$this->form_validation->set_message('supplierValidation', 'Supplier added to database');
				redirect('suppliers');
			}
			else{
				$this->form_validation->set_message('supplierValidation', 'Could not add supplier to database');
				$this->suppliers();
			}
		}
		else{
			$this->suppliers();
		}
	}

	public function productValidation(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('productName', 'Product name', 'trim|required|is_unique[products.productName]|min_length[5]|max_length[70]');
		$this->form_validation->set_rules('productDescription', 'Product description', 'trim|min_length[5]|max_length[255]');
		$this->form_validation->set_rules('productPrice', 'Product price', 'trim|required');

		if($this->form_validation->run()){
			$this->load->model('productModel');
			$this->load->model('supplierModel');
			if($this->productModel->addProduct($this->session->userdata('userId'), $this->supplierModel->getSupplierId($this->input->post('supplierName')))){
				redirect('products');
			}
			else{
				$this->form_validation->set_message('productValidation', 'Could not add product to database');
				$this->suppliers();
			}
		}
		else{
			$this->suppliers();
		}
	}

	public function check($password){
		$this->load->model('userModel');
		if($this->userModel->check($password, $this->session->userdata('userId'))){
			return true;
		}
		else{
			$this->form_validation->set_message('check', 'The password is wrong.');
			return false;
		}
	}

	public function reset(){
		$this->load->model('userModel');
		if($this->userModel->getFromUsers('companyEmail', 'companyEmail', $this->input->post('email'))){
			return true;
		}
		else{
			$this->form_validation->set_message('reset', 'This email address does not exist');
			return false;
		}
	}
	/**
	*  loading user model and calling its function canLogin.
	*  return true if canLogin or set a message and return false
	*  if not canLogin
	*/
	public function auth(){

		$this->load->model('userModel');

		if($this->userModel->canLogin()){
			return true;
		}
		else{
			$this->form_validation->set_message('auth', 'Wrong username or password');
			return false;
		}
	}


	public function restricted(){
		$data['title'] = "Restricted";
		$this->load->view('view_header', $data);
		$this->load->view('view_restricted');
		$this->load->view('view_footer');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('loginPage');
	}

	public function registerUser($key){

		$this->load->model('userModel');
		$data['title'] = "Registration result";
		$this->load->view('view_header',$data);

		if($this->userModel->valid($key)){
			if($companyEmail = $this->userModel->addUser($key)){
				$userId = $this->userModel->getFromUsers('userId', 'companyEmail', $companyEmail);
				$data = array(
						'userId' => $userId,
						'isLoggedIn' => 1
					);
				$this->session->set_userdata($data);
				echo "<div class='mioMargin'><p class='mioSuccess'>Registration successful</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='".base_url()."members'>here</a> to access your member page</p>";
				$this->load->view('view_footer');
			}
			else{
				echo "<div class='mioMargin'><p class='mioError'>Registration failed</p></div>";
				echo "<br><p class='mioInfo'>Click <a href='".base_url()."'>here</a> to go back</p>";
				$this->load->view('view_footer');
			}
		}
		else{
			echo "<div class='mioMargin'><p class='mioError'>Invalid key</p></div>";
			echo "<br><p class='mioInfo'>Click <a href='".base_url()."'>here</a> to go back</p>";
			$this->load->view('view_footer');
		}
	}
}

/* End of file mioSystem.php */
/* Location: ./application/controllers/mioSystem.php */
