<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelReportAbsen extends CI_Model
{
    public function getReportAbsen($data = null)
    {
        $this->db->select('*');
        $this->db->from('absensi');
        return $this->db->get();
    }
}