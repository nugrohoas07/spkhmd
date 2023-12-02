<?php
/* $nim = $this->session->userdata('username');
$angkatan = $this->model_user->getKTM($nim);
$img = 'https://api.um.ac.id/akademik/operasional/GetFoto.ptikUM?nim=' . $nim . '&angkatan=' . $angkatan['tahun_masuk'] . ''; */
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <img src="<?= base_url('assets/') ?>img/logo hmj.png" alt="Logo HMJ" class="brand-image img-circle ">
    <span class="brand-text font-weight-light"><b>HMJ Teknik Elektro</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-2 pb-2 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/') ?>dist/img/default.png" onerror="this.src='<?= base_url('assets/') ?>dist/img/user2-160x160.jpg'" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a class="d-block"><?= $this->session->userdata('nama'); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo site_url('Admin') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('Admin/detail_pemira') ?>" class="nav-link">
            <i class="fas fa-newspaper nav-icon"></i>
            <p>Info PEMIRA</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('Admin/profil_calon') ?>" class="nav-link">
            <i class="fa fa-users nav-icon"></i>
            <p>Profil Calon</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('Admin/daftar_komentar') ?>" class="nav-link">
            <i class="fas fa-comment-alt nav-icon"></i>
            <p>Daftar Komentar</p>
          </a>
        </li>
        <li class="nav-item " title="Download Buku Panduan">
          <a href="<?= base_url('./panduan/panduan_admin.pdf') ?>" target="_blank" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
            <p>Buku Panduan</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>