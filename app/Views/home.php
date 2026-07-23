<section class="video-hero desktop-landing" aria-labelledby="video-hero-title">
 <video class="video-hero-media" autoplay muted loop playsinline preload="metadata" poster="/assets/images/metal-life-processo-poster.jpg" data-hero-video aria-label="Processo industrial e equipamentos fabricados pela Metal Life">
  <source src="/assets/videos/metal-life-processo.mp4?v=2" type="video/mp4" media="(min-width: 769px)">
  Seu navegador n&atilde;o reproduz este v&iacute;deo. <a href="/assets/videos/metal-life-processo.mp4?v=2">Assista ao arquivo diretamente</a>.
 </video>
 <div class="video-hero-content wrap">
  <span class="eyebrow">Engenharia &middot; fabrica&ccedil;&atilde;o &middot; ind&uacute;stria</span>
  <h1 id="video-hero-title">Solu&ccedil;&otilde;es industriais que ganham forma</h1>
  <p>Veja de perto o processo, a estrutura e o cuidado por tr&aacute;s das caixas met&aacute;licas e cabines de pintura desenvolvidas pela Metal Life.</p>
  <div class="actions"><a class="button button-primary" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Solicitar or&ccedil;amento</a><a class="button button-secondary" href="#focos">Conhecer solu&ccedil;&otilde;es</a></div>
 </div>
</section>
<section class="mobile-home-hero mobile-landing" aria-labelledby="mobile-hero-title">
 <video class="mobile-home-hero-media" autoplay muted loop playsinline preload="metadata" poster="/assets/images/metal-life-processo-poster.jpg" aria-label="Processo industrial e equipamentos fabricados pela Metal Life">
  <source src="/assets/videos/metal-life-processo-mobile.mp4?v=2" type="video/mp4" media="(max-width: 768px)">
 </video>
 <div class="mobile-home-hero-content">
  <span class="eyebrow">Engenharia &middot; fabrica&ccedil;&atilde;o</span>
  <h1 id="mobile-hero-title">Solu&ccedil;&otilde;es industriais que ganham forma</h1>
  <p>Caixas met&aacute;licas, pain&eacute;is e cabines de pintura desenvolvidos para cada projeto.</p>
  <div class="mobile-home-actions">
   <a class="button button-primary" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Solicitar or&ccedil;amento</a>
   <a class="mobile-hero-link" href="#focos">Conhecer solu&ccedil;&otilde;es <span aria-hidden="true">&darr;</span></a>
  </div>
 </div>
</section>
<section class="focus-showcase" id="focos" aria-labelledby="focus-showcase-title"><div class="wrap">
 <span class="focus-showcase-orbit" aria-hidden="true"></span>
 <header class="focus-showcase-heading" data-reveal>
  <div><span class="eyebrow">Foco em cada detalhe</span><span class="focus-showcase-count">02 solu&ccedil;&otilde;es em destaque</span></div>
  <div><h2 id="focus-showcase-title">Solu&ccedil;&otilde;es pensadas para montagem e manuten&ccedil;&atilde;o</h2><p>Explore os diferenciais de estruturas desenvolvidas para facilitar instala&ccedil;&atilde;o, organiza&ccedil;&atilde;o e acesso aos componentes.</p></div>
 </header>
 <div class="focus-showcase-grid">
  <a class="focus-showcase-item" href="/img/foco.jpeg" target="_blank" rel="noopener" aria-label="Ampliar detalhes do gabinete modular" data-reveal>
   <strong class="focus-showcase-index" aria-hidden="true">01</strong>
   <img src="/img/foco.jpeg" width="1398" height="683" loading="lazy" alt="Gabinete modular com trilhos adaptativos, fundo remov&iacute;vel e painel personalizado">
   <span><strong>Gabinete modular</strong><small>Explorar detalhes <b aria-hidden="true">&nearr;</b></small></span>
  </a>
  <a class="focus-showcase-item" href="/img/foco2.jpeg" target="_blank" rel="noopener" aria-label="Ampliar detalhes da mesa de comando" data-reveal>
   <strong class="focus-showcase-index" aria-hidden="true">02</strong>
   <img src="/img/foco2.jpeg" width="1416" height="772" loading="lazy" alt="Mesa de comando industrial em inox e a&ccedil;o com placa de montagem regul&aacute;vel">
   <span><strong>Mesa de comando</strong><small>Explorar detalhes <b aria-hidden="true">&nearr;</b></small></span>
  </a>
 </div>
