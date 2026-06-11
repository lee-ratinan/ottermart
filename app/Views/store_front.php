<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section pt-0">
            <?php include '_part_business_header.php'; ?>
            <?php include '_part_product_service_tabs.php'; ?>
            <div class="container">
                <!-- NAV -->
                <!-- ITEMS -->
                <div class="row">
                    <div class="col-12 tab-content">
                        <div class="row">
                            <!-- BRANCHES -->
                            <?php foreach ($business['branches'] as $branch) : ?>
                                <div class="col-12 col-md-6 col-lg-4 card-branches the-card">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h3><?= $branch['branch_name'] ?></h3>
                                            <?php if ('PHYSICAL' == $branch['branch_type']) : ?>
                                                <p>
                                                    <?= $branch['branch_address'] ?><br>
                                                    <?= $branch['subdivision'] ?><br>
                                                    <?= $business['country'] ?> <?= $branch['branch_postal_code'] ?>
                                                </p>
                                            <?php else : ?>
                                                <p><?= lang('System.store.this-is-online') ?></p>
                                            <?php endif; ?>
                                            <?php if (!empty($branch['hours'])) : ?>
                                                <h4><?= lang('System.store.opening-hours') ?></h4>
                                                <p><?= lang('System.store.opening-hours-timezone', [get_timezone($branch['timezone_code'], $locale)]) ?></p>
                                                <ul>
                                                    <?php foreach ($branch['hours'] as $day => $hour) : ?>
                                                        <li><?= lang('System.store.opening-hours-day', [lang('System.store.days.' . $day), format_hours($hour['opening_hours'], $locale), format_hours($hour['closing_hours'], $locale)]) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                            <?php if (!empty($branch['modified_hours'])) : ?>
                                                <h4><?= lang('System.store.modified-hours') ?></h4>
                                                <ul>
                                                    <?php foreach ($branch['modified_hours'] as $hour) : ?>
                                                        <?php if (empty($hour['opening_hours']) && empty($hour['closing_hours'])) : ?>
                                                            <li><?= lang('System.store.modified-hour-closed-today', [format_date($hour['date'], $locale)]) ?></li>
                                                        <?php else: ?>
                                                            <li><?= lang('System.store.modified-hour-changed-today', [format_date($hour['date'], $locale), format_hours($hour['opening_hours'], $locale), format_hours($hour['closing_hours'], $locale)]) ?></li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="my-5 text-center">
                    * * *
                </div>
                <!-- BUSINESS DATA -->
                <h4 class="mb-3"><?= $business['business_name'] ?></h4>
                <div class="row mt-5">
                    <div class="col-12 col-lg-4 col-xl-3">
                        <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>">
                            <img class="img-thumbnail mb-5" src="<?= $business['business_logo'] ?>" alt="<?= $business['business_name'] ?>" style="max-width:200px">
                        </a>
                    </div>
                    <div class="col-12 col-lg-8 col-xl-9">
                        <?php
                        $contact = [];
                        if (!empty($business['contact_phone_number'])) {
                            $contact[] = '<a href="tel:' . $business['contact_phone_number'] . '">' . $business['contact_phone_number_shown'] . '</a>';
                        }
                        if (!empty($business['contact_email_address'])) {
                            $contact[] = '<a href="mailto:' . $business['contact_email_address'] . '">' . $business['contact_email_address'] . '</a>';
                        }
                        if (!empty($business['contact_email_address'])) {
                            $contact[] = '<a href="' . $business['contact_website'] . '">' . $business['contact_website'] . '</a>';
                        }
                        echo '<p>' . implode(' &middot; ', $contact) . '</p>';
                        $payment_methods = [];
                        if (isset($business['payments']['cash'])) {
                            $payment_methods[] = '<i class="fa-solid fa-money-bills"></i> ' . lang('System.payment_methods.cash');
                        }
                        if (isset($business['payments']['bank_transfer'])) {
                            $payment_methods[] = '<i class="fa-solid fa-money-bill-transfer"></i> ' . lang('System.payment_methods.bank_transfer');
                        }
                        if (isset($business['payments']['promptpay_static'])) {
                            $payment_methods[] = '<i class="fa-solid fa-qrcode"></i> ' . lang('System.payment_methods.promptpay_static');
                        }
                        if (isset($business['payments']['external_online'])) {
                            $payment_methods[] = '<i class="fa-solid fa-dollar-sign"></i> ' . $business['payments']['external_online']['payment_instruction']['title'][substr($locale, 0, 2)];
                        }
                        echo '<p>' . implode(' &middot; ', $payment_methods) . '</p>';
                        ?>
                        <a class="btn btn-dark btn-sm" href="<?= base_url($locale . '/@' . $business['business_slug'] . '/check-order') ?>"><?= lang('System.store.check-order') ?></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <pre>
        <?= print_r($business, true) ?>
    </pre>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            $('.btn-tab').click(function (e) {
                e.preventDefault();
                $('.the-card').hide();
                $('.card-'+$(this).data('target')).slideDown();
                $('.btn-tab').removeClass('btn-dark').addClass('btn-outline-dark');
                $(this).removeClass('btn-outline-dark').addClass('btn-dark');
            });
        });
    </script>
<?php $this->endSection() ?>