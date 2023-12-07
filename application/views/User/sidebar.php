<?php
/* $nim = $this->session->userdata('username');
$angkatan = $this->model_user->getKTM($nim);
$img = 'https://api.um.ac.id/akademik/operasional/GetFoto.ptikUM?nim=' . $nim . '&angkatan=' . $angkatan['tahun_masuk'] . ''; */
?>
<!--sidebar-dark-primary-->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <img src="<?= base_url('assets/') ?>img/logo hmj.png" alt="Logo HMJ" class="brand-image img-circle ">
    <span class="brand-text font-weight-light"><b>HMJ Teknik Elektro</b></span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/') ?>dist/img/default.png" onerror="this.src='<?= base_url('assets/') ?>dist/img/user2-160x160.jpg'" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->session->userdata('nama') ?></a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item ">
          <a href="<?= site_url('user/index') ?>" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- SPK SPK SPK SPK SPK -->
        <li class="nav-item">
          <a href="<?php echo site_url('User/profil_calon') ?>" class="nav-link">
            <i class="fas fa-user-friends nav-icon"></i>
            <p>Profil Calon</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-balance-scale"></i>
            <p>Penilaian<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo site_url('User/kriteria_bobot') ?>" class="nav-link">
                <i class="fas fa-calculator nav-icon"></i>
                <p>Proses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('User/rekomendasi_calon') ?>" class="nav-link">
                <i class="fas fa-poll nav-icon"></i>
                <p>Hasil Rekomendasi</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- /SPK SPK SPK SPK SPK -->
        <li class="nav-item " title="Download Buku Panduan">
          <a href="<?= base_url('./panduan/panduan_user.pdf') ?>" target="_blank" class="nav-link ">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku Panduan
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>