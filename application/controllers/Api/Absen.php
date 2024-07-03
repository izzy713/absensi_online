<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }
    
    public function index() {
        // Jika diperlukan, atur autentikasi di sini
    }
    
    public function submit_absen() {
        $tanggal_absen = date('Y-m-d H:i:s');
        $tanggal_absen = date('Y-m-d H:i:s', strtotime($tanggal_absen . ' +5 hours'));

        $data = array(
            'id_siswa' => $this->input->post('id_siswa'),
            'flag_absen' => $this->input->post('flag_absen'),
            'tanggal_absen' => $tanggal_absen,
            'status_kehadiran' => $this->input->post('status_kehadiran'),
            'lokasi_lat' => $this->input->post('lokasi_lat'),
            'lokasi_long' => $this->input->post('lokasi_long'),
            'keterangan' => $this->input->post('keterangan'),
            'foto' => $this->upload_foto()
        );
        
        $this->db->insert('absensi', $data);
        
        if($this->db->affected_rows() > 0) {
            echo "Absen berhasil disimpan.";
        } else {
            echo "Gagal menyimpan absen.";
        }
    }

    public function submit_izin() {
        // Konfigurasi upload dokumen izin
        $upload_path = './upload/izin/';
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
        $config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'pdf|doc|docx'; // Contoh jenis file yang diizinkan, sesuaikan dengan kebutuhan Anda
        $config['max_size']             = 2048; // maksimum 2MB
        $config['file_name']            = uniqid(); // Nama file unik
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('dokumen_izin')) {
            $error = $this->upload->display_errors();
            echo "Gagal mengunggah dokumen izin: $error";
            return;
        }
        
        $dokumen_izin = $this->upload->data('file_name');
        
        // Data izin yang akan disimpan
        $data = array(
            'id_orang_tua' => $this->input->post('id_orang_tua'),
            'desc_izin' => $this->input->post('desc_izin'),
            'dokumen_pendukung' => $dokumen_izin,
            'izin_cdate' => date('Y-m-d H:i:s', strtotime('+5 hours')), // Tambahkan 5 jam
            'izin_cuser' => $this->input->post('izin_cuser'),
            'status_izin' => $this->input->post('status_izin')
        );
        
        // Simpan data izin ke dalam database
        $this->db->insert('izin_absen', $data);
        
        // Periksa apakah data berhasil disimpan
        if($this->db->affected_rows() > 0) {
            echo "Data izin berhasil disimpan.";
        } else {
            echo "Gagal menyimpan data izin.";
        }
    }

    public function get_absensi_by_id_siswa() {
        // Mengambil data absensi dari database berdasarkan id_siswa
        $id_siswa = $this->input->get('id_siswa');
        $this->db->where('id_siswa', $id_siswa);
        $query = $this->db->get('absensi');
        
        // Periksa apakah data ditemukan
        if($query->num_rows() > 0) {
            $absensi = $query->result_array();
            echo json_encode($absensi); // Mengembalikan data absensi dalam format JSON
        } else {
            echo json_encode(array()); // Mengembalikan array kosong jika data tidak ditemukan
        }
    }
    
    private function generate_uuid() {
        // Generate UUID
        $uuid = uniqid();
        // Ambil 10 karakter pertama dari UUID
        $short_uuid = substr($uuid, 0, 10);
        return $short_uuid;
    }
    
    private function upload_foto() {
        // Direktori tempat upload
        $upload_path = './upload/absen';
    
        // Jika direktori tidak ada, buat direktori
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
    
        // Konfigurasi upload foto
        $config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048; // maksimum 2MB
        $config['file_name']            = uniqid(); // Nama file unik
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto')) {
            $data = $this->upload->data();
            return $data['file_name']; // Mengembalikan nama file yang diupload
        } else {
            echo $this->upload->display_errors();
        }
    }
    
}
?>
