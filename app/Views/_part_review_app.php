<div class="feedback-content">
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-md-4">
            <div class="rating-overview">
                <div class="big-number"><?= number_format($stars, 1) ?></div>
                <div class="star-row">
                    <?= printStars($stars) ?>
                </div>
                <span class="count-label"><?= lang('System.store.business-tab.reviews.review-count', [number_format($review_count)]) ?></span>
            </div>
        </div>
        <div class="col-lg-9 col-md-8">
            <?php
            $review_breakdown = explode(';', $review_breakdown);
            $stars_bd[5]      = $review_breakdown[0];
            $stars_bd[4]      = $review_breakdown[1];
            $stars_bd[3]      = $review_breakdown[2];
            $stars_bd[2]      = $review_breakdown[3];
            $stars_bd[1]      = $review_breakdown[4];
            $max_count        = max($stars_bd);
            ?>
            <div class="distribution-chart">
                <?php for ($i = 5; $i > 0; $i--) : ?>
                    <div class="dist-row">
                        <span class="dist-label"><?= $i ?> <i class="bi bi-star-fill"></i></span>
                        <div class="dist-track">
                            <div class="dist-fill" style="width:<?= $max_count > 0 ? floor($stars_bd[$i]/$max_count*100) : 0 ?>%;"></div>
                        </div>
                        <span class="dist-count"><?= number_format($stars_bd[$i]) ?></span>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div><!-- End Rating Overview -->
    <div class="reviews-list">
        <article class="review-entry">
            <div class="entry-top">
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
        </article><!-- End Review Entry -->
        <div class="load-wrap">
            <button id="btn-load-more" class="btn btn-otternaut"><?= lang('System.store.business-tab.reviews.load-more') ?></button>
        </div>
    </div><!-- End Reviews List -->
</div>