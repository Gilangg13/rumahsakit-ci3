<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()
    {
        // jika ada session email maka tidak bisa kembali ke auth melalui url
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        // rule validasi email dan password
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        // jika login gagal maka tampilkan form login
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // jika validasi sukses jalankan fungsi login
            $this->_login();
        }
    }


    private function _login()
    {
        // ambil email dan password
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // query - SELECT * FROM user WHERE email = $email
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // var_dump($user);
        // die;
        // jika usernya ada
        if ($user) {

            // cek password
            if ($password ==  $user['password']) { //password_verify - untuk menyamakan password yg diinput dengan password yg sudah di hash

                // data untuk session
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];

                // set session data
                $this->session->set_userdata($data);
                // cek jika role id nya 1 maka akan ke halaman admin
                if ($user['role_id'] == 1) {
                    redirect('admin');
                    // jika bukan (0) maka akan ke halaman user
                } else {
                    redirect('user');
                }
            } else {
                // jika gagal maka tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('auth');
            }
        } else {
            // jika gagal maka tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar.</div>');
            redirect('auth');
        }
    }


    public function registrasi()
    {
        // nama atribut, nama lain/alias, harus diisi
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // nama atribut, nama lain/alias, harus diisi|harus format email|ngecek apakah ada email yg sama di db
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email sudah pernah terdaftar'
        ]);

        // nama atribut, nama lain/alias, harus diisi|harus format email|minimal jumlah password|agar sama dengan password2
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/auth_footer');
        } else {
            // ambil data
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                // 'password' => $this->input->post('password1', true),
                // password di enkripsi dulu dengan function password_hash(), algoritma security
                'password' => $this->input->post('password1', true),
                'role_id' => 2,
                'image' => 'default.jpg',
                'date_created' => time()
            ];

            // masukan data ke database
            $this->db->insert('user', $data);

            // jika berhasil maka akan pindah ke halaman login
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda telah dibuat. Silahkan Aktivasi Akunmu.</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        // hapus session email dan role id
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        // tampilkan pesan berhasil logout
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah logout</div>');
        redirect('auth');
    }
}
