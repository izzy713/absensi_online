<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GuruController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Guru';
        $data['guru'] = $this->ModelGuru->getGuru()->result_array();


        $this->load->view('dist/guru/view', $data);
    }

    public function create()
    {
        $data['title'] = 'Guru';
        $this->load->view('dist/guru/create', $data);
    }

    function save()
	{
		$id_guru = $this->input->post('id_guru');
		$nama = $this->input->post('nama');

		$data = 
		array('id_guru' =>$id_guru,
			  'nama' =>$nama
		);

		$this->ModelGuru->simpan($data,'guru');
		
		$postdata = 
        array('username' => $id_guru,
        'password' => md5('1234'),
        'role' =>'guru');

        $this->ModelUser->simpan($postdata, 'user');
		redirect('GuruController');
	}

    function hapus($id)
	{
		$where = array('id_guru' => $id);
		$this->ModelGuru->delete($where,'guru');
		redirect('GuruController');
	}

    function edit($id_guru)
	{
		$where = array('id_guru' =>$id_guru);
        $data['title'] = 'Guru';
		$data['guru'] = $this->ModelGuru->edit($where,'guru');

		$this->load->view('dist/guru/form_edit',$data);
	}

	function update()
	{
		$id_guru = $this->input->post('id_guru');
		$nama = $this->input->post('nama');

		$data = 
		array('id_guru' =>$id_guru,
			  'nama' =>$nama
		);

		$where = array('id_guru' =>$id_guru);

		$this->ModelGuru->update($where,$data,'guru');
		redirect('GuruController');
	}
}