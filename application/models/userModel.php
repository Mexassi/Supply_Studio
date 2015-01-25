<?php
	class UserModel extends CI_Model{
		/**
		*  return true if a match is found into db
		*/
		public function canLogin(){

			$this->db->where('account_email', $this->input->post('email'));
			$query = $this->db->get('account');

			if($query->num_rows()>0){
				$result = $query->result();
				return password_verify($this->input->post('password'), $result[0]->account_password);
			}
			return false;
		}

		/**
		*  returns the first object of the first row
		*  from the query executed
		*/
		public function getFromUsers($data, $attribute, $argument){
			$query = $this->db->query("SELECT ".$data." FROM account WHERE ".$attribute." = '".$argument."'");
			if($query->num_rows > 0){
				foreach ($query->result() as $row){
					return $row->$data;
				}
			}
			return null;
		}

		/**
		*  return true if a match of password and userId are found into db
		*/
		public function check($password, $email){
			$query = $this->db->query("SELECT account_password FROM account WHERE account_email = '".$email."'");
			if($query->num_rows > 0){
				$result = $query->result();
				return password_verify($password, $result[0]->account_password);
			}
			else{
				return false;
			}
		}

		/**
		*  registr user to tempUser table passing the previously
		*  generated unique key to activate account
		*/
		public function addTempUser($key){
			$data = array(
					'account_email' => $this->input->post('email'),
					'phoneNo' => $this->input->post('phoneNo'),
					'companyName' => addslashes($this->input->post('companyName')),
					'companyStreetName' => $this->input->post('companyStreetName'),
					'companyStreetNo' => $this->input->post('companyStreetNo'),
					'companySuburb' => $this->input->post('companySuburb'),
					'companyPostCode' => $this->input->post('companyPostCode'),
					'companyState' => $this->input->post('state'),
					'password' => sha1($this->input->post('password')),
					'userKey' => $key
				);

			$query = $this->db->insert('account', $data);
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		/**
		*/

		public function register_user($password_hash,$email,$username){
			$data = array(
				"account_email" => self::protect($email),
				"account_password" => self::protect($password_hash),
				"username" => self::protect($username),
				"active" => true
			);

			$query = $this->db->insert('account',$data);
			if($query){
				return true;
			}
			else{
				return false;
			}
		}

		private function protect($string){
			return mysql_real_escape_string($string);
		}

		/**
		*  return true if the key passed as arguments matches
		*  the existing key into the db
		*/
		public function valid($key){
			$this->db->where('userKey', $key);
			$query = $this->db->get('tempUsers');

			if($query->num_rows() == 1){
				return true;
			}
			else{
				return false;
			}
		}

		/**
		*  add user from tempUser table to user table
		*  once the account is validated
		*/
		public function addUser($key){
			$this->db->where('userKey', $key);
			$tempUser = $this->db->get('tempUsers');

			if($tempUser){
				$row = $tempUser->row();

				$data = array(
					'companyEmail' => $row->companyEmail,
					'phoneNo' => $row->phoneNo,
					'companyName' => $row->companyName,
					'companyStreetName' => $row->companyStreetName,
					'companyStreetNo' => $row->companyStreetNo,
					'companySuburb' => $row->companySuburb,
					'companyPostCode' => $row->companyPostCode,
					'companyState' => $row->companyState,
					'passwd' => $row->passwd
					);

				$registrationComplete = $this->db->insert('account', $data);
			}
			if($registrationComplete){
				$this->db->where('userKey', $key);
				$this->db->delete('tempUsers');
				return $data['companyEmail'];
			}
			return false;
		}

		/**
		*  generate and return a random password of 16 char
		*/
		public function generatePassword(){
			//generate a random word
			$string = "ghijklmEFGuvHJKpqrstwxyzABCDPQabcdefRSMNOnoWXYTUVZ".uniqid();
			$word = str_shuffle($string);
			$newPassword = substr($word, 6, 22);
			return $newPassword;
		}

		/**
		*  updates user password passing value and userId as arguments
		*/
		public function updateUserPassword($value, $userId){
			$query = $this->db->query("UPDATE account SET passwd = sha1('".$value."') WHERE userId ='".$userId."'");
			if($query){
				return true;
			}
			return false;
		}

	}
