<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">User</a></div>
              <div class="breadcrumb-item"><a href="#">Edit</a></div>
              <!-- <div class="breadcrumb-item">DataTables</div> -->
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Edit User</h4>
                </div>
                <?php foreach ($user->result() as $row ) :?>
                <div class="card-body">
                <form method="post" action="<?php echo base_url().'UserController/update'; ?>" class="form-group mt-4 mb-4">
                  <div class="form-group">
                    <label>Username</label>
                    <input readonly type="text" class="form-control" name="username" value="<?php echo $row->username; ?>">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $row->password; ?>">
                  </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="role">
                    <option <?php if ($row->role == 'admin') echo 'selected'; ?>>Admin</option>
                    <option <?php if ($row->role == 'guru') echo 'selected'; ?>>Guru</option>
                    <option <?php if ($row->role == 'orangtua') echo 'selected'; ?>>OrangTua</option>
                    <option <?php if ($row->role == 'siswa') echo 'selected'; ?>>Siswa</option>
                  </select>
                </div>
                  <div class="row mb-2">
                  <div class="col-md-8"></div>
                    <div class="col-md-4 container">
                      <button class="btn btn-icon icon-left btn-success float-right" type="submit"><i class="fas fa-check"></i> Create</button>
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