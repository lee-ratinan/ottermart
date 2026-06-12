<?php
function printProductServiceCard($productTitle, $productLink, $description, $currencyCode, $priceFrom, $priceOriginal = 0, $ratingValue = 0, $ratingCount = 0, $productImage = '', $badgeText = ''): void {
    $productImage = empty($productImage) ? base_url('assets/img/no-image-1000x.webp') : $productImage;
    echo '<div class="col-xl-3 col-lg-4 col-md-6"><div class="product-card"><div class="product-thumb">';
    echo '<a href="' . $productLink . '"><img src="' . $productImage . '" alt="' . $productTitle . '" class="img-fluid"></a>';
    if (!empty($badgeText)) {
        echo '<span class="status-badge new-badge">' . $badgeText . '</span>';
    }
//    echo '<div class="overlay-actions"><button class="action-btn" aria-label="Add to wishlist"><i class="bi bi-heart"></i></button><button class="action-btn" aria-label="Quick view"><i class="bi bi-eye"></i></button><button class="action-btn cart-btn" aria-label="Add to cart"><i class="bi bi-bag-plus"></i></button></div>';
    echo '</div><div class="product-info">';
    if (0 < $ratingCount) {
        echo '<div class="product-meta"><div class="rating"><i class="bi bi-star-fill"></i><span class="rating-value">' . $ratingValue . '</span><span class="rating-count">(' . $ratingCount . ')</span></div></div>';
    }
    echo '<a href="' . $productLink . '"><h3 class="product-title">' . $productTitle . '</h3></a>';
    if (!empty($description)) {
        echo '<p>' . $description . '</p>';
    }
    echo '<div class="product-price"><span class="current-price">' . format_price($priceFrom, $currencyCode) . '</span>';
    if (0 < $priceOriginal) {
        echo '<span class="original-price">' . format_price($priceOriginal, $currencyCode) . '</span>';
    }
    echo '</div>';
    echo '</div></div></div>';
}
?>
<div id="cards" class="cards mt-5">
    <div class="container px-3">
        <div class="tab-nav-wrapper">
            <ul class="nav nav-tabs filter-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#services-tab" type="button" role="tab" aria-selected="true">
                        <i class="bi bi-person-raised-hand"></i> <?= lang('System.store.services') ?>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#products-tab" type="button" role="tab" aria-selected="false" tabindex="-1">
                        <i class="bi bi-bag-check"></i> <?= lang('System.store.products') ?>
                    </button>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <!-- Services Tab -->
            <div class="tab-pane fade show active" id="services-tab" role="tabpanel">
                <div class="row g-3">
                    <?php
                    if (empty($business['services'])) {
                        echo '<p class="alert alert-danger"><i class="bi bi-cone-striped"></i> ' . lang('System.store.services-unavailable') . '</p>';
                    } else {
                        foreach ($business['services'] as $thisService) {
                            printProductServiceCard(
                                $thisService['service_name'],
                                base_url($locale . '/@' . $business['business_slug'] . '/services/' . $thisService['service_slug'] . '/'),
                                $thisService['service_description'],
                                $business['currency_code'],
                                $thisService['price_active_lowest'],
                                $thisService['price_compare_lowest'],
                                0,
                                0,
                                $thisService['service_image']);
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Products Tab -->
            <div class="tab-pane fade" id="products-tab" role="tabpanel">
                <div class="row g-3">
                    <?php
                    if (empty($business['products'])) {
                        echo '<p class="alert alert-danger"><i class="bi bi-cone-striped"></i> ' . lang('System.store.products-unavailable') . '</p>';
                    } else {
                        foreach ($business['products'] as $thisProduct) {
                            printProductServiceCard(
                                $thisProduct['product_name'],
                                base_url($locale . '/@' . $business['business_slug'] . '/products/' . $thisProduct['product_slug'] . '/'),
                                $thisProduct['product_description'],
                                $business['currency_code'],
                                $thisProduct['price_active_lowest'],
                                $thisProduct['price_compare_lowest'],
                                0,
                                0,
                                $thisProduct['product_image'],
                                $thisProduct['product_tag_label']
                            );
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>