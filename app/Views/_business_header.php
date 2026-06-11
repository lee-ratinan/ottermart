<?php
function printBusinessHead($business) {
    if (!empty($business['business_logo'])) {
        echo '<img class="img-thumbnail page-logo me-3 mb-3" src="' . $business['business_logo'] . '" alt="' . $business['business_name'] . '" />';
    }
    echo '<div class="small">' . $business['type_name'] . '</div><h2 class="mt-3">' . $business['business_name'] . '</h2>';
    echo '<div>';
    if (is_array($business['social_media'])) {
        foreach ($business['social_media'] as $social_key => $social_link) {
            if (!empty($social_link)) {
                echo '<a class="btn btn-outline-dark rounded-pill me-2" href="' . $social_link . '" target="_blank" title="' . strtoupper($social_key) . '"><i class="bi bi-' . $social_key . '"></i></a>';
            }
        }
    }
    echo '</div>';
    if (!empty($business['mart_store_intro_paragraph'])) {
        echo '<div class="text-left" style="max-width:600px"><p>' . $business['mart_store_intro_paragraph'] . '</p></div>';
    }
}
?>
<div class="container px-0" data-aos="fade-up">
    <div class="row">
        <?php if (empty($business['business_header'])) : /* NO BANNER, use col-12*/ ?>
            <div class="col-12 col-lg-6 pt-3">
                <?php printBusinessHead($business); ?>
            </div>
        <?php else: /* BANNER, use col-12 col-lg-6 */ ?>
            <div class="col-12 col-lg-6">
                <img src="<?= $business['business_header'] ?>" class="img-fluid store-img-mask" alt="<?= $business['business_name'] ?>" />
            </div>
            <div class="col-12 col-lg-6 p-4 pt-5">
                <?php printBusinessHead($business); ?>
            </div>
        <?php endif; ?>
    </div>
</div>