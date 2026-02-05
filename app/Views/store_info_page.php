<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section mt-5">
            <div class="container section-title" data-aos="fade-up">
                <h2 class="mt-3"><?= $business['business_name'] ?></h2>
                <div class="my-3">
                    <?php if (is_array($business['social_media'])) : ?>
                        <?php foreach ($business['social_media'] as $social_key => $social_link) : ?>
                            <?php if (!empty($social_link)) : ?>
                                <a class="btn btn-outline-dark mx-2" href="<?= $social_link ?>" target="_blank"><i class="fa-brands fa-<?= $social_key ?>"></i></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ('products' == $type) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p>/ <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> / <?= $products['product_name'] ?></p>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <?php if (!empty($products['product_image'])) : ?>
                                        <img class="img-fluid" src="<?= $products['product_image'] ?>" alt="<?= $products['product_name'] ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <h2><?= $products['product_name'] ?></h2>
                                    <p><b><?= lang('System.pricing.from', [format_price($products['price_active_lowest'], $business['currency_code'])]) ?></b></p>
                                    <p><?= $products['product_description'] ?></p>
                                    <?php if ('A' != $products['is_active']) : ?>
                                        <p><?= lang('System.store.option-unavailable') ?></p>
                                    <?php else: ?>
                                        <?php if (empty($products['variants'])) : ?>
                                            <p class="alert alert-danger py-2 px-3"><?= lang('System.store.option-unavailable') ?></p>
                                        <?php else: ?>
                                            <div class="row">
                                                <?php foreach ($products['variants'] as $variant) : ?>
                                                    <div class="col-6 col-md-12 col-lg-6 col-xl-4">
                                                        <?php if (1 < count($products['variants'])) : ?>
                                                            <h3><?= $variant['variant_name'] ?></h3>
                                                        <?php endif; ?>
                                                        <?php if (!empty($variant['variant_sku'])) : ?>
                                                            <p class="small mb-0">SKU: <?= $variant['variant_sku'] ?></p>
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
                                                                <p class="alert alert-danger py-2 px-3"><?= lang('System.store.out-of-stock') ?></p>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <p class="alert alert-danger py-2 px-3"><?= lang('System.store.option-unavailable') ?></p>
                                                        <?php endif; ?>
                                                        <hr/>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p>/ <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> / <?= $services['service_name'] ?> /</p>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <?php if (!empty($services['service_image'])) : ?>
                                        <img class="img-fluid" src="<?= $services['service_image'] ?>" alt="<?= $services['service_name'] ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8">
                                    <h2><?= $services['service_name'] ?></h2>
                                    <p><b><?= lang('System.pricing.from', [format_price($services['price_active_lowest'], $business['currency_code'])]) ?></b></p>
                                    <p><?= $services['service_description'] ?></p>
                                    <?php if ('A' != $services['is_active']) : ?>
                                        <p class="alert alert-danger py-2 px-3"><?= lang('System.store.option-unavailable') ?></p>
                                    <?php else: ?>
                                        <?php if (empty($services['variants'])) : ?>
                                            <p class="alert alert-danger py-2 px-3"><?= lang('System.store.option-unavailable') ?></p>
                                        <?php else: ?>
                                            <div class="row">
                                                <?php foreach ($services['variants'] as $variant) : ?>
                                                    <div class="col-6 col-md-12 col-lg-6 col-xl-4">
                                                        <h3><?= $variant['variant_name'] ?></h3>
                                                        <?php if ('A' == $variant['is_active']) : ?>
                                                            <p>
                                                                <?= lang('System.pricing.actual', [format_price($variant['price_active'], $business['currency_code'])]) ?>
                                                                <?php if ($variant['price_active'] < $variant['price_compare']) : ?>
                                                                    <s><?= format_price($variant['price_compare'], $business['currency_code']) ?></s>
                                                                <?php endif; ?>
                                                                <br>
                                                                <?php if (0 < $variant['service_duration_minutes']) : ?>
                                                                    <?= lang('System.store.duration', [format_minutes($variant['service_duration_minutes'], $locale)]) ?>
                                                                <?php endif; ?>
                                                            </p>
                                                            <?php if ('S' == $variant['schedule_type']) : ?>
                                                                <a class="btn btn-dark w-100" href="<?= base_url($locale . '/@' . $business['business_slug'] . '/service-booking/' . $services['service_slug'] . '/' . $variant['variant_slug'] . '/schedules') ?>"><?= lang('System.store.find-sessions') ?></a>
                                                            <?php else: ?>
                                                                <a class="btn btn-dark w-100" href="<?= base_url($locale . '/@' . $business['business_slug'] . '/service-booking/' . $services['service_slug'] . '/' . $variant['variant_slug'] . '/slots') ?>"><?= lang('System.store.find-available-slots') ?></a>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <p class="alert alert-danger py-2 px-3"><?= lang('System.store.option-unavailable') ?></p>
                                                        <?php endif; ?>
                                                        <hr/>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php if ('products' == $type) : ?>
            $('.btn-add-to-cart').click(function (e) {
                e.preventDefault();
                let product_id    = $(this).data('product-id'),
                    variant_id    = $(this).data('variant-id'),
                    quantity      = $('#quantity-'+product_id+'-'+variant_id).val(),
                    product_name  = $(this).data('product-name'),
                    variant_name  = $(this).data('variant-name'),
                    price         = $(this).data('price'),
                    product_type  = $(this).data('product-type'),
                    line_subtotal = price * quantity;
                $.post(
                    "<?= base_url($locale . '/@' . $business['business_slug'] . '/add-to-cart') ?>",
                    {
                        item_type: 'product',
                        product_variant_id: variant_id,
                        product_name: product_name,
                        product_variant_name: variant_name,
                        line_quantity: quantity,
                        unit_price: price,
                        line_subtotal: line_subtotal,
                        item_need_delivery: product_type
                    },
                    function (response, status) {
                        if (response.message === "OK") {
                            toastr.success('<?= lang('System.cart.item-added') ?>');
                            $('#header-cart-icon').removeClass('bi-cart').addClass('bi-cart-check-fill');
                        } else {
                            toastr.error('<?= lang('System.cart.item-add-failed') ?>');
                        }
                    },
                    "json"
                ).fail(function (response) {
                    let message = response.responseJSON.message ?? '<?= lang('System.response-msg.error.generic') ?>';
                    toastr.error(message);
                });
            });
            <?php else: ?>
            <?php endif; ?>
            // $('.btn-tab').click(function (e) {
            //     e.preventDefault();
            //     $('.tab-content').slideUp();
            //     $('.btn-tab').removeClass('btn-dark').addClass('btn-outline-dark');
            //     $(this).removeClass('btn-outline-dark').addClass('btn-dark');
            //     let target = 'tab-section-' + $(this).data('target');
            //     $('#'+target).slideDown();
            // });
        });
    </script>
<?php $this->endSection() ?>