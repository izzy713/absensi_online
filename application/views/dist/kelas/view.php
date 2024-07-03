<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Kelas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
              <!-- <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">DataTables</div> -->
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Kelas</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 container">
                            <a href="<?php echo base_url(); ?>KelasController/create" class="btn btn-icon icon-left btn-success float-right"><i class="fas fa-check"></i> Create</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Id Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Tingkat</th>
                            <th>Jurusan</th>
                            <th>Sub Kelas</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($kelas as $a) { ?>
                            <tr>
                            <td><?= $a['id_kelas']; ?></td>
                            <td><?= $a['nama_kelas']; ?></td>
                            <td><?= $a['tingkat']; ?></td>
                            <td><?= $a['jurusan']; ?></td>
                            <td><?= $a['sub_kelas']; ?></td>
                            <td>
                                <a href="<?php echo base_url('KelasController/edit/'.$a['id_kelas']); ?>" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                                <a href="<?php echo base_url('KelasController/hapus/'.$a['id_kelas']); ?>" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></a>
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