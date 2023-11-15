<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_user', 'model_pemira'));
    $this->load->library('form_validation');
    cek_session();
  }

  function index()
  {
    $this->load->view('Admin/index');
  }

  public function detail_pemira()
  {
    if (isset($_POST['simpan'])) {
      if ($this->model_pemira->setPemira()) {
        $this->toastr->success('Berhasil Menambah');
      } else {
        $this->toastr->error('Gagal Menambah');
      }
      redirect('admin/detail_pemira');
    }
    $data["pemira"] = $this->db->get_where('pemira', ["YEAR(waktu_input)" => date('Y')])->row();
    $this->load->view('Admin/detail_pemira', $data);
  }

  public function profil_calon()
  {

    $data["calon"] = $this->model_pemira->getCalonThisYear();
    $this->load->view('Admin/profil_calon', $data);
  }

  public function tambahCalon()
  {
    $this->load->view('Admin/add_calon');
  }

  public function editCalon($nim)
  {
    $data["calon"] = $this->db->get_where('calon_ketua', ["nim" => $nim])->row();
    $this->load->view('Admin/edit_calon', $data);
  }

  public function update_calon()
  {
    if (isset($_POST['simpan'])) {
      if ($this->model_pemira->inputCalon()) {
        $this->toastr->success('Berhasil Menambah');
      } else {
        $this->toastr->error('Gagal Menambah');
      }
      redirect('admin/profil_calon');
    }
    if (isset($_POST['edit'])) {
      if ($this->model_pemira->editCalon()) {
        $this->toastr->success('Berhasil Edit Calon');
      } else {
        $this->toastr->error('Gagal Edit Calon');
      }
      redirect('admin/profil_calon');
    }
    if (isset($_POST['hapus'])) {
      if ($this->model_pemira->hapusCalon()) {
        $this->toastr->success('Berhasil Menghapus');
      } else {
        $this->toastr->error('Gagal Menghapus');
      }
      redirect('admin/profil_calon');
    }
  }
}
