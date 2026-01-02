<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
<?php
$service = $business['services'][$business['service_slugs'][$service_slug]];
$variant = $service['variants'][$business['service_variant_slugs'][$variant_slug]];
?>
    <style>
        body, section, header {background-color: <?= '#'.$business['mart_background_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
        a, h1, h2, h3, h4, h5, h6 {color: <?= '#'.$business['mart_primary_color'] ?> !important;}
        .section-title h2::after {background: <?= '#'.$business['mart_primary_color'] ?> !important;}
        .btn-dark {background-color: <?= '#'.$business['mart_primary_color'] ?> !important;border: solid 1px <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_background_color'] ?> !important;}
        .btn-dark:hover {filter: brightness(0.9);}
        .btn-outline-dark {border: solid 1px <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_primary_color'] ?> !important;}
        .btn-outline-dark:hover {background-color: <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_background_color'] ?> !important;}
        .card-body {background-color: <?= '#'.$business['mart_background_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
        .card {border: solid 2px <?= '#'.$business['mart_primary_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
    </style>
    <main class="main">
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
                        <?php
                        $min = date('Y-m-d');
                        $max = date('Y-m-d', strtotime('+90 day'));
                        ?>
                        <div class="mb-3">
                            <label for="date_from" class="form-label"><?= lang('System.form.filter.date_from') ?></label>
                            <input type="date" class="form-control" id="date_from" name="date_from" value="" min="<?= $min ?>" max="<?= $max ?>">
                        </div>
                        <div class="mb-3">
                            <label for="date_to" class="form-label"><?= lang('System.form.filter.date_to') ?></label>
                            <input type="date" class="form-control" id="date_to" name="date_to" value="" min="<?= $min ?>" max="<?= $max ?>">
                        </div>
                        <div class="mb-3">
                            <label for="branch_id" class="form-label"><?= lang('System.form.filter.branch_id') ?></label>
                            <select class="form-control" id="branch_id" name="branch_id">
                                <option value="">-</option>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let getSessions = function () {
                //let date_from = $('#date_from').val(),
                //    date_to = $('#date_to').val(),
                //    branch_id = $('#branch_id').val(),
                //    url = '<?php //= $schedule_url ?>//?date_from='+date_from+'&date_to='+date_to+'&branch_id='+branch_id;
                //$('#session-results').html('<div class="my-5 text-center"><i class="fa-solid fa-spinner fa-spin"></i></div>');
                //$.ajax({
                //    url: url,
                //    method: 'GET',
                //    dataType: 'json',
                //    success: function (response) {
                //        let template = '', timings = '';
                //        console.log(response.sessions);
                //        if (null !== response.sessions) {
                //            $('#session-results').html('');
                //            $.each(response.sessions, function (i, data) {
                //                timings  = '';
                //                template = '';
                //                $.each(data.sessions, function (i, time) {
                //                    timings += time.duration_str + '<br>';
                //                });
                //                template += '<div class="row"><div class="col-6 text-end"><b><?php //= lang('System.results.price') ?>//</b></div><div class="col-6" id="result-actual-price"><?php //= format_price($variant['price_active'], $business['currency_code']) ?>//</div></div>';
                //                template += '<div class="row"><div class="col-6 text-end"><b><?php //= lang('System.results.branch') ?>//</b></div><div class="col-6" id="result-branch">' + data.branch_name + '</div></div>';
                //                template += '<div class="row"><div class="col-6 text-end"><b><?php //= lang('System.results.capacity') ?>//</b></div><div class="col-6" id="result-capacity">' + data.session_capacity + '</div></div>';
                //                template += '<div class="row"><div class="col-12 text-center"><b><?php //= lang('System.results.sessions') ?>//</b><br>' + timings + '</div></div>';
                //                template += '<div class="row"><div class="col-12"><a class="btn btn-outline-dark w-100 mt-3" href="<?php //= base_url($locale . '/@' . $business['business_slug'] . '/checkout') ?>//?sid=' + data.link_id + '"><?php //= lang('System.results.btn-book') ?>//</a></div></div>';
                //                $('#session-results').append('<div class="col-12 col-lg-6"><div class="card mb-3"><div class="card-body">' + template + '</div></div></div>');
                //            });
                //        } else {
                //            $('#session-results').html('<div class="my-5 text-center"><?php //= lang('System.results.not-found') ?>//</div>');
                //        }
                //    },
                //    error: function (xhr, status, error) {
                //        console.error("An error occurred: " + error);
                //    }
                //});
            };
            getSessions();
            $('#btn-filter').click(function (e) {
                e.preventDefault();
                getSessions();
            });
        });
    </script>
<?php $this->endSection() ?>