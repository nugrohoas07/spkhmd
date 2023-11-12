<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('model_user'));
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('User/index');
    }
}
