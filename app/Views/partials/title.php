<header class="section-title">
    <?php if (!empty($eyebrow)): ?><p class="eyebrow"><?= e($eyebrow) ?></p><?php endif; ?>
    <h1><?= e($title) ?></h1>
    <div class="accent-line" aria-hidden="true"></div>
    <?php if (!empty($description)): ?><p class="section-description"><?= e($description) ?></p><?php endif; ?>
</header>
