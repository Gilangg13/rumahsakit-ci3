<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users_Model extends CI_Model
{
    // public function getUser()
    // {
    //     $data = [
    //         'email' => $this->session->userdata('email')
    //     ];
    //     return $this->db->get_where('user', $data)->row_array();
    // }

    public function getUserByEmail()
    {
        $data = [
            'email' => $this->session->userdata('email')
        ];
        return $this->db->get_where('user', $data)->row_array();
    }

    public function getJadwalDokter()
    {
        $this->db->select('jadwal_dokter.dokter_id, dokter.name, dokter.spesialis, dokter.nomor_telepon, dokter.email, GROUP_CONCAT(jadwal_dokter.hari ORDER BY FIELD(jadwal_dokter.hari, "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu")) AS hari, jadwal_dokter.jam_mulai, jadwal_dokter.jam_selesai');
        $this->db->from('jadwal_dokter');
        $this->db->join('dokter', 'dokter.dokter_id = jadwal_dokter.dokter_id');
        $this->db->group_by('jadwal_dokter.dokter_id, dokter.name, dokter.spesialis, dokter.nomor_telepon, dokter.email, jadwal_dokter.jam_mulai, jadwal_dokter.jam_selesai');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function jumlahDokter()
    {
        $this->db->from('dokter');
        $query = $this->db->get();
        $total_rows = $query->num_rows();
        return $total_rows;
    }

    public function getDokter()
    {
        $query = $this->db->get('dokter');
        return $query->result_array();
    }

    public function getPoli()
    {
        $query = $this->db->get('poliklinik');
        return $query->result_array();
    }

    public function getDokterByPoliId($poliklinik_id)
    {
        $this->db->where('poliklinik_id', $poliklinik_id);
        $query = $this->db->get('dokter');
        return $query->result_array();
    }

    public function tambahPasien($data)
    {
        $this->db->insert('pasien', $data);
        return $this->db->insert_id();
    }

    public function buatJanjiTemu($data)
    {
        $this->db->insert('janji_temu', $data);
    }

    public function getJanjiTemuById($id)
    {
        $this->db->select('janji_temu.*, pasien.*, poliklinik.nama_poliklinik, dokter.name');
        $this->db->from('janji_temu');
        $this->db->join('pasien', 'janji_temu.pasien_id = pasien.pasien_id');
        $this->db->join('poliklinik', 'poliklinik.poliklinik_id = janji_temu.poliklinik_id');
        $this->db->join('dokter', 'dokter.dokter_id = janji_temu.dokter_id');
        $this->db->where('janji_temu.janji_id', $id);

        return $this->db->get()->row_array();
    }

    public function getJanjiTemu()
    {
        $this->db->select('janji_temu.*, pasien.*, dokter.name, poliklinik.nama_poliklinik');
        $this->db->from('janji_temu');
        $this->db->join('pasien', 'pasien.pasien_id = janji_temu.pasien_id');
        $this->db->join('poliklinik', 'poliklinik.poliklinik_id = janji_temu.poliklinik_id');
        $this->db->join('dokter', 'dokter.dokter_id = janji_temu.dokter_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}
