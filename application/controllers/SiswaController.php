<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // public function index()
    // {
    //     $data['title'] = 'Siswa';
    //     $data['siswa'] = $this->ModelSiswa->getSiswa()->result_array();


    //     $this->load->view('dist/siswa/view', $data);
    // }

    public function index()
    {
        $data['title'] = 'Siswa';
        $data['siswa'] = $this->ModelSiswa->getSiswa();
        $data['gabung'] = $this->ModelSiswa->join();

        $this->load->view('dist/siswa/view', $data);
    }

    public function create()
    {
        $data['title'] = 'Siswa';
        $data['gabung'] = $this->ModelSiswa->join();
        $data['gabung2'] = $this->ModelSiswa->joinOrangTua();
        $data['gabung3'] = $this->ModelSiswa->joinkelas();

        $this->load->view('dist/siswa/create', $data);
    }
    
    function save()
	{
		$id_siswa = $this->input->post('id_siswa');
		$nama_siswa = $this->input->post('nama_siswa');
        $id_orang_tua = $this->input->post('id_orang_tua');
        $id_kelas = $this->input->post('id_kelas');
        $nisn = $this->input->post('nisn');

		$data = 
		array('id_siswa' =>$id_siswa,
			  'nama_siswa' =>$nama_siswa,
              'id_orang_tua' =>$id_orang_tua,
              'id_kelas'=>$id_kelas,
              'nisn'=>$nisn
		);
        
        $postdata = 
        array('username' => $id_siswa,
        'password' => md5('1234'),
        'role' =>'siswa');

        $this->ModelUser->simpan($postdata, 'user');

		$this->ModelSiswa->simpan($data,'siswa');
		redirect('SiswaController');
	}

    function hapus($id)
	{
		$where = array('id_siswa' => $id);
		$this->ModelSiswa->delete($where,'siswa');
		redirect('SiswaController');
	}

    function edit($id_siswa)
	{
		$where = array('id_siswa' =>$id_siswa);
        $data['title'] = 'Siswa';
        $data['gabung'] = $this->ModelSiswa->joinById($id_siswa);
		$data['siswa'] = $this->ModelSiswa->edit($where,'siswa');

		$this->load->view('dist/siswa/form_edit',$data);
	}

	function update()
	{
		$id_siswa = $this->input->post('id_siswa');
		$nama_siswa = $this->input->post('nama_siswa');
        $id_orang_tua = $this->input->post('id_orang_tua');
        $id_kelas = $this->input->post('id_kelas');
        $nisn = $this->input->post('nisn');

		$data = 
		array('id_siswa' =>$id_siswa,
			  'nama_siswa' =>$nama_siswa,
              'id_orang_tua' =>$id_orang_tua,
              'id_kelas'=>$id_kelas,
              'nisn'=>$nisn
		);

		$where = array('id_siswa' =>$id_siswa);

		$this->ModelSiswa->update($where,$data,'siswa');
		redirect('SiswaController');
	}
}