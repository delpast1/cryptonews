<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conceptmodel extends CI_Model
{
  function __construct() {
    parent::__construct();
  }

  public function getCountItems() {
    return $this->db->count_all_results('concept');
  }

  public function getAllItems() {
    $query = $this->db->get('concept');
    return $query->result();
  }

  public function getAllItemsOrderByDESC() {
    $this->db->order_by("name", "desc");
    $query = $this->db->get('concept');
    return $query->result();
  }

  public function getItemById($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('concept');
    return $query->row();
  }

  public function isExistItem($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('concept');
    if ($query->num_rows() > 0) {
      return true;
    }
    return false;
  }

  public function insert($data){
    $status = false;
    $query = $this->db->insert_batch('concept', $data);
    if ($query){
      $status = true;
    }
    return $status;
  }

  public function editItem($id, $name, $detail, $url) {
    $data = array(
      'name' => $name,
      'detail' => $detail,
      'url' => $url
    );
    $this->db->where('id', $id);
    return $this->db->update('concept', $data);
  }

  public function removeItem($id) {
    $data = array(
      'id' => $id
    );
    return $this->db->delete('concept', $data);
  }
}
