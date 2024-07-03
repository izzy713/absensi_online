<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function login() {
        // Get the raw POST data
        $input = json_decode(trim(file_get_contents('php://input')), true);

        // Set validation rules
        $this->form_validation->set_data($input);
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $response = array(
                'status' => false,
                'message' => validation_errors()
            );
            $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return;
        }

        // Get the input data
        $username = $input['username'];
        $password = $input['password'];

        // Query the user table to get role
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $user_query = $this->db->get();

        if ($user_query->num_rows() == 1) {
            $user = $user_query->row();

            // Verify the password using MD5
            if ($user->password === md5($password)) {
                // Password is correct
                if ($user->role == 'orangtua') {
                    $this->db->select('*');
                    $this->db->from('user');
                    $this->db->join('orang_tua', 'user.username = orang_tua.id_orang_tua');
                    $this->db->join('siswa', 'orang_tua.id_orang_tua = siswa.id_orang_tua');
                    $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
                    $this->db->join('sekolah', 'sekolah.id_sekolah = kelas.id_sekolah');
                    $this->db->where('user.username', $username);
                    $role_query = $this->db->get();
                } elseif ($user->role == 'siswa') {
                    $this->db->select('*');
                    $this->db->from('user');
                    $this->db->join('siswa', 'user.username = siswa.id_siswa');
                    $this->db->join('orang_tua', 'orang_tua.id_orang_tua = siswa.id_orang_tua');
                    $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
                    $this->db->join('sekolah', 'sekolah.id_sekolah = kelas.id_sekolah');
                    $this->db->where('user.username', $username);
                    $role_query = $this->db->get();
                }

                if ($role_query->num_rows() == 1) {
                    $user_data = $role_query->row();
                    $response = array(
                        'status' => true,
                        'message' => 'Login successful',
                        'data' => $user_data
                    );
                    $this->output
                        ->set_status_header(200)
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                } else {
                    // User role specific data not found
                    $response = array(
                        'status' => false,
                        'message' => 'User role data not found'
                    );
                    $this->output
                        ->set_status_header(404)
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                }
            } else {
                // Password is incorrect
                $response = array(
                    'status' => false,
                    'message' => 'Invalid password'
                );
                $this->output
                    ->set_status_header(401)
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
            }
        } else {
            // User not found
            $response = array(
                'status' => false,
                'message' => 'User not found'
            );
            $this->output
                ->set_status_header(404)
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }
}
