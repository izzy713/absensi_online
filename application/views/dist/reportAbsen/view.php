<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Absen</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Absen</a></div>
              <!-- <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">DataTables</div> -->
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Absen</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 container">
                            <a href="<?php echo base_url(); ?>AbsenController/create" class="btn btn-icon icon-left btn-success float-right"><i class="fas fa-check"></i> Create</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Id Absensi</th>
                            <th>Id Siswa</th>
                            <th>Flag Absen</th>
                            <th>Tanggal Absen</th>
                            <th>Status Kehadiran</th>
                            <th>Lokasi Absen</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($absen as $a) { ?>
                            <tr>
                            <td><?= $a['id_absen']; ?></td>
                            <td><?= $a['id_siswa']; ?></td>
                            <td><?= $a['flag_absen']; ?></td>
                            <td><?= $a['tanggal_absen']; ?></td>
                            <td><?= $a['status_kehadiran']; ?></td>
                            <td><?= $a['lokasi_lat'],$a['lokasi_long'] ; ?></td>
                            <td><?= $a['keterangan']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>