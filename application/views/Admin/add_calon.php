<?php section('contents'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('Admin') ?>">HMJ</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('Admin/profil_calon') ?>">Profil Calon</a></li>
                        <li class="breadcrumb-item active">Form Tambah Calon</li>
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
                            <h3 class="card-title">Form Tambah Calon</h3>
                        </div>
                        <form role="form" action="<?= site_url('admin/update_calon') ?>" class="form-submit" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Calon<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Calon" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>NIM<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM Calon" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>Prodi<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Prodi Calon" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>Angkatan<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Tahun Masuk Calon" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>Semester<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester Calon Saat Ini" data-validation="required">
                                </div>
                                <div class="form-group">
                                    <label>IPK<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ipk" name="ipk" placeholder="IPK Calon Saat Ini" data-validation="required">
                                </div>
                                <div class="form-group ">
                                    <label>Foto<span class="text-danger">*</span><small class="text-danger"> (format file png,jpg,jpeg 128x128 maks 2MB)</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto" data-validation="size extension" data-validation-min-size="1kb" data-validation-min-size="2M" data-validation-allowing="png,jpg,jpeg">
                                        <label class="custom-file-label" for="foto">Pilih file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Visi dan Misi<span class="text-danger">*</span></label>
                                    <textarea class="textareacustom" name="vm" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pengalaman Organisasi<span class="text-danger">*</span></label>
                                    <textarea class="textareacustom" name="po" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="url" class="form-control" name="facebook" placeholder="https://www.facebook.com/username/">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input type="url" class="form-control" name="twitter" placeholder="https://twitter.com/username">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="instagram">Instagram</label>
                                            <input type="url" class="form-control" name="instagram" placeholder="https://www.instagram.com/username/">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="simpan">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php endsection(); ?>
<?php section('scripts') ?>
<script>
    $('.textareacustom').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['view', ['undo', 'redo', 'fullscreen']],
        ],
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '36', '48']
    });
</script>
<?php endsection(); ?>
<?php getview('template/core') ?>