<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                <class="card-wrap">
                  <div class="card-header">
                    <h4>Total Siswa</h4>
                  </div>
                  <?php 
                    $totalSiswa = $this->db->query("SELECT count(id_siswa) AS totalSiswa FROM siswa");

                    foreach ($totalSiswa->result() as $row) {
                  ?>
                  <div class="card-body">
                    <?= $row->totalSiswa; ?>
                  </div>
                  <?php } ?>
                  <br/>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                <class="card-wrap">
                  <div class="card-header">
                    <h4>Total Guru</h4>
                  </div>
                  <?php 
                    $totalGuru = $this->db->query("SELECT count(id_guru) AS totalGuru FROM guru");

                    foreach ($totalGuru->result() as $row) {
                  ?>
                  <div class="card-body">
                    <?= $row->totalGuru; ?>
                  </div>
                  <?php } ?>
                  <br/>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                <class="card-wrap">
                  <div class="card-header">
                    <h4>Total Kelas</h4>
                  </div>
                  <?php 
                    $totalKelas = $this->db->query("SELECT count(id_Kelas) AS totalKelas FROM kelas");

                    foreach ($totalKelas->result() as $row) {
                  ?>
                  <div class="card-body">
                    <?= $row->totalKelas; ?>
                  </div>
                  <?php } ?>
                  <br/>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>