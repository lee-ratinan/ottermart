<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section mt-5">
            <div class="container section-title" data-aos="fade-up">
                <div class="small mt-5"><?= $business['business_name'] ?></div>
                <h2 class="mt-3"><?= lang('System.check-order.title') ?></h2>
            </div>
            <?php $lang = substr($locale, 0, 2); ?>
            <div class="container">
                <div class="row my-3">
                    <div class="col-12">
                        <p>/ <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a>
                            / <?= lang('System.check-order.title') ?></p>
                        <?php if (empty($order)) : ?>
                            <div class="row">
                                <div class="col-12 col-md-8 col-lg-6 col-xl-4 mx-auto">
                                    <?php if (!empty($order_number)) : ?>
                                        <p class="alert alert-warning mt-3"><?= lang('System.check-order.not-found') ?></p>
                                    <?php endif ?>
                                    <label class="mt-3" for="order_number_search"><?= lang('System.check-order.order-number') ?></label>
                                    <input class="form-control mb-3" id="order_number_search" name="order_number_search" value="<?= $order_number?>" placeholder="<?= lang('System.check-order.order-number') ?>" />
                                    <div class="text-end">
                                        <button class="btn btn-dark" id="btn-search"><?= lang('System.check-order.search') ?></button>
                                    </div>
                                </div>
                            </div>

                        <?php else: ?>
                            <?php include '_order_info.php'; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('#btn-search').click(function (e) {
                e.preventDefault();
                let query = $('#order_number_search').val();
                if (query) {
                    window.location.href = '<?= base_url($locale . '/@' . $slug . '/check-order/') ?>' + query;
                } else {
                    $('#order_number_search').focus();
                }
            });
        });
    </script>
<?php $this->endSection() ?>