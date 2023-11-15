<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMJ Teknik Elektro</title>
  <link rel="icon" href="<?php echo base_url('assets') ?>/img/logo hmj.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <b>SPK</b> HMD
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Buat Akun Baru</p>

        <form role="form" action="<?= site_url('register/register') ?>" method="post" class="form-submit">
          <div class="form-group mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" data-validation="required">
          </div>
          <div class="form-group mb-3">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="NIM" data-validation="length" data-validation-length="min12" data-validation="required">
          </div>
          <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="pass_confirmation" class="form-control" placeholder="Password" data-validation="required">
          </div>
          <div class="form-group mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Konfirmasi password" data-validation="confirmation" data-validation="required">
          </div>
          <div class="row mb-2">
            <div class="col-12">
              <input type="hidden" name="daftar">
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
          </div>
        </form>

        <a href="<?= base_url('login') ?>" class="text-center">Aku sudah punya akun</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
  <!--form validation-->
  <script src="<?= base_url('assets') ?>/dist/js/jquery.form-validator.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('assets') ?>/plugins/toastr/toastr.min.js"></script>
  <script>
    $.validate({
      lang: 'en',
      modules: 'sanitize, file, security, logic'
    });
    // toastr
    <?php if ($this->session->flashdata('success')) { ?>
      toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php } else if ($this->session->flashdata('error')) { ?>
      toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php } else if ($this->session->flashdata('warning')) { ?>
      toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php } else if ($this->session->flashdata('info')) { ?>
      toastr.info("<?php echo $this->session->flashdata('info'); ?>");
    <?php } ?>
  </script>
</body>

</html>