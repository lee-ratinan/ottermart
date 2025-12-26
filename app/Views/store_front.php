<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <style>
        body, section, header {background-color: <?= '#'.$business['mart_background_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
        a, h1, h2, h3, h4, h5, h6 {color: <?= '#'.$business['mart_primary_color'] ?> !important;}
        .section-title h2::after {background: <?= '#'.$business['mart_primary_color'] ?> !important;}
    </style>
    <main class="main">
        <section class="section mt-5">
            <div class="container section-title" data-aos="fade-up">
                <div class="small mt-5"><?= $business['type_name'] ?></div>
                <h2 class="mt-3"><?= $business['business_name'] ?></h2>
                <div class="my-3">
                    <?php foreach ($business['social_media'] as $social_key => $social_link) : ?>
                        <?php if (!empty($social_link)) : ?>
                            <a class="btn btn-outline-dark mx-2" href="<?= $social_link ?>" target="_blank"><i class="fa-brands fa-<?= $social_key ?>"></i></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <p><?= $business['mart_store_intro_paragraph'] ?></p>
            </div>
            <div class="container">
                <?php
                $links = [
                    'services' => base_url($locale . '/@' . $business['business_slug'] . '/services'),
                    'products' => base_url($locale . '/@' . $business['business_slug'] . '/products')
                ];
                ?>
                <div class="row">
                    <div class="col-12">
                        <?php if (!empty($business['services'])) : ?>
                            <h2><?= lang('System.store.services') ?></h2>
                            <div class="row">
                                <?php foreach ($business['services'] as $service) : ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <pre><?php print_r($service) ?></pre>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <hr />
                        <?php endif; ?>
                        <?php if (!empty($business['products'])) : ?>
                            <h2><?= lang('System.store.products') ?></h2>
                            <div class="row">
                                <?php foreach ($business['products'] as $product) : ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <pre><?php print_r($product) ?></pre>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <hr />
                        <?php endif; ?>
                        <?php if (!empty($business['branches'])) : ?>
                            <h2><?= lang('System.store.branches') ?></h2>
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
                            <hr />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $this->endSection() ?>