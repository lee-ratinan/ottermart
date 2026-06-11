<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main business">
        <section class="section pt-0">
            <?php include '_part_business_header.php'; ?>
            <?php include '_part_product_service_tabs.php'; ?>
            <div class="container product-details section py-0">
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="info-tabs">
                            <ul class="tab-nav nav" role="tablist">
                                <li><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#product-details-tab-desc" type="button" aria-selected="true" role="tab">Description</button></li>
                                <li><button class="nav-link" data-bs-toggle="tab" data-bs-target="#product-details-tab-specs" type="button" aria-selected="false" role="tab" tabindex="-1">Specifications</button></li>
                                <li><button class="nav-link" data-bs-toggle="tab" data-bs-target="#product-details-tab-feedback" type="button" aria-selected="false" role="tab" tabindex="-1">Feedback (143)</button></li>
                            </ul>

                            <div class="tab-content">
                                <!-- Description Tab -->
                                <div class="tab-pane fade active show" id="product-details-tab-desc" role="tabpanel">
                                    <div class="desc-content">
                                        <div class="row g-4">
                                            <div class="col-lg-8">
                                                <h3>About This Product</h3>
                                                <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores.</p>

                                                <h4>Feature Highlights</h4>
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <div class="highlight-card">
                                                            <i class="bi bi-soundwave"></i>
                                                            <div>
                                                                <h5>Premium Sound</h5>
                                                                <p>Temporibus autem quibusdam officiis debitis rerum</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="highlight-card">
                                                            <i class="bi bi-battery-full"></i>
                                                            <div>
                                                                <h5>Extended Battery</h5>
                                                                <p>Saepe eveniet ut et voluptates repudiandae sint</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="highlight-card">
                                                            <i class="bi bi-bluetooth"></i>
                                                            <div>
                                                                <h5>Seamless Pairing</h5>
                                                                <p>Itaque earum rerum hic tenetur sapiente delectus</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="highlight-card">
                                                            <i class="bi bi-gem"></i>
                                                            <div>
                                                                <h5>Ergonomic Design</h5>
                                                                <p>Aut reiciendis voluptatibus maiores alias consequatur</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="included-box">
                                                    <h4><i class="bi bi-box-seam"></i> What's Included</h4>
                                                    <ul>
                                                        <li><i class="bi bi-check2-circle"></i> Premium Audio Device</li>
                                                        <li><i class="bi bi-check2-circle"></i> Protective Travel Case</li>
                                                        <li><i class="bi bi-check2-circle"></i> USB-C Charging Cable</li>
                                                        <li><i class="bi bi-check2-circle"></i> 3.5mm AUX Connector</li>
                                                        <li><i class="bi bi-check2-circle"></i> Setup Manual</li>
                                                        <li><i class="bi bi-check2-circle"></i> Warranty Certificate</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Description Tab -->

                                <!-- Specifications Tab -->
                                <div class="tab-pane fade" id="product-details-tab-specs" role="tabpanel">
                                    <div class="specs-content">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="spec-block">
                                                    <h4>Audio Performance</h4>
                                                    <table class="data-table">
                                                        <tbody>
                                                        <tr>
                                                            <td>Frequency Range</td>
                                                            <td>15Hz - 25kHz</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Driver Size</td>
                                                            <td>50mm Dynamic</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sensitivity</td>
                                                            <td>98dB SPL</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Impedance</td>
                                                            <td>24 Ohm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>THD</td>
                                                            <td>&lt; 0.5%</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="spec-block">
                                                    <h4>Wireless &amp; Power</h4>
                                                    <table class="data-table">
                                                        <tbody>
                                                        <tr>
                                                            <td>Protocol</td>
                                                            <td>Bluetooth 5.3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Range</td>
                                                            <td>Up to 30ft (10m)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Battery</td>
                                                            <td>800mAh Li-ion</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Playtime</td>
                                                            <td>35+ hours</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Charge Time</td>
                                                            <td>2.5 hours</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="spec-block">
                                                    <h4>Build &amp; Dimensions</h4>
                                                    <table class="data-table">
                                                        <tbody>
                                                        <tr>
                                                            <td>Weight</td>
                                                            <td>285g</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dimensions</td>
                                                            <td>190 x 165 x 82mm</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cushion Material</td>
                                                            <td>Memory Foam</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Frame</td>
                                                            <td>Adjustable Steel</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="spec-block">
                                                    <h4>Smart Features</h4>
                                                    <table class="data-table">
                                                        <tbody>
                                                        <tr>
                                                            <td>Noise Cancelling</td>
                                                            <td>Hybrid ANC</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Voice Assistant</td>
                                                            <td>Siri &amp; Google</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Microphone</td>
                                                            <td>Dual Array</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Water Resistance</td>
                                                            <td>IPX5</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Specifications Tab -->

                                <!-- Feedback Tab -->
                                <div class="tab-pane fade" id="product-details-tab-feedback" role="tabpanel">
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
                                </div><!-- End Feedback Tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container d-none">
                <pre>
    [currency_code] => THB
    [tax_percentage] => 7.00
    [tax_inclusive] => I
    [shipping_options] => BOTH
    [shipping_fee_taxable] => Y
    [branches] => Array
        (
            [4] => Array
                (
                    [id] => 4
                    [business_id] => 9
                    [branch_name] => สยามสแควร์
                    [branch_slug] => siam-square
                    [timezone_code] => Asia/Bangkok
                    [branch_type] => PHYSICAL
                    [branch_address] => 123 Bangkok Street
                    [branch_postal_code] => 10100
                    [branch_status] => ACTIVE
                    [created_by] => 9
                    [created_at] => 2026-01-29 10:45:45
                    [updated_at] => 2026-02-21 11:04:04
                    [subdivision] => กรุงเทพมหานคร
                    [hours] => Array
                        (
                            [T] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                            [TH] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                            [F] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                            [S] => Array
                                (
                                    [opening_hours] => 12:00:00
                                    [closing_hours] => 20:00:00
                                )

                            [SU] => Array
                                (
                                    [opening_hours] => 12:00:00
                                    [closing_hours] => 20:00:00
                                )

                            [M] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                            [W] => Array
                                (
                                    [opening_hours] => 09:00:00
                                    [closing_hours] => 21:00:00
                                )

                        )

                    [modified_hours] => Array
                        (
                        )

                )

    [payments] => Array
        (
            [cash] => Array
                (
                    [id] => 18
                    [payment_method] => cash
                    [payment_instruction] => Array
                        (
                            [en] => pay cash at the store
                            [th] => จ่ายเงินสดที่ร้าน
                        )

                )

            [bank_transfer] => Array
                (
                    [id] => 19
                    [payment_method] => bank_transfer
                    [payment_instruction] => Array
                        (
                            [swift_code] => BKKBTHBK
                            [account_name] => Rikikawa Japanese School
                            [account_number] => 123456789
                        )

                )

            [promptpay_static] => Array
                (
                    [id] => 20
                    [payment_method] => promptpay_static
                    [payment_instruction] => Array
                        (
                            [type] => phone
                            [target_value] => +66897828331
                        )

                )

            [external_online] => Array
                (
                    [id] => 21
                    [payment_method] => external_online
                    [payment_instruction] => Array
                        (
                            [title] => Array
                                (
                                    [en] => Test Channel
                                    [th] => ช่องทางทดสอบ
                                )

                            [instruction] => Array
                                (
                                    [en] => This is the instruction
                                    [th] => ทดสอบวิธีการจ่ายเงิน
                                )

                        )

                )

        )

    [shipping_rates] => Array
        (
            [0] => Array
                (
                    [id] => 8
                    [business_id] => 9
                    [price_range_from] => 0.00
                    [price_range_to] => 399.99
                    [shipping_rate] => 50.00
                    [rate_comment] =>
                    [created_by] => 9
                    [created_at] => 2026-02-07 07:31:08
                    [updated_at] => 2026-02-07 07:31:08
                )

            [1] => Array
                (
                    [id] => 10
                    [business_id] => 9
                    [price_range_from] => 400.00
                    [price_range_to] => 699.99
                    [shipping_rate] => 25.00
                    [rate_comment] =>
                    [created_by] => 9
                    [created_at] => 2026-02-07 07:32:16
                    [updated_at] => 2026-02-07 07:32:16
                )

            [2] => Array
                (
                    [id] => 11
                    [business_id] => 9
                    [price_range_from] => 700.00
                    [price_range_to] => -1.00
                    [shipping_rate] => 0.00
                    [rate_comment] => Free
                    [created_by] => 9
                    [created_at] => 2026-02-07 07:35:02
                    [updated_at] => 2026-02-07 07:35:02
                )

        )
                </pre>
            </div>
        </section>
    </main>
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