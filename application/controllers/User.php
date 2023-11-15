<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('model_user', 'model_pemira'));
        $this->load->library('form_validation');
    }

    function index()
    {
        $data["pemira"] = $this->db->get_where('pemira', ["YEAR(waktu_input)" => date('Y')])->row();
        $this->load->view('User/index', $data);
    }

    public function profil_calon()
    {
        $data["calon"] = $this->model_pemira->getCalonThisYear();
        $this->load->view('User/profil_calon', $data);
    }

    public function detail_calon($nim)
    {
        $data["komentar"] = $this->model_pemira->getKomentarByCalonNim($nim);
        $data["calon"] = $this->model_pemira->getSpesificCalon($nim);
        $data["kriteria"] = $this->model_pemira->getKriteria();
        $this->load->view('User/detail_calon', $data);
    }

    public function review_calon($nim)
    {
        $data["calon"] = $this->model_pemira->getSpesificCalon($nim);
        $data["kriteria"] = $this->model_pemira->getKriteria();
        $data["komentar"] = $this->model_pemira->getKomentarByUser($nim);
        $data["nilai"] = $this->model_pemira->getNilaiByUser($nim);
        $this->load->view('User/review', $data);
    }

    public function input_ulasan()
    {
        if (isset($_POST['simpan'])) {
            $this->model_pemira->inputReviewCalon();
            if ($this->toastr->success('Berhasil Review')) {
            } else {
                $this->toastr->error('Gagal Review');
            }
            redirect('User/profil_calon');
        }
    }

    public function kriteria_bobot()
    {
        $data["kriteria"] = $this->model_pemira->getKriteria();
        $data["myKriteria"] = $this->model_pemira->getMyKriteria();
        $this->load->view('User/kriteria_bobot', $data);
    }

    public function input_bobot()
    {
        if (isset($_POST['simpan'])) {
            $this->model_pemira->inputBobot();
            if ($this->toastr->success('Berhasil Bobot')) {
            } else {
                $this->toastr->error('Gagal Bobot');
            }
            redirect('User/spk');
        }
    }

    function spk()
    {
        $data["calon"] = $this->model_pemira->getCalonThisYear();
        $data["myKriteria"] = $this->model_pemira->getMyKriteria();
        $this->load->view('User/spk', $data);
    }

    public function get_bobot_usr($id_kriteria)
    {
        $bobotData = $this->model_pemira->getBobotByUser($id_kriteria);
        if ($bobotData) {
            // Prepare the data as JSON
            $jsonResponse = json_encode(array('bobot_value' => $bobotData->bobot));

            // Set the response content type to JSON
            $this->output->set_content_type('application/json');

            // Output the JSON response
            $this->output->set_output($jsonResponse);
        } else {
            // Data not found, return an empty JSON response
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('bobot_value' => '')));
        }
    }

    function getCalonNilaiByIdKriteria($id_calon, $id_kriteria)
    {
        $nilai = $this->model_pemira->getCalonNilaiByKriteria($id_calon, $id_kriteria);
        if ($nilai) {
            $jsonResponse = json_encode($nilai);
            $this->output->set_content_type('application/json');
            $this->output->set_output($jsonResponse);
        } else {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(''));
        }
    }
}
