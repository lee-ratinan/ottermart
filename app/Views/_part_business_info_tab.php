<div class="container product-details px-3 py-0">
    <div class="row mt-5">
        <div class="col-12">
            <div class="info-tabs">
                <ul class="tab-nav nav" role="tablist">
                    <li><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#detail-tab" type="button" aria-selected="true" role="tab"><?= lang('System.store.business-tab.detail.title') ?></button></li>
                    <li><button class="nav-link" data-bs-toggle="tab" data-bs-target="#branch-tab" type="button" aria-selected="false" role="tab" tabindex="-1"><?= lang('System.store.business-tab.branches.title') ?></button></li>
                    <li><button class="nav-link" data-bs-toggle="tab" data-bs-target="#shipping-tab" type="button" aria-selected="false" role="tab" tabindex="-1"><?= lang('System.store.business-tab.shipping.title') ?></button></li>
                    <li><button class="nav-link" data-bs-toggle="tab" data-bs-target="#review-tab" type="button" aria-selected="false" role="tab" tabindex="-1"><?= lang('System.store.business-tab.reviews.title', [$business['review_count']]) ?></button></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="detail-tab" role="tabpanel">
                        <div class="desc-content">
                            <div class="row g-4">
                                <div class="col-lg-8">
                                    <h3><?= lang('System.store.business-tab.detail.generic') ?></h3>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="highlight-card">
                                                <i class="bi bi-cash-coin"></i>
                                                <div>
                                                    <h5><?= lang('System.store.business-tab.detail.currency') ?></h5>
                                                    <p><?= get_currency_name($business['currency_code'], substr($locale, 0, 2)) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="highlight-card">
                                                <i class="bi bi-bank"></i>
                                                <div>
                                                    <h5><?= lang('System.store.business-tab.detail.tax-collection') ?></h5>
                                                    <p><?= number_format($business['tax_percentage'], 1) ?>% (<?= lang('System.store.business-tab.detail.tax-collection-types.' . $business['tax_inclusive']) ?>)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="highlight-card">
                                                <i class="bi bi-box-seam"></i>
                                                <div>
                                                    <h5><?= lang('System.store.business-tab.detail.shipping') ?></h5>
                                                    <p>
                                                        <?=  lang('System.store.business-tab.detail.shipping-options.' . $business['shipping_options']) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="highlight-card">
                                                <i class="bi bi-bag-heart"></i>
                                                <div>
                                                    <h5><?= lang('System.store.business-tab.detail.supporting') ?></h5>
                                                    <p><?= lang('System.store.business-tab.detail.business-of', [$business['country']]) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="included-box">
                                        <h4><i class="bi bi-cash-coin"></i> <?= lang('System.store.business-tab.detail.payment-methods') ?></h4>
                                        <?php if (empty($business['payments'])) : ?>
                                            <p class="alert alert-danger"><i class="bi bi-cone-striped"></i> <?= lang('System.store.payment-methods-unavailable') ?></p>
                                        <?php else: ?>
                                        <ul>
                                            <?php foreach ($business['payments'] as $key => $values) : ?>
                                                <?php if ('external_online' == $key) : ?>
                                                    <li><i class="bi bi-check2-circle"></i> <?= $values['payment_instruction']['title'][substr($locale, 0, 2)] ?></li>
                                                <?php else: ?>
                                                    <li><i class="bi bi-check2-circle"></i> <?= lang('System.store.business-tab.detail.payment-method-options.' . $key) ?></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="branch-tab" role="tabpanel">
                        <div class="specs-content">
                            <div class="row g-4">
                                <?php if (empty($business['branches'])) : ?>
                                    <div class="col-md-12">
                                        <div class="spec-block">
                                            <p class="alert alert-danger"><i class="bi bi-cone-striped"></i> <?= lang('System.store.branches-unavailable') ?></p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($business['branches'] as $branch) : ?>
                                        <div class="col-md-6">
                                            <div class="spec-block">
                                                <h4><?= $branch['branch_name'] ?></h4>
                                                <table class="data-table">
                                                    <tbody>
                                                    <?php if ('PHYSICAL' == $branch['branch_type']) : ?>
                                                        <tr>
                                                            <td><?= lang('System.store.business-tab.branches.branch-address') ?></td>
                                                            <td>
                                                                <?= $branch['branch_address'] ?><br/>
                                                                <?= $branch['subdivision'] ?>
                                                                <?= $branch['branch_postal_code'] ?>
                                                            </td>
                                                        </tr>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td><?= lang('System.store.business-tab.branches.store-type') ?></td>
                                                            <td><?= lang('System.store.business-tab.branches.online-store') ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <tr>
                                                        <td><?= lang('System.store.business-tab.branches.timezone-code') ?></td>
                                                        <td><?= $branch['timezone_code'] ?></td>
                                                    </tr>
                                                    <?php if (!empty($branch['hours'])) : ?>
                                                        <tr>
                                                            <td><?= lang('System.store.business-tab.branches.opening-hours') ?></td>
                                                            <td>
                                                                <?php foreach (['M', 'T', 'W', 'TH', 'F', 'S', 'SU'] as $day) : ?>
                                                                    <?php if (isset($branch['hours'][$day])) : ?>
                                                                        <?= format_hours($branch['hours'][$day]['opening_hours'], $locale) ?> - <?= format_hours($branch['hours'][$day]['closing_hours'], $locale) ?><br/>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if (!empty($branch['modified_hours'])) : ?>
                                                        <tr>
                                                            <td><?= lang('System.store.business-tab.branches.modified-hours') ?></td>
                                                            <td>
                                                                <?php foreach ($branch['modified_hours'] as $values) : ?>
                                                                    <p>
                                                                        <b><?= format_date($values['date'], $locale) ?></b><br/>
                                                                        <?php if (empty($values['opening_hours'])) : ?>
                                                                            <?= lang('System.store.business-tab.branches.store-closed') ?>
                                                                        <?php else: ?>
                                                                            <?= format_hours($values['opening_hours'], $locale) ?> - <?= format_hours($values['closing_hours'], $locale) ?>
                                                                        <?php endif; ?>
                                                                    </p>
                                                                <?php endforeach; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="shipping-tab" role="tabpanel">
                        <div class="specs-content">
                            <div class="row g-4">
                                <?php if (empty($business['shipping_rates'])) : ?>
                                    <p class="alert alert-danger"><i class="bi bi-cone-striped"></i> <?= lang('System.store.shipping-rates-unavailable') ?></p>
                                <?php else: ?>
                                    <div class="col-md-6">
                                        <div class="spec-block">
                                            <h4><?= lang('System.store.business-tab.shipping.title') ?></h4>
                                            <table class="data-table">
                                                <tbody>
                                                <?php foreach ($business['shipping_rates'] as $values) : ?>
                                                    <tr>
                                                        <td>
                                                            <?= (0 == $values['price_range_from'] ? '&lt;= ' : format_price($values['price_range_from'], $business['currency_code']) . ' - ') ?>
                                                            <?= (0 < $values['price_range_to'] ? format_price($values['price_range_to'], $business['currency_code']) : '∞') ?>
                                                        </td>
                                                        <td><?= (0 < $values['shipping_rate'] ? format_price($values['shipping_rate'], $business['currency_code']) : lang('System.store.business-tab.shipping.free')) ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="review-tab" role="tabpanel">
                        <?php
                        $stars            = $business['review_stars'];
                        $review_count     = $business['review_count'];
                        $review_breakdown = $business['review_breakdown'];
                        $entity           = 'business';
                        $entity_id        = $business['id'];
                        include '_part_review_app.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>