<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
<?php
$service    = $business['services'][$business['service_slugs'][$service_slug]];
$variant_id = $business['service_variant_slugs'][$variant_slug];
$variant    = [];
foreach ($service['variants'] as $row) {
    if ($row['id'] == $variant_id) {
        $variant = $row;
        break;
    }
}
?>
    <main class="main business">
        <section class="section pt-0">
            <?php include '_part_business_header.php'; ?>
            <div class="container px-0 px-md-3" data-aos="fade-up">
                <div class="row">
                    <div class="col-12 px-4">
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
                            duration = response.duration,
                            branch_name = response.branch.branch_name,
                            branch_id = response.branch.id;
                        lang = '<?= $locale ?>', timing = '',
                            template = '', user_template = '', fullFormat = luxon.DateTime.DATETIME_MED, timeOnlyFormat = luxon.DateTime.TIME_SIMPLE;
                        if (0 === parseInt(response.branch.slotCount)) {
                            $('#session-results').html('<div class="col-12 text-center pt-5"><?= lang('System.results.not-found') ?></b>');
                        } else {
                            $('#session-results').html('');
                            let startTime = '', endTime = '', resource_ids = '';
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
                                resource_ids = '';
                                $.each(data.resources, function (resource_id, resource_name) {
                                    resource_ids += resource_id + ',';
                                });
                                resource_ids.slice(0, -1);
                                $.each(data.users, function (user_id, user_name) {
                                    user_template  = '<div class="row"><div class="col-12"><i class="bi bi-person-badge"></i> <b>' + user_name + '</b></div></div>';
                                    user_template += '<div class="row"><div class="col-12"><button class="btn btn-dark btn-add-to-cart w-100 mt-3" data-unit-price="<?= number_format($variant['price_active'], 2, '.', '') ?>" data-user-id="' + user_id + '" data-user-name="' + user_name + '" data-resource-ids="' + resource_ids + '" data-time-start-utc="' + data.start + '" data-time-end-utc="' + data.end + '" data-branch-id="' + branch_id + '"><?= lang('System.results.btn-book') ?></button></div></div>';
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
            $('body').on('click', '.btn-add-to-cart', function (e) {
                e.preventDefault();
                let service_variant_id = <?= $business['service_variant_slugs'][$variant_slug] ?>,
                    service_id = <?= $business['service_slugs'][$service_slug] ?>,
                    service_name = '<?= $business['services'][$business['service_slugs'][$service_slug]]['service_name'] ?>',
                    service_variant_name = '<?= $variant['variant_name'] ?>',
                    unit_price = $(this).data('unit-price'),
                    user_id = $(this).data('user-id'),
                    user_name = $(this).data('user-name'),
                    resource_ids = $(this).data('resource-ids'),
                    time_start_utc = $(this).data('time-start-utc'),
                    time_end_utc = $(this).data('time-end-utc'),
                    branch_id = $(this).data('branch-id');
                $.post(
                    "<?= base_url($locale . '/@' . $business['business_slug'] . '/add-to-cart') ?>",
                    {
                        item_type: 'adhoc-service',
                        service_variant_id: service_variant_id,
                        service_id: service_id,
                        service_name: service_name,
                        service_variant_name: service_variant_name,
                        booking_quantity: 1,
                        unit_price: unit_price,
                        user_id: user_id,
                        user_name: user_name,
                        resource_ids: resource_ids,
                        time_start_utc: time_start_utc,
                        time_end_utc: time_end_utc,
                        branch_id: branch_id
                    },
                    function (response, status) {
                        if (response.status === "OK") {
                            toastr.success('<?= lang('System.cart.item-added') ?>');
                            generateCartItems(response.cart.item_count, response.cart.line_items, response.cart.scheduled_service, response.cart.adhoc_service, response.cart.order_total);
                        } else {
                            toastr.error('<?= lang('System.cart.item-add-failed') ?>');
                        }
                    },
                    "json"
                ).fail(function (response) {
                    let message = response.responseJSON.message ?? '<?= lang('System.response-msg.error.generic') ?>';
                    toastr.error(message);
                });
            });
        });
    </script>
<?php $this->endSection() ?>