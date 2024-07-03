<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelIzin extends CI_Model
{
    public function getIzin($data = null)
    {
        $this->db->select('*');
        $this->db->from('izin_absen');
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
		return $izin = $this->db->get_where($table,$where);
	}

	function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}