<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        // ambil jumlah pada table
        $data['pasien'] = $this->Admin_model->jumlahPasien();
        $data['dokter'] = $this->Admin_model->jumlahDokter();
        $data['jadwal'] = $this->Admin_model->jumlahJadwal();
        $data['janji_temu'] = $this->Admin_model->jumlahJanjiTemu();
        $data['poliklinik'] = $this->Admin_model->jumlahPoli();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // PASIEN
    public function data_pasien()
    {
        $data['title'] = 'Pasien Management';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['pasien'] = $this->Admin_model->getPasien();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pasien', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pasien()
    {
        $data['title'] = 'Pasien Management';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $this->form_validation->set_rules('name_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pasien', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->tambahPasien();

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pasien Ditambahkan</div>');
            redirect('admin/data_pasien');
        }
    }

    public function edit_pasien($id)
    {
        $data['title'] = 'Edit Pasien';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        // ambil data pasien berdasarkan id
        $data['pasien'] = $this->Admin_model->getPasienById($id);

        $this->form_validation->set_rules('name_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-pasien', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name_pasien' => $this->input->post('name_pasien'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jk'),
                'alamat' => $this->input->post('alamat'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'email' => $this->input->post('email'),
            ];

            $this->Admin_model->editPasien($id, $data);

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pasien Berhasil Di Edit</div>');
            redirect('admin/data_pasien');
        }
    }

    public function delete_pasien($id)
    {
        $this->Admin_model->deletePasien($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pasien Berhasil Dihapus</div>');
        redirect('admin/data_pasien');
    }



    // DOKTER
    public function data_dokter()
    {
        $data['title'] = 'Dokter Management';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['dokter'] = $this->Admin_model->getDokter();
        $data['poliklinik'] = $this->Admin_model->getPoli();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dokter', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_dokter()
    {
        $data['title'] = 'Dokter Management';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['poliklinik'] = $this->Admin_model->getPoli();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('poliklinik', 'Poliklinik', 'required');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/dokter', $data);
            $this->load->view('templates/footer');
        } else {
            // masukan data ke databse
            $this->Admin_model->tambahDokter();

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dokter Ditambahkan</div>');
            redirect('admin/data_dokter');
        }
    }

    public function edit_dokter($id)
    {
        $data['title'] = 'Edit Dokter';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['dokter'] = $this->Admin_model->getDokterById($id);
        $data['poliklinik'] = $this->Admin_model->getPoli();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('poliklinik', 'Poliklinik', 'required');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-dokter', $data);
            $this->load->view('templates/footer');
        } else {
            $updated_at = date('Y-m-d H:i:s');
            $data = [
                'poliklinik_id' => $this->input->post('poliklinik'),
                'name' => $this->input->post('name'),
                'spesialis' => $this->input->post('spesialis'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'email' => $this->input->post('email'),
                'updated_at' => $updated_at
            ];

            $this->Admin_model->editDokter($id, $data);

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dokter Berhasil Di Edit</div>');
            redirect('admin/data_dokter');
        }
    }

    public function delete_dokter($id)
    {
        $this->Admin_model->deleteDokter($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dokter Berhasil Dihapus</div>');
        redirect('admin/data_dokter');
    }



    // DATA JADWAL DOKTER
    public function data_jadwal_dokter()
    {
        $data['title'] = 'Jadwal Dokter Management';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['jadwal_dokter'] = $this->Admin_model->getJadwalDokter();
        $data['dokter'] = $this->Admin_model->getDokter();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jadwal-dokter', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jadwal()
    {
        $data['title'] = 'Data Jadwal Dokter';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['dokter'] = $this->Admin_model->getDokter();

        $this->form_validation->set_rules('dokter_id', 'Dokter_id', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam_mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam_selesai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/jadwal-dokter', $data);
            $this->load->view('templates/footer');
        } else {
            // masukan data ke databse
            $this->Admin_model->tambahJadwal();

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jadwal Dokter Ditambahkan</div>');
            redirect('admin/data_jadwal_dokter');
        }
    }

    public function edit_jadwal_dokter($id)
    {
        $data['title'] = 'Edit Data Jadwal Dokter';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['jadwal_dokter'] = $this->Admin_model->getJadwalDokterById($id);
        $data['dokter'] = $this->Admin_model->getDokter();
        $data['dokter_id'] = $data['jadwal_dokter']['dokter_id'];

        $this->form_validation->set_rules('dokter_id', 'Dokter_id', 'required');
        $this->form_validation->set_rules('hari', 'Hari', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam_mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam_selesai', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $jam_mulai = date('H:i', strtotime($this->input->post('jam_mulai')));
            $jam_selesai = date('H:i', strtotime($this->input->post('jam_selesai')));
            $updated_at = date('Y-m-d H:i:s');

            $data = [
                'dokter_id' => $this->input->post('dokter_id'),
                'hari' => $this->input->post('hari'),
                'jam_mulai' => $jam_mulai,
                'jam_selesai' => $jam_selesai,
                'lokasi' => $this->input->post('lokasi'),
                'updated_at' => $updated_at
            ];

            $this->Admin_model->editJadwal($id, $data);

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jadwal Dokter Berhasil Di Edit</div>');
            redirect('admin/data_jadwal_dokter');
        }
    }

    public function delete_jadwal_dokter($id)
    {
        $this->Admin_model->deleteJadwalDokter($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jadwal Dokter Berhasil Dihapus</div>');
        redirect('admin/data_jadwal_dokter');
    }


    // JANJI TEMU
    public function data_janji_temu()
    {
        $data['title'] = 'Data Janji Temu';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['janji_temu'] = $this->Admin_model->getJanjiTemu();

        $data['pasien'] = $this->Admin_model->getPasien();
        $data['dokter'] = $this->Admin_model->getDokter();
        $data['poliklinik'] = $this->Admin_model->getPoli();
        // $data['jadwal_dokter'] = $this->Admin_model->getJadwalDokter();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/janji-temu', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_janji()
    {
        $data['title'] = 'Data Janji Temu';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['pasien'] = $this->Admin_model->getPasien();
        $data['dokter'] = $this->Admin_model->getDokter();
        $data['poliklinik'] = $this->Admin_model->getPoli();

        $data['jadwal_dokter'] = $this->Admin_model->getJadwalDokter();

        // Cek apakah ada data poliklinik yang dipilih
        $poliklinikId = $this->input->post('poliklinik');
        if (!empty($poliklinikId)) {
            // Dapatkan dokter berdasarkan poliklinik yang dipilih
            $data['dokter'] = $this->Admin_model->getDokterByPoliId($poliklinikId);
        }

        $this->form_validation->set_rules('pasien_id', 'Pasien id', 'required');
        $this->form_validation->set_rules('dokter', 'Dokter id', 'required');
        $this->form_validation->set_rules('poliklinik', 'Poliklinik id', 'required');
        $this->form_validation->set_rules('tanggal_janji', 'Tanggal Janji', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/janji-temu', $data);
            $this->load->view('templates/footer');
        } else {
            // masukan data ke databse
            $this->Admin_model->tambahJanjiTemu();

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Janji Temu Ditambahkan</div>');
            redirect('admin/data_janji_temu');
        }
    }

    public function edit_janji($id)
    {
        $data['title'] = 'Edit Data Janji Temu';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['janji_temu'] = $this->Admin_model->getJanjiTemuById($id);

        $data['pasien'] = $this->Admin_model->getPasien();
        $data['dokter'] = $this->Admin_model->getDokter();
        $data['poliklinik'] = $this->Admin_model->getPoli();


        $data['pasien_id'] = $data['janji_temu']['pasien_id'];
        $data['dokter_id'] = $data['janji_temu']['dokter_id'];
        $data['poliklinik_id'] = $data['janji_temu']['poliklinik_id'];

        // Cek apakah ada data poliklinik yang dipilih
        $poliklinikId = $this->input->post('poliklinik');
        if (!empty($poliklinikId)) {
            // Dapatkan dokter berdasarkan poliklinik yang dipilih
            $data['dokter'] = $this->Admin_model->getDokterByPoliId($poliklinikId);
        }

        $this->form_validation->set_rules('pasien_id', 'Pasien', 'required');
        $this->form_validation->set_rules('dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('poliklinik', 'Poliklinik', 'required');
        $this->form_validation->set_rules('tanggal_janji', 'Tanggal_janji', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-janji', $data);
            $this->load->view('templates/footer');
        } else {
            // masukan data ke databse
            $updated_at = date('Y-m-d H:i:s');
            $data = [
                'pasien_id' => $this->input->post('pasien_id'),
                'dokter_id' => $this->input->post('dokter'),
                'poliklinik_id' => $this->input->post('poliklinik'),
                'tanggal_janji' => $this->input->post('tanggal_janji'),
                'keluhan' => $this->input->post('keluhan'),
                'updated_at' => $updated_at
            ];
            $this->Admin_model->editJanjiTemu($id, $data);

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Janji Temu Berhasil Diedit</div>');
            redirect('admin/data_janji_temu');
        }
    }

    public function delete_janji($id)
    {
        $this->Admin_model->deleteJanjiTemu($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Janji Temu Berhasil Dihapus</div>');
        redirect('admin/data_janji_temu');
    }


    // POLIKLINIK
    // PASIEN
    public function data_poli()
    {
        $data['title'] = 'Poliklinik Management';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $data['poliklinik'] = $this->Admin_model->getPoli();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/poliklinik', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_poli()
    {
        $data['title'] = 'Tambah Poliklinik';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        $this->form_validation->set_rules('nama_poliklinik', 'Nama Poliklinik', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/poliklinik', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->tambahPoli();

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Poliklinik Ditambahkan</div>');
            redirect('admin/data_poli');
        }
    }

    public function edit_poli($id)
    {
        $data['title'] = 'Edit Poliklinik';
        // ambil data email dari session
        $data['user'] = $this->Admin_model->getUser();

        // ambil data poli berdasarkan id
        $data['poliklinik'] = $this->Admin_model->getPoliById($id);

        $this->form_validation->set_rules('nama_poliklinik', 'Nama Poliklinik', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit-poli', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_poliklinik' => $this->input->post('nama_poliklinik'),
            ];

            $this->Admin_model->editPoli($id, $data);

            // jika berhasil
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Poliklinik Berhasil Di Edit</div>');
            redirect('admin/data_poli');
        }
    }

    public function delete_poli($id)
    {
        $this->Admin_model->deletePoli($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Poliklinik Berhasil Dihapus</div>');
        redirect('admin/data_poli');
    }



    // PROFILE
    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->Admin_model->getUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }
}
