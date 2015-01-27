<?php

class BusinessModel extends CI_Model {
  private function protect($string){
    return mysql_real_escape_string($string);
  }

  public function register_business($businessName, $level, $phone) {
    $data = array(
      "business_name" => $businessName,
      "subscription_level" => $level,
      "phone_no" => $phone,
      "active" => true
    );

    $query = $this->db->insert('business', $data);
    return $query ? $this->db->insert_id() : $query;
  }

  public function link_new_business($businessId, $accountEmail) {
    $data = array(
      "business_id" => $businessId,
      "account_email" => $accountEmail,
      "admin" => "1"
    );

    $query = $this->db->insert('account_in_business', $data);
    return $query;
  }

  public function link_business($businessId, $accountEmail) {
    $data = array(
      "business_id" => $businessId,
      "account_email" => $accountEmail,
      "admin" => "0"
    );

    $query = $this->db->insert('account_in_business', $data);
    return $query;
  }

  public function getFromBusiness($data, $attribute, $argument){
    $query = $this->db->query("SELECT ".$data." FROM business WHERE ".$attribute." = '".$argument."'");
    if($query->num_rows > 0){
      foreach ($query->result() as $row){
        return $row->$data;
      }
    }
    return null;
  }

  public function getBusinessLink($email) {
    $query = $this->db->query("SELECT business_id FROM account_in_business WHERE account_email = '".$email."'");
    if($query->num_rows > 0){
      foreach ($query->result() as $row){
        return $row->business_id;
      }
    }
    return null;
  }

  public function getCoworkerNames($businessId) {
    $query = $this->db->query("SELECT username FROM account WHERE account_email = (SELECT account_email FROM account_in_business WHERE business_id = '".$businessId."')");

    $table = array();
    if ($query->num_rows > 0) {
      foreach ($query->result() as $row){
        array_push($table, $row->username);
      }
    }
    return $table;
  }

  public function getBusinessAdmin($businessId) {
    $query = $this->db->query("SELECT username FROM account WHERE account_email = (SELECT account_email FROM account_in_business WHERE business_id = '".$businessId."' AND admin = '1')");

    $table = array();
    if ($query->num_rows > 0) {
      foreach ($query->result() as $row){
        return $row->username;
      }
    }
    return $table;
  }

  public function getBusinessPlan($businessId) {
    $query = $this->db->query("SELECT subscription_level FROM business WHERE business_id = '".$businessId."'");

    $table = array();
    if ($query->num_rows > 0) {
      foreach ($query->result() as $row){
        return $row->subscription_level;
      }
    }
  }
}
