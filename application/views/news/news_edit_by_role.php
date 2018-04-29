<?php defined('BASEPATH') OR exit('No direct script access allowed');
    if ($this->session->userdata('adminRole') != "admin") {
        $this->load->view('404');
    } else {
        $this->load->view('news/news_edit');
    }
?>