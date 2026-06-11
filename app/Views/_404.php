<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        <?= lang('System.404.title') ?> |
        <?= lang('System.site-name') ?>
    </title>
    <!-- Favicons -->
    <link href="<?= base_url('assets/img/favicon.webp') ?>" rel="icon">
    <link href="<?= base_url('assets/img/apple-touch-icon.webp') ?>" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <?php if ('th' == $lang) : ?>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Noto+Serif+Thai:wght@100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <?php else : ?>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <?php endif; ?>
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fontawesome-free-7.1.0/css/all.min.css') ?>" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Updated: Apr 20 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body style="background:#070f1b !important;">
<main>
    <div class="container">
        <section class="section d-flex flex-column align-items-center justify-content-center mt-5 pt-5">
            <h1 class="display-1" style="font-weight:bold; color:#c97232">404</h1>
            <h2 class="my-3" style="color:#c97232"><?= lang('System.404.got-lost') ?></h2>
            <a class="btn btn-dark mb-3" href="<?= base_url() ?>"><?= lang('System.404.return-to-safety') ?></a>
            <img src="<?= base_url('assets/img/not-found.webp') ?>" class="img-fluid py-5" alt="<?= lang('System.404.title') ?>" />
        </section>
    </div>
</main><!-- End #main -->
<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<!-- Template Main JS File -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html><?php
