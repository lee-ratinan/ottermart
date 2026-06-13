<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <?php if ('products' == $type) : ?>
            <?php include '_part_info_products.php'; ?>
        <?php elseif ('services' == $type) : ?>
            <?php include '_part_info_services.php'; ?>
        <?php endif; ?>
        <section class="section pt-0">
            <?php include '_part_business_header.php'; ?>
        </section>
    </main>
    <script>
        //document.addEventListener("DOMContentLoaded", function () {
        //    <?php //if ('products' == $type) : ?>
        //    $('.btn-add-to-cart').click(function (e) {
        //        e.preventDefault();
        //        let product_id    = $(this).data('product-id'),
        //            variant_id    = $(this).data('variant-id'),
        //            quantity      = $('#quantity-'+product_id+'-'+variant_id).val(),
        //            product_name  = $(this).data('product-name'),
        //            variant_name  = $(this).data('variant-name'),
        //            price         = $(this).data('price'),
        //            product_type  = $(this).data('product-type'),
        //            line_subtotal = price * quantity,
        //            need_delivery = ('P' === product_type ? 'Y' : 'N');
        //        $.post(
        //            "<?php //= base_url($locale . '/@' . $business['business_slug'] . '/add-to-cart') ?>//",
        //            {
        //                item_type: 'product',
        //                product_variant_id: variant_id,
        //                product_id: product_id,
        //                product_name: product_name,
        //                product_variant_name: variant_name,
        //                line_quantity: quantity,
        //                unit_price: price,
        //                line_subtotal: line_subtotal,
        //                item_need_delivery: need_delivery
        //            },
        //            function (response, status) {
        //                if (response.status === "OK") {
        //                    toastr.success('<?php //= lang('System.cart.item-added') ?>//');
        //                    $('#header-cart-icon').removeClass('bi-cart').addClass('bi-cart-check-fill');
        //                    $('#cart-count').html('('+response.cart.item_count+')');
        //                } else {
        //                    toastr.error('<?php //= lang('System.cart.item-add-failed') ?>//');
        //                }
        //            },
        //            "json"
        //        ).fail(function (response) {
        //            let message = response.responseJSON.message ?? '<?php //= lang('System.response-msg.error.generic') ?>//';
        //            toastr.error(message);
        //        });
        //    });
        //    <?php //endif; ?>
        //});
    </script>
<?php $this->endSection() ?>