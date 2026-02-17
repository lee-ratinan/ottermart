<div class="container mb-5" data-aos="fade-up">
    <div class="small mt-5"><?= $business['type_name'] ?></div>
    <h2 class="mt-3"><?= $business['business_name'] ?></h2>
    <div class="my-3">
        <?php if (is_array($business['social_media'])) : ?>
            <?php foreach ($business['social_media'] as $social_key => $social_link) : ?>
                <?php if (!empty($social_link)) : ?>
                    <a class="btn btn-outline-dark mx-2" href="<?= $social_link ?>" target="_blank"><i class="fa-brands fa-<?= $social_key ?>"></i></a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="text-left" style="max-width:600px">
        <p><?= $business['mart_store_intro_paragraph'] ?></p>
    </div>
</div>