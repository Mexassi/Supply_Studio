<?php
	
	class SupplierModel extends CI_Model{

		/**
		*  add a new supplier to the suppliers table
		*  return true if query success or false if it fails
		*/
		public function addSupplier($userId){

			$data = array(
					'supplierId' => 'DEFAULT',
					'userId' => $userId,
					'supplierCompanyName' => addslashes($this->input->post('supplierName')),
					'supplierEmail' => $this->input->post('supplierEmail'),
					'supplierPhoneNo' => $this->input->post('supplierPhoneNo'),
					'supplierPaidAmount' => 'DEFAULT'
				);

			$query = $this->db->insert('suppliers', $data);
			if($query){
				return true;
			}
			else{
				return false;
			}
		}
		public function getSuppliersByName($userId){
			$query = $this->db->select('supplierCompanyName')
			->from('suppliers')
			->where('userId', $userId)
			->order_by('supplierCompanyName', 'asc');

			$table['rows'] = $query->get()->result_array();
			return $table;
		}
		/**
		*  return the list of suppliers of a user (passed as argument)
		*  as an array. Returns an empty array if empty table, return number of rows selected
		*/
		public function getSuppliers($userId, $limit, $offset, $sortBy, $sortOrder){
			//validating sortBy and sortOrder variables using ternary logic to simplify code
			$sortOrder = ($sortOrder == 'desc') ? "desc" : "asc";
			$sortColumns = array("supplierCompanyName", "supplierPaidAmount");
			$sortBy = (in_array($sortBy, $sortColumns)) ? $sortBy : "supplierCompanyName";

			//supplier list query
			$query = $this->db->select('supplierCompanyName, supplierEmail, supplierPhoneNo, supplierPaidAmount')
			->from('suppliers')
			->where('userId', $userId)
			->limit($limit, $offset)
			->order_by($sortBy, $sortOrder);

			$table['rows'] = $query->get()->result_array();

			//supplier count query
			$query = $this->db->select('COUNT(*) as count', false)
			->from('suppliers')
			->where('userId', $userId);

			$temp = $query->get()->result();
			$table['num_rows'] = $temp[0]->count;

			return $table;
		}

		/**
		*  delete a supplier from a user list. the userId is
		*  passed as arguments and the supplier name value is
		*  accessed through the posted variable
		*/
		public function deleteSupplier($userId){

			$query = $this->db->query("DELETE FROM suppliers WHERE supplierCompanyName ='".$this->input->post('supplierName')."' AND userId = '".$userId."'");
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function updateSupplier($userId){

			$updateEmail = ($this->input->post('supplierEmail') == "") ? false : true;
			$updatePhoneNo = ($this->input->post('supplierPhoneNo') == "") ? false : true;
			//assigning empty array value to avoid a null return of the function
			$query = array();

			if($updateEmail && $updatePhoneNo){
				$query = $this->db->query("UPDATE suppliers 
					SET supplierEmail ='".$this->input->post('supplierEmail')."', supplierPhoneNo ='".$this->input->post('supplierPhoneNo')."' 
					WHERE supplierCompanyName = '".$this->input->post('supplierName')."' AND userId ='".$userId."'");
			}
			else if($updateEmail){
				$query = $this->db->query("UPDATE suppliers 
					SET supplierEmail ='".$this->input->post('supplierEmail')."' 
					WHERE supplierCompanyName = '".$this->input->post('supplierName')."' AND userId ='".$userId."'");
			}
			else if($updatePhoneNo){
				$query = $this->db->query("UPDATE suppliers 
					SET supplierPhoneNo ='".$this->input->post('supplierPhoneNo')."' 
					WHERE supplierCompanyName = '".$this->input->post('supplierName')."' AND userId ='".$userId."'");
			}
			return $query;
		}

		public function getSupplierId($supplierName){

			$query = $this->db->query("SELECT supplierId FROM suppliers WHERE supplierCompanyName ='".addslashes($supplierName)."'");

			if($query->num_rows>0){
				foreach ($query->result() as $row) {
					return $row->supplierId;
				}
			}
			return null;
		}

		public function getSupplierName($supplierId){

			$query = $this->db->query("SELECT supplierCompanyName FROM suppliers WHERE supplierId ='".$supplierId."'");

			if($query->num_rows>0){
				foreach ($query->result() as $row) {
					return $row->supplierCompanyName;
				}
			}
			return null;
		}
		

	}
