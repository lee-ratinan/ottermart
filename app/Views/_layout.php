<!DOCTYPE html>
<html lang="<?= $locale ?>">
<?php
$locale_split = explode('-', $locale);
$country      = $locale_split[1];
?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $page_title . ' | ' . lang('System.site-name') ?></title>
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="<?= lang('System.author') ?>">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?= $page_title . ' | ' . lang('System.site-name') ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:image" content="<?= $og_image ?? base_url('assets/img/otternova-greeting.jpg') ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:type" content="website" />
    <!-- Favicons -->
    <?php if (!empty($business['business_logo'])) : ?>
        <link href="<?= $business['business_logo'] ?>" rel="icon">
    <?php else: ?>
        <link href="<?= base_url('assets/img/favicon.png') ?>" rel="icon">
        <link href="<?= base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">
    <?php endif ?>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <?php if ('th' == $country) : ?>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Noto+Serif+Thai:wght@100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <?php else: ?>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <?php endif; ?>
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/flag-icons-main/css/flag-icons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/fontawesome-free-7.1.0/css/all.min.css') ?>" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="<?= base_url('assets/css/main.min.css') ?>" rel="stylesheet">
    <!-- Link Languages -->
    <link rel="alternate" hreflang="en-th" href="<?= base_url('en-th/' . $url_part) ?>">
    <link rel="alternate" hreflang="th-th" href="<?= base_url('th-th/' . $url_part) ?>">
    <link rel="alternate" hreflang="x-default" href="<?= base_url($url_part) ?>">
    <link rel="canonical" href="<?= current_url() ?>">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "OtterNova",
            "url": "https://otternova.com/",
            "logo": "https://otternova.com/assets/img/logo-original.png"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "OtterNova",
            "url": "https://otternova.com/"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "SoftwareApplication",
            "name": "OtterNova",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "Web",
            "url": "https://otternova.com/",
            "description": "OtterNova is a smart booking and scheduling system for businesses, replacing paper chaos with an organized dashboard.",
            "offers": {
                "@type": "Offer",
                "price": "320",
                "priceCurrency": "THB",
                "description": "30-day free trial, then paid plans available."
            }
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ContactPage",
            "name": "Contact OtterNova",
            "url": "https://otternova.com/contact"
        }
    </script>
    <!-- =======================================================
    * Template Name: Aventro
    * Template URL: https://bootstrapmade.com/aventro-bootstrap-template/
    * Updated: Oct 31 2025 with Bootstrap v5.3.8
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body class="index-page country-<?= $country ?>">
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="<?= base_url($locale) ?>" class="logo d-flex align-items-center me-auto me-xl-0">
            <?php if (!empty($business['business_logo'])) : ?>
                <img src="<?= $business['business_logo'] ?>" alt="<?= lang('System.site-name') ?>">
                <h1 class="sitename"><?= $page_title ?></h1>
            <?php else: ?>
                <img src="<?= base_url('assets/img/logo-dark.png') ?>" alt="<?= lang('System.site-name') ?>">
                <h1 class="sitename"><?= lang('System.site-name') ?></h1>
            <?php endif; ?>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <?php if (isset($business)) : ?>
                <?php else: ?>
                    <li><a href="<?= getenv('main_site') . $locale ?>"><?= lang('System.main-site') ?></a></li>
                <?php endif; ?>
                <li><a href="#footer"><i class="bi bi-globe me-2"></i> <?= lang('System.locales.'. substr($locale, 0, 2)) ?></a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <div class="header-social-links">
            <a href="<?= getenv('SOCIAL_FACEBOOK') ?>" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="<?= getenv('SOCIAL_INSTAGRAM') ?>" class="instagram"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</header>
<?= $this->renderSection('content') ?>
<footer id="footer" class="footer light-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="<?= base_url($locale) ?>" class="logo d-flex align-items-center">
                    <span class="sitename"><?= lang('System.site-name') ?></span>
                </a>
                <div class="footer-contact">
<!--                    <p>--><?php //= lang('System.slogan') ?><!--</p>-->
<!--                    <p class="mt-3"><i class="bi bi-telephone"></i> --><?php //= format_phone_number(getenv('CONTACT_PHONE')) ?><!--</p>-->
<!--                    <p><i class="bi bi-envelope"></i> <a href="mailto:--><?php //= getenv('CONTACT_EMAIL') ?><!--">--><?php //= getenv('CONTACT_EMAIL') ?><!--</a></p>-->
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="<?= getenv('SOCIAL_FACEBOOK') ?>"><i class="bi bi-facebook"></i></a>
                    <a href="<?= getenv('SOCIAL_INSTAGRAM') ?>"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 footer-links">
            </div>
            <div class="col-lg-4 col-md-6 footer-links">
                <h4><?= lang('System.locales.title') ?></h4>
                <p>
                    <?php
                    $links         = [];
                    $country_code  = substr($locale, 3);
                    $country_array = [
                        'th' => ['th', 'en']
                    ];
                    echo '<span class="fi fi-' . $country_code . '"></span> &nbsp; ';
                    foreach ($country_array[$country_code] as $language_code) {
                        $links[] = '<a href="' . base_url($language_code . '-' . $country_code . '/' . $url_part) . '">' . lang('System.locales.' . $language_code) . '</a>';
                    }
                    echo implode('<span class="bi bi-dot"></span>', $links);
                    ?>
                </p>
            </div>
        </div>
    </div>
    <div class="container copyright text-center mt-4">
        <p>
            <?= lang('System.copyright-message', [date('Y')]) ?>
            | <a href="<?= getenv('main_site') . $locale ?>/terms-and-conditions"><?= lang('System.terms-and-conditions') ?></a>
            | <a href="<?= getenv('main_site') . $locale ?>/privacy-policy"><?= lang('System.privacy-policy') ?></a>
        </p>
    </div>
</footer>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Preloader -->
<div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<!-- Main JS File -->
<script src="<?= base_url('assets/js/main.min.js') ?>"></script>
</body>
</html>