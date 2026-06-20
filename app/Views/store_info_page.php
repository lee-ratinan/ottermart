<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <?php if ('products' == $type) : ?>
            <?php include '_part_info_products.php'; ?>
        <?php elseif ('services' == $type) : ?>
            <?php include '_part_info_services.php'; ?>
        <?php endif; ?>
        <section class="section pt-0">
            <?php include '_part_business_header.php'; ?>
        </section>
    </main>
<?php $this->endSection() ?>