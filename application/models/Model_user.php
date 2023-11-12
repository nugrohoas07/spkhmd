<?php

class Model_user extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  function registerUser()
  {
    $post = $this->input->post();
    $this->username = $post["nim"];
    $this->nama = $post["nama"];
    $this->password = md5($post["pass"]);
    $this->role = '2'; //role user
    return $this->db->insert('users', $this);
  }

  function checkUsernameExist()
  {
    $post = $this->input->post();
    $result = $this->db->get_where('users', array('username' => $post["nim"]))->row();
    return !empty($result);
  }

  function getUser($username) //mendapatkan data 1 user
  {
    return $this->db->get_where('users', array('username' => $username))->row();
  }

  function getRole($id_role) //mendapatkan nama role
  {
    return $this->db->get_where('roles', array('id' => $id_role))->row();
  }
}
