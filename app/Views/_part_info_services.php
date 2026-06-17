<section id="product-details" class="product-details section py-3">
    <div class="container">
        <div class="row g-4">
            <!-- Service Gallery -->
            <div class="col-12">
                <p><i class="bi bi-chevron-right"></i> <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> <i class="bi bi-chevron-right"></i> <b><?= $services['service_name'] ?></b> <i class="bi bi-chevron-right"></i></p>
            </div>
            <div class="col-lg-7">
                <div class="image-showcase">
                    <div class="main-image-container">
                        <img id="main-product-image" src="<?= $services['service_image'] ?? base_url('assets/img/no-image-1000x.webp') ?>" data-zoom="<?= $services['service_image'] ?? base_url('assets/img/no-image-1000x.webp') ?>" alt="<?= $services['service_name'] ?>" class="img-fluid">
                        <div class="image-zoom-container"></div>
                        <button class="image-nav-btn prev-image" type="button"><i class="bi bi-chevron-left"></i></button>
                        <button class="image-nav-btn next-image" type="button"><i class="bi bi-chevron-right"></i></button>
                    </div>
                    <div class="thumb-strip">
                        <div class="thumb-cell thumbnail-item" data-image="<?= $services['service_image'] ?? base_url('assets/img/no-image-1000x.webp') ?>">
                            <img src="<?= $services['service_image'] ?? base_url('assets/img/no-image-1000x.webp') ?>" alt="<?= $services['service_name'] ?> - 1" class="img-fluid">
                        </div>
                        <?php if (!empty($services['service_image_array'])) : ?>
                            <?php foreach ($services['service_image_array'] as $i => $image_url) : ?>
                                <div class="thumb-cell thumbnail-item" data-image="<?= $image_url ?>">
                                    <img src="<?= $image_url ?>" alt="<?= $services['service_name'] . ' - ' . ($i + 2) ?>" class="img-fluid">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- End Service Gallery -->
            <!-- Product Details -->
            <div class="col-lg-5">
                <div class="product-detail-card">
                    <div class="detail-header">
                        <span class="type-badge"><?= lang('System.store.service') ?></span>
                        <span class="stock-indicator d-none"><i class="bi bi-circle-fill"></i> In Stock</span>
                    </div>
                    <h1 class="product-heading"><?= $services['service_name'] ?></h1>
                    <div class="review-summary">
                        <?php if (0 < $services['review_count']) : ?>
                            <?= printStars($services['review_stars']); ?>
                            <span class="score-text"><?= number_format($services['review_stars'], 1) ?></span>
                            <span class="divider-dot">·</span>
                            <a href="#feedback-content" class="reviews-anchor"><?= lang('System.store.ratings', [number_format($services['review_count'])]) ?></a>
                            <span class="divider-dot">·</span>
                        <?php endif; ?>
                        <?php if (1 < $services['book_count']) : ?>
                            <span class="units-left"><?= lang('System.store.book-count', [number_format($services['book_count'])]) ?></span>
                        <?php else: ?>
                            <span class="units-left"><?= lang('System.store.new') ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="pricing-area">
                        <div class="price-row">
                            <span class="price-now"><?= lang('System.pricing.from', [format_price($services['price_active_lowest'], $business['currency_code'])]) ?></span>
                        </div>
                    </div>
                    <p class="summary-text"><?= $services['service_description'] ?></p>
                    <div class="separator"></div>
                    <?php if ('A' != $services['is_active']) : ?>
                        <p class="alert alert-danger"><?= lang('System.store.option-unavailable') ?></p>
                    <?php else: ?>
                        <?php if (empty($services['variants'])) : ?>
                            <p class="alert alert-danger"><?= lang('System.store.option-unavailable') ?></p>
                        <?php else: ?>
                            <div class="accordion" id="serviceAccordion">
                                <?php foreach ($services['variants'] as $i => $variant) : ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button <?= (0 < $i ? 'collapsed' : '') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $variant['variant_slug'] ?>" aria-expanded="<?= (0 == $i ? 'true' : 'false') ?>" aria-controls="collapse-<?= $variant['variant_slug'] ?>"><b><?= $variant['variant_name'] ?></b></button>
                                        </h2>
                                        <div id="collapse-<?= $variant['variant_slug'] ?>" class="accordion-collapse collapse <?= 0 == $i ? 'show' : '' ?>" data-bs-parent="#serviceAccordion">
                                            <div class="accordion-body">
                                                <?php if (0 < $variant['service_duration_minutes']) : ?>
                                                    <p><?= lang('System.store.duration', [format_minutes($variant['service_duration_minutes'], $locale)]) ?></p>
                                                <?php endif; ?>
                                                <?php if (!empty($variant['variant_description'])) : ?>
                                                    <p><?= $variant['variant_description'] ?></p>
                                                <?php endif; ?>
                                                <?php if ('A' == $variant['is_active']) : ?>
                                                    <div class="action-row">
                                                        <?php if ('S' == $variant['schedule_type']) : ?>
                                                            <a class="btn btn-otternaut primary-action-btn btn-add-to-cart"
                                                               href="<?= base_url($locale . '/@' . $business['business_slug'] . '/service-booking/' . $services['service_slug'] . '/' . $variant['variant_slug'] . '/schedules') ?>"
                                                               data-variant-id="<?= $variant['id'] ?>"
                                                               data-variant-slug="<?= $variant['variant_slug'] ?>"><i
                                                                    class="bi bi-search"></i> <?= lang('System.store.find-sessions') ?>
                                                            </a>
                                                        <?php else: ?>
                                                            <a class="btn btn-otternaut primary-action-btn btn-add-to-cart"
                                                               href="<?= base_url($locale . '/@' . $business['business_slug'] . '/service-booking/' . $services['service_slug'] . '/' . $variant['variant_slug'] . '/slots') ?>"
                                                               data-variant-id="<?= $variant['id'] ?>"
                                                               data-variant-slug="<?= $variant['variant_slug'] ?>"><i
                                                                    class="bi bi-search"></i> <?= lang('System.store.find-available-slots') ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
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
        <div class="row my-5">
            <div class="col-12">
                <div class="info-tabs">
                    <ul class="tab-nav nav" role="tablist">
                        <li><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#review-tab" type="button" aria-selected="false" role="tab" tabindex="-1"><?= lang('System.store.business-tab.reviews.title', [$services['review_count']]) ?></button></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="review-tab" role="tabpanel">
                            <?php
                            $stars            = $services['review_stars'];
                            $review_count     = $services['review_count'];
                            $review_breakdown = $services['review_breakdown'];
                            $entity           = 'service';
                            $entity_id        = $services['id'];
                            include '_part_review_app.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>