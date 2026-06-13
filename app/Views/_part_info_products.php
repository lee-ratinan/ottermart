<section id="product-details" class="product-details section py-3">
    <div class="container">
        <div class="row g-4">
            <!-- Product Gallery -->
            <div class="col-12">
                <p><i class="bi bi-chevron-right"></i> <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> <i class="bi bi-chevron-right"></i> <b><?= $products['product_name'] ?></b> <i class="bi bi-chevron-right"></i></p>
            </div>
            <div class="col-lg-7">
                <div class="image-showcase">
                    <div class="main-image-container">
                        <!-- <span class="discount-badge">-21%</span> -->
                        <img id="main-product-image" src="<?= $products['product_image'] ?? base_url('assets/img/no-image-1000x.webp') ?>" data-zoom="assets/img/product/product-details-7.webp" alt="Product" class="img-fluid">
                        <?php /* <div class="image-zoom-container"></div>
                                <button class="image-nav-btn prev-image" type="button"><i class="bi bi-chevron-left"></i></button>
                                <button class="image-nav-btn next-image" type="button"><i class="bi bi-chevron-right"></i></button> */ ?>
                    </div>
                    <?php /* <div class="thumb-strip d-none">
                                <div class="thumb-cell thumbnail-item" data-image="assets/img/product/product-details-3.webp">
                                    <img src="#" alt="View 1" class="img-fluid">
                                </div>
                                <div class="thumb-cell thumbnail-item" data-image="assets/img/product/product-details-4.webp">
                                    <img src="#" alt="View 2" class="img-fluid">
                                </div>
                                <div class="thumb-cell thumbnail-item" data-image="assets/img/product/product-details-5.webp">
                                    <img src="#" alt="View 3" class="img-fluid">
                                </div>
                                <div class="thumb-cell thumbnail-item" data-image="assets/img/product/product-details-6.webp">
                                    <img src="#" alt="View 4" class="img-fluid">
                                </div>
                                <div class="thumb-cell thumbnail-item active" data-image="assets/img/product/product-details-7.webp">
                                    <img src="#" alt="View 5" class="img-fluid">
                                </div>
                            </div><!-- End Thumb Strip --> */ ?>
                </div>
            </div><!-- End Product Gallery -->
            <!-- Product Details -->
            <div class="col-lg-5">
                <div class="product-detail-card">
                    <div class="detail-header">
                        <span class="type-badge"><?= lang('System.store.product') ?></span>
                        <span class="stock-indicator d-none"><i class="bi bi-circle-fill"></i> In Stock</span>
                    </div>
                    <h1 class="product-heading"><?= $products['product_name'] ?></h1>
                    <div class="review-summary d-none">
                        <div class="stars-inline">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <span class="score-text">(stars)</span>
                        <span class="divider-dot">·</span>
                        <a href="#" class="reviews-anchor">(ratings) ratings</a>
                        <span class="divider-dot">·</span>
                        <span class="units-left">(count) remaining / (count) booked</span>
                    </div>
                    <div class="pricing-area">
                        <div class="price-row">
                            <span class="price-now"><?= lang('System.pricing.from', [format_price($products['price_active_lowest'], $business['currency_code'])]) ?></span>
                        </div>
                    </div>
                    <p><?= $products['product_description'] ?></p>
                    <div class="separator"></div>
                    <?php if ('A' != $products['is_active']) : ?>
                        <p class="alert alert-danger"><?= lang('System.store.option-unavailable') ?></p>
                    <?php else: ?>
                        <?php if (empty($products['variants'])) : ?>
                            <p class="alert alert-danger"><?= lang('System.store.option-unavailable') ?></p>
                        <?php else: ?>
                            <div class="accordion" id="productAccordion">
                                <?php foreach ($products['variants'] as $i => $variant) : ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $variant['variant_slug'] ?>" aria-expanded="true" aria-controls="collapse<?= $variant['variant_slug'] ?>"><b><?= $variant['variant_name'] ?></b></button>
                                        </h2>
                                        <div id="collapse-<?= $variant['variant_slug'] ?>" class="accordion-collapse collapse <?= 0 == $i ? 'show' : '' ?>" data-bs-parent="#productAccordion">
                                            <div class="accordion-body">
                                                <?php if (!empty($variant['variant_sku'])) : ?>
                                                    <p>SKU: <?= $variant['variant_sku'] ?></p>
                                                <?php endif; ?>
                                                <?php if ('A' == $variant['is_active']) : ?>
                                                    <p>
                                                        <?= lang('System.pricing.actual', [format_price($variant['price_active'], $business['currency_code'])]) ?>
                                                        <?php if ($variant['price_active'] < $variant['price_compare']) : ?>
                                                            <s><?= format_price($variant['price_compare'], $business['currency_code']) ?></s>
                                                        <?php endif; ?>
                                                    </p>
                                                    <?php if (0 < $variant['inventory_count']) : ?>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text"><label for="quantity-<?= $products['id'] ?>-<?= $variant['id'] ?>"><?= lang('System.store.quantity') ?></label></span>
                                                            <input type="number" class="form-control" id="quantity-<?= $products['id'] ?>-<?= $variant['id'] ?>" name="quantity" value="1" min="1" max="<?= min(10, $variant['inventory_count']) ?>" />
                                                        </div>
                                                        <button class="btn btn-dark w-100 btn-add-to-cart"
                                                                data-product-id="<?= $products['id'] ?>" data-variant-id="<?= $variant['id'] ?>"
                                                                data-product-name="<?= $products['product_name'] ?>" data-variant-name="<?= $variant['variant_name'] ?>"
                                                                data-price="<?= $variant['price_active'] ?>" data-product-type="<?= $products['product_type'] ?>"
                                                        ><?= lang('System.store.add-to-cart') ?></button>
                                                    <?php else: ?>
                                                        <p class="alert alert-danger"><?= lang('System.store.out-of-stock') ?></p>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <p class="alert alert-danger"><?= lang('System.store.option-unavailable') ?></p>
                                                <?php endif; ?>


                                                <p>Price: ฿150.00 ฿180.00</p>
                                                <div class="action-row">
                                                    <div class="quantity-selector">
                                                        <label for="quantity-input" class="d-none">quantity</label>
                                                        <button class="quantity-btn decrease" type="button"><i class="bi bi-dash"></i></button>
                                                        <input type="number" class="quantity-input" id="quantity-input" value="1" min="1" max="18">
                                                        <button class="quantity-btn increase" type="button"><i class="bi bi-plus"></i></button>
                                                    </div>
                                                    <button class="btn primary-action-btn">
                                                        <i class="bi bi-bag-plus"></i> Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>