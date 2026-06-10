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
    <!-- Main CSS File -->
    <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
    <!-- Link Languages -->
    <link rel="alternate" hreflang="en-th" href="<?= base_url('en-th/' . $url_part) ?>">
    <link rel="alternate" hreflang="th-th" href="<?= base_url('th-th/' . $url_part) ?>">
    <link rel="alternate" hreflang="x-default" href="<?= base_url($url_part) ?>">
    <link rel="canonical" href="<?= current_url() ?>">
    <?php if (!empty($business)) : ?>
        <style>
            body, section, header {background-color: <?= '#'.$business['mart_background_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
            .business a, .navmenu a, .business h1, h1.sitename, .business h2, .business h3, .business h4, .business h5, .business h6 {color: <?= '#'.$business['mart_primary_color'] ?> !important;}
            .business .section-title h2::after {background: <?= '#'.$business['mart_primary_color'] ?> !important;}
            .business .btn-dark {background-color: <?= '#'.$business['mart_primary_color'] ?> !important;border: solid 1px <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_background_color'] ?> !important;}
            .business .btn-dark:hover {filter: brightness(0.9);}
            .business .btn-outline-dark {border: solid 1px <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_primary_color'] ?> !important;}
            .business .btn-outline-dark:hover {background-color: <?= '#'.$business['mart_primary_color'] ?> !important;color: <?= '#'.$business['mart_background_color'] ?> !important;}
            .business .card-body {color: <?= '#'.$business['mart_text_color'] ?> !important;}
            .business .card {border: solid 1px <?= '#'.$business['mart_primary_color'] ?> !important; background-color: <?= '#'.$business['mart_background_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
            .business table td, .business table th {background-color: transparent !important; color: <?= '#'.$business['mart_text_color'] ?> !important; border-bottom: 1px solid <?= '#'.$business['mart_primary_color'] ?>;}
            .business input, .business select, .business textarea, .input-group-text {background-color: <?= '#'.$business['mart_background_color'] ?> !important;border: solid 1px <?= '#'.$business['mart_primary_color'] ?> !important; color: <?= '#'.$business['mart_text_color'] ?> !important;}
            .business .page-logo {max-width:120px}
            .business .header-div {width:100%; background-size:cover; background-position:center; height:400px;}
            @media only screen and (max-width: 600px) { .business .header-div {height:300px;} }
        </style>
    <?php endif; ?>
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
                        <a href="<?= getenv('main_site') ?>" class="utility-link">
                            <i class="bi bi-arrow-left-circle-fill"></i>
                            <span><?= lang('System.main-site') ?></span>
                        </a>
                        <?php if (isset($business)) : ?>
                            <span class="utility-divider"></span>
                            <a href="<?= base_url($locale) ?>" class="utility-link">
                                <i class="bi bi-house"></i>
                                <span><?= lang('System.site-name') ?></span>
                            </a>
                        <?php endif; ?>
                        <span class="utility-divider"></span>
                        <a href="<?= getenv('main_site') . $locale ?>/contact" class="utility-link">
                            <i class="bi bi-headset"></i>
                            <span><?= lang('System.contact-us') ?></span>
                        </a>
                    </div>
                </div>
                <div class="col text-end">
                    <span class="promo-text d-none">...</span>
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
                            <img src="<?= $business['business_logo'] ?>" alt="<?= $business['business_name'] ?>">
                            <h1 class="sitename"><?= $page_title ?></h1>
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url() ?>" class="logo d-flex align-items-center">
                            <img src="<?= base_url('assets/img/logo-dark.png') ?>" alt="<?= lang('System.site-name') ?>">
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
                            <input id="search-field" type="text" name="business-name" class="search-field" placeholder="<?= lang('System.home.search') ?>">
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
                                            <img src="assets/img/product/product-5.webp" alt="Product" class="img-fluid">
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
                                            <img src="assets/img/product/product-8.webp" alt="Product" class="img-fluid">
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
                                            <img src="assets/img/product/product-11.webp" alt="Product" class="img-fluid">
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
                        <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navigation -->
    <div class="nav-strip d-none">
        <div class="container-fluid container-xl position-relative">
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="category.html">Category</a></li>
                    <li><a href="product-details.html">Product Details</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li>
                        </ul>
                    </li>

                    <!-- Products Mega Menu 1 -->
                    <li class="products-megamenu-1"><a href="#"><span>Megamenu 1</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>

                        <!-- Products Mega Menu 1 Mobile View -->
                        <ul class="mobile-megamenu">

                            <li><a href="#">Featured Products</a></li>
                            <li><a href="#">New Arrivals</a></li>
                            <li><a href="#">Sale Items</a></li>

                            <li class="dropdown"><a href="#"><span>Clothing</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Men's Wear</a></li>
                                    <li><a href="#">Women's Wear</a></li>
                                    <li><a href="#">Kids Collection</a></li>
                                    <li><a href="#">Sportswear</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#"><span>Electronics</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Smartphones</a></li>
                                    <li><a href="#">Laptops</a></li>
                                    <li><a href="#">Audio Devices</a></li>
                                    <li><a href="#">Smart Home</a></li>
                                    <li><a href="#">Accessories</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#"><span>Home &amp; Living</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Furniture</a></li>
                                    <li><a href="#">Decor</a></li>
                                    <li><a href="#">Kitchen</a></li>
                                    <li><a href="#">Bedding</a></li>
                                    <li><a href="#">Lighting</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#"><span>Beauty</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Skincare</a></li>
                                    <li><a href="#">Makeup</a></li>
                                    <li><a href="#">Haircare</a></li>
                                    <li><a href="#">Fragrances</a></li>
                                    <li><a href="#">Personal Care</a></li>
                                </ul>
                            </li>

                        </ul><!-- End Products Mega Menu 1 Mobile View -->

                        <!-- Products Mega Menu 1 Desktop View -->
                        <div class="desktop-megamenu">

                            <div class="megamenu-tabs">
                                <ul class="nav nav-tabs" id="productMegaMenuTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured-content-1862" type="button" aria-selected="true" role="tab">Featured</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="new-tab" data-bs-toggle="tab" data-bs-target="#new-content-1862" type="button" aria-selected="false" tabindex="-1" role="tab">New Arrivals</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sale-tab" data-bs-toggle="tab" data-bs-target="#sale-content-1862" type="button" aria-selected="false" tabindex="-1" role="tab">Sale</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="category-tab" data-bs-toggle="tab" data-bs-target="#category-content-1862" type="button" aria-selected="false" tabindex="-1" role="tab">Categories</button>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tabs Content -->
                            <div class="megamenu-content tab-content">

                                <!-- Featured Tab -->
                                <div class="tab-pane fade show active" id="featured-content-1862" role="tabpanel" aria-labelledby="featured-tab">
                                    <div class="product-grid">
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-1.webp" alt="Featured Product" loading="lazy">
                                            </div>
                                            <div class="product-info">
                                                <h5>Premium Headphones</h5>
                                                <p class="price">$129.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-2.webp" alt="Featured Product" loading="lazy">
                                            </div>
                                            <div class="product-info">
                                                <h5>Smart Watch</h5>
                                                <p class="price">$199.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-3.webp" alt="Featured Product" loading="lazy">
                                            </div>
                                            <div class="product-info">
                                                <h5>Wireless Earbuds</h5>
                                                <p class="price">$89.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-4.webp" alt="Featured Product" loading="lazy">
                                            </div>
                                            <div class="product-info">
                                                <h5>Bluetooth Speaker</h5>
                                                <p class="price">$79.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- New Arrivals Tab -->
                                <div class="tab-pane fade" id="new-content-1862" role="tabpanel" aria-labelledby="new-tab">
                                    <div class="product-grid">
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-5.webp" alt="New Arrival" loading="lazy">
                                                <span class="badge-new">New</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Fitness Tracker</h5>
                                                <p class="price">$69.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-6.webp" alt="New Arrival" loading="lazy">
                                                <span class="badge-new">New</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Wireless Charger</h5>
                                                <p class="price">$39.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-7.webp" alt="New Arrival" loading="lazy">
                                                <span class="badge-new">New</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Smart Bulb Set</h5>
                                                <p class="price">$49.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-8.webp" alt="New Arrival" loading="lazy">
                                                <span class="badge-new">New</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Portable Power Bank</h5>
                                                <p class="price">$59.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Sale Tab -->
                                <div class="tab-pane fade" id="sale-content-1862" role="tabpanel" aria-labelledby="sale-tab">
                                    <div class="product-grid">
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-9.webp" alt="Sale Product" loading="lazy">
                                                <span class="badge-sale">-30%</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Wireless Keyboard</h5>
                                                <p class="price"><span class="original-price">$89.99</span> $62.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-10.webp" alt="Sale Product" loading="lazy">
                                                <span class="badge-sale">-25%</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Gaming Mouse</h5>
                                                <p class="price"><span class="original-price">$59.99</span> $44.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-11.webp" alt="Sale Product" loading="lazy">
                                                <span class="badge-sale">-40%</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Desk Lamp</h5>
                                                <p class="price"><span class="original-price">$49.99</span> $29.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                        <div class="product-card">
                                            <div class="product-image">
                                                <img src="assets/img/product/product-12.webp" alt="Sale Product" loading="lazy">
                                                <span class="badge-sale">-20%</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>USB-C Hub</h5>
                                                <p class="price"><span class="original-price">$39.99</span> $31.99</p>
                                                <a href="#" class="btn-view">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Categories Tab -->
                                <div class="tab-pane fade" id="category-content-1862" role="tabpanel" aria-labelledby="category-tab">
                                    <div class="category-grid">
                                        <div class="category-column">
                                            <h4>Clothing</h4>
                                            <ul>
                                                <li><a href="#">Men's Wear</a></li>
                                                <li><a href="#">Women's Wear</a></li>
                                                <li><a href="#">Kids Collection</a></li>
                                                <li><a href="#">Sportswear</a></li>
                                                <li><a href="#">Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-column">
                                            <h4>Electronics</h4>
                                            <ul>
                                                <li><a href="#">Smartphones</a></li>
                                                <li><a href="#">Laptops</a></li>
                                                <li><a href="#">Audio Devices</a></li>
                                                <li><a href="#">Smart Home</a></li>
                                                <li><a href="#">Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-column">
                                            <h4>Home &amp; Living</h4>
                                            <ul>
                                                <li><a href="#">Furniture</a></li>
                                                <li><a href="#">Decor</a></li>
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Bedding</a></li>
                                                <li><a href="#">Lighting</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-column">
                                            <h4>Beauty</h4>
                                            <ul>
                                                <li><a href="#">Skincare</a></li>
                                                <li><a href="#">Makeup</a></li>
                                                <li><a href="#">Haircare</a></li>
                                                <li><a href="#">Fragrances</a></li>
                                                <li><a href="#">Personal Care</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- End Products Mega Menu 1 Desktop View -->

                    </li><!-- End Products Mega Menu 1 -->
                    <!-- Products Mega Menu 2 -->
                    <li class="products-megamenu-2"><a href="#"><span>Megamenu 2</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>

                        <!-- Products Mega Menu 2 Mobile View -->
                        <ul class="mobile-megamenu">

                            <li><a href="#">Women</a></li>
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Kids'</a></li>

                            <li class="dropdown"><a href="#"><span>Clothing</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Shirts &amp; Tops</a></li>
                                    <li><a href="#">Coats &amp; Outerwear</a></li>
                                    <li><a href="#">Underwear</a></li>
                                    <li><a href="#">Sweatshirts</a></li>
                                    <li><a href="#">Dresses</a></li>
                                    <li><a href="#">Swimwear</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#"><span>Shoes</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Boots</a></li>
                                    <li><a href="#">Sandals</a></li>
                                    <li><a href="#">Heels</a></li>
                                    <li><a href="#">Loafers</a></li>
                                    <li><a href="#">Slippers</a></li>
                                    <li><a href="#">Oxfords</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#"><span>Accessories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Handbags</a></li>
                                    <li><a href="#">Eyewear</a></li>
                                    <li><a href="#">Hats</a></li>
                                    <li><a href="#">Watches</a></li>
                                    <li><a href="#">Jewelry</a></li>
                                    <li><a href="#">Belts</a></li>
                                </ul>
                            </li>

                            <li class="dropdown"><a href="#"><span>Specialty Sizes</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Plus Size</a></li>
                                    <li><a href="#">Petite</a></li>
                                    <li><a href="#">Wide Shoes</a></li>
                                    <li><a href="#">Narrow Shoes</a></li>
                                </ul>
                            </li>

                        </ul><!-- End Products Mega Menu 2 Mobile View -->

                        <!-- Products Mega Menu 2 Desktop View -->
                        <div class="desktop-megamenu">

                            <div class="megamenu-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="womens-tab" data-bs-toggle="tab" data-bs-target="#womens-content-1883" type="button" aria-selected="true" role="tab">WOMEN</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="mens-tab" data-bs-toggle="tab" data-bs-target="#mens-content-1883" type="button" aria-selected="false" tabindex="-1" role="tab">MEN</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="kids-tab" data-bs-toggle="tab" data-bs-target="#kids-content-1883" type="button" aria-selected="false" tabindex="-1" role="tab">KIDS</button>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tabs Content -->
                            <div class="megamenu-content tab-content">

                                <!-- Women Tab -->
                                <div class="tab-pane fade show active" id="womens-content-1883" role="tabpanel" aria-labelledby="womens-tab">
                                    <div class="category-layout">
                                        <div class="categories-section">
                                            <div class="category-headers">
                                                <h4>Clothing</h4>
                                                <h4>Shoes</h4>
                                                <h4>Accessories</h4>
                                                <h4>Specialty Sizes</h4>
                                            </div>

                                            <div class="category-links">
                                                <div class="link-row">
                                                    <a href="#">Shirts &amp; Tops</a>
                                                    <a href="#">Boots</a>
                                                    <a href="#">Handbags</a>
                                                    <a href="#">Plus Size</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Coats &amp; Outerwear</a>
                                                    <a href="#">Sandals</a>
                                                    <a href="#">Eyewear</a>
                                                    <a href="#">Petite</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Underwear</a>
                                                    <a href="#">Heels</a>
                                                    <a href="#">Hats</a>
                                                    <a href="#">Wide Shoes</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Sweatshirts</a>
                                                    <a href="#">Loafers</a>
                                                    <a href="#">Watches</a>
                                                    <a href="#">Narrow Shoes</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Dresses</a>
                                                    <a href="#">Slippers</a>
                                                    <a href="#">Jewelry</a>
                                                    <a href="#"></a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Swimwear</a>
                                                    <a href="#">Oxfords</a>
                                                    <a href="#">Belts</a>
                                                    <a href="#"></a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">View all</a>
                                                    <a href="#">View all</a>
                                                    <a href="#">View all</a>
                                                    <a href="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="featured-section">
                                            <div class="featured-image">
                                                <img src="assets/img/product/product-f-1.webp" alt="Women's Heels Collection">
                                                <div class="featured-content">
                                                    <h3>Women's<br>Bags<br>Collection</h3>
                                                    <a href="#" class="btn-shop">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Men Tab -->
                                <div class="tab-pane fade" id="mens-content-1883" role="tabpanel" aria-labelledby="mens-tab">
                                    <div class="category-layout">
                                        <div class="categories-section">
                                            <div class="category-headers">
                                                <h4>Clothing</h4>
                                                <h4>Shoes</h4>
                                                <h4>Accessories</h4>
                                                <h4>Specialty Sizes</h4>
                                            </div>

                                            <div class="category-links">
                                                <div class="link-row">
                                                    <a href="#">Shirts &amp; Polos</a>
                                                    <a href="#">Sneakers</a>
                                                    <a href="#">Watches</a>
                                                    <a href="#">Big &amp; Tall</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Jackets &amp; Coats</a>
                                                    <a href="#">Boots</a>
                                                    <a href="#">Belts</a>
                                                    <a href="#">Slim Fit</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Underwear</a>
                                                    <a href="#">Loafers</a>
                                                    <a href="#">Ties</a>
                                                    <a href="#">Wide Shoes</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Hoodies</a>
                                                    <a href="#">Dress Shoes</a>
                                                    <a href="#">Wallets</a>
                                                    <a href="#">Extended Sizes</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Suits</a>
                                                    <a href="#">Sandals</a>
                                                    <a href="#">Sunglasses</a>
                                                    <a href="#"></a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Activewear</a>
                                                    <a href="#">Slippers</a>
                                                    <a href="#">Hats</a>
                                                    <a href="#"></a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">View all</a>
                                                    <a href="#">View all</a>
                                                    <a href="#">View all</a>
                                                    <a href="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="featured-section">
                                            <div class="featured-image">
                                                <img src="assets/img/product/product-m-4.webp" alt="Men's Footwear Collection">
                                                <div class="featured-content">
                                                    <h3>Men's<br>Footwear<br>Collection</h3>
                                                    <a href="#" class="btn-shop">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Kids Tab -->
                                <div class="tab-pane fade" id="kids-content-1883" role="tabpanel" aria-labelledby="kids-tab">
                                    <div class="category-layout">
                                        <div class="categories-section">
                                            <div class="category-headers">
                                                <h4>Clothing</h4>
                                                <h4>Shoes</h4>
                                                <h4>Accessories</h4>
                                                <h4>By Age</h4>
                                            </div>

                                            <div class="category-links">
                                                <div class="link-row">
                                                    <a href="#">T-shirts &amp; Tops</a>
                                                    <a href="#">Sneakers</a>
                                                    <a href="#">Backpacks</a>
                                                    <a href="#">Babies (0-24 months)</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Outerwear</a>
                                                    <a href="#">Boots</a>
                                                    <a href="#">Hats &amp; Caps</a>
                                                    <a href="#">Toddlers (2-4 years)</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Pajamas</a>
                                                    <a href="#">Sandals</a>
                                                    <a href="#">Socks</a>
                                                    <a href="#">Kids (4-7 years)</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Sweatshirts</a>
                                                    <a href="#">Slippers</a>
                                                    <a href="#">Gloves</a>
                                                    <a href="#">Older Kids (8-14 years)</a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Dresses</a>
                                                    <a href="#">School Shoes</a>
                                                    <a href="#">Scarves</a>
                                                    <a href="#"></a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">Swimwear</a>
                                                    <a href="#">Sports Shoes</a>
                                                    <a href="#">Hair Accessories</a>
                                                    <a href="#"></a>
                                                </div>
                                                <div class="link-row">
                                                    <a href="#">View all</a>
                                                    <a href="#">View all</a>
                                                    <a href="#">View all</a>
                                                    <a href="#"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="featured-section">
                                            <div class="featured-image">
                                                <img src="assets/img/product/product-9.webp" alt="Kids' New Arrivals">
                                                <div class="featured-content">
                                                    <h3>Kids<br>New<br>Arrivals</h3>
                                                    <a href="#" class="btn-shop">Shop now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div><!-- End Products Mega Menu 2 Desktop View -->

                    </li><!-- End Products Mega Menu 2 -->

                    <li><a href="contact.html">Contact</a></li>

                </ul>
            </nav>
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
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget footer-about">
                        <?php if (isset($business)) : ?>
                            <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>" class="logo">
                                <img src="<?= $business['business_logo'] ?>" alt="<?= $business['business_name'] ?>" class="img-fluid" style="height:1em;">
                                <h1 class="sitename"><?= $page_title ?></h1>
                            </a>
                            <p>@<?= lang('System.site-name') ?> - <?= lang('System.footer-note') ?></p>
                            <div class="footer-contact mt-4">
                                <div class="contact-item">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>123 Fashion Street, New York, NY 10001</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-telephone"></i>
                                    <span>+1 (555) 123-4567</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-envelope"></i>
                                    <span>hello@example.com</span>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="<?= base_url($locale) ?>" class="logo">
                                <img src="<?= base_url('assets/img/logo-dark.png') ?>" alt="<?= lang('System.site-name') ?>">
                                <span class="sitename"><?= lang('System.site-name') ?></span>
                            </a>
                            <p><?= lang('System.footer-note') ?></p>
                            <div class="footer-contact mt-4">
                                <div class="contact-item d-none">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>123 Fashion Street, New York, NY 10001</span>
                                </div>
                                <div class="contact-item d-none">
                                    <i class="bi bi-telephone"></i>
                                    <span>+1 (555) 123-4567</span>
                                </div>
                                <div class="contact-item">
                                    <i class="bi bi-envelope"></i>
                                    <span><?= getenv('CONTACT_PHONE') ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Shop</h4>
                        <ul class="footer-links">
                            <li><a href="category.html">New Arrivals</a></li>
                            <li><a href="category.html">Bestsellers</a></li>
                            <li><a href="category.html">Women's Clothing</a></li>
                            <li><a href="category.html">Men's Clothing</a></li>
                            <li><a href="category.html">Accessories</a></li>
                            <li><a href="category.html">Sale</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Support</h4>
                        <ul class="footer-links">
                            <li><a href="support.html">Help Center</a></li>
                            <li><a href="account.html">Order Status</a></li>
                            <li><a href="shiping-info.html">Shipping Info</a></li>
                            <li><a href="return-policy.html">Returns &amp; Exchanges</a></li>
                            <li><a href="#">Size Guide</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Company</h4>
                        <ul class="footer-links">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="about.html">Careers</a></li>
                            <li><a href="about.html">Press</a></li>
                            <li><a href="about.html">Affiliates</a></li>
                            <li><a href="about.html">Responsibility</a></li>
                            <li><a href="about.html">Investors</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Download Our App</h4>
                        <p>Shop on the go with our mobile app</p>
                        <div class="app-buttons">
                            <a href="#" class="app-btn">
                                <i class="bi bi-apple"></i>
                                <span>App Store</span>
                            </a>
                            <a href="#" class="app-btn">
                                <i class="bi bi-google-play"></i>
                                <span>Google Play</span>
                            </a>
                        </div>
                        <div class="social-links mt-4">
                            <h5>Follow Us</h5>
                            <div class="social-icons">
                                <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                                <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                                <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
                                <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">

            <div class="payment-methods d-flex align-items-center justify-content-center">
                <span>We Accept:</span>
                <div class="payment-icons">
                    <i class="bi bi-credit-card" aria-label="Credit Card"></i>
                    <i class="bi bi-paypal" aria-label="PayPal"></i>
                    <i class="bi bi-apple" aria-label="Apple Pay"></i>
                    <i class="bi bi-google" aria-label="Google Pay"></i>
                    <i class="bi bi-shop" aria-label="Shop Pay"></i>
                    <i class="bi bi-cash" aria-label="Cash on Delivery"></i>
                </div>
            </div>

            <div class="legal-links">
                <a href="tos.html">Terms of Service</a>
                <a href="privacy.html">Privacy Policy</a>
                <a href="tos.html">Cookies Settings</a>
            </div>

            <div class="copyright text-center">
                <p>© <span>Copyright</span> <strong class="sitename">ShopWise</strong>. All Rights Reserved.</p>
            </div>

        </div>

    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/drift-zoom/Drift.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>