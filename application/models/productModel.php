<?php

	class ProductModel extends CI_Model{

		public function addProduct($userId, $supplierId){

			$data = array(
					'productId' => 'DEFAULT',
					'productName' => addslashes($this->input->post('productName')),
					'userId' => $userId,
					'description' => addslashes($this->input->post('productDescription')),
					'price' => (double)$this->input->post('productPrice'),
					'supplierId' => (int)$supplierId
				);

			$query = $this->db->insert('products', $data);
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		public function getProducts($userId, $limit, $offset, $sortBy, $sortOrder){
			//validating sortBy and sortOrder variables using ternary logic to simplify code
			$sortOrder = ($sortOrder == 'desc') ? "desc" : "asc";
			$sortColumns = array("productName");
			$sortBy = (in_array($sortBy, $sortColumns)) ? $sortBy : "productName";

			//supplier list query
			$query = $this->db->select('productName, description, price')
			->from('products')
			->where('userId', $userId)
			->limit($limit, $offset)
			->order_by($sortBy, $sortOrder);

			$table['rows'] = $query->get()->result_array();

			//supplier count query
			$query = $this->db->select('COUNT(*) as count', false)
			->from('products')
			->where('userId',$userId);

			$temp = $query->get()->result();
			$table['num_rows'] = $temp[0]->count;

			return $table;
		}

		public function getProductsBySupp($userId, $limit, $offset, $sortBy, $sortOrder, $suppName){
			//validating sortBy and sortOrder variables using ternary logic to simplify code
			$sortOrder = ($sortOrder == 'desc') ? "desc" : "asc";
			$sortColumns = array("productName");
			$sortBy = (in_array($sortBy, $sortColumns)) ? $sortBy : "productName";

			//supplier list query
			$query = $this->db->select('productName, description, price')
			->from('products')
			->where('userId', $userId)
			->where('supplierId', addslashes($suppName))
			->limit($limit, $offset)
			->order_by($sortBy, $sortOrder);

			$table['rows'] = $query->get()->result_array();

			//supplier count query
			$query = $this->db->select('COUNT(*) as count', false)
			->from('products')
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
					SET price ='".$this->input->post('productPrice')."', description ='".addslashes($this->input->post('productDescription'))."' 
					WHERE productName = '".addslashes($this->input->post('productName'))."' AND userId ='".$userId."'");
			}
			else if($updatePrice){
				$query = $this->db->query("UPDATE products 
					SET price ='".(double)$this->input->post('productPrice')."' 
					WHERE productName = '".addslashes($this->input->post('productName'))."' AND userId ='".$userId."'");
			}
			else if($updateDescription){
				$query = $this->db->query("UPDATE products 
					SET description ='".addslashes($this->input->post('productDescription'))."' 
					WHERE productName = '".addslashes($this->input->post('productName'))."' AND userId ='".$userId."'");
			}
			return $query;
		}

	}