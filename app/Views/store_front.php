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
                <div class="small mt-5"><?= $business['type_name'] ?></div>
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
                <div class="mx-auto" style="max-width:600px">
                    <p><?= $business['mart_store_intro_paragraph'] ?></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-dark btn-tab" data-target="services"><?= lang('System.store.services') ?></button>
                        <button class="btn btn-outline-dark btn-tab" data-target="products"><?= lang('System.store.products') ?></button>
                        <button class="btn btn-outline-dark btn-tab" data-target="branches"><?= lang('System.store.branches') ?></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 tab-content" id="tab-section-services">
                        <?php if (!empty($business['services'])) : ?>
                            <h2 class="pt-5" id="services"><?= lang('System.store.services') ?></h2>
                            <div class="row">
                                <?php foreach ($business['services'] as $service) : ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card">
                                            <?php if (!empty($service['service_image'])) : ?>
                                                <img class="card-img-top" src="<?= $service['service_image'] ?>" alt="<?= $service['service_name'] ?>">
                                            <?php endif; ?>
                                            <div class="card-body">
                                                <h3><?= $service['service_name'] ?></h3>
                                                <p>desc!!!<?= @$service['service_description'] ?></p>
                                                <p><?= lang('System.pricing.from', [$service['price_active_lowest']]) ?></p>
                                                <?php if ('A' == $service['is_active']) : ?>
                                                    <a class="btn btn-dark stretched-link" href="<?= base_url($locale . '/@' . $business['business_slug'] . '/services/' . $service['service_slug']) ?>"><?= lang('System.store.view-more') ?></a>
                                                <?php else: ?>
                                                    <?= lang('System.store.service-unavailable') ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p><?= lang('System.store.services-unavailable') ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 tab-content" id="tab-section-products" style="display: none">
                        <?php if (!empty($business['products'])) : ?>
                            <h2 class="pt-5" id="products"><?= lang('System.store.products') ?></h2>
                            <div class="row">
                                <?php foreach ($business['products'] as $product) : ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="card">
                                            <?php if (!empty($product['product_image'])) : ?>
                                                <img class="card-img-top" src="<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                            <?php endif; ?>
                                            <div class="card-body">
                                                <?php if ('-' != $product['product_tag']) : ?>
                                                    <div class="badge text-bg-danger"><?= lang('System.store.tag-' . $product['product_tag']) ?></div>
                                                <?php endif; ?>
                                                <h3><?= $product['product_name'] ?></h3>
                                                <p>desc!!!<?= @$product['product_description'] ?></p>
                                                <p><?= lang('System.pricing.from', [$product['price_active_lowest']]) ?></p>
                                                <?php if ('A' == $product['is_active']) : ?>
                                                    <a class="btn btn-dark stretched-link" href="<?= base_url($locale . '/@' . $business['business_slug'] . '/products/' . $product['product_slug']) ?>"><?= lang('System.store.view-more') ?></a>
                                                <?php else: ?>
                                                    <?= lang('System.store.product-unavailable') ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p><?= lang('System.store.products-unavailable') ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 tab-content" id="tab-section-branches" style="display: none">
                        <?php if (!empty($business['branches'])) : ?>
                            <h2 class="pt-5" id="branches"><?= lang('System.store.branches') ?></h2>
                            <div class="row">
                                <?php foreach ($business['branches'] as $branch) : ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <h3><?= $branch['branch_name'] ?></h3>
                                        <?php if ('PHYSICAL' == $branch['branch_type']) : ?>
                                            <p>
                                                <?= $branch['branch_address'] ?><br>
                                                <?= $branch['subdivision'] ?><br>
                                                <?= $business['country'] ?> <?= $branch['branch_postal_code'] ?>
                                            </p>
                                        <?php else : ?>
                                            <p><?= lang('System.store.this-is-online') ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <p><?= lang('System.store.branches-unavailable') ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('.btn-tab').click(function (e) {
                e.preventDefault();
                $('.tab-content').slideUp();
                $('.btn-tab').removeClass('btn-dark').addClass('btn-outline-dark');
                $(this).removeClass('btn-outline-dark').addClass('btn-dark');
                let target = 'tab-section-' + $(this).data('target');
                $('#'+target).slideDown();
            });
        });
    </script>
<?php $this->endSection() ?>