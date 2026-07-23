<section class="manual-page">
    <?php $title = 'Mapa do site'; $description = 'Navegue pelas áreas principais do site institucional da METAL LIFE.'; require __DIR__ . '/partials/title.php'; ?>
    <div class="toc-grid">
        <?php foreach ($manual['sections'] as $section): ?>
            <a class="toc-card" href="<?= e($section['route']) ?>">
                <span><?= e($section['number']) ?>.</span>
                <div>
                    <h2><?= e($section['title']) ?></h2>
                    <p><?= e($section['description']) ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>
