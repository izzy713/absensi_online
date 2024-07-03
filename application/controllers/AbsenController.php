<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsenController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Absensi';
        $data['absensi'] = $this->ModelAbsensi->getAbsenSiswa();
        // var_dump($data);

        $this->load->view('dist/absensi/view', $data);
    }
}