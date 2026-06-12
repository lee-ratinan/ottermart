<div class="container product-details px-3 py-0">
    <div class="row mt-5">
        <div class="col-12">
            <div class="info-tabs">
                <ul class="tab-nav nav" role="tablist">
                    <li><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#detail-tab" type="button" aria-selected="true" role="tab"><?= lang('System.store.business-tab.detail.title') ?></button></li>
                    <li><button class="nav-link" data-bs-toggle="tab" data-bs-target="#branch-tab" type="button" aria-selected="false" role="tab" tabindex="-1"><?= lang('System.store.business-tab.branches.title') ?></button></li>
                    <li><button class="nav-link" data-bs-toggle="tab" data-bs-target="#shipping-tab" type="button" aria-selected="false" role="tab" tabindex="-1"><?= lang('System.store.business-tab.shipping.title') ?></button></li>
                    <li class="d-none"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#review-tab" type="button" aria-selected="false" role="tab" tabindex="-1"><?= lang('System.store.business-tab.review.title', [0]) ?></button></li>
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
                                                    <?= get_currency_name($business['currency_code'], substr($locale, 0, 2)) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="highlight-card">
                                                <i class="bi bi-bank"></i>
                                                <div>
                                                    <h5><?= lang('System.store.business-tab.detail.tax-collection') ?></h5>
                                                    <p>
                                                        <?= number_format($business['tax_percentage'], 1) ?>% (<?= lang('System.store.business-tab.detail.tax-collection-types.' . $business['tax_inclusive']) ?>)
                                                    </p>
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
                                            <p class="alert alert-danger"><?= lang('System.store.payment-methods-unavailable') ?></p>
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
                                            <p class="alert alert-danger"><?= lang('System.store.branches-unavailable') ?></p>
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
                                    <p class="alert alert-danger"><?= lang('System.store.shipping-rates-unavailable') ?></p>
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
                        <div class="feedback-content">
                            <div class="row g-4 mb-4">
                                <div class="col-lg-3 col-md-4">
                                    <div class="rating-overview">
                                        <div class="big-number">4.6</div>
                                        <div class="star-row">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </div>
                                        <span class="count-label">Based on 143 ratings</span>
                                        <button class="btn review-cta">Write a Review</button>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8">
                                    <div class="distribution-chart">
                                        <div class="dist-row">
                                            <span class="dist-label">5 <i class="bi bi-star-fill"></i></span>
                                            <div class="dist-track">
                                                <div class="dist-fill" style="width:68%;"></div>
                                            </div>
                                            <span class="dist-count">97</span>
                                        </div>
                                        <div class="dist-row">
                                            <span class="dist-label">4 <i class="bi bi-star-fill"></i></span>
                                            <div class="dist-track">
                                                <div class="dist-fill" style="width:22%;"></div>
                                            </div>
                                            <span class="dist-count">31</span>
                                        </div>
                                        <div class="dist-row">
                                            <span class="dist-label">3 <i class="bi bi-star-fill"></i></span>
                                            <div class="dist-track">
                                                <div class="dist-fill" style="width:6%;"></div>
                                            </div>
                                            <span class="dist-count">9</span>
                                        </div>
                                        <div class="dist-row">
                                            <span class="dist-label">2 <i class="bi bi-star-fill"></i></span>
                                            <div class="dist-track">
                                                <div class="dist-fill" style="width:3%;"></div>
                                            </div>
                                            <span class="dist-count">4</span>
                                        </div>
                                        <div class="dist-row">
                                            <span class="dist-label">1 <i class="bi bi-star-fill"></i></span>
                                            <div class="dist-track">
                                                <div class="dist-fill" style="width:1%;"></div>
                                            </div>
                                            <span class="dist-count">2</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Rating Overview -->

                            <div class="reviews-list">
                                <article class="review-entry">
                                    <div class="entry-top">
                                        <img src="assets/img/person/person-m-8.webp" alt="Reviewer" class="avatar-img">
                                        <div class="entry-meta">
                                            <strong>Marcus Bennett</strong>
                                            <div class="meta-line">
                              <span class="inline-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                              </span>
                                                <span class="entry-date">April 12, 2024</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Exceptional clarity and comfortable wear</h5>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati.</p>
                                    <div class="entry-actions">
                                        <button class="action-btn"><i class="bi bi-hand-thumbs-up"></i> Helpful (14)</button>
                                        <button class="action-btn"><i class="bi bi-reply"></i> Reply</button>
                                    </div>
                                </article><!-- End Review Entry -->

                                <article class="review-entry">
                                    <div class="entry-top">
                                        <img src="assets/img/person/person-f-11.webp" alt="Reviewer" class="avatar-img">
                                        <div class="entry-meta">
                                            <strong>Olivia Torres</strong>
                                            <div class="meta-line">
                              <span class="inline-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                              </span>
                                                <span class="entry-date">March 5, 2024</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Solid performance with minor quirks</h5>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis. Generally pleased with my purchase.</p>
                                    <div class="entry-actions">
                                        <button class="action-btn"><i class="bi bi-hand-thumbs-up"></i> Helpful (9)</button>
                                        <button class="action-btn"><i class="bi bi-reply"></i> Reply</button>
                                    </div>
                                </article><!-- End Review Entry -->

                                <article class="review-entry">
                                    <div class="entry-top">
                                        <img src="assets/img/person/person-m-12.webp" alt="Reviewer" class="avatar-img">
                                        <div class="entry-meta">
                                            <strong>Jason Kimura</strong>
                                            <div class="meta-line">
                              <span class="inline-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                              </span>
                                                <span class="entry-date">January 18, 2024</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Ideal companion for remote professionals</h5>
                                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt neque porro quisquam est.</p>
                                    <div class="entry-actions">
                                        <button class="action-btn"><i class="bi bi-hand-thumbs-up"></i> Helpful (18)</button>
                                        <button class="action-btn"><i class="bi bi-reply"></i> Reply</button>
                                    </div>
                                </article><!-- End Review Entry -->

                                <div class="load-wrap">
                                    <button class="btn load-btn">Load More Reviews</button>
                                </div>
                            </div><!-- End Reviews List -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>