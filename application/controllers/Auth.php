<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Login';

        $this->load->view('dist/auth-login', $data);
    }

    // public function login() {
    //     $data['tittle'] = 'Login';
    //     $this->load->view('dist/auth-login', $data);
    // }

    public function login_process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->verify_user($username, md5($password));

        if ($user) {
            $this->session->set_userdata('id_user', $user->id_user);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('role', $user->role);
            redirect('dist'); // Ganti dengan halaman setelah login berhasil
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('Auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
