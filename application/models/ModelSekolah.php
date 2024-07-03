<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSekolah extends CI_Model
{
    public function getSekolah($data = null)
    {
        $this->db->select('*');
        $this->db->from('sekolah');
        $this->db->limit(1);
        // $this->db->order_by('id_sekolah', 'desc');

        $query = $this->db->get();
        return $query->row();

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