<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Janji_Temu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
    }

    public function index()
    {
        $data['title'] = 'Buat Janji Temu';
        // ambil data email dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dokter'] = $this->Users_Model->getDokter();
        $data['poliklinik'] = $this->Users_Model->getPoli();

        // Cek apakah ada data poliklinik yang dipilih
        $poliklinikId = $this->input->post('poliklinik');
        if (!empty($poliklinikId)) {
            // Dapatkan dokter berdasarkan poliklinik yang dipilih
            $data['dokter'] = $this->Users_Model->getDokterByPoliId($poliklinikId);
        }

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/index_page_header');
        $this->load->view('user/janji_temu', $data);
        $this->load->view('templates/index_page_footer');
        $this->load->view('templates/footer_user');
    }

    public function proses()
    {
        $data['title'] = 'Buat Janji Temu';
        // ambil data email dari session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Validasi input form
        $this->form_validation->set_rules('name_pasien', 'Name Pasien', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tanggal_janji', 'Tanggal Janji', 'required');
        $this->form_validation->set_rules('poliklinik', 'Poliklinik', 'required');
        $this->form_validation->set_rules('dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');


        $data['dokter'] = $this->Users_Model->getDokter();
        $data['poliklinik'] = $this->Users_Model->getPoli();

        // Cek apakah ada data poliklinik yang dipilih
        $poliklinikId = $this->input->post('poliklinik');
        if (!empty($poliklinikId)) {
            // Dapatkan dokter berdasarkan poliklinik yang dipilih
            $data['dokter'] = $this->Users_Model->getDokterByPoliId($poliklinikId);
        }


        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan pesan error atau kembali ke halaman form
            $data['error_message'] = validation_errors();

            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/index_page_header');
            $this->load->view('user/janji_temu', $data);
            $this->load->view('templates/index_page_footer');
            $this->load->view('templates/footer_user');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Membuat Janji Temu</div>');
            redirect('janji_temu');
            // $this->load->view('user/index', $data);
        } else {
            // Ambil data dari input form
            $nama = $this->input->post('name_pasien');
            $email = $this->input->post('email');
            $nomor_telepon = $this->input->post('nomor_telepon');
            $jk = $this->input->post('jk');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $tanggal_janji = $this->input->post('tanggal_janji');
            $poliklinik_id = $this->input->post('poliklinik');
            $dokter_id = $this->input->post('dokter');
            $alamat = $this->input->post('alamat');
            $pesan = $this->input->post('pesan');

            $data_pasien = [
                'name_pasien' => $nama,
                'email' => $email,
                'nomor_telepon' => $nomor_telepon,
                'jenis_kelamin' => $jk,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat' => $alamat,
            ];

            $pasien_id = $this->Users_Model->tambahPasien($data_pasien);

            // Simpan data janji temu ke tabel "janji_temu"
            $created_at = date('Y-m-d H:i:s');

            $data_janji_temu = [
                'pasien_id' => $pasien_id,
                'dokter_id' => $dokter_id,
                'poliklinik_id' => $poliklinik_id,
                'tanggal_janji' => $tanggal_janji,
                'keluhan' => $pesan,
                'created_at' => $created_at
            ];

            $this->Users_Model->buatJanjiTemu($data_janji_temu);

            // Redirect ke halaman sukses atau tampilkan pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Membuat Janji Temu</div>');
            // redirect('janji_temu/sukses');
            redirect('janji_temu/sukses');
        }
    }


    public function sukses()
    {
        $data['title'] = '';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/index_page_header');
        $this->load->view('user/sukses');
        $this->load->view('templates/index_page_footer');
        $this->load->view('templates/footer_user');
    }
}
