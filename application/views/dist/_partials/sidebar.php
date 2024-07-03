<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">Absensi Online</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">Ao</a>
          </div>
          <ul class="sidebar-menu">
          <?php if ($this->session->userdata('role') == 'admin'): ?>
            <li class="menu-header">Master</li>
              <li class="<?php echo $this->uri->segment(1) == 'SekolahController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SekolahController"><i class="fas fa-school"></i> <span>Profile Sekolah</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'KelasController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>KelasController"><i class="fa fa-list ml-1"></i> <span>Kelas</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'SiswaController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SiswaController"><i class="fa fa-list ml-1"></i> <span>Siswa</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'OrangTuaController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>OrangTuaController"><i class="fa fa-list ml-1"></i> <span>Orang Tua</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'GuruController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>GuruController"><i class="fa fa-list ml-1"></i> <span>Guru</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'UserController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>UserController"><i class="fa fa-list ml-1"></i> <span>User</span></a></li>

            <li class="menu-header">User</li>
              <li class="<?php echo $this->uri->segment(2) == 'dist' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist"><i class="fa fa-list ml-1"></i> <span>Dashboard</span></a></li>
              <li class="<?php echo $this->uri->segment(2) == 'IzinController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>IzinController"><i class="fa fa-list ml-1"></i> <span>Data Izin</span></a></li>
              <li class="<?php echo $this->uri->segment(2) == 'AbsenController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>AbsenController"><i class="fa fa-list ml-1"></i> <span>Data Absen</span></a></li>
              <li class="<?php echo $this->uri->segment(2) == 'Profile' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>Profile"><i class="fa fa-list ml-1"></i> <span>Profile</span></a></li>

          <?php endif; ?>

          <?php if ($this->session->userdata('role') == 'user'): ?>
            <li class="menu-header">Master</li>
              <li class="<?php echo $this->uri->segment(1) == 'SekolahController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SekolahController"><i class="fas fa-school"></i> <span>Profile Sekolah</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'KelasController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>KelasController"><i class="fa fa-list ml-1"></i> <span>Kelas</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'SiswaController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SiswaController"><i class="fa fa-list ml-1"></i> <span>Siswa</span></a></li>

            <li class="menu-header">User</li>
              <li class="<?php echo $this->uri->segment(2) == 'dist' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist"><i class="fa fa-list ml-1"></i> <span>Dashboard</span></a></li>
              <li class="<?php echo $this->uri->segment(2) == 'IzinController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>IzinController"><i class="fa fa-list ml-1"></i> <span>Data Izin</span></a></li>
              <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/blank"><i class="fa fa-list ml-1"></i> <span>Profile</span></a></li>
          <?php endif; ?>

          <?php if ($this->session->userdata('role') == 'guru'): ?>
            <li class="menu-header">Master</li>
              <li class="<?php echo $this->uri->segment(1) == 'SekolahController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SekolahController"><i class="fas fa-school"></i> <span>Profile Sekolah</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'KelasController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>KelasController"><i class="fa fa-list ml-1"></i> <span>Kelas</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'SiswaController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SiswaController"><i class="fa fa-list ml-1"></i> <span>Siswa</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'OrangTuaController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>OrangTuaController"><i class="fa fa-list ml-1"></i> <span>Orang Tua</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'GuruController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>GuruController"><i class="fa fa-list ml-1"></i> <span>Guru</span></a></li>

            <li class="menu-header">User</li>
              <li class="<?php echo $this->uri->segment(2) == 'dist' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist"><i class="fa fa-list ml-1"></i> <span>Dashboard</span></a></li>
              <li class="<?php echo $this->uri->segment(2) == 'blank' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/blank"><i class="fa fa-list ml-1"></i> <span>Profile</span></a></li>
          <?php endif; ?>

          <?php if ($this->session->userdata('role') == 'orangtua'): ?>
            <li class="menu-header">Master</li>
              <li class="<?php echo $this->uri->segment(1) == 'SekolahController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SekolahController"><i class="fas fa-school"></i> <span>Profile Sekolah</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'KelasController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>KelasController"><i class="fa fa-list ml-1"></i> <span>Kelas</span></a></li>
              <li class="<?php echo $this->uri->segment(1) == 'SiswaController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SiswaController"><i class="fa fa-list ml-1"></i> <span>Siswa</span></a></li>

            <li class="menu-header">User</li>
              <li class="<?php echo $this->uri->segment(2) == 'dist' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist"><i class="fa fa-list ml-1"></i> <span>Dashboard</span></a></li>
          <?php endif; ?>
          <?php if ($this->session->userdata('role') == 'siswa'): ?>
            <li class="menu-header">Master</li>
              <!-- <li class="<?php echo $this->uri->segment(1) == 'SekolahController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SekolahController"><i class="fas fa-school"></i> <span>Profile Sekolah</span></a></li> -->
              <!-- <li class="<?php echo $this->uri->segment(1) == 'KelasController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>KelasController"><i class="fa fa-list ml-1"></i> <span>Kelas</span></a></li> -->
              <!-- <li class="<?php echo $this->uri->segment(1) == 'SiswaController' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>SiswaController"><i class="fa fa-list ml-1"></i> <span>Siswa</span></a></li> -->

            <li class="menu-header">User</li>
              <li class="<?php echo $this->uri->segment(2) == 'dist' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist"><i class="fa fa-list ml-1"></i> <span>Dashboard</span></a></li>
          <?php endif; ?>

          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <?php if ($this->session->userdata('username')): ?>
              <a href="<?php echo base_url(); ?>Auth/logout" class="btn btn-danger btn-lg btn-block btn-icon-split">
                  <i class="fas fa-door-open"></i> Log Out
              </a>
          <?php else: ?>
              
          <?php endif; ?>

          </div>
        </aside>
      </div>
