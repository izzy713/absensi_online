<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Izin</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Izin</a></div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Izin</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 container">
                            <a href="<?php echo base_url(); ?>IzinController/create" class="btn btn-icon icon-left btn-success float-right"><i class="fas fa-check"></i> Create</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>ID Izin</th>
                            <th>ID Orang Tua</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Dokumen Pendukung</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($izin_absen as $a) { ?>
                            <tr>
                            <td><?= $a['id_data_izin']; ?></td>
                            <td><?= $a['id_orang_tua']; ?></td>
                            <td><?= $a['desc_izin']; ?></td>
                            <td><?= $a['status_izin']; ?></td>
                            <td><a href=" <?= 'upload/izin/'.$a['dokumen_pendukung']; ?>" target="_blank"><?= $a['dokumen_pendukung']; ?></a></td>
                            <td>
                                <a href="<?php echo base_url('IzinController/edit/'.$a['id_data_izin']); ?>" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                                <a href="<?php echo base_url('IzinController/hapus/'.$a['id_data_izin']); ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a>
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