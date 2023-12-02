<?php section('contents'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= site_url('User') ?>">HMJ</a></li>
                        <li class="breadcrumb-item active">Kriteria dan Bobot</li>
                        <li class="breadcrumb-item">Perhitungan</li>
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
                                    <a class="nav-link active disabled" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Menentukan Kriteria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Menentukan Bobot</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group clearfix">
                                                <i class="fa fa-info-circle"> Pilih kriteria ketua pilihan anda, minimal 3</i>
                                                <hr />
                                                <div class="row">
                                                    <?php foreach ($kriteria as $krit) : ?>
                                                        <div class="col-12 col-sm-4 col-md-3 icheck-primary">
                                                            <input class="checkbox-kriteria" type="checkbox" id="checkbox-<?= $krit->id ?>" value="<?= $krit->id ?>">
                                                            <label for="checkbox-<?= $krit->id ?>"><?= $krit->kriteria ?></label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="btn btn-primary" id="next-button" onclick="changeTab('custom-tabs-one-profile')" disabled>Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <i class="fa fa-info-circle"> Masukkan bobot tiap kriteria, Pastikan total keseluruhan bobot = 100%</i>
                                    <hr />
                                    <form role="form" action="<?= site_url('user/input_bobot') ?>" class="form-submit" method="post">
                                        <div class="row">
                                            <div class="col-12">
                                                <div id="dynamic-form"></div>
                                                <?php if (!empty($myKriteria)) {
                                                    foreach ($myKriteria as $kriteria_bf) :  ?>
                                                        <input type="hidden" name="kriteria_before[]" value="<?= $kriteria_bf->id_kriteria ?>">
                                                <?php endforeach;
                                                } ?>
                                                <input type="hidden" name="simpan">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                <button type="button" class="btn btn-primary mr-2" onclick="changeTab('custom-tabs-one-home')">Previous</button>
                                                <button type="submit" class="btn btn-primary">Next</button>
                                            </div>
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
        var kriteria = {};
        <?php foreach ($kriteria as $data) { ?>
            kriteria[<?= $data->id; ?>] = '<?= $data->kriteria; ?>';
        <?php } ?>

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

        var selectedValues = [];

        $('.checkbox-kriteria').change(function() {
            var newValues = $('.checkbox-kriteria:checked').map(function() {
                return this.value;
            }).get();

            // Compare the new values with the previous ones
            var addedValues = newValues.filter(value => !selectedValues.includes(value));
            var removedValues = selectedValues.filter(value => !newValues.includes(value));

            // Update the selected values
            selectedValues = newValues;

            // Process added values
            addedValues.forEach(function(value) {
                $.ajax({
                    url: '<?= base_url("user/get_bobot_usr/") ?>' + value,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var labelText = kriteria[value] + " (%)";
                        var placeholderText = 'Bobot ' + kriteria[value];

                        var formGroup = $('<div>').addClass('form-group');

                        var labelElement = $('<label>').text(labelText);

                        var inputHidden = $('<input>').attr('type', 'hidden').attr('name', 'id_kriteria[]').val(value);

                        var inputElement = $('<input>')
                            .attr('type', 'number')
                            .addClass('form-control')
                            .attr('name', 'bobot[]')
                            .attr('placeholder', placeholderText)
                            .attr('min', '0')
                            .attr('max', '100')
                            .attr('data-validation', 'required number totalSum100')
                            .attr('data-validation-allowing', 'range[1;100]');

                        inputElement.val(data.bobot_value);

                        formGroup.append(labelElement);
                        formGroup.append(inputHidden);
                        formGroup.append(inputElement);

                        $('#dynamic-form').append(formGroup);
                    },
                    error: function() {
                        console.log('Fetching data error');
                    }
                });
            });

            // Process removed values
            removedValues.forEach(function(value) {
                // Remove corresponding form elements based on value
                // This is to handle the case where a value is quickly unselected
                // before its corresponding AJAX request is complete
                $('#dynamic-form').find('[name="id_kriteria[]"][value="' + value + '"]').closest('.form-group').remove();
            });
        });

        $('.checkbox-kriteria').on('change', function() {
            var selectedOptions = $('.checkbox-kriteria:checked').map(function() {
                return this.value;
            }).get();
            var nextButton = document.getElementById('next-button');

            // Mengaktifkan atau menonaktifkan tombol berdasarkan apakah ada opsi yang dipilih
            if (selectedOptions && selectedOptions.length > 2) {
                nextButton.removeAttribute('disabled');
            } else {
                nextButton.setAttribute('disabled', 'disabled');
            }
        });
        
        $.formUtils.addValidator({
            name: 'totalSum100',
            validatorFunction: function(value, $el, config, language, $form) {
                var $fields = $form.find('[data-validation*="totalSum100"]');
                var sum = 0;

                $fields.each(function() {
                    var fieldValue = parseFloat($(this).val()) || 0;
                    sum += fieldValue;
                });

                return sum === 100;
            },
            errorMessage: 'Total bobot harus 100%', // Default message, dapat diubah dalam validasi
            errorMessageKey: 'badTotalSum100'
        });

    });

    function changeTab(tabId) {
        // Menonaktifkan semua elemen navigasi tab
        $('#custom-tabs-one-tab a').addClass('disabled');

        // Mengaktifkan hanya elemen navigasi tab yang sesuai
        $('#custom-tabs-one-tab a[href="#' + tabId + '"]').removeClass('disabled');

        // Mengaktifkan tab yang sesuai
        $('#custom-tabs-one-tab a[href="#' + tabId + '"]').tab('show');
    }
</script>
<?php endsection(); ?>
<?php getview('template/core') ?>