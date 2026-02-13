<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
<main class="main business">
    <section class="section mt-5">
        <div class="container section-title" data-aos="fade-up">
            <div class="small mt-5"><?= $business['business_name'] ?></div>
            <h2 class="mt-3"><?= lang('System.checkout.title') ?></h2>
        </div>
        <?php $lang = substr($locale, 0, 2); ?>
        <div class="container">
            <div class="row my-3">
                <div class="col-12">
                    <p>/ <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a>
                       / <a href="<?= base_url($locale . '/@' . $business['business_slug'] . '/cart') ?>"><?= lang('System.cart.title') ?></a>
                       / <?= lang('System.checkout.title') ?></p>
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
                                        echo '<td>';
                                        echo '<b>' . $item['product_name'] . '</b> &middot; ' . $item['product_variant_name'];
                                        echo '</td>';
                                        echo '<td class="text-center">' . number_format($item['line_quantity']) . '</td>';
                                        echo '<td class="text-center">' . format_price($item['unit_price'], $business['currency_code']) . '</td>';
                                        echo '<td class="text-center">' . format_price($item['line_subtotal'], $business['currency_code']) . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                if (!empty($cart['scheduled_service'])) {
                                    foreach ($cart['scheduled_service'] as $item) {
                                        echo '<tr>';
                                        echo '<td><b>' . $item['service_name'] . '</b> &middot; ' . $item['service_variant_name'] . '<br>' . format_date($item['date_start'], $locale) . ' - ' . format_date($item['date_end'], $locale) . '</td>';
                                        echo '<td class="text-center">' . number_format($item['booking_quantity']) . '</td>';
                                        echo '<td class="text-center">' . format_price($item['unit_price'], $business['currency_code']) . '</td>';
                                        echo '<td class="text-center">' . format_price($item['booking_subtotal'], $business['currency_code']) . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                if (!empty($cart['adhoc_service'])) {
                                    foreach ($cart['adhoc_service'] as $item) {
                                        echo '<tr>';
                                        echo '<td><b>' . $item['service_name'] . '</b> &middot; ' . $item['service_variant_name'] . '</a><br><i class="bi bi-person-badge"></i> ' . $item['user_name'] . '<br><i class="bi bi-clock"></i> <span class="time-utc-to-local">' . $item['time_start_utc'] . '</span> - <span class="time-utc-to-local">' . $item['time_end_utc'] . '</span></td>';
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
                                <?php if (isset($cart['adjustment_items']['SHIPPING'])) : ?>
                                    <tr>
                                        <th colspan="3" class="text-end"><b><?= $cart['adjustment_items']['SHIPPING']['detail'] ?></b></th>
                                        <th class="text-center"><b><?= format_price($cart['adjustment_items']['SHIPPING']['amount'], $business['currency_code']) ?></th>
                                    </tr>
                                <?php endif; ?>
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
                            <div class="col-12 col-lg-6">
                                <h3><?= lang('System.cart.customer.customer-information') ?></h3>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><?= lang('System.cart.customer.customer-name') ?></td>
                                        <td><?= $cart['customer_detail']['customer_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('System.cart.customer.email') ?></td>
                                        <td><?= $cart['customer_detail']['email_address'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= lang('System.cart.customer.telephone') ?></td>
                                        <td><?= $cart['customer_detail']['telephone_number'] ?></td>
                                    </tr>
                                </table>
                                <h4><?= lang('System.cart.table.customer-comment') ?></h4>
                                <p><?= (empty($cart['customer_comment']) ? '-' : $cart['customer_comment']) ?></p>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h3><?= lang('System.cart.select-shipping-options.label') ?></h3>
                                <p><?= lang('System.cart.select-shipping-options.' . strtolower($cart['shipping_option'])) ?></p>
                                <?php if ('SHIPPING' == $cart['shipping_option']) : ?>
                                    <h4><?= lang('System.cart.customer.shipping-address') ?></h4>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><?= lang('System.cart.customer.address-line-1') ?></td>
                                            <td><?= $cart['customer_address_detail']['address_line_1'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('System.cart.customer.address-line-2') ?></td>
                                            <td><?= $cart['customer_address_detail']['address_line_2'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('System.cart.customer.address-line-3') ?></td>
                                            <td><?= $cart['customer_address_detail']['address_line_3'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('System.cart.customer.address-city') ?></td>
                                            <td><?= get_subdivision($cart['customer_address_detail']['country_code'], $cart['customer_address_detail']['address_city'], $lang) ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('System.cart.customer.country-code') ?></td>
                                            <td><?= get_country($cart['customer_address_detail']['country_code'], $lang) ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang('System.cart.customer.postal-code') ?></td>
                                            <td><?= $cart['customer_address_detail']['postal_code'] ?></td>
                                        </tr>
                                    </table>
                                <?php elseif ('SELF-COLLECTION' == $cart['shipping_option']) : ?>
                                    <h4><?= lang('System.cart.select-shipping-options.collection-branch-id') ?></h4>
                                    <?php $branch_id = $cart['collection_branch_id'] / ID_MASKED_PRIME ?>
                                    <pre><?php print_r(@$business['branches'][$branch_id]['branch_name']) ?></pre>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h3><?= lang('System.checkout.payment-methods.label') ?></h3>
                                <label for="payment-method"><?= lang('System.checkout.payment-methods.label') ?></label>
                                <select name="payment-method" id="payment-method" class="form-control mt-3">
                                    <option value=""></option>
                                    <?php foreach ($business['payments'] as $key => $detail) : ?>
                                        <option value="<?= $key ?>">
                                            <?php if (in_array($key, ['cash', 'bank_transfer', 'promptpay_static'])): ?>
                                                <?= lang('System.checkout.payment-methods.' . $key) ?>
                                            <?php else: ?>
                                                <?= $detail['payment_instruction']['title'][$lang] ?>
                                            <?php endif; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 text-end">
                                <hr class="my-3" />
                                <button class="btn btn-dark" id="btn-checkout"><?= lang('System.checkout.title') ?></button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('.time-utc-to-local').each(function () {
                let utcTime   = $(this).text(),
                    luxonTime = luxon.DateTime.fromISO(utcTime).setLocale('<?= $locale ?>'),
                    localTime = luxonTime.toLocaleString(luxon.DateTime.DATETIME_MED);
                $(this).text(localTime);
            });
            $('#btn-checkout').click(function () {
                let payment_method = $('#payment-method').val();
                if ('' === payment_method) {
                    $('#payment-method').focus();
                    return false;
                }
                $(this).prop('disabled', true);
                $.post(
                    "<?= base_url($locale . '/@' . $business['business_slug'] . '/confirm-checkout') ?>",
                    {payment_method: payment_method},
                    function (response, status) {
                        if (response.status === "OK") {
                            window.location.href = '<?= base_url($locale . '/@' . $business['business_slug'] . '/checkout-order-info') ?>';
                        } else {
                            toastr.error('<?= lang('System.response-msg.error.generic') ?>');
                        }
                    },
                    "json"
                ).fail(function (response) {
                    let message = response.responseJSON.message ?? '<?= lang('System.response-msg.error.generic') ?>';
                    toastr.error(message);
                });
            });
        });
    </script>
<?php $this->endSection() ?>