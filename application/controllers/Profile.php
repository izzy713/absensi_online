<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = 'Profile';
        $user_id = $this->session->userdata('id_user');
        if (!$user_id) {
            redirect('dist/auth-login');
        }

        $data['user_data'] = $this->User_model->get_data_by_user($user_id);
        $this->load->view('dist/profile', $data);
    }
}