<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section pt-0">
            <?php include '_part_business_header.php'; ?>
            <?php include '_part_product_service_tabs.php'; ?>
            <?php include '_part_business_info_tab.php'; ?>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('.btn-tab').click(function (e) {
                e.preventDefault();
                $('.the-card').hide();
                $('.card-'+$(this).data('target')).slideDown();
                $('.btn-tab').removeClass('btn-dark').addClass('btn-outline-dark');
                $(this).removeClass('btn-outline-dark').addClass('btn-dark');
            });
        });
    </script>
<?php $this->endSection() ?>