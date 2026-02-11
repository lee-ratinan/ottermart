<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
<?php
$service = $business['services'][$business['service_slugs'][$service_slug]];
$variant = $service['variants'][$business['service_variant_slugs'][$variant_slug]];
?>
    <main class="main business">
        <section class="section mt-5">
            <div class="container section-title" data-aos="fade-up">
                <h2 class="mt-3"><?= $business['business_name'] ?></h2>
                <div class="my-3">
                    <?php if (is_array($business['social_media'])) : ?>
                        <?php foreach ($business['social_media'] as $social_key => $social_link) : ?>
                            <?php if (!empty($social_link)) : ?>
                                <a class="btn btn-outline-dark mx-2" href="<?= $social_link ?>" target="_blank"><i
                                        class="fa-brands fa-<?= $social_key ?>"></i></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>/
                            <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> /
                            <a href="<?= base_url($locale . '/@' . $business['business_slug'] . '/services/' . $service_slug) ?>"><?= $service['service_name'] ?></a> /
                            <?= $variant['variant_name'] ?> /
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <h6><?= lang('System.form.filter.filter') ?></h6>
                        <div class="mb-3">
                            <label for="selected_date" class="form-label"><?= lang('System.form.filter.selected_date') ?></label>
                            <input type="date" class="form-control" id="selected_date" name="selected_date">
                        </div>
                        <div class="mb-3">
                            <label for="branch_id" class="form-label"><?= lang('System.form.filter.branch_id') ?></label>
                            <select class="form-control" id="branch_id" name="branch_id">
                                <?php foreach ($business['branches'] as $branch) : ?>
                                    <option value="<?= ($branch['id'] * ID_MASKED_PRIME) ?>"><?= $branch['branch_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-dark w-100" id="btn-filter">
                                <i class="fa-solid fa-filter"></i> <?= lang('System.form.filter.filter') ?>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 col-xl-9">
                        <h3><?= $service['service_name'] ?> / <?= $variant['variant_name'] ?></h3>
                        <hr/>
                        <div class="row" id="session-results"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php $maxWindow = (0 < $business['allow_advance_booking'] ? $business['allow_advance_booking'] : 3); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const date = new Date();
            const localDate = new Date(date.getTime() - (date.getTimezoneOffset() * 60000)).toISOString().split('T')[0];
            date.setDate(date.getDate() + <?= $maxWindow ?>);
            const maxDate = new Date(date.getTime() - (date.getTimezoneOffset() * 60000)).toISOString().split('T')[0];
            $('#selected_date').val(localDate).attr('min', localDate).attr('max', maxDate);
            let getSessions = function () {
                let selected_date = $('#selected_date').val(),
                    branch_id = $('#branch_id').val(),
                    url = '<?= $schedule_url ?>?selected_date='+selected_date+'&branch_id='+branch_id;
                $('#session-results').html('<div class="my-5 text-center"><i class="fa-solid fa-spinner fa-spin"></i></div>');
                $.ajax({
                    url: url,
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        let service_name = response.service_name,
                            variant_name = response.variant_name,
                            price_active_str = response.price_active_str,
                            price_active = response.price_active,
                            duration = response.duration,
                            branch_name = response.branch.branch_name,
                            lang = '<?= $locale ?>', timing = '',
                            template = '', user_template = '', fullFormat = luxon.DateTime.DATETIME_MED, timeOnlyFormat = luxon.DateTime.TIME_SIMPLE;
                        if (0 === parseInt(response.branch.slotCount)) {
                            $('#session-results').html('<div class="col-12 text-center pt-5"><?= lang('System.results.not-found') ?></b>');
                        } else {
                            $('#session-results').html('');
                            let startTime = '', endTime = '';
                            $.each(response.branch.availableSlots, function (index, data) {
                                timing       = '';
                                startTime    = luxon.DateTime.fromISO(data.start).setLocale(lang);
                                endTime      = luxon.DateTime.fromISO(data.end).setLocale(lang);
                                if (startTime.hasSame(endTime, 'day')) {
                                    timing = `${startTime.toLocaleString(fullFormat)} - ${endTime.toLocaleString(timeOnlyFormat)}<br>`;
                                } else {
                                    timing = `${startTime.toLocaleString(fullFormat)} - ${endTime.toLocaleString(fullFormat)}<br>`;
                                }
                                template  = '<div class="row"><div class="col-12"><b>' + service_name + ' &middot; ' + variant_name + '</b></div></div>';
                                template += '<div class="row"><div class="col-12"><?= lang('System.results.price') ?>: ' + price_active_str + '</div></div>';
                                template += '<div class="row"><div class="col-12"><?= lang('System.results.branch') ?>: ' + branch_name + '</div></div>';
                                template += '<div class="row"><div class="col-12">' + duration + ': <b style="font-size:1.2em;">' + timing + '</b></div></div>';
                                $.each(data.users, function (user_id, user_name) {
                                    user_template  = '<div class="row"><div class="col-12"><i class="bi bi-person-badge"></i> <b>' + user_name + '</b></div></div>';
                                    user_template += '<div class="row"><div class="col-12"><button class="btn btn-dark btn-add-to-cart w-100 mt-3"><?= lang('System.results.btn-book') ?></button></div></div>';
                                    $('#session-results').append('<div class="col-12 col-lg-6"><div class="card mb-3"><div class="card-body">' + template + user_template + '</div></div></div>');
                                });
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("An error occurred: " + error);
                    }
                });
            };
            getSessions();
            $('#btn-filter').click(function (e) {
                e.preventDefault();
                getSessions();
            });
        });
    </script>
<?php $this->endSection() ?>