<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKelas extends CI_Model
{
    public function getKelas($data = null)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        return $this->db->get();
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
		return $kelas = $this->db->get_where($table,$where);
	}

	function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}