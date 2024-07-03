<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSiswa extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getSiswa($data = null)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        return $this->db->get();
    }

    //code join table
    public function join()
    {
        $this->db->distinct();
        $this->db->select('siswa.*, kelas.nama_kelas, orang_tua.nama_orang_tua');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->join('orang_tua','siswa.id_orang_tua = orang_tua.id_orang_tua');
        $query = $this->db->get();
        return $query->result();
    }
    public function joinOrangTuaAll($id_ortu)
    {
        $this->db->distinct();
        $this->db->select('siswa.*, orang_tua.*');
        $this->db->from('orang_tua');
        $this->db->join('siswa','orang_tua.id_orang_tua = siswa.id_orang_tua');
        $this->db->where('orang_tua.id_orang_tua', $id_ortu);
        $query = $this->db->get();
        return $query->result();
    }
    public function joinOrangTua()
    {
        $this->db->distinct();
        $this->db->select('siswa.id_orang_tua, orang_tua.nama_orang_tua');
        $this->db->from('orang_tua');
        $this->db->join('siswa','orang_tua.id_orang_tua = siswa.id_orang_tua');
        // $this->db->where('orang_tua.id_orang_tua', $id_ortu);
        $query = $this->db->get();
        return $query->result();
    }

    public function joinKelas()
    {
        $this->db->distinct();
        $this->db->select('siswa.id_kelas, kelas.nama_kelas');
        $this->db->from('kelas');
        $this->db->join('siswa','kelas.id_kelas = siswa.id_kelas');
        $query = $this->db->get();
        return $query->result();
    }

    public function joinById($id_siswa)
    {
        $this->db->select('siswa.*, kelas.nama_kelas, orang_tua.nama_orang_tua');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->join('orang_tua','siswa.id_orang_tua = orang_tua.id_orang_tua');
        $this->db->where('siswa.id_siswa', $id_siswa);
        $query = $this->db->get();
        return $query->result();
    }


    function simpan($data,$table)
	{
		$this->db->insert($table,$data);
	}

    function delete($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

    function edit($where,$table)
	{
		return $siswa = $this->db->get_where($table,$where);
	}

	function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}