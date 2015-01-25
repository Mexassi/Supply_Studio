<?php

	class SupplierModel extends CI_Model{

		/**
		*  add a new supplier to the suppliers table
		*  return true if query success or false if it fails
		*/
		public function addSupplier($businessId){

			$data = array(
					'supplier_id' => 'DEFAULT',
					'business_id' => $businessId,
					'supplier_name' => addslashes($this->input->post('supplierName')),
					'supplier_email' => $this->input->post('supplierEmail'),
					'phone_no' => $this->input->post('supplierPhoneNo')
				);

			$query = $this->db->insert('supplier', $data);
			if($query){
				return true;
			}
			else{
				return false;
			}
		}
		public function getSuppliersByName($userId){
			$query = $this->db->select('supplier_name')
			->from('supplier')
			->where('userId', $userId)
			->order_by('supplier_name', 'asc');

			$table['rows'] = $query->get()->result_array();
			return $table;
		}
		/**
		*  return the list of suppliers of a user (passed as argument)
		*  as an array. Returns an empty array if empty table, return number of rows selected
		*/
		public function getSuppliers($businessId, $sortBy, $sortOrder){
			//validating sortBy and sortOrder variables using ternary logic to simplify code
			$sortOrder = ($sortOrder == 'desc') ? "desc" : "asc";
			$sortColumns = array("supplier_name");
			$sortBy = (in_array($sortBy, $sortColumns)) ? $sortBy : "supplier_name";

			//supplier list query
			$query = $this->db->select('supplier_name, supplier_email, phone_no')
			->from('supplier')
			->where('business_id', $businessId)
			->order_by($sortBy, $sortOrder);

			$table['rows'] = $query->get()->result_array();

			//supplier count query
			$query = $this->db->select('COUNT(*) as count', false)
			->from('supplier')
			->where('business_id', $businessId);

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

			$query = $this->db->query("DELETE FROM supplier WHERE supplier_name ='".$this->input->post('supplierName')."' AND userId = '".$userId."'");
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function updateSupplier($businessId){

			$updateEmail = ($this->input->post('supplier_email') == "") ? false : true;
			$updatePhoneNo = ($this->input->post('phone_no') == "") ? false : true;
			//assigning empty array value to avoid a null return of the function
			$query = array();

			if($updateEmail && $updatePhoneNo){
				$query = $this->db->query("UPDATE supplier
					SET supplier_email ='".$this->input->post('supplier_email')."', phone_no ='".$this->input->post('phone_no')."'
					WHERE supplier_name = '".$this->input->post('supplierName')."' AND business_id ='".$businessId."'");
			}
			else if($updateEmail){
				$query = $this->db->query("UPDATE supplier
					SET supplier_email ='".$this->input->post('supplier_email')."'
					WHERE supplier_name = '".$this->input->post('supplierName')."' AND business_id ='".$businessId."'");
			}
			else if($updatePhoneNo){
				$query = $this->db->query("UPDATE supplier
					SET phone_no ='".$this->input->post('phone_no')."'
					WHERE supplier_name = '".$this->input->post('supplierName')."' AND business_id ='".$businessId."'");
			}
			return $query;
		}

		public function getSupplierId($supplierName){

			$query = $this->db->query("SELECT supplier_id FROM supplier WHERE supplier_name ='".addslashes($supplierName)."'");

			if($query->num_rows>0){
				foreach ($query->result() as $row) {
					return $row->supplier_id;
				}
			}
			return null;
		}

		public function getSupplierName($supplier_id){

			$query = $this->db->query("SELECT supplier_name FROM supplier WHERE supplier_id ='".$supplier_id."'");

			if($query->num_rows>0){
				foreach ($query->result() as $row) {
					return $row->supplier_name;
				}
			}
			return null;
		}


	}
