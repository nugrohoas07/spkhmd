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
                  <?php if(!empty($calon)) { ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">Rank</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Skor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($calon as $row) : ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $row->foto ?></td>
                          <td><?= $row->nama ?></td>
                          <td><b><?= round($row->skor,3) ?></b></td>
                        </tr>
                      <?php $no++;
                      endforeach; ?>
                    </tbody>
                  </table>
                  <?php } else { ?>
                    Belum ada rekomendasi, silahkan <a href="<?= site_url('User/kriteria_bobot') ?>">Isi</a>
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