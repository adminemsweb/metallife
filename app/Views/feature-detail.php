<?php $items=[
 ['label'=>'In&iacute;cio','url'=>'/'],
 ['label'=>'Detalhes construtivos','url'=>'/#focos'],
 ['label'=>$feature['name'],'url'=>null],
];require __DIR__.'/partials/breadcrumb.php';?>
<section class="feature-detail-intro wrap">
 <div>
  <span class="eyebrow">Detalhes construtivos</span>
  <h1><?=$feature['name']?></h1>
  <p><?=$feature['intro']?></p>
  <a class="text-link" href="/#focos">&larr; Voltar aos destaques</a>
 </div>
</section>
<section class="feature-detail-content wrap">
 <div class="feature-detail-photo-stack">
  <?php foreach($feature['gallery'] as $photo):?>
  <figure>
   <img src="<?=e($photo['src'])?>" width="<?=$photo['width']?>" height="<?=$photo['height']?>" alt="<?=e(html_entity_decode($photo['alt']))?>">
  </figure>
  <?php endforeach;?>
 </div>
 <aside class="feature-detail-information" aria-labelledby="feature-information-title">
  <header>
   <span class="eyebrow">Informa&ccedil;&otilde;es do equipamento</span>
   <h2 id="feature-information-title">Detalhes do <?=$feature['name']?></h2>
  </header>
  <div class="feature-information-list" role="list">
   <?php foreach($feature['items'] as $index=>$item):?>
   <article role="listitem">
    <span aria-hidden="true"><?=str_pad((string)($index+1),2,'0',STR_PAD_LEFT)?></span>
    <h3><?=$item['title']?></h3>
    <p><?=$item['text']?></p>
   </article>
   <?php endforeach;?>
  </div>
 </aside>
</section>
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
<?php $ctaTitle='Quer desenvolver uma solu&ccedil;&atilde;o como esta para o seu projeto?';$ctaText='Converse com a Metal Life e envie as informa&ccedil;&otilde;es da sua aplica&ccedil;&atilde;o.';require __DIR__.'/partials/cta.php';?>
