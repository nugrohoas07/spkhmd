<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('model_user'));
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('Loginpage/register');
    }

    function register()
    {
        if (isset($_POST['daftar'])) {
            if($this->model_user->checkUsernameExist())
            {
                $this->toastr->error('Gagal Daftar, Username sudah ada');
                redirect('register');
            }
            if ($this->model_user->registerUser()) {
                $this->toastr->success('Berhasil Daftar');
            } else {
                $this->toastr->error('Gagal Daftar');
            }
            redirect('login');
        }
    }
}
