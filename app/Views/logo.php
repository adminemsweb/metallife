<section class="manual-page">
    <?php $title = 'Versões da logo'; $description = 'Use sempre os arquivos originais, sem redesenhar, distorcer ou modificar a assinatura.'; require __DIR__ . '/partials/title.php'; ?>
    <section class="section-grid three-columns">
        <?php foreach ($manual['logos'] as $logo): ?>
            <article class="logo-card <?= e($logo['class']) ?>">
                <div class="logo-stage"><img src="<?= e($logo['path']) ?>" alt="Logo METAL LIFE - <?= e($logo['name']) ?>"></div>
                <div class="logo-card-body">
                    <h3><?= e($logo['name']) ?></h3>
                    <p><?= e($logo['description']) ?></p>
                    <a class="button button-secondary" href="<?= e($logo['path']) ?>" download>Baixar SVG</a>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
    <div class="section-grid two-columns">
        <section class="protection-diagram">
            <span class="measure top">M</span><span class="measure left">M</span>
            <div class="safe-area"><img src="/assets/logos/metal-life-primary.svg" alt="Logo com área de proteção"></div>
            <p>Manter espaço livre equivalente à altura da letra “M” em todos os lados.</p>
        </section>
        <section class="minimum-size">
            <div><img src="/assets/logos/metal-life-primary.svg" alt="Logo em tamanho mínimo"><span>120 px</span></div>
            <p><strong>Digital:</strong> 120 px de largura.<br><strong>Impresso:</strong> 3 cm de largura.</p>
        </section>
    </div>
    <?php $misuses = ['Não distorcer', 'Não rotacionar', 'Não alterar proporções', 'Não alterar as cores', 'Não aplicar efeitos', 'Não usar sobre fundos sem contraste', 'Não modificar a tipografia', 'Não separar elementos da assinatura']; ?>
    <div class="subsection-heading">
        <h2>Proibições</h2>
        <p>Qualquer variação fora das regras abaixo reduz consistência, leitura e reconhecimento.</p>
    </div>
    <section class="section-grid four-columns">
        <?php foreach ($misuses as $index => $misuse): ?>
            <article class="misuse-card misuse-<?= $index % 4 ?>">
                <div class="misuse-art"><img src="/assets/logos/metal-life-primary.svg" alt=""><span>⊘</span></div>
                <h3><?= e($misuse) ?></h3>
            </article>
        <?php endforeach; ?>
    </section>
</section>
