<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <style>.card {background-color: #2d3443 !important;color: #cccccc !important;}</style>
    <main class="main">
        <section id="contact" class="contact section mt-5">
            <div class="container section-title" data-aos="fade-up">
                <h2 class="mt-5"><?= lang('System.home.title') ?></h2>
                <p><?= lang('System.home.subtitle') ?></p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main-form-container modern-form">
                            <form method="get">
                                <div class="mx-auto" style="max-width:400px">
                                    <label for="business-name"><?= lang('System.home.business-name') ?></label>
                                    <input type="text" class="form-control" name="business-name" id="business-name" placeholder="<?= lang('System.home.business-name') ?>" required="" value="<?= @$results['query'] ?>" autocomplete="off">
                                    <button type="submit" class="btn-submit">
                                        <span><?= lang('System.home.search') ?></span>
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                            <?php if (!empty($results)) : ?>
                                <h3 class="my-5"><?= lang('System.home.results', [$results['query']]) ?></h3>
                                <?php if (!empty($results['results'])) : ?>
                                    <?php foreach ($results['results'] as $result) : ?>
                                        <div class="card my-3">
                                            <div class="row g-0">
                                                <div class="col-md-4 col-lg-3 col-xl-2">
                                                    <?php if (!empty($result['businessLogo'])) : ?>
                                                        <img src="<?= $result['businessLogo'] ?>" class="img-fluid rounded" alt="<?= $result['name'] ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-8 col-lg-9 col-xl-10">
                                                    <div class="card-body ps-5">
                                                        <h5 class="card-title"><?= $result['name'] ?></h5>
                                                        <p class="card-text"><small><?= $result['businessType'] ?></small></p>
                                                        <a href="<?= $result['link'] ?>" class="stretched-link"><?= lang('System.home.view-more') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="alert bg-warning text-dark"><?= lang('System.home.not-found') ?></div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $this->endSection() ?>