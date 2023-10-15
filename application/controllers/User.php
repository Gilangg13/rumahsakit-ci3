<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        // ambil data email dari session
        // $data['user'] = $this->Users_Model->getUserByEmail();

        $this->load->view('templates/header_user', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer_user');
    }

    public function dokter()
    {
        $data['title'] = "Dokter";
        // ambil data email dari session
        // $data['user'] = $this->Users_Model->getUserByEmail();

        $data['jadwal'] = $this->Users_Model->getJadwalDokter();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/index_page_header');
        $this->load->view('user/dokter', $data);
        $this->load->view('templates/index_page_footer');
        $this->load->view('templates/footer_user');
    }

    public function profile()
    {
        $data['title'] = "Profile";
        // ambil data email dari session
        $data['user'] = $this->Users_Model->getUserByEmail();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/index_page_header');
        $this->load->view('user/profile', $data);
        $this->load->view('templates/index_page_footer');
        $this->load->view('templates/footer_user');
    }

    public function contact()
    {
        $data['title'] = "Contact";
        // ambil data email dari session
        // $data['user'] = $this->Users_Model->getUserByEmail();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/index_page_header');
        $this->load->view('user/contact', $data);
        $this->load->view('templates/index_page_footer');
        $this->load->view('templates/footer_user');
    }


    public function riwayat_pendaftaran()
    {
        $data['title'] = 'Riwayat Pendaftaran';
        $data['detail'] = $this->Users_Model->getJanjiTemu();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/index_page_header');
        $this->load->view('user/riwayat_pendaftaran', $data);
        $this->load->view('templates/index_page_footer');
        $this->load->view('templates/footer_user');
    }

    public function detail_janji_temu($id)
    {
        $data['title'] = "Detail Janji Temu";
        // $data['user'] = $this->Users_Model->getUserByEmail();
        $data['detail'] = $this->Users_Model->getJanjiTemuById($id);

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/index_page_header');
        $this->load->view('user/detail_janji_temu', $data);
        $this->load->view('templates/index_page_footer');
        $this->load->view('templates/footer_user');
    }

    public function get_dokter_by_poli_id()
    {
        $poliklinik_id = $this->input->post('poliklinik_id');
        $dokter = $this->Users_Model->getDokterByPoliId($poliklinik_id);
        echo json_encode($dokter);
    }
}
