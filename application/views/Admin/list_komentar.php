<?php section('contents'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('Admin') ?>">HMJ</a></li>
            <li class="breadcrumb-item active">Profil Calon</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Daftar Komentar</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Calon</th>
                    <th>Pengguna</th>
                    <th>Komentar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($komentar as $row) :
                    if ($row->anonim) {
                      $pengguna = substr($row->nama_user, 0, 1) . str_repeat('*', 5);
                    } else {
                      $pengguna = $row->nama_user;
                    }
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= implode(' ', array_slice(explode(' ', $row->nama_calon), 0, 2)) ?></td>
                      <td><?= implode(' ', array_slice(explode(' ', $pengguna), 0, 2)) ?></td>
                      <td><?= substr($row->komentar, 0, 50) . (strlen($row->komentar) > 50 ? '...' : '') ?></td>
                      <td class="text-center">
                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detail" title="Lihat Detail" onclick="getDetail(this);" data-pengguna="<?= $pengguna; ?>" data-komentar="<?= $row->komentar; ?>"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-danger btn-xs" title="Hapus" data-toggle="modal" data-target="#hapus" onclick="getHapus(this);" data-id="<?= $row->id ?>"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php $no++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title">Detail Komentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span style="color: whitesmoke;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b id="pengguna"></b>
        <p id="komentar"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title">Konfirmasi Hapus Komentar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span style="color: whitesmoke;" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <strong>
          <h4>Apakah anda ingin menghapus komentar ini?</h4>
        </strong>
      </div>
      <form role="form" action="<?= site_url('admin/crud_komentar') ?>" class="form-submit" method="post">
        <div class="modal-footer">
          <input type="hidden" id="id_komen_hapus" name="id_komentar">
          <input type="hidden" name="hapus">
          <button type="submit" class="btn btn-danger">Ya</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php endsection(); ?>

<?php section('scripts'); ?>
<script>
  function getDetail(identifier) {
    var button = $(identifier);
    var name = button.data('pengguna');
    var comment = button.data('komentar');

    $('#pengguna').html(name);
    $('#komentar').html(comment);
  }

  function getHapus(identifier) {
    var button = $(identifier);
    var id_komen = button.data('id');
    $('#id_komen_hapus').val(id_komen);
  }
</script>
<?php endsection(); ?>
<?php getview('template/core') ?>