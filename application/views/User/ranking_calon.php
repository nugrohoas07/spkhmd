<?php section('head'); ?>
<style>
  tr td {
    vertical-align: middle !important;
    /* Posisi tengah vertikal */
    font-size: 18px;
    /* Ukuran huruf */
    font-weight: bold;
    /* Teks menjadi tebal */
  }
</style>
<?php endsection(); ?>
<?php section('contents'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('User') ?>">HMJ</a></li>
            <li class="breadcrumb-item">Kriteria dan Bobot</li>
            <li class="breadcrumb-item">Perhitungan</li>
            <li class="breadcrumb-item active">Rekomendasi</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active disabled" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Hasil Rekomendasi</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                  <?php if (!empty($calon)) { ?>
                    <div class="mb-4 col-12 text-center">
                      <h4>Rekomendasi Calon Pilihanmu Adalah <div class="text-primary"><?= $calon[0]->nama ?></div></h4>
                    </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th style="width: 10px">Rank</th>
                          <th></th>
                          <th>Nama</th>
                          <th>Skor</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        foreach ($calon as $row) : ?>
                          <tr>
                            <td style="width: 5%" class="align-middle text-center"><?= $no ?></td>
                            <td style="width: 15%"><img class="profile-user-img img-fluid" src="<?= base_url('upload/') ?>foto/<?= $row->foto ?>" onerror="this.src='<?= base_url('assets/') ?>dist/img/default.png'" alt="Foto Calon"></td>
                            <td class="align-middle"><?= $row->nama ?></td>
                            <td class="align-middle"><b><?= round($row->skor, 3) ?></b></td>
                          </tr>
                        <?php $no++;
                        endforeach; ?>
                      </tbody>
                    </table>
                  <?php } else { ?>
                    Belum ada rekomendasi, silahkan proses rekomendasi <a href="<?= site_url('User/kriteria_bobot') ?>">disini</a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php endsection(); ?>

<?php section('scripts'); ?>
<script>

</script>
<?php endsection(); ?>
<?php getview('template/core') ?>