</div></section>
<section class="section section-dark"><div class="wrap"><header class="section-heading"><span class="eyebrow">Crit&eacute;rios de projeto</span><h2>O que orienta cada solu&ccedil;&atilde;o</h2></header><div class="benefit-grid"><?php foreach(['Fabrica&ccedil;&atilde;o sob medida'=>'Dimens&otilde;es e configura&ccedil;&atilde;o definidas conforme a aplica&ccedil;&atilde;o.','Estruturas robustas'=>'Constru&ccedil;&atilde;o met&aacute;lica voltada &agrave;s demandas do ambiente industrial.','Atendimento t&eacute;cnico e comercial'=>'Levantamento das informa&ccedil;&otilde;es necess&aacute;rias antes da proposta.','Personaliza&ccedil;&atilde;o dimensional'=>'Projeto preparado para espa&ccedil;o, instala&ccedil;&atilde;o e processo informados.'] as $t=>$p):?><article><span aria-hidden="true">+</span><h3><?=$t?></h3><p><?=$p?></p></article><?php endforeach;?></div></div></section>
<section class="section wrap product-carousel-section" data-product-carousel><header class="section-heading split"><div><span class="eyebrow">Principais produtos</span><h2>Encontre o ponto de partida para o seu projeto</h2></div><div class="product-carousel-header-actions"><a class="text-link" href="/produtos">Ver todos os produtos &rarr;</a><div class="product-carousel-controls" aria-label="Controles do carrossel"><button type="button" data-carousel-previous aria-label="Produtos anteriores">&larr;</button><button type="button" data-carousel-next aria-label="Pr&oacute;ximos produtos">&rarr;</button></div></div></header><div class="product-carousel-track" data-carousel-track tabindex="0" aria-label="Principais produtos"><?php foreach(array_slice($site['products'],0,6,true) as $slug=>$product)require __DIR__.'/partials/product-card.php';?></div></section>
<section class="custom-band"><div class="wrap"><span class="eyebrow">Fabrica&ccedil;&atilde;o sob medida</span><h2>Seu projeto exige medidas ou caracter&iacute;sticas espec&iacute;ficas?</h2><p>A Metal Life desenvolve solu&ccedil;&otilde;es met&aacute;licas considerando dimens&otilde;es, instala&ccedil;&atilde;o, ambiente industrial e requisitos do processo.</p><a class="button button-primary" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Enviar especifica&ccedil;&otilde;es do projeto</a></div></section>
<section class="section wrap"><header class="section-heading"><span class="eyebrow">Setores atendidos</span><h2>Estruturas para diferentes realidades industriais</h2></header><ul class="sector-list"><?php foreach(['Metal&uacute;rgico','El&eacute;trico','Automa&ccedil;&atilde;o industrial','Fabricantes de m&aacute;quinas','Moveleiro','Automotivo','Agroindustrial','Pintura e tratamento de superf&iacute;cies'] as $sector):?><li><?=$sector?></li><?php endforeach;?></ul></section>
<section class="section section-soft"><div class="wrap"><header class="section-heading split"><div><span class="eyebrow">Conte&uacute;do t&eacute;cnico</span><h2>Informa&ccedil;&atilde;o para especificar melhor</h2></div><a class="text-link" href="/conteudo-tecnico">Ver todos os artigos &rarr;</a></header><div class="article-grid"><?php foreach(array_slice($site['articles'],0,3,true) as $slug=>$article):?><article class="article-card"><span class="eyebrow"><?=$article['category']?></span><h3><a href="/conteudo-tecnico/<?=e($slug)?>"><?=$article['title']?></a></h3><p>Crit&eacute;rios pr&aacute;ticos para apoiar decis&otilde;es t&eacute;cnicas e comerciais.</p><a class="text-link" href="/conteudo-tecnico/<?=e($slug)?>">Ler artigo &rarr;</a></article><?php endforeach;?></div></div></section>
<?php $ctaTitle='Precisa de uma caixa met&aacute;lica ou cabine de pintura para o seu projeto?';$ctaText='Envie as informa&ccedil;&otilde;es da aplica&ccedil;&atilde;o e receba um atendimento direcionado &agrave;s necessidades da sua ind&uacute;stria.';require __DIR__.'/partials/cta.php';?>
