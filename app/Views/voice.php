<section class="manual-page">
    <?php $title = 'Tom de voz'; $description = 'Comunicação técnica, direta e próxima, sem exageros promocionais.'; require __DIR__ . '/partials/title.php'; ?>
    <article class="voice-hero"><span>Arquétipo verbal</span><h2>Especialista industrial experiente</h2><p>A marca conhece a operação do cliente, explica com clareza e assume responsabilidade técnica.</p></article>
    <section class="badge-cloud">
        <?php foreach ($manual['voice']['personality'] as $item): ?><span class="badge"><?= e($item) ?></span><?php endforeach; ?>
    </section>
    <section class="section-grid two-columns">
        <div class="voice-list">
            <h2>Exemplos corretos</h2>
            <?php foreach ($manual['voice']['correct'] as $item): ?><article class="voice-card correct">✓<p><?= e($item) ?></p></article><?php endforeach; ?>
        </div>
        <div class="voice-list">
            <h2>Evitar</h2>
            <?php foreach ($manual['voice']['avoid'] as $item): ?><article class="voice-card avoid">×<p><?= e($item) ?></p></article><?php endforeach; ?>
        </div>
    </section>
</section>

<section class="manual-page editorial-slide">
    <p class="slide-eyebrow">Tom de voz na prática</p>
    <h1>Em vez de... use...</h1>
    <div class="voice-table">
        <div class="voice-table-head">Em vez de</div>
        <div class="voice-table-head">Use</div>
        <?php foreach ($manual['voice']['rewrite'] as $row): ?>
            <div>“<?= e($row['avoid']) ?>”</div>
            <div>“<?= e($row['use']) ?>”</div>
        <?php endforeach; ?>
    </div>
</section>

<section class="manual-page editorial-slide">
    <p class="slide-eyebrow">Identidade verbal</p>
    <h1>Tagline e pitch</h1>
    <article class="tagline-panel">
        <h2>Tagline sugerida (validar)</h2>
        <p>“<?= e($manual['voice']['tagline']) ?>”</p>
    </article>
    <p class="alternatives"><strong>Alternativas para teste:</strong> “<?= e($manual['voice']['alternatives']) ?>”</p>
    <article class="pitch-card">
        <h2>Elevator pitch (30s)</h2>
        <p>“<?= e($manual['voice']['pitch']) ?>”</p>
    </article>
</section>
