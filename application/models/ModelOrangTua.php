<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelOrangTua extends CI_Model
{
    public function getOrangTua($data = null)
    {
        $this->db->select('*');
        $this->db->from('orang_tua');
        return $this->db->get();
    }

    public function join()
    {
        $this->db->select('siswa.*, orang_tua.*');
        $this->db->from('siswa');
        $this->db->join('orang_tua','siswa.id_orang_tua = orang_tua.id_orang_tua');
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
		return $guru = $this->db->get_where($table,$where);
	}

	function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}