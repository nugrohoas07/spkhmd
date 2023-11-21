<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentications extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_session();
  }

  function index()
  {
    $roleId = $this->session->userdata('roleId');
    if ($roleId == "1") {
      redirect('Admin');
    } elseif ($roleId == "2") {
      redirect('User');
    }
  }

  public function logout()
  {
    $out = array('spkhmd_login', 'username', 'nama', 'roleId', 'role');
    $this->session->unset_userdata($out);
    $this->toastr->success('Berhasil Keluar');
    redirect('login');
  }
}
