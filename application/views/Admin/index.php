<?php section('contents'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('Admin') ?>">HMJ</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php
                  echo('666');
                  ?>
              </h3>

              <p>Persetujuan Baru</p>
            </div>
            <div class="icon">
              <i class="fas fa-balance-scale"></i>
            </div>
            <a href="<?= site_url('Admin/persetujuan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>
  </div>
  </section>
</div>
<?php endsection(); ?>
<?php getview('template/core') ?>