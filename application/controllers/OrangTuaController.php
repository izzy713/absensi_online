<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrangTuaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'OrangTua';
        $data['orangtua'] = $this->ModelOrangTua->getOrangTua()->result_array();
        $data['gabung'] = $this->ModelOrangTua->join();

        $this->load->view('dist/orangtua/view', $data);
    }

    public function create()
    {
        $data['title'] = 'OrangTua';
        $this->load->view('dist/orangtua/create', $data);
    }

    function save()
	{
		$id_orang_tua = $this->input->post('id_orang_tua');
		$nama_orang_tua = $this->input->post('nama_orang_tua');
        $email = $this->input->post('email');
        $nomor_telepon = $this->input->post('nomor_telepon');

		$data = 
		array('id_orang_tua' =>$id_orang_tua,
			  'nama_orang_tua' =>$nama_orang_tua,
              'email' =>$email,
              'nomor_telepon'=>$nomor_telepon
		);
		$this->ModelOrangTua->simpan($data,'orang_tua');
		
		$postdata = 
        array('username' => $nama_orang_tua,
        'password' => md5('1234'),
        'role' =>'orangtua');

        $this->ModelUser->simpan($postdata, 'user');
		redirect('OrangTuaController');
	}

    function hapus($id_orang_tua)
	{
		$where = array('id_orang_tua' => $id_orang_tua);
		$this->ModelOrangTua->delete($where,'orang_tua');
		redirect('OrangTuaController');
	}

    function edit($id_orang_tua)
	{
		$where = array('id_orang_tua' =>$id_orang_tua);
        $data['title'] = 'Orang Tua';
		$data['orang_tua'] = $this->ModelOrangTua->edit($where,'orang_tua');

		$this->load->view('dist/orangtua/form_edit',$data);
	}

	function update()
	{
		$id_orang_tua = $this->input->post('id_orang_tua');
		$nama_orang_tua = $this->input->post('nama_orang_tua');
        $email = $this->input->post('email');
        $nomor_telepon = $this->input->post('nomor_telepon');

		$data = 
		array('id_orang_tua' =>$id_orang_tua,
			  'nama_orang_tua' =>$nama_orang_tua,
              'email' =>$email,
              'nomor_telepon'=>$nomor_telepon
		);

		$where = array('id_orang_tua' =>$id_orang_tua);

		$this->ModelOrangTua->update($where,$data,'orang_tua');
		redirect('OrangTuaController');
	}
}