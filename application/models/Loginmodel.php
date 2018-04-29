<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model
{
  function __construct()
  {
      parent::__construct();
  }
  public function doAdminLogin($username, $password){
    $prepare = "SELECT * FROM admin WHERE username = '" . $username . "' AND password = MD5('" . $password . "')";
    $query = $this -> db -> query($prepare) ;
    if ($query->num_rows() > 0) {

        $info = $query->row();
        $newdata = array(
           'adminID'  => $info->id,
           'logged_in' => TRUE,
           'adminName' => $info->username,
           'adminRole' => $info->role
       );

        $this->session->set_userdata($newdata);
        return true;
    } else {
        return false;
    }
  }
}
