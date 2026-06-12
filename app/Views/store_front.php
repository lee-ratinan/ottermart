<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section pt-0">
            <?php include '_part_business_header.php'; ?>
            <?php include '_part_product_service_tabs.php'; ?>
            <?php include '_part_business_info_tab.php'; ?>
        </section>
    </main>
<?php $this->endSection() ?>