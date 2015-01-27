<?php

class OrderModel extends CI_Model {
  public function addOrders($orders, $username, $businessId) {
    $this->db->trans_start();
    foreach ($orders as $order) {
      $data = array(
        'business_id' => $businessId,
        'placement_date' => $order['orderDate']->format('Y-m-d'),
        'username' => $username,
        'order_note' => $order['note'],
        'process_date' => $order['orderDate']->add(new DateInterval('P2D'))->format('Y-m-d')
      );
      $this->db->insert('orders', $data);

      $data = array(
        'order_id' => $this->db->insert_id(),
        'product_id' => $order['id'],
        'quantity' => $order['quantity']
      );
      $this->db->insert('placement', $data);
    }
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();
    }
    else
    {
      $this->db->trans_commit();
    }
    return $this->db->trans_status();
  }

  public function getOrders($businessId) {
    $query = $this->db->select('*')
    ->from('orders')
    ->where('business_id', $businessId)
    ->order_by('placement_date', 'asc');

    $table['rows'] = $query->get()->result_array();

    //supplier count query
    $query = $this->db->select('COUNT(*) as count', false)
    ->from('orders')
    ->where('business_id', $businessId);

    $temp = $query->get()->result();
    $table['num_rows'] = $temp[0]->count;

    $query = $this->db->select('*')
    ->from('placement');

    $tempTable = $query->get()->result_array();
    $tempTableFormatted = array();

    foreach ($tempTable as $tempRow) {
      $tempTableFormatted[$tempRow['order_id']] = $tempRow;
    }
    $table['placement'] = $tempTableFormatted;

    return $table;
  }
}

?>
