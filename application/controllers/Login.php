<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_user");
        //$this->load->library('form_validation');
        cek_session_login();
    }

    function index()
    {
        $this->load->driver("session");
        $this->load->helper(array('form', 'url', 'captcha', 'security', 'string'));
        if (isset($_POST['masuk'])) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->db->where('username', $username);
            $this->db->where('password', md5($password));
            $query = $this->db->get('users');
            if ($query->num_rows() > 0) {
                $user = $this->model_user->getUser($username);
                $role = $this->model_user->getRole($user->role)->role;

                $data_session = array(
                    'spkhmd_login' => "1",
                    'username' => $user->username,
                    'nama' => $user->nama,
                    'roleId' => $user->role,
                    'role' => $role,
                );
                $this->session->set_userdata($data_session);
                redirect('authentications');
            } else {
                $this->toastr->error('NIM atau password salah');
                redirect('login');
            }
        }
        $this->load->view('Loginpage/login');
    }
}
