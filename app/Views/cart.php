<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section mt-5">
            <div class="container section-title" data-aos="fade-up">
                <div class="small mt-5"><?= $business['business_name'] ?></div>
                <h2 class="mt-3"><?= $page_title ?></h2>
            </div>
            <div class="container">
                <div class="row my-3">
                    <div class="col-12">
                        <p>/ <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> / <?= $page_title ?> /</p>
                    </div>
                    <div class="col-12">
                        <?php if (empty($cart)) : ?>
                            <p class="alert alert-warning"><?= lang('System.cart.empty-cart') ?></p>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
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
                                            echo '<td><a href="' . base_url($locale . '/@' . $business['business_slug'] . '/products/' . $business['products'][$item['product_id']]['product_slug']) . '"><b>' . $item['product_name'] . '</b> &middot; ' . $item['product_variant_name'] . '</a>';
                                            if ('P' == $item['item_need_delivery']) {
                                                echo '<br>' . lang('System.cart.table.need-delivery');
                                            }
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
                                            echo '<td colspan="4">' . json_encode($item) . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    if (!empty($cart['adhoc_service'])) {
                                        foreach ($cart['adhoc_service'] as $item) {
                                            echo '<tr>';
                                            echo '<td colspan="4">' . json_encode($item) . '</td>';
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
                                    <?php if ('X' != $cart['order_tax_type']) : ?>
                                        <tr>
                                            <th colspan="3" class="text-end">
                                                <?php
                                                if ('I' == $cart['order_tax_type']) {
                                                    echo lang('System.cart.table.tax-inclusive');
                                                } else if ('E' == $cart['order_tax_type']) {
                                                    echo lang('System.cart.table.tax-exclusive');
                                                }
                                                ?>
                                            </th>
                                            <th class="text-center"><?= format_price($cart['order_tax'], $business['currency_code']) ?></th>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th colspan="3" class="text-end"><?= lang('System.cart.table.total') ?></th>
                                        <th class="text-center"><?= format_price($cart['order_total'], $business['currency_code']) ?></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-dark" id="btn-clear-cart"><?= lang('System.cart.clear-cart') ?></button>
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
                    function () {
                        toastr.success('<?= lang('System.cart.cart-is-cleared') ?>');
                        setTimeout(function() { location.reload(); }, 3000);
                    }
                );
            })
        });
    </script>
<?php $this->endSection() ?>