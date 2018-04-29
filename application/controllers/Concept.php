<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Concept extends Admin_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('conceptmodel', '', TRUE);
    $this->load->library('csvimport');
  }

  public function index() {
    $this->data['page_title'] = 'Quang Wiki';
    $this->data['all_items'] = $this->conceptmodel->getAllItemsOrderByDESC();
    $this->data['page_js'] = 'concept';
    $this->render('concept/concept_view');
  }

  public function edit($id) {
    if (!$this->conceptmodel->isExistItem($id)) {
      $this->render('404');
    } else {
      $item = $this->conceptmodel->getItemByID($id);
      $this->data['page_title'] = 'Quang Wiki - Chỉnh sửa';
      $this->data['page_js'] = 'concept';
      $this->data['item'] = $item;
      $this->render('concept/concept_edit_by_role');
    }
  }

  public function doEdit($id) {
    if (!isset($id) || $id == '') {
      $status = false;
      $msg = "No selected item";
    } else {
      try {
        $name = $this->input->post('concept_name');
        $detail = $this->input->post('concept_detail');
        $url = $this->input->post('concept_url');

        $status = $this->conceptmodel->editItem($id, $name, $detail, $url);
        if($status){
          $msg = "Successfully edited item";
        } else{
          $msg = "An error occured! Please try again";
      }
        
      } catch (\Exception $e) {
        $status = false;
        $msg = "Id is not a number";
      }
    }
    $dt = array('status' => $status,
                'msg' => $msg );
    echo json_encode($dt);
  }

  public function doRemove($id){
    $status = $this->conceptmodel->removeItem($id);
    if ($status) {
      $msg = "Successfully removed Course";
    } else {
      $msg = "An error occured! Please try again";
    }
    $dt = array('status' => $status,
                'msg' => $msg );
    echo json_encode($dt);
  }

  public function importCSV(){
    $status = true;
    
    try {
      $msg = "";
      $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
      if (!array_key_exists("Name", $file_data[0])) {
        $status = false;
        $msg[] = "Name collumn is missing.\n";
      }
      if (!array_key_exists("Detail", $file_data[0])) {
        $status = false;
        $msg[] = "Detail collumn is missing.\n";
      }

      if (!array_key_exists("URL", $file_data[0])) {
        $status = false;
        $msg[] = "URL collumn is missing.\n";
      }
      
      if ($status) {
        $course_id = -1;
        $department_id = -1;
        foreach ($file_data as $row){

          $data_concept[] = array(
            'name' => $row["Name"],
            'detail' => $row["Detail"],
            'url' => $row["URL"]
          );
          
        } 
        $status = $this->conceptmodel->insert($data_concept);
        $msg = "Successfully imported.";
      } 
      
    } catch (\Exception $e) {
      $status = false;
      $msg = "Cannot add item";
    }

    $dt = array('status' => $status,
                'msg' => $msg );
    echo json_encode($dt);
  }
}
