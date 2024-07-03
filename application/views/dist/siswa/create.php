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
              <div class="breadcrumb-item"><a href="#">Create</a></div>
              <!-- <div class="breadcrumb-item">DataTables</div> -->
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Create Kelas</h4>
                </div>
                <div class="card-body">
                  <form method="post" action="<?php echo base_url().'SiswaController/save'; ?>" class="form-group mt-4">
                    <div class="form-group">
                      <label>NIS</label>
                      <input type="text" class="form-control" name="id_siswa">
                    </div>
                    <div class="form-group">
                      <label>Nama Siswa</label>
                      <input type="text" class="form-control" name="nama_siswa">
                    </div>
                    <div class="form-group">
                      <label>Id Orangtua</label>
                      <select name="id_orang_tua" class="form-control">
                        <option>---</option>
                        <?php foreach ($gabung2 as $a): ?>
                          <option value="<?php echo $a->id_orang_tua; ?>"><?php echo $a->nama_orang_tua; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kelas</label>
                      <select name="id_kelas" class="form-control">
                        <option>---</option>
                        <?php foreach ($gabung3 as $a): ?>
                          <option value="<?php echo $a->id_kelas; ?>"><?php echo $a->nama_kelas; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>NISN</label>
                      <input type="text" class="form-control" name="nisn">
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 container">
                        <button class="btn btn-icon icon-left btn-success float-right" type="submit"><i class="fas fa-check"></i> Create</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>