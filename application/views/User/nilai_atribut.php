<?php section('contents'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('User') ?>">HMJ</a></li>
                        <li class="breadcrumb-item">Kriteria dan Bobot</li>
                        <li class="breadcrumb-item active">Perhitungan</li>
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
                                    <a class="nav-link active disabled" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Pemberian Nilai</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="callout callout-info">
                                        <p>Beri nilai pada setiap kriteria berikut sesuai dengan pengetahuan atau pengamatan Anda terhadap calon.</p>
                                        <p>1 = Sangat Buruk, 2 = Buruk, 3 = Cukup Baik, 4 = Baik , 5 = Sangat Baik</p>
                                    </div>
                                    <form role="form" action="<?= site_url('user/input_nilai') ?>" class="form-submit" method="post">
                                        <?php foreach ($calon as $calon_this_year) : ?>
                                            <div class="mb-4">
                                                <h5>Calon : <?= $calon_this_year->nama ?></h5>
                                            </div>
                                            <div class="row">
                                                <?php foreach ($myKriteria as $kriteria_usr) : ?>
                                                    <div class="col-md-6">
                                                        <label for="nilai[<?= $calon_this_year->nim ?>][<?= $kriteria_usr->id_kriteria ?>]"><?= $kriteria_usr->kriteria ?></label>
                                                        <input class="range_5" type="text" class="form-control" name="nilai[<?= $calon_this_year->nim ?>][<?= $kriteria_usr->id_kriteria ?>]">
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php if ($calon_this_year !== end($calon)) : ?>
                                                <hr class="mt-4 mb-4"> <!-- garis pemisah -->
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <div class="mt-4 col-12 d-flex justify-content-center">
                                            <input type="hidden" name="simpan">
                                            <a href="<?= site_url('User/kriteria_bobot') ?>" class="btn btn-primary mr-2">Previous</a>
                                            <button type="submit" class="btn btn-primary" id="next-button">Next</button>
                                        </div>
                                    </form>
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
    $(document).ready(function() {
        // Temukan tombol "Next" berdasarkan ID
        var nextButton = $('#next-button');

        $('.range_5').ionRangeSlider({
            min: 0,
            max: 5,
            type: 'single',
            step: 1,
            prettify: false,
            grid: true,
            grid_num: 5,
            skin: 'round'
        })

        // Tentukan fungsi untuk memeriksa apakah semua input terisi
        function checkInputs() {
            var allInputsFilled = true;
            $('.range_5').each(function() {
                if ($(this).val() <= 0 || $(this).val() === '') { // jika input belum diisi atau kurang dari sama dengan 0
                    allInputsFilled = false;
                    return false; // Keluar dari loop jika ada yang belum terisi
                }
            });

            // Aktifkan atau nonaktifkan tombol "Next" berdasarkan hasil pemeriksaan
            if (allInputsFilled) {
                nextButton.prop('disabled', false);
            } else {
                nextButton.prop('disabled', true);
            }
        }

        // Panggil fungsi checkInputs saat halaman dimuat
        checkInputs();

        // Tambahkan event listener pada setiap input dengan class 'range_5'
        $('.range_5').on('input', checkInputs);
    });
</script>
<?php endsection(); ?>
<?php getview('template/core') ?>