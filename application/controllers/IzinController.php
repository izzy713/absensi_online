<?php
defined('BASEPATH') or exit('No direct script access allowed');

class IzinController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Izin';
        $data['izin_absen'] = $this->ModelIzin->getIzin()->result_array();


        $this->load->view('dist/izin/view', $data);
    }

    public function create()
    {
        $data['title'] = 'Izin';
        $this->load->view('dist/izin/create', $data);
    }

    function save()
	{
		$id_orang_tua = $this->input->post('id_orang_tua');
		$desc_izin = $this->input->post('desc_izin');
		$status_izin = $this->input->post('status_izin');

		$data = 
		array('id_orang_tua' =>$id_orang_tua,
			'desc_izin' => $desc_izin,
			'status_izin' => $status_izin
		);

		$this->ModelIzin->simpan($data,'izin_absen');
		redirect('IzinController');
	}

    function hapus($id)
	{
		$where = array('id_data_izin' => $id);
		$this->ModelIzin->delete($where,'izin_absen');
		redirect('IzinController');
	}

    function edit($id_data_izin)
	{
		$where = array('id_data_izin' =>$id_data_izin);
        $data['title'] = 'Izin';
		$data['izin'] = $this->ModelIzin->edit($where,'izin_absen');

		$this->load->view('dist/izin/form_edit',$data);
	}

	function update()
	{
		$id_data_izin = $this->input->post('id_data_izin');
		$status_izin = $this->input->post('status_izin');
		$id_orang_tua = $this->input->post('id_orang_tua');
		$data = 
		array('id_data_izin' =>$id_data_izin,
			  'status_izin' =>$status_izin
		);

		$where = array('id_data_izin' =>$id_data_izin);

		$this->ModelIzin->update($where,$data,'izin_absen');
		$siswa = $this->ModelSiswa->joinOrangTuaAll($id_orang_tua);
		$postdata = 
		array('id_siswa' =>$siswa[0]->id_siswa,
				'flag_absen' => 'M',
				'tanggal_absen' => date('Y-m-d h:i:s'),
				'status_kehadiran' => $status_izin
		);
		$this->ModelAbsensi->simpan($postdata, 'absensi');

		redirect('IzinController');
	}
}