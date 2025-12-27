<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <style>
        body, section, header {background-color: <?= '#'.$business['mart_background_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
        a, h1, h2, h3, h4, h5, h6 {color: <?= '#'.$business['mart_primary_color'] ?> !important;}
        .section-title h2::after {background: <?= '#'.$business['mart_primary_color'] ?> !important;}
        .btn-dark {background-color: <?= '#'.$business['mart_primary_color'] ?> !important;border: solid 1px <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_background_color'] ?> !important;}
        .btn-dark:hover {filter: brightness(0.9);}
        .btn-outline-dark {border: solid 1px <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_primary_color'] ?> !important;}
        .btn-outline-dark:hover {background-color: <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_background_color'] ?> !important;}
        .card-body {background-color: <?= '#'.$business['mart_background_color'] ?> !important;}
        .card {border: solid 2px <?= '#'.$business['mart_primary_color'] ?> !important;}
    </style>
    <main class="main">
        <section class="section mt-5">
            <div class="container section-title" data-aos="fade-up">
                <h2 class="mt-3"><?= $business['business_name'] ?></h2>
                <div class="my-3">
                    <?php if (is_array($business['social_media'])) : ?>
                        <?php foreach ($business['social_media'] as $social_key => $social_link) : ?>
                            <?php if (!empty($social_link)) : ?>
                                <a class="btn btn-outline-dark mx-2" href="<?= $social_link ?>" target="_blank"><i class="fa-brands fa-<?= $social_key ?>"></i></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ('product' == $type) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p><a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a></p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p><a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> / <?= $services['service_name'] ?> /</p>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <?php if (!empty($services['service_image'])) : ?>
                                        <img class="img-fluid" src="<?= $services['service_image'] ?>" alt="<?= $services['service_name'] ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <h2><?= $services['service_name'] ?></h2>
                                    <p><b><?= lang('System.pricing.from', [format_price($services['price_active_lowest'], $business['currency_code'])]) ?></b></p>
                                    <p><?= $services['service_description'] ?></p>
                                    <?php if ('A' != $services['is_active']) : ?>
                                    not available
                                    <?php else: ?>
                                        <?php foreach ($services['variants'] as $variant) : ?>
                                            <pre><?php print_r($variant) ?></pre>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // $('.btn-tab').click(function (e) {
            //     e.preventDefault();
            //     $('.tab-content').slideUp();
            //     $('.btn-tab').removeClass('btn-dark').addClass('btn-outline-dark');
            //     $(this).removeClass('btn-outline-dark').addClass('btn-dark');
            //     let target = 'tab-section-' + $(this).data('target');
            //     $('#'+target).slideDown();
            // });
        });
    </script>
<?php $this->endSection() ?>