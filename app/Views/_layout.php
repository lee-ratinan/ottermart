<!DOCTYPE html>
<html lang="<?= $locale ?>">
<?php
$locale_split = explode('-', $locale);
$country      = $locale_split[1];
$language     = $locale_split[0];
$session      = \Config\Services::session();
$cart         = $session->get('cart');
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
    <meta property="og:image" content="<?= $og_image ?? base_url('assets/img/otternova-greeting.webp') ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:type" content="website" />
    <!-- Favicons -->
    <?php if (!empty($business['business_logo'])) : ?>
        <link href="<?= $business['business_logo'] ?>" rel="icon">
    <?php else: ?>
        <link href="<?= base_url('assets/img/favicon.webp') ?>" rel="icon">
        <link href="<?= base_url('assets/img/apple-touch-icon.webp') ?>" rel="apple-touch-icon">
    <?php endif ?>
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
    <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/drift-zoom/drift-basic.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/flag-icons-main/css/flag-icons.min.css') ?>" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
    <!-- Link Languages -->
    <link rel="alternate" hreflang="en-th" href="<?= base_url('en-th/' . $url_part) ?>">
    <link rel="alternate" hreflang="th-th" href="<?= base_url('th-th/' . $url_part) ?>">
    <link rel="alternate" hreflang="x-default" href="<?= base_url($url_part) ?>">
    <link rel="canonical" href="<?= current_url() ?>">
    <?php if (!empty($business)) : ?>
        <style>
            <?php
            $contrastColor = getContrastColor($business['mart_background_color']);
            $contrastColor2 = getContrastColor($business['mart_background_color'], '0.2');
            $contrastColor3 = getContrastColor($business['mart_background_color'], '0.5');
            ?>
            .header .main-bar, section {background-color: <?= '#'.$business['mart_background_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
            .navmenu a, .business h1, h1.sitename, .business h2, .business h3, .business h4, .business h5, .business h6 {color: <?= '#'.$business['mart_primary_color'] ?> !important;}
            .business a, .product-details .info-tabs .desc-content .highlight-card>i, .product-details .info-tabs .desc-content .included-box h4 i, .cards .product-card .product-info .product-price .current-price, .cards .product-card .product-info .product-price .original-price {color: <?= '#'.$business['mart_primary_color'] ?>;}
            .product-details .info-tabs .desc-content .highlight-card p,
            .product-details .info-tabs .desc-content .included-box ul li,
            .product-details .info-tabs .specs-content .spec-block .data-table tr td:first-child,
            .product-details .info-tabs .specs-content .spec-block .data-table tr td:last-child {color: <?= '#'.$business['mart_text_color'] ?>;}
            .tab-content, .product-details .info-tabs {background-color: <?= '#'.$business['mart_background_color'] ?>;border-color: <?= $contrastColor2 ?>;}
            .business a:hover {color: <?= '#'.$business['mart_text_color'] ?>;}
            .cards .filter-tabs .nav-item .nav-link.active {color:<?= '#'.$business['mart_primary_color'] ?>;border-bottom: 3px solid <?= '#'.$business['mart_primary_color'] ?>;}
            .cards .tab-nav-wrapper {border-bottom: 1px solid <?= '#'.$business['mart_text_color'] ?>;}
            .cards .product-card .product-thumb .new-badge {background-color: <?= '#'.$business['mart_primary_color'] ?>;color: <?= '#'.$business['mart_background_color'] ?>;}
            .cards .product-card, .cards .product-card:hover {border-color: <?= $contrastColor2 ?>;}
            .hero .intro-content .badge-label {background: color-mix(in srgb, <?= '#'.$business['mart_primary_color'] ?>, transparent 90%);color: <?= '#'.$business['mart_primary_color'] ?>;border: 1px solid color-mix(in srgb, <?= '#'.$business['mart_primary_color'] ?>, transparent 70%);}
            .btn-otternaut {background-color: <?= '#'.$business['mart_primary_color'] ?>;color: <?= '#'.$business['mart_background_color'] ?>;border: 1px solid <?= '#'.$business['mart_primary_color'] ?>;}
            .btn-otternaut:hover {background-color: <?= '#'.$business['mart_text_color'] ?>;color: <?= '#'.$business['mart_background_color'] ?>;border: 1px solid <?= '#'.$business['mart_text_color'] ?>;}
            .product-details .info-tabs .specs-content .spec-block h4 {border-left: 3px solid <?= '#'.$business['mart_primary_color'] ?>;}
            .product-details .info-tabs .tab-nav .nav-link {color: <?= $contrastColor3 ?>;}
            .product-details .info-tabs .tab-nav .nav-link:hover {color: <?= $contrastColor2 ?>;}
            .product-details .info-tabs .tab-nav .nav-link.active {color: <?= '#'.$business['mart_primary_color'] ?>;background-color: <?= $contrastColor2 ?>;border-bottom-color: <?= '#'.$business['mart_primary_color'] ?>;}
            .cards .product-card {background-color: <?= '#'.$business['mart_background_color'] ?>;color: <?= '#'.$business['mart_text_color'] ?>;}
            .product-details .info-tabs .desc-content .highlight-card,
            .product-details .info-tabs .desc-content .included-box,
            .product-details .info-tabs .specs-content .spec-block .data-table tr:nth-child(even),
            .product-details .info-tabs .tab-nav {background-color: <?= $contrastColor ?>;}
        </style>
    <?php endif; ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "OtterNova",
            "url": "https://otternova.com/",
            "logo": "https://otternova.com/assets/img/logo-original.webp"
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
    * Template Name: ShopWise
    * Template URL: https://bootstrapmade.com/shopwise-bootstrap-ecommerce-template/
    * Updated: Apr 08 2026 with Bootstrap v5.3.8
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body class="index-page country-<?= $country ?> language-<?= $language ?>">
<header id="header" class="header position-relative">
    <!-- Top Utility Bar -->
    <div class="utility-bar">
        <div class="container-fluid container-xl">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="utility-links">
                        <?php if (isset($business)) : ?>
                            <a href="<?= base_url($locale) ?>" class="utility-link"><i class="bi bi-reply"></i> <span><?= lang('System.back-to-ottermart') ?></span></a>
                        <?php endif; ?>




                    </div>
                </div>
                <div class="col text-end">
                    <span class="promo-text d-none">...</span>
                    <div class="utility-links d-inline text-end">
                        <a href="<?= getenv('main_site') ?>" class="utility-link float-end">
                            <i class="bi bi-arrow-left-circle"></i>
                            <span><?= lang('System.main-site') ?></span>
                        </a>
                        <span class="utility-divider"></span>
                        <a href="<?= getenv('main_site') . $locale ?>/contact" class="utility-link float-end">
                            <i class="bi bi-headset"></i>
                            <span><?= lang('System.contact-us') ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header -->
    <div class="main-bar">
        <div class="container-fluid container-xl">
            <div class="row align-items-center gy-2">
                <!-- Logo -->
                <div class="col-auto">
                    <?php if (isset($business)) : ?>
                        <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>" class="logo d-flex align-items-center">
                            <?php if (!empty($business['business_logo'])) : ?>
                                <img src="<?= $business['business_logo'] ?>" alt="<?= $business['business_name'] ?>">
                            <?php endif; ?>
                            <h1 class="sitename"><?= $page_title ?></h1>
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                            <img src="<?= base_url('assets/img/logo-dark.webp') ?>" alt="<?= lang('System.site-name') ?>">
                            <h1 class="sitename"><?= lang('System.site-name') ?></h1>
                        </a>
                    <?php endif; ?>
                </div>
                <!-- Search -->
                <div class="col d-none d-lg-block">
                    <?php if (!isset($business)) : ?>
                        <form class="search-bar">
                            <label for="search-field" class="d-none"><?= lang('System.home.search') ?></label>
                            <i class="bi bi-search search-icon"></i>
                            <input id="search-field" type="text" name="business-name" class="search-field" placeholder="<?= lang('System.home.search') ?>" value="<?= @$results['query'] ?>">
                            <button class="search-submit" type="submit"><?= lang('System.home.search') ?></button>
                        </form>
                    <?php endif; ?>
                </div>
                <!-- Actions -->
                <div class="col-auto ms-auto ms-lg-0">
                    <div class="action-group d-flex align-items-center">
                        <?php if (!isset($business)) : ?>
                        <!-- Mobile Search Toggle -->
                        <button class="action-btn mobile-search-toggle d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false" aria-controls="mobileSearch">
                            <i class="bi bi-search"></i>
                        </button>
                        <?php else: ?>
                        <!-- Cart -->
                        <div class="dropdown">
                            <button class="action-btn" data-bs-toggle="dropdown" aria-label="Cart">
                                <i class="bi bi-bag"></i>
                                <span class="badge-count">3</span>
                            </button>
                            <div class="dropdown-menu cart-flyout">
                                <div class="flyout-top">
                                    <h6>Your Bag</h6>
                                    <span class="items-label">3 items</span>
                                </div>
                                <div class="flyout-items">
                                    <!-- Cart Item 1 -->
                                    <div class="flyout-item">
                                        <div class="flyout-item-thumb">
                                            <img src="" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="flyout-item-details">
                                            <h6>Woven Tote Handbag</h6>
                                            <span class="item-option">Beige / Medium</span>
                                            <div class="item-bottom">
                                                <span class="item-price">$89.00</span>
                                                <span class="item-qty">x1</span>
                                            </div>
                                        </div>
                                        <button class="item-dismiss" aria-label="Remove item">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div><!-- End Cart Item -->

                                    <!-- Cart Item 2 -->
                                    <div class="flyout-item">
                                        <div class="flyout-item-thumb">
                                            <img src="" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="flyout-item-details">
                                            <h6>Slim Fit Denim Jacket</h6>
                                            <span class="item-option">Indigo / L</span>
                                            <div class="item-bottom">
                                                <span class="item-price">$145.00</span>
                                                <span class="item-qty">x1</span>
                                            </div>
                                        </div>
                                        <button class="item-dismiss" aria-label="Remove item">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div><!-- End Cart Item -->

                                    <!-- Cart Item 3 -->
                                    <div class="flyout-item">
                                        <div class="flyout-item-thumb">
                                            <img src="" alt="Product" class="img-fluid">
                                        </div>
                                        <div class="flyout-item-details">
                                            <h6>Canvas Low-Top Sneakers</h6>
                                            <span class="item-option">Off-White / 40</span>
                                            <div class="item-bottom">
                                                <span class="item-price">$68.00</span>
                                                <span class="item-qty">x1</span>
                                            </div>
                                        </div>
                                        <button class="item-dismiss" aria-label="Remove item">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div><!-- End Cart Item -->
                                </div>
                                <div class="flyout-bottom">
                                    <div class="subtotal-row">
                                        <span>Subtotal</span>
                                        <span class="subtotal-value">$302.00</span>
                                    </div>
                                    <a href="checkout.html" class="btn btn-proceed">Proceed to Checkout</a>
                                    <a href="cart.html" class="link-viewbag">View full bag →</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Navigation Toggle -->
                        <i class="mobile-nav-toggle d-none bi bi-list me-0"></i>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Search Form -->
    <div class="collapse" id="mobileSearch">
        <div class="container-fluid container-xl">
            <form class="mobile-search">
                <div class="mobile-search-inner">
                    <i class="bi bi-search"></i>
                    <label>
                        <input type="text" name="business-name" class="form-control" placeholder="<?= lang('System.home.search') ?>">
                    </label>
                </div>
            </form>
        </div>
    </div>
</header>
<?= $this->renderSection('content') ?>
<footer id="footer" class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row gy-4">
                <div class="col-12 col-lg-4">
                    <div class="footer-widget footer-about">
                        <?php if (isset($business)) : ?>
                            <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>" class="logo">
                                <?php if (!empty($business['business_logo'])) : ?>
                                    <img src="<?= $business['business_logo'] ?>" alt="<?= $business['business_name'] ?>">
                                <?php endif; ?>
                                <span class="sitename"><?= $business['business_name'] ?></span>
                            </a>
                            <ul class="footer-links">
                                <li><a href="<?= base_url($locale) ?>"><i class="bi bi-reply"></i> <span><?= lang('System.back-to-ottermart') ?></span></a></li>
                            </ul>
                        <?php else: ?>
                            <a href="<?= base_url($locale) ?>" class="logo">
                                <img src="<?= base_url('assets/img/logo-dark.webp') ?>" alt="<?= lang('System.site-name') ?>">
                                <span class="sitename"><?= lang('System.site-name') ?></span>
                            </a>
                            <p><?= lang('System.footer-note') ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer-widget">
                        <h4><?= lang('System.contact') ?></h4>
                        <ul class="footer-links">
                            <?php if (isset($business)) : ?>
                                <?php if (!empty($business['contact_phone_number'])) : ?>
                                    <li><a href="tel:<?= $business['contact_phone_number'] ?>"><i class="bi bi-telephone"></i> <?= format_phone_number($business['contact_phone_number']) ?></a></li>
                                <?php endif; ?>
                                <?php if (!empty($business['contact_email_address'])) : ?>
                                    <li><a href="mailto:<?= $business['contact_email_address'] ?>"><i class="bi bi-envelope"></i> <?= $business['contact_email_address'] ?></a></li>
                                <?php endif; ?>
                                <?php if (!empty($business['contact_website'])) : ?>
                                    <li><a href="<?= $business['contact_website'] ?>" target="_blank"><i class="bi bi-globe-americas"></i> <?= $business['contact_website'] ?></a></li>
                                <?php endif; ?>
                                <li><i class="bi bi-geo-alt"></i> <?= $business['country'] ?></li>
                            <?php else: ?>
                                <li><a href="tel:<?= getenv('CONTACT_PHONE') ?>"><i class="bi bi-telephone"></i> <?= format_phone_number(getenv('CONTACT_PHONE')) ?></a></li>
                                <li><a href="mailto:<?= getenv('CONTACT_EMAIL') ?>"><i class="bi bi-envelope"></i> <?= getenv('CONTACT_EMAIL') ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer-widget">
                        <div class="social-links">
                            <?php if (isset($business)) : ?>
                                <?php if (is_array($business['social_media'])) : ?>
                                    <h5><?= lang('System.follow-us', [$business['business_name']]) ?></h5>
                                    <div class="my-2">
                                        <?php foreach ($business['social_media'] as $social_key => $social_link) : ?>
                                            <?php if (!empty($social_link)) : ?>
                                                <a class="btn btn-outline-dark me-2" href="<?= $social_link ?>" target="_blank"><i class="bi bi-<?= $social_key ?>"></i></a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <h5><?= lang('System.follow-us', [lang('System.site-name')]) ?></h5>
                                <div class="my-2">
                                    <?php foreach (get_social_list() as $icon => $url) : ?>
                                        <a class="btn btn-outline-dark me-2" href="<?= $url ?>" aria-label="<?= $icon ?>"><i class="bi bi-<?= $icon ?>"></i></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="footer-widget mt-4">
                            <h5><?= lang('System.locales.title') ?></h5>
                            <ul class="footer-links">
                                <?php foreach (get_locale($country) as $lc => $label) : ?>
                                    <?php $business_path = (isset($business)) ? '/@' . $business['business_slug'] : ''; ?>
                                    <li><a href="<?= base_url($lc . '-' . $country . $business_path) ?>"><?= $label ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright text-center">
                <p>
                    <?= lang('System.copyright-message', [date('Y')]) ?>
                </p>
                <p>
                    <a href="<?= getenv('main_site') . $locale ?>/terms-and-conditions"><?= lang('System.terms-and-conditions') ?></a> <span class="mx-3">|</span>
                    <a href="<?= getenv('main_site') . $locale ?>/privacy-policy"><?= lang('System.privacy-policy') ?></a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!--<script src="--><?php //= base_url('assets/vendor/php-email-form/validate.js') ?><!--'"></script>-->
<script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/drift-zoom/Drift.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
<!-- Main JS File -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>