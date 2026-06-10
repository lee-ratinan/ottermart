<div class="container-fluid px-0" data-aos="fade-up">
    <div class="row">
        <?php if (!empty($business['business_header'])) : ?>
            <div class="col-12 col-lg-6"><img src="<?= $business['business_header'] ?>" class="img-fluid store-img-mask" alt="<?= $business['business_name'] ?>" /></div>
        <?php endif; ?>
        <div class="col-12 <?php if (!empty($business['business_header'])) : ?>col-lg-6<?php endif; ?> p-4 pt-5">
            <img class="img-thumbnail page-logo me-3" src="<?= $business['business_logo'] ?>" alt="<?= $business['business_name'] ?>">
            <div class="small"><?= $business['type_name'] ?></div>
            <h2 class="mt-3"><?= $business['business_name'] ?></h2>
            <div class="my-3 pt-3">
                <?php if (is_array($business['social_media'])) : ?>
                    <?php foreach ($business['social_media'] as $social_key => $social_link) : ?>
                        <?php if (!empty($social_link)) : ?>
                            <a class="btn btn-outline-dark rounded-circle me-2" href="<?= $social_link ?>" target="_blank"><i class="bi bi-<?= $social_key ?>"></i></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="text-left" style="max-width:600px">
                <p><?= $business['mart_store_intro_paragraph'] ?></p>
            </div>
        </div>
    </div>
</div>