<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
<main class="main business">
    <section class="section mt-5">
        <div class="container section-title" data-aos="fade-up">
            <div class="small mt-5"><?= $business['business_name'] ?></div>
            <h2 class="mt-3"><?= lang('System.cart.title') ?></h2>
        </div>
        <div class="container">
            <div class="row my-3">
                <div class="col-12">
                    <?php if (empty($cart)) : ?>
                        <p class="alert alert-warning"><?= lang('System.cart.empty-cart') ?></p>
                    <?php else: ?>
                        <pre><?php print_r($cart); ?></pre>
                        <pre><?php print_r($business); ?></pre>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $this->endSection() ?>