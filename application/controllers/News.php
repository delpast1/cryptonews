<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Admin_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('newsmodel', '', TRUE);
    $this->load->library('csvimport');
  }

  public function index() {
    $this->data['page_title'] = 'News Management';
    $this->data['all_items'] = $this->newsmodel->getAllItemsOrderByDESC();
    $this->data['page_js'] = 'news';
    $this->render('news/news_view');
  }

  public function edit($id) {
    if (!$this->newsmodel->isExistItem($id)) {
      $this->render('404');
    } else {
      $item = $this->newsmodel->getItemByID($id);
      $this->data['page_title'] = 'News Management - Edit detail';
      $this->data['page_js'] = 'news';
      $this->data['item'] = $item;
      $this->render('news/news_edit_by_role');
    }
  }

  public function doEdit($id) {
    if (!isset($id) || $id == '') {
      $status = false;
      $msg = "No selected item";
    } else {
      try {
        $title = $this->input->post('title');
        $note = '';
        $itemStatus = 1;

        $News = $this->newsmodel->getItemById($id);

        if ($News->title == $title) {
            $status = true;
            $msg = "Successfully edited item";
        } else {
            if ($this->newsmodel->isExistItemWithTitle($title)) {
                $status = false;
                $msg = "News already exist";
            } else {
                $status = $this->newsmodel->editItem($id, $title, $note, 1);
                if($status){
                  $msg = "Successfully edited item";
                } else{
                  $msg = "An error occured! Please try again";
                }
            }
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
    $status = $this->newsmodel->removeItem($id);
    if ($status) {
      $msg = "Successfully removed News";
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

      if (!array_key_exists("Title", $file_data[0])) {
        $status = false;
        $msg[] = "Title collumn is missing.\n";
      }

      if (!array_key_exists("Summary", $file_data[0])) {
        $status = false;
        $msg[] = "Summary collumn is missing.\n";
      }

      if (!array_key_exists("Date", $file_data[0])) {
        $status = false;
        $msg[] = "Date collumn is missing.\n";
      }

      if (!array_key_exists("Tags", $file_data[0])) {
        $status = false;
        $msg[] = "Tags collumn is missing.\n";
      }

      if (!array_key_exists("URL", $file_data[0])) {
        $status = false;
        $msg[] = "URL collumn is missing.\n";
      }
      
      if ($status) {
        $News_id = -1;
        $department_id = -1;
        foreach ($file_data as $row){
          $data_concept[] = array(
            'title' => $row["Title"],
            'summary' => $row["Summary"],
            'date' => $row["Date"],
            'tags' => $row["Tags"],
            'url' => $row["URL"]
          );
          
        } 
        $status = $this->newsmodel->insert($data_concept);
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
