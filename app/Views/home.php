<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
    <main class="main">
        <section id="hero" class="hero section light-background">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-5">
                        <div class="intro-content">
                            <span class="badge-label">Curated Selection</span>
                            <h1 class="headline"><?= lang('System.home.title') ?></h1>
                            <p class="subtext"><?= lang('System.home.subtitle') ?></p>
                            <form method="get" class="mb-3">
                                <label for="business-name"><?= lang('System.home.business-name') ?></label>
                                <input type="text" class="form-control my-3" name="business-name" id="business-name" placeholder="<?= lang('System.home.business-name') ?>" required="" value="<?= @$results['query'] ?>" autocomplete="off">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-otternaut">
                                        <span><?= lang('System.home.search') ?></span> <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="trust-indicators d-none">
                                <div class="indicator">
                                    <i class="bi bi-truck"></i>
                                    <span>Free Shipping</span>
                                </div>
                                <div class="indicator">
                                    <i class="bi bi-shield-check"></i>
                                    <span>Verified Quality</span>
                                </div>
                                <div class="indicator">
                                    <i class="bi bi-arrow-return-left"></i>
                                    <span>Easy Returns</span>
                                </div>
                                <div class="indicator">
                                    <i class="bi bi-chat-dots"></i>
                                    <span>24/7 Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row g-3">
                            <!-- BUSINESS LIST -->
                            <?php if (!empty($results['query'])) : ?>
                                <h3 class="my-5"><?= lang('System.home.results', [$results['query']]) ?></h3>
                            <?php endif; ?>
                            <?php if (empty($results['results'])) : ?>
                                <div class="alert bg-warning text-dark"><?= lang('System.home.not-found') ?></div>
                            <?php else : ?>
                                <?php foreach ($results['results'] as $business_card) : ?>
                                    <?php include('_part_business.php'); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $this->endSection() ?>