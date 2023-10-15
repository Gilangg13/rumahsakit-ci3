<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getUser()
    {
        $data = [
            'email' => $this->session->userdata('email')
        ];
        return $this->db->get_where('user', $data)->row_array();
    }

    // PASIEN
    public function getPasien()
    {
        $query = $this->db->get('pasien');
        return $query->result_array();
    }

    public function getPasienById($id)
    {
        return $this->db->get_where('pasien', ['pasien_id' => $id])->row_array();
    }

    public function tambahPasien()
    {
        $data = [
            'name_pasien' => $this->input->post('name_pasien'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'email' => $this->input->post('email'),
        ];
        $this->db->insert('pasien', $data);
    }

    public function editPasien($id, $data)
    {
        $this->db->where('pasien_id', $id);
        $this->db->update('pasien', $data);
    }

    public function deletePasien($id)
    {
        $this->db->where('pasien_id', $id);
        $this->db->delete('pasien');
    }

    public function jumlahPasien()
    {
        $this->db->from('pasien');
        $query = $this->db->get();
        $total_rows = $query->num_rows();
        return $total_rows;
    }

    // DOKTER
    public function getDokter()
    {
        $this->db->select('*, poliklinik.nama_poliklinik');
        $this->db->from('dokter');
        $this->db->join('poliklinik', 'dokter.poliklinik_id = poliklinik.poliklinik_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDokterById($id)
    {
        $this->db->select('*');
        $this->db->from('dokter');
        $this->db->join('poliklinik', 'poliklinik.poliklinik_id = dokter.poliklinik_id');
        $this->db->where('dokter.dokter_id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambahDokter()
    {
        $created_at = date('Y-m-d H:i:s');

        $data = [
            'poliklinik_id' => $this->input->post('poliklinik'),
            'name' => $this->input->post('name'),
            'spesialis' => $this->input->post('spesialis'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'email' => $this->input->post('email'),
            'created_at' => $created_at
        ];
        $this->db->insert('dokter', $data);
    }

    public function editDokter($id, $data)
    {
        $this->db->where('dokter_id', $id);
        $this->db->update('dokter', $data);
    }

    public function deleteDokter($id)
    {
        $this->db->where('dokter_id', $id);
        $this->db->delete('dokter');
    }

    public function jumlahDokter()
    {
        $this->db->from('dokter');
        $query = $this->db->get();
        $total_rows = $query->num_rows();
        return $total_rows;
    }



    // JADWAL DOKTER
    public function getJadwalDokter()
    {
        $this->db->select('*, dokter.dokter_id, dokter.name');
        $this->db->from('jadwal_dokter');
        $this->db->join('dokter', 'dokter.dokter_id = jadwal_dokter.dokter_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJadwalDokterById($id)
    {
        return $this->db->get_where('jadwal_dokter', ['jadwal_id' => $id])->row_array();
    }

    public function tambahJadwal()
    {
        $created_at = date('Y-m-d H:i:s');
        $jam_mulai = date('H:i', strtotime($this->input->post('jam_mulai')));
        $jam_selesai = date('H:i', strtotime($this->input->post('jam_selesai')));

        $data = [
            'dokter_id' => $this->input->post('dokter_id'),
            'hari' => $this->input->post('hari'),
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'lokasi' => $this->input->post('lokasi'),
            'created_at' => $created_at
        ];
        $this->db->insert('jadwal_dokter', $data);
    }

    public function editJadwal($id, $data)
    {
        $this->db->where('jadwal_id', $id);
        $this->db->update('jadwal_dokter', $data);
    }

    public function deleteJadwalDokter($id)
    {
        $this->db->where('jadwal_id', $id);
        $this->db->delete('jadwal_dokter');
    }

    public function jumlahJadwal()
    {
        $this->db->from('jadwal_dokter');
        $query = $this->db->get();
        $total_rows = $query->num_rows();
        return $total_rows;
    }

    // JANJI TEMU
    public function getJanjiTemu()
    {
        $this->db->select('janji_temu.*, pasien.name_pasien, dokter.name, poliklinik.nama_poliklinik');
        $this->db->from('janji_temu');
        $this->db->join('pasien', 'janji_temu.pasien_id = pasien.pasien_id');
        $this->db->join('dokter', 'janji_temu.dokter_id = dokter.dokter_id');
        $this->db->join('poliklinik', 'janji_temu.poliklinik_id = poliklinik.poliklinik_id');
        $this->db->order_by('janji_temu.janji_id', 'ASC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function getJanjiTemuById($id)
    {
        return $this->db->get_where('janji_temu', ['janji_id' => $id])->row_array();
    }

    public function tambahJanjiTemu()
    {
        $created_at = date('Y-m-d H:i:s');

        $data = [
            'pasien_id' => $this->input->post('pasien_id'),
            'poliklinik_id' => $this->input->post('poliklinik'),
            'dokter_id' => $this->input->post('dokter'),
            'tanggal_janji' => $this->input->post('tanggal_janji'),
            'keluhan' => $this->input->post('keluhan'),
            'created_at' => $created_at
        ];
        $this->db->insert('janji_temu', $data);
    }

    public function editJanjiTemu($id, $data)
    {
        $this->db->where('janji_id', $id);
        $this->db->update('janji_temu', $data);
    }

    public function deleteJanjiTemu($id)
    {
        $this->db->where('janji_id', $id);
        $this->db->delete('janji_temu');
    }

    public function jumlahJanjiTemu()
    {
        $this->db->from('janji_temu');
        $query = $this->db->get();
        $total_rows = $query->num_rows();
        return $total_rows;
    }

    public function getDokterByPoliId($poliklinik_id)
    {
        $this->db->where('poliklinik_id', $poliklinik_id);
        $query = $this->db->get('dokter');
        return $query->result_array();
    }


    public function getPoli()
    {
        $query = $this->db->get('poliklinik');
        return $query->result_array();
    }

    public function getPoliById($id)
    {
        return $this->db->get_where('poliklinik', ['poliklinik_id' => $id])->row_array();
    }

    public function tambahPoli()
    {
        $data = [
            'nama_poliklinik' => $this->input->post('nama_poliklinik'),
        ];
        $this->db->insert('poliklinik', $data);
    }

    public function editPoli($id, $data)
    {
        $this->db->where('poliklinik_id', $id);
        $this->db->update('poliklinik', $data);
    }

    public function deletePoli($id)
    {
        $this->db->where('poliklinik_id', $id);
        $this->db->delete('poliklinik');
    }

    public function jumlahPoli()
    {
        $this->db->from('poliklinik');
        $query = $this->db->get();
        $total_rows = $query->num_rows();
        return $total_rows;
    }
}
