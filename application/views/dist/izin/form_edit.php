<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Izin Absen</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Izin Absen</a></div>
              <div class="breadcrumb-item"><a href="#">Edit</a></div>
              <!-- <div class="breadcrumb-item">DataTables</div> -->
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Izin Absen</h4>
                </div>
                <?php foreach ($izin->result() as $row ) :?>
                <div class="card-body">
                <form method="post" action="<?php echo base_url().'IzinController/update'; ?>" class="form-group mt-4 mb-4">
                  <div class="form-group">
                  <!-- <input hidden type="text" class="form-control" name="id_data_izin" value="<?php echo $row->id_data_izin; ?>"> -->
                    <label>ID Izin</label>
                    <input readonly type="text" class="form-control" name="id_data_izin" value="<?php echo $row->id_data_izin; ?>">
                  </div>
                  <input type="hidden" name='id_orang_tua' value="<?php echo $row->id_orang_tua?>">
                  <div class="form-group">
                    <label for="status_izin">Status Izin</label>
                      <select class="form-control" id="status_izin" name="status_izin">
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                        <option value="Alfa">Alfa</option>
                      </select>
                  </div>
                  <div class="row mb-2">
                  <div class="col-md-8"></div>
                    <div class="col-md-4 container">
                      <button class="btn btn-icon icon-left btn-success float-right" type="submit"><i class="fas fa-check"></i> Update</button>
                    </div>
                  </div>
                </form>
                </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>