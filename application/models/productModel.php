<?php

	class ProductModel extends CI_Model{

		public function addProduct($supplierId){

			$data = array(
				'product_id' => 'DEFAULT',
				'product_name' => addslashes($this->input->post('name')),
				'product_note' => addslashes($this->input->post('note')),
				'product_price' => (double)$this->input->post('price'),
				'supplier_id' => (int)$supplierId
			);

			$query = $this->db->insert('product', $data);
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function getProducts($supplierId, $sortBy, $sortOrder){
			//validating sortBy and sortOrder variables using ternary logic to simplify code
			$sortOrder = ($sortOrder == 'desc') ? "desc" : "asc";
			$sortColumns = array("product_name");
			$sortBy = (in_array($sortBy, $sortColumns)) ? $sortBy : "product_name";

			//supplier list query
			$query = $this->db->select('product_name, product_note, product_price')
			->from('product')
			->where('supplier_id', $supplierId)
			->order_by($sortBy, $sortOrder);

			$table['rows'] = $query->get()->result_array();

			//supplier count query
			$query = $this->db->select('COUNT(*) as count', false)
			->from('product')
			->where('supplier_id', $supplierId);

			$temp = $query->get()->result();
			$table['num_rows'] = $temp[0]->count;

			return $table;
		}

		public function getProductsBySupp($supplierId, $limit, $offset, $sortBy, $sortOrder, $suppName){
			//validating sortBy and sortOrder variables using ternary logic to simplify code
			$sortOrder = ($sortOrder == 'desc') ? "desc" : "asc";
			$sortColumns = array("product_name");
			$sortBy = (in_array($sortBy, $sortColumns)) ? $sortBy : "product_name";

			//supplier list query
			$query = $this->db->select('product_name, product_note, product_price')
			->from('product')
			->where('supplier_id', $supplierId)
			->limit($limit, $offset)
			->order_by($sortBy, $sortOrder);

			$table['rows'] = $query->get()->result_array();

			//supplier count query
			$query = $this->db->select('COUNT(*) as count', false)
			->from('product')
			->where('userId',$userId)
			->where('supplierId', addslashes($suppName));

			$temp = $query->get()->result();
			$table['num_rows'] = $temp[0]->count;

			return $table;
		}

		public function updateProduct($userId){

			$updatePrice = ($this->input->post('productPrice') == "") ? false : true;
			$updateDescription = ($this->input->post('productDescription') == "") ? false : true;
			//assigning empty array value to avoid a null return of the function
			$query = array();

			if($updatePrice && $updateDescription){
				$query = $this->db->query("UPDATE products
					SET product_price ='".$this->input->post('productPrice')."', product_note ='".addslashes($this->input->post('productDescription'))."'
					WHERE product_name = '".addslashes($this->input->post('productName'))."' AND userId ='".$userId."'");
			}
			else if($updatePrice){
				$query = $this->db->query("UPDATE products
					SET product_price ='".(double)$this->input->post('productPrice')."'
					WHERE product_name = '".addslashes($this->input->post('productName'))."' AND userId ='".$userId."'");
			}
			else if($updateDescription){
				$query = $this->db->query("UPDATE products
					SET product_note ='".addslashes($this->input->post('productDescription'))."'
					WHERE product_name = '".addslashes($this->input->post('productName'))."' AND userId ='".$userId."'");
			}
			return $query;
		}

	}
