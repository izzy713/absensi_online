<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Absensi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Absensi</a></div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Absensi</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 container">
                            <!-- <a href="<?php echo base_url(); ?>AbsenController/create" class="btn btn-icon icon-left btn-success float-right"><i class="fas fa-check"></i> Create</a> -->
                        </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Absen</th>
                            <th>Status Absensi</th>
                            <th>Status Kehadiran</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($absensi as $a) {
                              $status = "";
                              if ($a->flag_absen == "M") {
                                  $status = "Masuk";
                              } else if ($a->flag_absen == "P") {
                                  $status = "Pulang";
                              }
                          ?>
                              <tr>
                                  <td><?= $a->id_siswa; ?></td>
                                  <td><?= $a->nama_siswa; ?></td>
                                  <td><?= $a->tanggal_absen; ?></td>
                                  <td><?= $a->flag_absen; ?></td>
                                  <td><?= $a->status_kehadiran; ?></td>
                                  <td>
                                      <!-- If you want to add edit and delete buttons, uncomment the lines below -->
                                      <!-- <a href="<?php echo base_url('AbsensiController/edit/'.$a->id_absen); ?>" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a> -->
                                      <!-- <a href="<?php echo base_url('AbsensiController/hapus/'.$a->id_absen); ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a> -->
                                  </td>
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