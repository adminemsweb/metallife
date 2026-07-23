<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$pages = array_merge(
    [
        ['title' => 'Início', 'route' => '/'],
    ],
    $manual['sections']
);
$currentIndex = null;
foreach ($pages as $index => $page) {
    if ($page['route'] === $currentPath) {
        $currentIndex = $index;
        break;
    }
}
$previous = $currentIndex !== null ? ($pages[$currentIndex - 1] ?? null) : null;
$next = $currentIndex !== null ? ($pages[$currentIndex + 1] ?? null) : null;
?>
<?php if ($currentPath !== '/404'): ?>
    <nav class="page-navigation no-print" aria-label="Navegação entre páginas">
        <div>
            <?php if ($previous): ?>
                <a class="page-link previous" href="<?= e($previous['route']) ?>">
                    <span>Anterior</span>
                    <strong><?= e($previous['title']) ?></strong>
                </a>
            <?php endif; ?>
        </div>
        <a class="button button-secondary" href="/contato">Falar com a METAL LIFE</a>
        <div>
            <?php if ($next): ?>
                <a class="page-link next" href="<?= e($next['route']) ?>">
                    <span>Próximo</span>
                    <strong><?= e($next['title']) ?></strong>
                </a>
            <?php endif; ?>
        </div>
    </nav>
<?php endif; ?>
