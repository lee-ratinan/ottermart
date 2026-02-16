<?php if (!empty($order)) : ?>
    <pre>
        <?php print_r($order); ?>
    </pre>
<?php else: ?>
    <p class="alert alert-warning"><?= lang('System.check-order.no-order') ?></p>
<?php endif; ?>
