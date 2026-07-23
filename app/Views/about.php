<section class="manual-page">
    <?php $title = 'Quem somos e onde queremos chegar?'; $description = ''; require __DIR__ . '/partials/title.php'; ?>
    <div class="section-grid two-columns">
        <article class="statement-card navy">
            <h2>Missão</h2>
            <p><?= e($manual['brand']['mission']) ?></p>
        </article>
        <article class="statement-card slate">
            <h2>Posicionamento</h2>
            <p><?= e($manual['brand']['positioning']) ?></p>
        </article>
    </div>
    <section class="territory-band">
        <span>Território de marca:</span>
        <strong><?= e($manual['brand']['territory']) ?></strong>
    </section>
    <section class="section-grid four-columns">
        <?php foreach ($manual['pillars'] as $pillar): ?>
            <article class="pillar-card">
                <span class="card-icon" aria-hidden="true">◆</span>
                <h3><?= e($pillar['title']) ?></h3>
                <p><?= e($pillar['description']) ?></p>
            </article>
        <?php endforeach; ?>
    </section>
    <section class="technical-strip">
        <div><span>Foco</span><strong>Operação contínua</strong></div>
        <div><span>Entrega</span><strong>Projeto + suporte</strong></div>
        <div><span>Compromisso</span><strong>Conformidade técnica</strong></div>
    </section>
</section>

<section class="manual-page editorial-slide">
    <p class="slide-eyebrow">Foco definido</p>
    <h1>Indústria metalúrgica</h1>
    <p class="slide-lead">Clientes que precisam de cabines de pintura como parte de uma linha de produção.</p>
    <div class="persona-grid">
        <?php foreach ($manual['personas'] as $persona): ?>
            <article class="persona-card">
                <span class="persona-label <?= e($persona['accent']) ?>"><?= e($persona['label']) ?></span>
                <h2><?= e($persona['title']) ?></h2>
                <p><?= e($persona['description']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
    <p class="attention-note"><strong>Atenção:</strong> personas 2 e 3 coexistem na mesma negociação — o material precisa equilibrar relacionamento e dado técnico.</p>
</section>

<section class="manual-page statement-slide">
    <p class="slide-eyebrow">Posicionamento de marca</p>
    <blockquote>
        Para indústrias metalúrgicas e moveleiras que precisam de cabines de pintura confiáveis e eficientes em sua linha de produção, a METAL LIFE é a fabricante que entrega equipamento robusto com suporte técnico de verdade.
    </blockquote>
    <p class="territory-note">Território de marca: <?= e($manual['brand']['territory']) ?></p>
</section>

<section class="manual-page editorial-slide">
    <p class="slide-eyebrow">Proposta de valor</p>
    <h1>Três problemas que a METAL LIFE resolve</h1>
    <div class="problem-grid">
        <?php foreach ($manual['valueProblems'] as $index => $problem): ?>
            <article class="problem-card">
                <h2><?= $index + 1 ?>. <?= e($problem['title']) ?></h2>
                <p><?= e($problem['description']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="manual-page editorial-slide">
    <p class="slide-eyebrow">Pilares de mensagem</p>
    <h1>O que a marca comunica — e com que prova</h1>
    <div class="message-grid">
        <?php foreach ($manual['messagePillars'] as $pillar): ?>
            <article class="message-card">
                <h2><?= e($pillar['title']) ?></h2>
                <p><?= e($pillar['proof']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
