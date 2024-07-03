<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SekolahController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Sekolah';
        $data['sekolah'] = $this->ModelSekolah->getSekolah();

        $this->load->view('dist/sekolah/view', $data);
    }

    function edit($id_sekolah)
	{
		$where = array('id_sekolah' =>$id_sekolah);
        $data['title'] = 'Sekolah';
		$data['sekolah'] = $this->ModelSekolah->edit($where,'sekolah');

		$this->load->view('dist/guru/form_edit',$data);
	}

	function update()
	{
		$id_sekolah = $this->input->post('id_sekolah');
		$nama_sekolah = $this->input->post('nama_sekolah');
        $alamat_sekolah = $this->input->post('alamat_sekolah');
        $lokasi_lat = $this->input->post('lokasi_lat');
        $lokasi_long = $this->input->post('lokasi_long');

		$data = 
		array('id_sekolah' =>$id_sekolah,
			  'nama_sekolah' =>$nama_sekolah,
              'alamat_sekolah'=>$alamat_sekolah,
              'lokasi_lat'=>$lokasi_lat,
              'lokasi_long'=>$lokasi_long
		);

		$where = array('id_sekolah' =>$id_sekolah);

		$this->ModelSekolah->update($where,$data,'sekolah');
		redirect('SekolahController');
	}

}