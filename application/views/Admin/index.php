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
                  echo ('666');
                  ?>
              </h3>
              <p>Persetujuan Baru</p>
            </div>
            <div class="icon">
              <i class="fas fa-balance-scale"></i>
            </div>
            <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div> <!-- end row small info box -->
      <?php if (!empty($pemira)) {
        $lisan = explode(" ", $pemira->kamp_lisan);
        $debat = explode(" ", $pemira->debat);
        $pemilu = explode(" ", $pemira->pemilihan);
        $lok_lisan = preg_replace('/((http|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1">\1</a>', $pemira->lok_lisan);
        $lok_debat = preg_replace('/((http|ttps):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1">\1</a>', $pemira->lok_debat);
        $lok_pemilu = preg_replace('/((http|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1">\1</a>', $pemira->lok_pemilihan);
      ?>
        <div class="card card-primary text-center">
          <div class="card-header">
            Jadwal PEMIRA <?= date('Y') ?>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col border-right border-left">
                <div class="description-block">
                  <h5 class="description-header">Kampanye Tulis</h5>
                  <p class="description-body">
                    <br><?= tanggal_indo($pemira->kamp_tulis_awal) ?> - <?= tanggal_indo($pemira->kamp_tulis_akhir) ?>
                  </p>
                </div>
              </div>
              <div class="col border-right border-left">
                <div class="description-block">
                  <h5 class="description-header">Kampanye Lisan</h5>
                  <p class="description-body">
                    <?= tanggal_indo($lisan[0]) ?>
                    <br><?= date('H:i', strtotime($lisan[1])) ?> WIB
                    <br><?= $lok_lisan ?>
                  </p>
                  </p>
                </div>
              </div>
              <div class="col border-right border-left">
                <div class="description-block">
                  <h5 class="description-header">Debat Calon</h5>
                  <p class="description-body">
                    <?= tanggal_indo($debat[0]) ?>
                    <br><?= date('H:i', strtotime($debat[1])) ?> WIB
                    <br><?= $lok_debat ?>
                  </p>
                </div>
              </div>
              <div class="col border-right border-left">
                <div class="description-block ">
                  <h5 class="description-header">Pemilu Raya</h5>
                  <p class="description-body">
                    <?= tanggal_indo($pemilu[0]) ?>
                    <br><?= date('H:i', strtotime($pemilu[1])) . " - " . date('H:i', strtotime($pemira->pemilihan_akhir)) ?> WIB
                    <br><?= $lok_pemilu ?>
                  </p>
                </div>
              </div>
              <div class="col border-right border-left">
                <div class="description-block ">
                  <h5 class="description-header">Pengumuman</h5>
                  <p class="description-body">
                    <br><?= tanggal_indo($pemira->pengumuman) ?>
                  </p>
                </div>
              </div>
            </div>
            <?php if ($pemira->keterangan) { ?>
              <div class="row">
                <div class="card-title"><b>Informasi Tambahan :</b></div>
              </div>
              <div class="row">
                <div class="text-left">
                  <?= $pemira->keterangan ?>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?> <!-- end info pemira -->
    </div>
  </div>
  </section>
</div>
<?php endsection(); ?>
<?php getview('template/core') ?>