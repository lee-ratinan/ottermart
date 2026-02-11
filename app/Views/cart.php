<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section mt-5">
            <div class="container section-title" data-aos="fade-up">
                <div class="small mt-5"><?= $business['business_name'] ?></div>
                <h2 class="mt-3"><?= lang('System.cart.title') ?></h2>
            </div>
            <div class="container">
                <div class="row my-3">
                    <div class="col-12">
                        <p>/ <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> / <?= lang('System.cart.title') ?> /</p>
                    </div>
                    <?php
                    $need_shipping = false;
                    ?>
                    <div class="col-12">
                        <?php if (empty($cart)) : ?>
                            <p class="alert alert-warning"><?= lang('System.cart.empty-cart') ?></p>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th><?= lang('System.cart.table.details') ?></th>
                                        <th class="text-center"><?= lang('System.cart.table.quantity') ?></th>
                                        <th class="text-center"><?= lang('System.cart.table.unit-price') ?></th>
                                        <th class="text-center"><?= lang('System.cart.table.subtotal') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($cart['line_items'])) {
                                        foreach ($cart['line_items'] as $item) {
                                            echo '<tr>';
                                            echo '<td><a class="btn btn-outline-dark btn-sm btn-remove-from-cart float-end" data-key="line_items" data-variant-id="' . $item['product_variant_id'] . '" href="#">' . lang('System.cart.remove-from-cart') . '</a>';
                                            echo '<a href="' . base_url($locale . '/@' . $business['business_slug'] . '/products/' . $business['products'][$item['product_id']]['product_slug']) . '"><b>' . $item['product_name'] . '</b> &middot; ' . $item['product_variant_name'] . '</a>';
                                            if ('P' == $item['item_need_delivery']) {
                                                $need_shipping = true;
                                                echo '<br>' . lang('System.cart.table.need-delivery');
                                            }
                                            echo '</td>';
                                            echo '<td class="text-center">';
                                            if (1 < $item['line_quantity']) {
                                                echo '<a class="btn btn-outline-dark btn-sm btn-adjust-quantity me-2" data-variant-id="P' . $item['product_variant_id'] . '" data-quantity="' . ($item['line_quantity']-1) . '" href="#"><i class="bi bi-dash"></i></a>';
                                            } else {
                                                echo '<a class="btn btn-outline-dark btn-sm me-2 disabled" disabled><i class="bi bi-dash"></i></a>';
                                            }
                                            echo number_format($item['line_quantity']);
                                            echo '<a class="btn btn-outline-dark btn-sm btn-adjust-quantity ms-2" data-variant-id="P' . $item['product_variant_id'] . '" data-quantity="' . ($item['line_quantity']+1) . '" href="#"><i class="bi bi-plus"></i></a>';
                                            echo '</td>';
                                            echo '<td class="text-center">' . format_price($item['unit_price'], $business['currency_code']) . '</td>';
                                            echo '<td class="text-center">' . format_price($item['line_subtotal'], $business['currency_code']) . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    if (!empty($cart['scheduled_service'])) {
                                        foreach ($cart['scheduled_service'] as $item) {
                                            echo '<tr>';
                                            echo '<td><a class="btn btn-outline-dark btn-sm btn-remove-from-cart float-end" data-key="scheduled_service" data-variant-id="' . $item['service_variant_id'] . '" href="#">' . lang('System.cart.remove-from-cart') . '</a>';
                                            echo '<a href="' . base_url($locale . '/@' . $business['business_slug'] . '/services/' . $business['services'][$item['service_id']]['service_slug']) . '"><b>' . $item['service_name'] . '</b> &middot; ' . $item['service_variant_name'] . '</a><br>' . $item['short_description'] . '<br>';
                                            echo format_date($item['date_start'], $locale) . ' - ' . format_date($item['date_end'], $locale) . '</td>';
                                            echo '<td class="text-center">' . number_format($item['booking_quantity']) . '</td>';
                                            echo '<td class="text-center">' . format_price($item['unit_price'], $business['currency_code']) . '</td>';
                                            echo '<td class="text-center">' . format_price($item['booking_subtotal'], $business['currency_code']) . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    if (!empty($cart['adhoc_service'])) {
                                        foreach ($cart['adhoc_service'] as $item) {
                                            echo '<tr>';
                                            echo '<td><a class="btn btn-outline-dark btn-sm btn-remove-from-cart float-end" data-key="adhoc_service" data-variant-id="' . $item['service_variant_id'] . '" href="#">' . lang('System.cart.remove-from-cart') . '</a>';
                                            echo '<a href="' . base_url($locale . '/@' . $business['business_slug'] . '/services/' . $business['services'][$item['service_id']]['service_slug']) . '"><b>' . $item['service_name'] . '</b> &middot; ' . $item['service_variant_name'] . '</a><br>';
                                            echo '<i class="bi bi-person-badge"></i> ' . $item['user_name'] . '<br><i class="bi bi-clock"></i> <span class="time-utc-to-local">' . $item['time_start_utc'] . '</span> - <span class="time-utc-to-local">' . $item['time_end_utc'] . '</span></td>';
                                            echo '<td class="text-center">' . number_format($item['booking_quantity']) . '</td>';
                                            echo '<td class="text-center">' . format_price($item['unit_price'], $business['currency_code']) . '</td>';
                                            echo '<td class="text-center">' . format_price($item['booking_subtotal'], $business['currency_code']) . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end"><b><?= lang('System.cart.table.subtotal') ?></b></th>
                                        <th class="text-center"><?= format_price($cart['order_subtotal'], $business['currency_code']) ?></th>
                                    </tr>
                                    <?php if (isset($cart['adjustment_items']['TAX'])) : ?>
                                    <tr>
                                        <th colspan="3" class="text-end"><b><?= $cart['adjustment_items']['TAX']['detail'] ?></b></th>
                                        <th class="text-center"><b><?= format_price($cart['adjustment_items']['TAX']['amount'], $business['currency_code']) ?></th>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th colspan="3" class="text-end"><?= lang('System.cart.table.total') ?></th>
                                        <th class="text-center"><?= format_price($cart['order_total'], $business['currency_code']) ?></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-8 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label for="shipping-option"><?= lang('System.cart.select-shipping-options.label') ?></label>
                                    <select class="form-control" id="shipping-option" name="shipping_option">
                                        <?php if ($need_shipping) : ?>
                                            <?php if ('SHIPPING' == $business['shipping_options']) : ?>
                                                <option value="SHIPPING"><?= lang('System.cart.select-shipping-options.shipping') ?></option>
                                            <?php elseif ('SELF-COLLECTION' == $business['shipping_options']) : ?>
                                                <option value="SELF-COLLECTION"><?= lang('System.cart.select-shipping-options.self-collection') ?></option>
                                            <?php else : ?>
                                                <option value="SHIPPING"><?= lang('System.cart.select-shipping-options.shipping') ?></option>
                                                <option value="SELF-COLLECTION"><?= lang('System.cart.select-shipping-options.self-collection') ?></option>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <option value="NOT-APPLICABLE"><?= lang('System.cart.select-shipping-options.not-applicable') ?></option>
                                        <?php endif; ?>
                                    </select>
                                    <div class="d-none" id="div-collection-branch-id">
                                        <label for="collection-branch-id"><?= lang('System.cart.select-shipping-options.collection-branch-id') ?></label>
                                        <select class="form-control" id="collection-branch-id" name="collection_branch_id">
                                            <option value=""></option>
                                            <?php foreach ($business['branches'] as $branch) : ?>
                                                <?php if ('PHYSICAL' == $branch['branch_type']) : ?>
                                                    <option value="<?= ($branch['id'] * ID_MASKED_PRIME) ?>"><?= $branch['branch_name'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8 col-xl-9 mb-3">
                                    <label for="customer_comment"><?= lang('System.cart.table.customer-comment') ?></label>
                                    <textarea class="form-control" rows="2" id="customer_comment" name="customer_comment"><?= @$cart['customer_comment'] ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-outline-dark" id="btn-clear-cart"><?= lang('System.cart.clear-cart') ?></button>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-dark" id="btn-customer-detail"><?= lang('System.cart.btn-next') ?></button>
                                </div>
                            </div>
                            <div class="row" id="customer-data" style="display:none">




                                <?= lang('System.checkout.title') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('#btn-clear-cart').click(function (e) {
                e.preventDefault();
                $.get(
                    "<?= base_url($locale . '/@' . $business['business_slug'] . '/clear-cart') ?>",
                    function (response) {
                        toastr.success('<?= lang('System.cart.cart-is-cleared') ?>');
                        console.log(response);
                        setTimeout(function() { location.reload(); }, 3000);
                    }
                );
            });
            $('.btn-remove-from-cart').click(function (e) {
                e.preventDefault();
                let key = $(this).data('key'),
                    variant_id = $(this).data('variant-id');
                $.post(
                    "<?= base_url($locale . '/@' . $business['business_slug'] . '/add-to-cart') ?>",
                    {item_type: 'remove-from-cart', key: key, variant_id: variant_id},
                    function (response) {
                        toastr.success('<?= lang('System.cart.item-is-cleared') ?>');
                        console.log(response);
                        setTimeout(function() { location.reload(); }, 3000);
                    }
                );
            });
            $('.btn-adjust-quantity').click(function (e) {
                e.preventDefault();
                let variant_id = $(this).data('variant-id'),
                    quantity = $(this).data('quantity');
                $.post(
                    "<?= base_url($locale . '/@' . $business['business_slug'] . '/add-to-cart') ?>",
                    {item_type: 'update-quantity', variant_id: variant_id, line_quantity: quantity},
                    function (response) {
                        toastr.success('<?= lang('System.cart.item-is-updated') ?>');
                        console.log(response);
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    }
                );
            });
            $('#shipping-option').change(function () {
                let selected_option = $(this).val();
                if ('SELF-COLLECTION' === selected_option) {
                    $('#div-collection-branch-id').removeClass('d-none');
                } else {
                    $('#div-collection-branch-id').addClass('d-none');
                    $('#collection-branch-id').val('');
                }
            });
            $('.time-utc-to-local').each(function () {
                let utcTime   = $(this).text(),
                    luxonTime = luxon.DateTime.fromISO(utcTime).setLocale('<?= $locale ?>'),
                    localTime = luxonTime.toLocaleString(luxon.DateTime.DATETIME_MED);
                $(this).text(localTime);
            });
            $('#customer_comment').change(function () {
                $.post(
                    "<?= base_url($locale . '/@' . $business['business_slug'] . '/add-to-cart') ?>",
                    {
                        item_type: 'add-comment',
                        customer_comment: $(this).val()
                    },
                    function (response, status) {
                        if (response.status === "OK") {
                            toastr.success('<?= lang('System.cart.comment-added') ?>');
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
            $('#btn-customer-detail').click(function (e) {
                e.preventDefault();
                $('#customer-data').slideDown();
            });
        });
    </script>
<?php $this->endSection() ?>