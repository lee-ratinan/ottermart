<?php $this->extend('_layout'); ?>
<?= $this->section('content') ?>
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
                                    <input type="text" class="form-control" name="business-name" id="business-name" placeholder="<?= lang('System.home.business-name') ?>" required="" autocomplete="off">
                                    <button type="submit" class="btn-submit">
                                        <span><?= lang('System.home.search') ?></span>
                                        <i class="bi bi-arrow-right"></i>
                                    </button>
                                </div>
                            </form>
                            <?php if (isset($results)) : ?>
                                <h3><?= lang('System.home.results') ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $this->endSection() ?>