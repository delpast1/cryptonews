<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Newsmodel extends CI_Model
{
  function __construct() {
    parent::__construct();
  }

  public function getCountItems() {
    return $this->db->count_all_results('news');
  }

  public function getAllItems() {    
    $query = $this->db->get('news');
    return $query->result();
  }

  public function getAllItemsOrderByDESC() {
    $this->db->order_by("date", "desc");
    $query = $this->db->get('news');
    return $query->result();
  }

  public function getItemById($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('news');
    return $query->row();
  }

  public function isExistItem($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('news');
    if ($query->num_rows() > 0) {
      return true;
    }
    return false;
  }

  public function insert($data){
    $status = false;
    $query = $this->db->insert_batch('news', $data);
    if ($query){
      $status = true;
    }
    return $status;
  }

  public function editItem($id, $title, $note, $status) {
    $data = array(
      'title' => $title,
      'note' => $note,
      'status' => $status
    );
    $this->db->where('id', $id);
    return $this->db->update('news', $data);
  }

  public function removeItem($id) {
    $data = array(
      'id' => $id
    );
    return $this->db->delete('news', $data);
  }
}