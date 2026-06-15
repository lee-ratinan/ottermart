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
                        <img id="main-product-image" src="<?= $products['product_image'] ?? base_url('assets/img/no-image-1000x.webp') ?>" data-zoom="assets/img/product/product-details-7.webp" alt="Product" class="img-fluid">
                        <div class="image-zoom-container"></div>
                        <button class="image-nav-btn prev-image" type="button"><i class="bi bi-chevron-left"></i></button>
                        <button class="image-nav-btn next-image" type="button"><i class="bi bi-chevron-right"></i></button>
                    </div>
                    <div class="thumb-strip">
                        <div class="thumb-cell thumbnail-item" data-image="<?= @$products['product_image'] ?>">
                            <img src="<?= @$products['product_image'] ?>" alt="<?= $products['product_name'] ?> 1" class="img-fluid">
                        </div>
                        <?php if (!empty($products['product_image_array'])) : ?>
                            <?php foreach ($products['product_image_array'] as $i => $image_url) : ?>
                                <div class="thumb-cell thumbnail-item" data-image="<?= $image_url ?>">
                                    <img src="<?= $image_url ?>" alt="<?= $products['product_name'] . ' ' . ($i + 2) ?>" class="img-fluid">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- End Product Gallery -->
            <!-- Product Details -->
            <div class="col-lg-5">
                <div class="product-detail-card">
                    <div class="detail-header">
                        <span class="type-badge"><?= $products['product_tag_label'] ?></span>
                        <span class="stock-indicator d-none"><i class="bi bi-circle-fill"></i> In Stock</span>
                    </div>
                    <h1 class="product-heading"><?= $products['product_name'] ?></h1>
                    <div class="review-summary">
                        <?php
                        $products['reviews']['stars']   = 1.4; // should be coming from the database
                        $products['reviews']['ratings'] = 12345;
                        $products['purchase_count']     = 6543;
                        echo printStars($products['reviews']['stars']);
                        ?>
                        <span class="score-text"><?= number_format($products['reviews']['stars'], 1) ?></span>
                        <span class="divider-dot">·</span>
                        <a href="#" class="reviews-anchor"><?= lang('System.store.ratings', [number_format($products['reviews']['ratings'])]) ?></a>
                        <span class="divider-dot">·</span>
                        <span class="units-left"><?= lang('System.store.purchase-count', [number_format($products['purchase_count'])]) ?></span>
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
                                                    <p><?= lang('System.store.sku') ?>: <?= $variant['variant_sku'] ?></p>
                                                <?php endif; ?>
                                                <?php if (!empty($variant['variant_description'])) : ?>
                                                    <p><?= $variant['variant_description'] ?></p>
                                                <?php endif; ?>
                                                <?php if ('A' == $variant['is_active']) : ?>
                                                    <p>
                                                        <?= lang('System.pricing.actual', [format_price($variant['price_active'], $business['currency_code'])]) ?>
                                                        <?php if ($variant['price_active'] < $variant['price_compare']) : ?>
                                                            <s><?= format_price($variant['price_compare'], $business['currency_code']) ?></s>
                                                        <?php endif; ?>
                                                    </p>
                                                    <?php if (0 < $variant['inventory_count']) : ?>
                                                        <div class="action-row">
                                                            <div class="quantity-selector">
                                                                <label for="quantity-input-<?= $variant['id'] ?>" class="d-none"><?= lang('System.store.quantity') ?></label>
                                                                <button class="quantity-btn decrease" data-variant-id="<?= $variant['id'] ?>" type="button"><i class="bi bi-dash"></i></button>
                                                                <input type="number" class="quantity-input" id="quantity-input-<?= $variant['id'] ?>" value="1" min="1" max="<?= min(10, $variant['inventory_count']) ?>">
                                                                <button class="quantity-btn increase" data-variant-id="<?= $variant['id'] ?>" data-variant-slug="<?= $variant['variant_slug'] ?>" type="button"><i class="bi bi-plus"></i></button>
                                                            </div>
                                                            <button class="btn primary-action-btn btn-add-to-cart" data-variant-id="<?= $variant['id'] ?>" data-variant-slug="<?= $variant['variant_slug'] ?>">
                                                                <i class="bi bi-bag-plus"></i> <?= lang('System.store.add-to-cart') ?>
                                                            </button>
                                                        </div>
                                                    <?php else: ?>
                                                        <p class="alert alert-danger"><?= lang('System.store.out-of-stock') ?></p>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <p class="alert alert-danger"><?= lang('System.store.option-unavailable') ?></p>
                                                <?php endif; ?>
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