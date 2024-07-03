<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Verifikasi kredensial pengguna
    public function verify_user($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', ($password)); // Pastikan metode hash yang digunakan sesuai
        $query = $this->db->get('user'); // Ganti dengan nama tabel pengguna

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_data_by_user($user_id) {
        $this->db->where('id_user', $user_id);
        $query = $this->db->get('user'); // Ganti dengan nama tabelmu
        return $query->result();
    }
}