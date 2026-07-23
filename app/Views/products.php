<?php $items=[['label'=>'In&iacute;cio','url'=>'/'],['label'=>'Produtos','url'=>null]];require __DIR__.'/partials/breadcrumb.php';?>
<section class="page-intro wrap"><span class="eyebrow">Portf&oacute;lio</span><h1>Produtos para instala&ccedil;&otilde;es e processos industriais</h1><p>Explore as duas linhas de atua&ccedil;&atilde;o da Metal Life. Cada p&aacute;gina apresenta aplica&ccedil;&otilde;es, possibilidades de personaliza&ccedil;&atilde;o e as informa&ccedil;&otilde;es necess&aacute;rias para solicitar uma proposta.</p></section>
<section class="section wrap"><div class="product-grid"><?php foreach($site['products'] as $slug=>$product)require __DIR__.'/partials/product-card.php';?></div></section>
<?php require __DIR__.'/partials/cta.php';?>
