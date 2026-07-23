<section class="manual-page">
    <?php $title = 'Paleta de cores oficiais'; $description = 'Os valores técnicos partem dos códigos HEX oficiais. CMYK não validado deve ser conferido com o fornecedor gráfico.'; require __DIR__ . '/partials/title.php'; ?>
    <section class="section-grid four-columns">
        <?php foreach ($manual['colors'] as $color): ?>
            <article class="color-card">
                <div class="color-swatch" style="background-color: <?= e($color['hex']) ?>; color: <?= $color['hex'] === '#E8ECF2' || $color['hex'] === '#C97D2E' ? '#112240' : '#ffffff' ?>;">
                    <span><?= e($color['hex']) ?></span>
                </div>
                <div class="color-body">
                    <h3><?= e($color['name']) ?></h3>
                    <p class="color-role"><?= e($color['role']) ?></p>
                    <dl>
                        <div><dt>HEX</dt><dd><?= e($color['hex']) ?></dd></div>
                        <div><dt>RGB</dt><dd><?= e($color['rgb']) ?></dd></div>
                        <div><dt>CMYK</dt><dd><?= e($color['cmyk'] ?? 'A validar com fornecedor gráfico.') ?></dd></div>
                        <div><dt>Pantone</dt><dd><?= e($color['pantone'] ?? 'A validar com fornecedor gráfico.') ?></dd></div>
                    </dl>
                    <button class="button button-secondary" type="button" data-copy="<?= e($color['hex']) ?>">Copiar HEX</button>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
    <?php $title = 'Combinações aprovadas'; $description = ''; require __DIR__ . '/partials/title.php'; ?>
    <section class="section-grid three-columns">
        <article class="combination-card navy-combo"><h3>METAL<br>life</h3><p>Fundo escuro + texto branco + acento laranja</p><small>Combinação A — Institucional</small><span>Contraste 14.7:1 · aprovado</span></article>
        <article class="combination-card white-combo"><h3>METAL<br>life</h3><p>Fundo branco + texto naval + acento laranja</p><small>Combinação B — Editorial</small><span>Contraste 14.7:1 · aprovado</span></article>
        <article class="combination-card slate-combo"><h3>METAL<br>life</h3><p>Fundo ardósia + texto branco</p><small>Combinação C — Secundária</small><span>Contraste 7.1:1 · aprovado</span></article>
    </section>
    <section class="technical-note">
        <strong>Nota técnica</strong>
        <p>CMYK deve ser fechado em prova gráfica com o fornecedor. Os valores digitais oficiais são os HEX exibidos nesta página.</p>
    </section>
</section>
