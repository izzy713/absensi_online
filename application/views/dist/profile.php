<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <?= $this->session->userdata('username') ? 'Welcome, ' . $this->session->userdata('username') : 'Login dulu' ?>
            <?php if ($this->session->userdata('username')): ?>
            <?php endif; ?>
          <div class="section-body">
            <?php foreach ($user_data as $data): ?>
            <h2 class="section-title">Hi, <?= $data->username; ?></h2>
            
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?= $data->username; ?><div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?= $data->role; ?></div></div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input type="text" class="form-control" value="<?= $data->username; ?>">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Role</label>
                            <input type="text" class="form-control" value="<?= $data->username; ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div> -->
                  </form>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>