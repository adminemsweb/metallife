<?php
$cabinet=$site['features']['gabinete-modular'];
$items=[['label'=>'In&iacute;cio','url'=>'/'],['label'=>'Produtos','url'=>'/produtos'],['label'=>'Gabinete met&aacute;lico','url'=>null]];
require __DIR__.'/partials/breadcrumb.php';
$cabinetSchema=['@context'=>'https://schema.org','@type'=>'Product','name'=>'Gabinete metálico personalizado Metal Life','description'=>html_entity_decode($cabinet['intro'],ENT_QUOTES|ENT_HTML5,'UTF-8'),'image'=>array_map(static fn(array $photo):string=>$siteUrl.$photo['src'],$cabinet['gallery']),'brand'=>['@type'=>'Brand','name'=>'Metal Life'],'url'=>$siteUrl.'/gabinete-metalico'];
?>
<script type="application/ld+json" nonce="<?=e($cspNonce)?>"><?=json_encode($cabinetSchema,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)?></script>
<article class="cabinet-page">
 <section class="cabinet-hero wrap" id="personalizar" data-cabine-gallery data-cabine-autocycle="false" aria-labelledby="cabinet-title">
  <div class="cabinet-intro">
   <span class="eyebrow">Metal Life &nbsp;/&nbsp; Fabrica&ccedil;&atilde;o sob medida</span>
   <h1 id="cabinet-title">Estrutura robusta.<br><em>Liberdade</em> para montar.</h1>
   <p class="cabinet-product-name">Gabinete met&aacute;lico personalizado</p>
   <p class="cabinet-lead">Seu projeto tem uma configura&ccedil;&atilde;o pr&oacute;pria. O gabinete tamb&eacute;m pode ter. Espa&ccedil;o interno, acessos e acabamento pensados para acompanhar sua montagem, da primeira conex&atilde;o &agrave; pr&oacute;xima manuten&ccedil;&atilde;o.</p>
   <ul class="cabinet-highlights"><li>Portas remov&iacute;veis</li><li>Trilhos adaptativos</li><li>Painel personalizado</li></ul>
   <div class="cabinet-personalization">
    <?php require __DIR__.'/partials/cabine-color-picker.php';?>
    <p class="cabinet-color-note">Simula&ccedil;&atilde;o visual de acabamento. A tonalidade final &eacute; confirmada na especifica&ccedil;&atilde;o do projeto.</p>
   </div>
   <a class="cabinet-primary-link" href="#configurar">Montar meu projeto <span aria-hidden="true">&nearr;</span></a>
   <a class="cabinet-details-link" href="#construcao">Explore cada detalhe <span aria-hidden="true">&darr;</span></a>
  </div>
  <div class="cabinet-studio">
   <div class="cabinet-studio-top"><span>Explore o produto</span><span data-cabinet-angle-name>01 / Estrutura</span></div>
   <figure class="cabinet-render" data-cabine-render>
    <img src="/img/site/cabine2.webp" width="1024" height="1536" fetchpriority="high" alt="Gabinete Metal Life com estrutura aberta, trilhos e painel interno laranja" data-cabine-source>
    <canvas data-cabine-canvas role="img" aria-label="Gabinete Metal Life com as cores selecionadas" aria-hidden="true"></canvas>
   </figure>
   <button class="cabinet-zoom" type="button" data-cabinet-zoom aria-pressed="false" aria-label="Ampliar visualiza&ccedil;&atilde;o" hidden><span aria-hidden="true">&plus;</span> Ampliar</button>
   <div class="cabinet-view-controls" role="group" aria-label="&Acirc;ngulos do gabinete" hidden>
    <?php foreach($cabinet['gallery'] as $index=>$photo):?><button type="button" data-cabinet-view="<?=e($photo['src'])?>" data-view-alt="<?=e(html_entity_decode($photo['alt'],ENT_QUOTES|ENT_HTML5,'UTF-8'))?>" data-view-name="<?=str_pad((string)($index+1),2,'0',STR_PAD_LEFT)?> / <?=['Estrutura','Lateral','Interior'][$index]?>" aria-pressed="<?=$index===0?'true':'false'?>"><span aria-hidden="true">0<?=$index+1?></span><?=['Estrutura','Lateral','Interior'][$index]?></button><?php endforeach;?>
   </div>
   <p class="cabinet-render-status" data-cabinet-status role="status">Escolha as cores do painel e da estrutura para visualizar sua combina&ccedil;&atilde;o.</p>
  </div>
 </section>
 <nav class="cabinet-section-nav" aria-label="Nesta p&aacute;gina"><div class="wrap"><strong>Gabinete Metal Life</strong><a href="#configurar">Medidas e produ&ccedil;&atilde;o</a><a href="#construcao">Constru&ccedil;&atilde;o</a><a href="#aplicacoes">Aplica&ccedil;&otilde;es</a><a href="#especificacoes">Especifica&ccedil;&otilde;es</a><a href="#duvidas">D&uacute;vidas</a><a href="#personalizar">Personalizar <span aria-hidden="true">&uarr;</span></a></div></nav>
 <?php require __DIR__.'/partials/booth-configurator.php';?>
 <section class="cabinet-section wrap" id="construcao">
  <header class="cabinet-section-heading"><div><span class="eyebrow">01 &nbsp;/&nbsp; Constru&ccedil;&atilde;o em detalhe</span><h2>A diferen&ccedil;a aparece<br>quando voc&ecirc; monta.</h2></div><p>A qualidade de um gabinete tamb&eacute;m est&aacute; no acesso aos componentes, na liberdade de ajuste e na organiza&ccedil;&atilde;o do espa&ccedil;o. Conhe&ccedil;a os recursos deste modelo.</p></header>
  <div class="cabinet-construction">
   <figure class="cabinet-detail-photo"><img src="/img/site/cabine3.png" width="960" height="1280" loading="lazy" alt="Interior do gabinete aberto: painel de montagem, trilhos laterais, base e porta"><figcaption><span>Por dentro do projeto</span>Espa&ccedil;o para organizar. Acesso para trabalhar.</figcaption></figure>
   <div class="cabinet-feature-list">
    <?php foreach($cabinet['items'] as $index=>$item):?><details name="cabinet-construction" <?=$index===0?'open':''?>><summary><span class="cabinet-feature-number">0<?=$index+1?></span><h3><?=$item['title']?></h3><span class="cabinet-feature-plus" aria-hidden="true">+</span></summary><div><p><?=$item['text']?></p><span class="cabinet-feature-benefit"><?= ['Mais liberdade para trabalhar na montagem.','A configura&ccedil;&atilde;o acompanha seus componentes.','Conex&otilde;es acess&iacute;veis durante a interven&ccedil;&atilde;o.','Organiza&ccedil;&atilde;o definida pelo seu projeto.','Espa&ccedil;o planejado para a aplica&ccedil;&atilde;o.'][$index]?></span></div></details><?php endforeach;?>
   </div>
  </div>
 </section>
 <section class="cabinet-benefits"><div class="wrap">
  <header class="cabinet-section-heading"><div><span class="eyebrow">Do projeto &agrave; rotina</span><h2>Bem pensado por dentro.<br>Pronto para o seu projeto.</h2></div></header>
  <div class="cabinet-benefit-grid">
   <article><span>01 / MONTAGEM</span><h3>Trabalhe com mais acesso.</h3><p>Portas e fundo remov&iacute;veis facilitam alcan&ccedil;ar o interior, posicionar componentes e organizar a fia&ccedil;&atilde;o.</p></article>
   <article><span>02 / CONFIGURA&Ccedil;&Atilde;O</span><h3>Adapte o espa&ccedil;o &agrave; instala&ccedil;&atilde;o.</h3><p>Trilhos ajust&aacute;veis e painel personalizado ajudam a acomodar a disposi&ccedil;&atilde;o dos equipamentos prevista no projeto.</p></article>
   <article><span>03 / MANUTEN&Ccedil;&Atilde;O</span><h3>Pense no pr&oacute;ximo acesso.</h3><p>A constru&ccedil;&atilde;o remov&iacute;vel permite ampliar o acesso aos componentes tamb&eacute;m nas interven&ccedil;&otilde;es futuras.</p></article>
  </div>
 </div></section>
 <section class="cabinet-section wrap cabinet-finish">
  <div><span class="eyebrow">Sua identidade, no acabamento</span><h2>O seu gabinete.<br>As suas cores.</h2><p>A estrutura e o painel interno podem receber cores diferentes. Combine a identifica&ccedil;&atilde;o visual da sua empresa com a configura&ccedil;&atilde;o do equipamento.</p><p>Explore cores prontas ou escolha uma tonalidade livre no visualizador. Ao solicitar a configura&ccedil;&atilde;o, sua sele&ccedil;&atilde;o acompanha a mensagem para a Metal Life.</p><a class="cabinet-inline-link" href="#personalizar">Experimentar combina&ccedil;&otilde;es <span aria-hidden="true">&nearr;</span></a></div>
  <figure><img src="/img/site/cabine.webp" width="1024" height="1536" loading="lazy" alt="Detalhe do acabamento lateral e do painel interno laranja do gabinete Metal Life"><figcaption>Acabamento externo &amp; painel interno</figcaption></figure>
 </section>
 <section class="cabinet-applications" id="aplicacoes"><div class="wrap cabinet-application-layout"><div><span class="eyebrow">02 &nbsp;/&nbsp; Aplica&ccedil;&otilde;es</span><h2>Uma estrutura.<br>Diferentes projetos.</h2><p>Desenvolvido para a montagem de sistemas de comando, automa&ccedil;&atilde;o e distribui&ccedil;&atilde;o de energia.</p></div><ul><?php foreach($cabinet['applications'] as $index=>$application):?><li><span>0<?=$index+1?></span><?=$application?></li><?php endforeach;?></ul></div></section>
 <section class="cabinet-section wrap" id="especificacoes">
  <header class="cabinet-section-heading"><div><span class="eyebrow">03 &nbsp;/&nbsp; Especifica&ccedil;&atilde;o do produto</span><h2>Sob medida &eacute; pensar<br>no conjunto.</h2></div><p>As caracter&iacute;sticas de fornecimento s&atilde;o definidas com voc&ecirc;. Estas informa&ccedil;&otilde;es ajudam a transformar a necessidade da instala&ccedil;&atilde;o em uma proposta.</p></header>
  <dl class="cabinet-specs">
   <div><dt>Dimens&otilde;es e espa&ccedil;o interno</dt><dd>Definidos conforme os componentes e o espa&ccedil;o dispon&iacute;vel no local de instala&ccedil;&atilde;o.</dd></div>
   <div><dt>Acessos e montagem</dt><dd>Portas e fundo remov&iacute;veis, trilhos adaptativos e painel personalizado, conforme a configura&ccedil;&atilde;o contratada.</dd></div>
   <div><dt>Material e espessura</dt><dd>Especificados para a aplica&ccedil;&atilde;o e registrados na proposta t&eacute;cnica.</dd></div>
   <div><dt>Acabamento e cores</dt><dd>Personaliza&ccedil;&atilde;o da estrutura e do painel interno. Tonalidade e acabamento confirmados antes da fabrica&ccedil;&atilde;o.</dd></div>
   <div><dt>Entradas de cabos e interfaces</dt><dd>Posi&ccedil;&otilde;es, recortes e necessidades de acesso definidos a partir do seu desenho ou levantamento.</dd></div>
   <div><dt>Ambiente e grau de prote&ccedil;&atilde;o</dt><dd>Requisitos avaliados conforme as condi&ccedil;&otilde;es de uso e a especifica&ccedil;&atilde;o da instala&ccedil;&atilde;o.</dd></div>
   <div><dt>Prazo e condi&ccedil;&otilde;es de fornecimento</dt><dd>Informados na proposta, de acordo com a configura&ccedil;&atilde;o, a quantidade e o escopo do projeto.</dd></div>
  </dl>
 </section>
 <section class="cabinet-project"><div class="wrap"><header><span class="eyebrow">Vamos tirar o projeto do papel</span><h2>Da sua necessidade<br>ao gabinete certo.</h2></header><ol><li><strong>Conte o que voc&ecirc; precisa</strong><p>Envie medidas, fotos ou desenho e a lista de componentes previstos.</p></li><li><strong>Defina a configura&ccedil;&atilde;o</strong><p>Alinhe com a equipe os acessos, a disposi&ccedil;&atilde;o interna e o acabamento.</p></li><li><strong>Receba uma proposta</strong><p>Avalie as especifica&ccedil;&otilde;es, o prazo e as condi&ccedil;&otilde;es para o fornecimento.</p></li></ol><a class="cabinet-primary-link" href="/solicitar-orcamento">Enviar informa&ccedil;&otilde;es do projeto <span aria-hidden="true">&nearr;</span></a></div></section>
 <section class="cabinet-section wrap cabinet-faq" id="duvidas"><header><span class="eyebrow">04 &nbsp;/&nbsp; D&uacute;vidas frequentes</span><h2>Antes de escolher<br>o seu gabinete.</h2></header><div>
  <details><summary>Posso pedir medidas diferentes das imagens?</summary><p>Sim. O gabinete &eacute; fabricado sob medida. Envie as dimens&otilde;es dispon&iacute;veis e a rela&ccedil;&atilde;o de componentes para avaliar a configura&ccedil;&atilde;o adequada.</p></details>
  <details><summary>As portas podem ser retiradas completamente?</summary><p>Sim. O modelo apresentado possui portas remov&iacute;veis para ampliar o acesso ao interior durante a montagem e a manuten&ccedil;&atilde;o.</p></details>
  <details><summary>Posso escolher cores diferentes para o painel e a estrutura?</summary><p>Sim. Use o visualizador para experimentar combina&ccedil;&otilde;es e encaminhe a sele&ccedil;&atilde;o &agrave; equipe. A cor final e o acabamento s&atilde;o confirmados na proposta.</p></details>
  <details><summary>Os componentes el&eacute;tricos est&atilde;o inclu&iacute;dos?</summary><p>A apresenta&ccedil;&atilde;o &eacute; da estrutura do gabinete. Equipamentos, acess&oacute;rios e servi&ccedil;os de montagem devem ser alinhados e discriminados no escopo da proposta.</p></details>
  <details><summary>Qual &eacute; o grau de prote&ccedil;&atilde;o deste modelo?</summary><p>O grau de prote&ccedil;&atilde;o deve ser definido para as condi&ccedil;&otilde;es de instala&ccedil;&atilde;o. Informe o ambiente e os requisitos do seu projeto para a avalia&ccedil;&atilde;o t&eacute;cnica.</p></details>
  <details><summary>O que preciso enviar para receber um or&ccedil;amento?</summary><p>Medidas aproximadas, quantidade, lista de componentes, entradas de cabos, local de instala&ccedil;&atilde;o e acabamento desejado. Desenhos e fotos ajudam a detalhar a necessidade.</p></details>
 </div></section>
 <section class="cabinet-final"><div class="wrap"><span class="eyebrow">Gabinete met&aacute;lico Metal Life</span><h2>Seu pr&oacute;ximo projeto<br>come&ccedil;a pela estrutura.</h2><p>Converse com quem vai desenvolver o seu gabinete.</p><a class="cabinet-primary-link" href="#configurar">Configurar e solicitar proposta <span aria-hidden="true">&nearr;</span></a></div></section>
</article>
