<?php $items=[['label'=>'In&iacute;cio','url'=>'/'],['label'=>'Aplica&ccedil;&otilde;es e setores','url'=>null]];require __DIR__.'/partials/breadcrumb.php';?>
<section class="applications-hero wrap">
 <div><span class="eyebrow">Aplica&ccedil;&otilde;es &bull; Metal Life</span><h1>A solu&ccedil;&atilde;o certa come&ccedil;a pela sua aplica&ccedil;&atilde;o.</h1><p>Da prote&ccedil;&atilde;o de componentes ao acabamento industrial, desenvolvemos estruturas considerando o seu produto, o processo e o ambiente de instala&ccedil;&atilde;o.</p><a class="applications-hero-link" href="#setores">Explore os setores <span aria-hidden="true">&darr;</span></a></div>
 <figure><img src="/img/site/linha-pintura.jpg" width="1200" height="900" fetchpriority="high" alt="Linha de pintura e estruturas em ambiente industrial"><figcaption><span>Projeto &bull; Estrutura &bull; Acabamento</span><strong>Na medida do seu processo.</strong></figcaption></figure>
</section>
<section class="applications-sectors wrap" id="setores" aria-labelledby="sectors-title"><header class="applications-heading"><div><span class="eyebrow">Onde a Metal Life atua</span><h2 id="sectors-title">Diferentes setores.<br>Aten&ccedil;&atilde;o a cada necessidade.</h2></div><p>Encontre seu segmento e conhe&ccedil;a as solu&ccedil;&otilde;es relacionadas.</p></header>
 <div class="applications-cards">
 <?php $applicationSectors=[
 ['title'=>'Metal&uacute;rgico','text'=>'Estruturas para fabrica&ccedil;&atilde;o e acabamento de componentes met&aacute;licos.','tag'=>'Estruturas e equipamentos','url'=>'/produtos'],
 ['title'=>'El&eacute;trico e automa&ccedil;&atilde;o','text'=>'Caixas e pain&eacute;is para organizar componentes de comando e distribui&ccedil;&atilde;o.','tag'=>'Caixas e pain&eacute;is','url'=>'/caixas-metalicas-paineis-eletricos'],
 ['title'=>'Fabricantes de m&aacute;quinas','text'=>'Gabinetes e quadros configurados para integrar o seu equipamento.','tag'=>'Gabinetes personalizados','url'=>'/gabinete-metalico'],
 ['title'=>'Moveleiro','text'=>'Solu&ccedil;&otilde;es de pintura e acabamento para componentes e m&oacute;veis met&aacute;licos.','tag'=>'Pintura industrial','url'=>'/cabines-pintura-industrial'],
 ['title'=>'Automotivo','text'=>'Equipamentos de pintura avaliados conforme a pe&ccedil;a e o fluxo de produ&ccedil;&atilde;o.','tag'=>'Processos de pintura','url'=>'/cabine-pintura-automatica'],
 ['title'=>'Agroindustrial','text'=>'Estruturas para componentes e instala&ccedil;&otilde;es em ambientes industriais.','tag'=>'Estruturas met&aacute;licas','url'=>'/caixas-metalicas-paineis-eletricos'],
 ['title'=>'Tratamento de superf&iacute;cies','text'=>'Cabines e estufas para as etapas de aplica&ccedil;&atilde;o e cura do revestimento.','tag'=>'Cabines e estufas','url'=>'/estufas-fornos-cura'],
 ['title'=>'Projetos especiais','text'=>'Dimens&otilde;es, acessos ou configura&ccedil;&otilde;es que pedem uma avalia&ccedil;&atilde;o dedicada.','tag'=>'Desenvolvimento sob consulta','url'=>'/solicitar-orcamento'],
 ];foreach($applicationSectors as $sectorIndex=>$sector):?>
 <a class="applications-card" data-reveal href="<?=e($sector['url'])?>"><div class="applications-card-top"><span><?=sprintf('%02d',$sectorIndex+1)?></span><b aria-hidden="true">&nearr;</b></div><h3><?=$sector['title']?></h3><p><?=$sector['text']?></p><span class="applications-card-tag"><?=$sector['tag']?></span></a>
 <?php endforeach;?>
 </div>
</section>
<section class="applications-contact wrap"><div><span class="eyebrow">Vamos entender seu projeto</span><h2>N&atilde;o encontrou sua aplica&ccedil;&atilde;o?</h2><p>Conte o que voc&ecirc; precisa. Nossa equipe ajuda a avaliar os pr&oacute;ximos passos.</p></div><a href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Conversar com a Metal Life <span aria-hidden="true">&nearr;</span></a></section>
