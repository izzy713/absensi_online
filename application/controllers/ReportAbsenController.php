<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportAbsenController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'ReportAbsen';
        $data['absen'] = $this->ModelReportAbsen->getReportAbsen()->result_array();


        $this->load->view('dist/reportAbsen/view', $data);
    }
}