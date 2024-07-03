<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('dist/_partials/header'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Kelas</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
        <div class="breadcrumb-item"><a href="#">Edit</a></div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Form Edit Kelas</h4>
          </div>
          <?php foreach ($kelas->result() as $row) : ?>
            <div class="card-body">
              <form method="post" action="<?php echo base_url('KelasController/update'); ?>" class="form-group mt-4">
                <div class="form-group">
                  <label>ID Kelas</label>
                  <input readonly type="text" class="form-control" name="id_kelas" value="<?php echo $row->id_kelas; ?>">
                </div>
                <div class="form-group">
                  <label>Nama Kelas</label>
                  <input type="text" class="form-control" name="nama_kelas" value="<?php echo $row->nama_kelas; ?>">
                </div>
                <div class="form-group">
                  <label>Tingkat</label>
                  <select class="form-control" name="tingkat">
                    <option <?php if ($row->tingkat == '10') echo 'selected'; ?>>10</option>
                    <option <?php if ($row->tingkat == '11') echo 'selected'; ?>>11</option>
                    <option <?php if ($row->tingkat == '12') echo 'selected'; ?>>12</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select class="form-control" name="jurusan">
                    <option <?php if ($row->jurusan == 'TKJ') echo 'selected'; ?>>TKJ</option>
                    <option <?php if ($row->jurusan == 'MM') echo 'selected'; ?>>MM</option>
                    <option <?php if ($row->jurusan == 'RPL') echo 'selected'; ?>>RPL</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Sub Kelas</label>
                  <input type="text" class="form-control" name="sub_kelas" value="<?php echo $row->sub_kelas; ?>">
                </div>
                <div class="row mb-2">
                  <div class="col-md-8"></div>
                  <div class="col-md-4 container">
                    <button class="btn btn-icon icon-left btn-success float-right" type="submit"><i class="fas fa-check"></i> Update</button>
                  </div>
                </div>
              </form>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>
