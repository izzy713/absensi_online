<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAbsensi extends CI_Model
{
    public function getAbsen($data = null)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        return $this->db->get();
    }

	public function getAbsenSiswa()
    {
        $this->db->select('absensi.*, siswa.id_siswa,nama_siswa,');
        $this->db->from('absensi');
        $this->db->join('siswa', 'absensi.id_siswa = siswa.id_siswa');
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
		return $izin = $this->db->get_where($table,$where);
	}

	function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}