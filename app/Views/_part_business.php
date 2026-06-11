<?php
  /*
   * RUN THRU BUSINESS - MUST BE IN .hero CLASS
   * Need $business_card
   * */
?>
<div class="col-12">
    <div class="product-tile horizontal">
        <div class="row g-0">
            <div class="col-sm-4">
                <div class="tile-image">
                    <a href="<?= base_url($locale . '/@' . $business_card['slug']) ?>">
                        <?php if (empty($business_card['businessLogo'])) : ?>
                            <img src="<?= base_url('assets/img/no-image-800x.webp') ?>" class="img-fluid" alt="">
                        <?php else : ?>
                            <img src="<?= $business_card['businessLogo'] ?>" class="img-fluid" alt="<?= $business_card['name'] ?>">
                        <?php endif; ?>
                    </a>
                    <span class="tile-badge"><?= $business_card['businessType'] ?></span>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="tile-info">
                    <h4><?= $business_card['name'] ?></h4>
                    <p class="tile-desc"><?= $business_card['introParagraph'] ?></p>
                    <a class="btn btn-otternaut btn-sm" href="<?= base_url($locale . '/@' . $business_card['slug']) ?>"><?= lang('System.home.view-more') ?> <i class="bi bi-chevron-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
