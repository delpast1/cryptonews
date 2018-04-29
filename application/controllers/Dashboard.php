<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
  function __construct() {
    parent::__construct();
    $this->load->model('conceptmodel', '', TRUE);
    $this->load->model('newsmodel', '', TRUE);
  }

  public function index() {
    $this->data['page_title'] = 'Hello anh em ^^';
    $this->data['totalConceptCount'] = $this->conceptmodel->getCountItems();
    $this->data['totalNewsCount'] = $this->newsmodel->getCountItems();
    $this->render('dashboard_view');
  }
}
