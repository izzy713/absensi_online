<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelasController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Kelas';
        $data['kelas'] = $this->ModelKelas->getKelas()->result_array();


        $this->load->view('dist/kelas/view', $data);
    }

    public function create()
    {
        $data['title'] = 'Kelas';
        $this->load->view('dist/kelas/create', $data);
    }

    function save()
	{
		$id_kelas = $this->input->post('id_kelas');
		$nama_kelas = $this->input->post('nama_kelas');
        $tingkat = $this->input->post('tingkat');
        $jurusan = $this->input->post('jurusan');
        $sub_kelas = $this->input->post('sub_kelas');

		$data = 
		array('id_kelas' =>$id_kelas,
			  'nama_kelas' =>$nama_kelas,
              'tingkat'=>$tingkat,
              'jurusan'=>$jurusan,
              'sub_kelas'=>$sub_kelas
		);

		$this->ModelKelas->simpan($data,'kelas');
		redirect('KelasController');
	}

    function hapus($id_kelas)
	{
		$where = array('id_kelas' => $id_kelas);
		$this->ModelKelas->delete($where,'kelas');
		redirect('KelasController');
	}

    function edit($id_kelas)
	{
		$where = array('id_kelas' =>$id_kelas);
        $data['title'] = 'Kelas';
		$data['kelas'] = $this->ModelKelas->edit($where,'kelas');

		$this->load->view('dist/kelas/form_edit',$data);
	}

	function update()
	{
		$id_kelas = $this->input->post('id_kelas');
		$nama_kelas = $this->input->post('nama_kelas');
        $tingkat = $this->input->post('tingkat');
        $jurusan = $this->input->post('jurusan');
        $sub_kelas = $this->input->post('sub_kelas');

		$data = 
		array('id_kelas' =>$id_kelas,
			  'nama_kelas' =>$nama_kelas,
              'tingkat'=>$tingkat,
              'jurusan'=>$jurusan,
              'sub_kelas'=>$sub_kelas
		);
        
		$where = array('id_kelas' =>$id_kelas);

		$this->ModelKelas->update($where,$data,'kelas');
		redirect('KelasController');
	}
}