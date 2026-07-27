<?php $items=[
 ['label'=>'In&iacute;cio','url'=>'/'],
 ['label'=>'Detalhes construtivos','url'=>'/#focos'],
 ['label'=>$feature['name'],'url'=>null],
];require __DIR__.'/partials/breadcrumb.php';?>
<section class="feature-product-hero wrap">
 <div class="feature-product-hero-copy">
  <span class="eyebrow"><?=$feature['eyebrow']??'Detalhes construtivos'?></span>
  <h1><?=$feature['name']?></h1>
  <p><?=$feature['intro']?></p>
  <?php if(!empty($feature['overview'])):?>
  <div class="feature-product-summary">
   <?php foreach($feature['overview'] as $paragraph):?><p><?=$paragraph?></p><?php endforeach;?>
  </div>
  <?php endif;?>
  <div class="feature-product-actions">
   <a class="button button-primary" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Solicitar or&ccedil;amento</a>
   <a class="text-link" href="/#focos">&larr; Voltar aos destaques</a>
  </div>
 </div>
 <?php $primaryPhoto=$feature['gallery'][0];?>
 <?php if($slug==='gabinete-modular'):?>
 <div class="feature-product-configurator" data-cabine-gallery data-active-color="orange">
  <figure class="feature-product-hero-visual" data-cabine-render>
   <img src="<?=e($primaryPhoto['src'])?>" width="<?=$primaryPhoto['width']?>" height="<?=$primaryPhoto['height']?>" alt="<?=e(html_entity_decode($primaryPhoto['alt']))?>" data-cabine-source>
   <canvas data-cabine-canvas aria-hidden="true"></canvas>
   <figcaption>
    <span>01</span>
    <strong><?=$feature['overview_title']??'Solu&ccedil;&atilde;o desenvolvida para o projeto'?></strong>
   </figcaption>
  </figure>
  <?php require __DIR__.'/partials/cabine-color-picker.php';?>
 </div>
 <?php else:?>
 <figure class="feature-product-hero-visual">
  <img src="<?=e($primaryPhoto['src'])?>" width="<?=$primaryPhoto['width']?>" height="<?=$primaryPhoto['height']?>" alt="<?=e(html_entity_decode($primaryPhoto['alt']))?>">
  <figcaption>
   <span>01</span>
   <strong><?=$feature['overview_title']??'Solu&ccedil;&atilde;o desenvolvida para o projeto'?></strong>
  </figcaption>
 </figure>
 <?php endif;?>
</section>
<section class="feature-specifications">
 <div class="wrap feature-specifications-layout">
  <header class="feature-specifications-heading">
   <span class="eyebrow">Diferenciais construtivos</span>
   <h2 id="feature-information-title">Projetado para facilitar cada etapa</h2>
   <p>Recursos pensados para dar flexibilidade &agrave; montagem, organizar os componentes e simplificar o acesso t&eacute;cnico.</p>
  </header>
  <div class="feature-specifications-list" role="list" aria-labelledby="feature-information-title">
   <?php foreach($feature['items'] as $index=>$item):?>
   <article role="listitem">
    <span aria-hidden="true"><?=str_pad((string)($index+1),2,'0',STR_PAD_LEFT)?></span>
    <div><h3><?=$item['title']?></h3><p><?=$item['text']?></p></div>
   </article>
   <?php endforeach;?>
  </div>
 </div>
</section>
<?php if(count($feature['gallery'])>1):?>
<section class="feature-gallery wrap" aria-labelledby="feature-gallery-title">
 <header>
  <span class="eyebrow">Outros &acirc;ngulos</span>
  <h2 id="feature-gallery-title">Constru&ccedil;&atilde;o vista em detalhes</h2>
 </header>
 <div class="feature-gallery-grid">
  <?php $galleryPhotos=$slug==='gabinete-modular'?$feature['gallery']:array_slice($feature['gallery'],1);$galleryNumberStart=$slug==='gabinete-modular'?1:2;?>
  <?php foreach($galleryPhotos as $index=>$photo):?>
  <figure>
   <img src="<?=e($photo['src'])?>" width="<?=$photo['width']?>" height="<?=$photo['height']?>" loading="lazy" alt="<?=e(html_entity_decode($photo['alt']))?>">
   <figcaption><span><?=str_pad((string)($index+$galleryNumberStart),2,'0',STR_PAD_LEFT)?></span><strong><?=$photo['caption']??$feature['name']?></strong></figcaption>
  </figure>
  <?php endforeach;?>
 </div>
</section>
<?php endif;?>
<?php if(!empty($feature['finish_options'])):?>
<section class="feature-finishes-section">
 <div class="wrap feature-finishes-layout">
  <div>
   <span class="eyebrow">Acabamento personalizado</span>
   <h2>Cores para a necessidade e a identidade do projeto</h2>
   <p><?=$feature['finish_intro']?></p>
  </div>
  <ul class="feature-finish-options" aria-label="Exemplos de cores dispon&iacute;veis">
   <?php foreach($feature['finish_options'] as $finish):?>
   <li>
    <span style="--finish-color:<?=e($finish['color'])?>" aria-hidden="true"></span>
    <?=$finish['name']?>
   </li>
   <?php endforeach;?>
  </ul>
 </div>
</section>
<?php endif;?>
<section class="feature-benefits-section">
 <div class="wrap feature-benefits-layout">
  <div>
   <span class="eyebrow">Na pr&aacute;tica</span>
   <h2>Como a solu&ccedil;&atilde;o contribui para o projeto</h2>
  </div>
  <ol class="feature-benefits-list">
   <?php foreach($feature['benefits'] as $benefit):?><li><?=$benefit?></li><?php endforeach;?>
  </ol>
 </div>
</section>
<section class="feature-planning-section wrap">
 <div class="feature-planning-block">
  <span class="eyebrow">Aplica&ccedil;&otilde;es</span>
  <h2>Onde pode ser utilizado</h2>
  <ul><?php foreach($feature['applications'] as $application):?><li><?=$application?></li><?php endforeach;?></ul>
 </div>
 <div class="feature-planning-block feature-planning-block-accent">
  <span class="eyebrow">Antes da proposta</span>
  <h2>O que precisamos conhecer</h2>
  <ul><?php foreach($feature['project_info'] as $information):?><li><?=$information?></li><?php endforeach;?></ul>
 </div>
</section>
<?php
$ctaTitle=$feature['cta_title']??'Quer desenvolver uma solu&ccedil;&atilde;o como esta para o seu projeto?';
$ctaText=$feature['cta_text']??'Converse com a Metal Life e envie as informa&ccedil;&otilde;es da sua aplica&ccedil;&atilde;o.';
require __DIR__.'/partials/cta.php';
?>
