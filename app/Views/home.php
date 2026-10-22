<section class="ml-landing" aria-labelledby="ml-landing-title">
 <div class="ml-landing-backdrop" aria-hidden="true"></div>
 <div class="wrap ml-landing-inner">
  <div class="ml-landing-copy">
   <span class="ml-label">Metal Life &nbsp;/&nbsp; Solu&ccedil;&otilde;es industriais</span>
   <h1 id="ml-landing-title">Solu&ccedil;&otilde;es met&aacute;licas<br>sob medida para<br><em>a sua ind&uacute;stria.</em></h1>
   <p>Caixas met&aacute;licas, gabinetes e cabines de pintura. Do seu projeto &agrave; fabrica&ccedil;&atilde;o, com aten&ccedil;&atilde;o a cada detalhe.</p>
   <div class="ml-landing-actions"><a class="ml-pill ml-pill-primary" href="#linhas">Conhe&ccedil;a nossos produtos <span aria-hidden="true">&rarr;</span></a><a class="ml-landing-contact" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Fale com a Metal Life &nearr;</a></div>
  </div>
 </div>
 <svg class="ml-landing-wave" viewBox="0 0 1440 90" preserveAspectRatio="none" aria-hidden="true" focusable="false"><path d="M0 48C180 100 330 1 535 20S900 104 1100 51 1310 25 1440 47V90H0Z" fill="#fff"/><path d="M0 32C180 84 330 0 535 9S900 89 1100 39 1310 12 1440 34" fill="none" stroke="#fff" stroke-opacity=".55" stroke-width="2"/></svg>
</section>
<section class="ml-reference-highlights" aria-label="Solu&ccedil;&otilde;es Metal Life"><div class="wrap">
 <div><strong>Caixas</strong><span>Para pain&eacute;is el&eacute;tricos</span></div>
 <div><strong>Gabinetes</strong><span>Personalizados para sua aplica&ccedil;&atilde;o</span></div>
 <div><strong>Cabines</strong><span>Para pintura industrial</span></div>
</div></section>
<section class="ml-quick-quote" aria-labelledby="ml-quote-title"><div class="wrap">
 <h2 id="ml-quote-title">Cota&ccedil;&atilde;o sem compromisso</h2><div class="ml-quote-stripe" aria-hidden="true"></div>
 <form action="/solicitar-orcamento" method="get" data-landing-quote>
  <div class="ml-quote-grid">
   <label><span>Seu nome</span><input name="name" autocomplete="name" placeholder="Seu nome" maxlength="120" required></label>
   <label><span>WhatsApp</span><input name="phone" type="tel" autocomplete="tel" placeholder="WhatsApp" maxlength="30" required></label>
   <label><span>E-mail</span><input name="email" type="email" autocomplete="email" placeholder="E-mail" maxlength="200" required></label>
   <label><span>Produtos para cota&ccedil;&atilde;o</span><textarea name="products" placeholder="Produtos para cota&ccedil;&atilde;o" rows="1" maxlength="2000" required></textarea></label>
  </div>
  <button type="submit">Solicitar cota&ccedil;&atilde;o <span aria-hidden="true">&rarr;</span></button>
  <p>Ao continuar, voc&ecirc; abre o WhatsApp com os dados preenchidos e confirma o envio por l&aacute;.</p>
 </form>
 <noscript><p><a href="/solicitar-orcamento">Preencher o formul&aacute;rio completo de or&ccedil;amento</a></p></noscript>
</div></section>
<section class="ml-lines" id="linhas" aria-labelledby="ml-lines-title"><div class="wrap">
 <header class="ml-products-heading"><h2 id="ml-lines-title">Produtos</h2></header>
 <div class="ml-lines-grid">
 <?php $landingLines=[
 ['url'=>'/caixa-metalica-sobrepor','image'=>'/images/caixas-metalicas/caixa-metalica-painel-eletrico.jpg','title'=>'Caixa met&aacute;lica de sobrepor','text'=>'Prote&ccedil;&atilde;o e organiza&ccedil;&atilde;o para componentes el&eacute;tricos.','label'=>'Caixas e pain&eacute;is'],
 ['url'=>'/gabinete-metalico','image'=>'/img/site/cabine2.webp','title'=>'Gabinetes personalizados','text'=>'Espa&ccedil;o, acesso e configura&ccedil;&atilde;o para cada montagem.','label'=>'Comando e automa&ccedil;&atilde;o'],
 ['url'=>'/cabine-pintura-eletrostatica-po','image'=>'/img/site/cabine-industrial.jpg','title'=>'Cabine de pintura a p&oacute;','text'=>'Estruturas pensadas para o seu processo de pintura.','label'=>'Pintura industrial'],
 ['url'=>'/estufas-fornos-cura','image'=>'/img/produtos/IMG_8355.JPG','title'=>'Estufas e fornos','text'=>'Solu&ccedil;&otilde;es para as etapas de cura e secagem.','label'=>'Cura e acabamento'],
 ];
 foreach(['caixas-metalicas-controlador-acesso-facial','totem-controle-acesso-portaria','protetor-leitor-facial-f-1','suporte-ar-condicionado','suporte-45-graus-leitor-facial'] as $featuredSlug){
  $featuredProduct=$site['products'][$featuredSlug];
  $landingLines[]=['url'=>'/'.$featuredSlug,'image'=>$featuredProduct['image'],'title'=>$featuredProduct['name'],'text'=>match($featuredSlug){
   'caixas-metalicas-controlador-acesso-facial'=>'Totem met&aacute;lico para instala&ccedil;&atilde;o de controladores de acesso facial.',
   'totem-controle-acesso-portaria'=>'Estrutura para porteiros, interfones e leitores de controle de acesso.',
   'protetor-leitor-facial-f-1'=>'Conhe&ccedil;a o F-1 e consulte os modelos compat&iacute;veis. Linha de protetores F-1 a F-13.',
   'suporte-ar-condicionado'=>'Apoio met&aacute;lico em L para a unidade externa do ar-condicionado.',
   default=>'Posicione o protetor do leitor facial em um &acirc;ngulo de 45&deg;.',
  },'label'=>$featuredProduct['category']];
 }
 foreach($landingLines as $line):?>
 <a class="ml-line-card" data-reveal href="<?=e($line['url'])?>"><div class="ml-line-image"><img src="<?=e($line['image'])?>" loading="lazy" width="600" height="450" alt="<?=e(html_entity_decode($line['title']))?>"></div><div class="ml-line-body"><span class="ml-label"><?=$line['label']?></span><h3><?=$line['title']?></h3><p><?=$line['text']?></p><span class="ml-line-more">Conhecer produto <b aria-hidden="true">&rarr;</b></span></div></a>
 <?php endforeach;?>
 </div>
 <div class="ml-products-all"><a class="ml-pill ml-pill-primary" href="/produtos">Ver cat&aacute;logo completo <span aria-hidden="true">&rarr;</span></a></div>
</div></section>
<section class="ml-about"><div class="wrap ml-about-grid">
 <div class="ml-about-image"><img src="/images/empresa/fabricacao-metal-life.jpg" width="900" height="675" loading="lazy" alt="Fabrica&ccedil;&atilde;o de estruturas met&aacute;licas Metal Life"><span>Metal Life &nbsp;&bull;&nbsp; Fabrica&ccedil;&atilde;o industrial</span></div>
 <div class="ml-about-copy"><span class="ml-label">Da necessidade &agrave; solu&ccedil;&atilde;o</span><h2>O seu projeto merece<br>mais que uma medida padr&atilde;o.</h2><p>Cada aplica&ccedil;&atilde;o tem suas particularidades. Por isso, desenvolvemos estruturas met&aacute;licas considerando o espa&ccedil;o, a instala&ccedil;&atilde;o e as condi&ccedil;&otilde;es reais de uso.</p><ul><li>Dimens&otilde;es e configura&ccedil;&otilde;es sob consulta</li><li>Acesso para montagem e manuten&ccedil;&atilde;o</li><li>Especifica&ccedil;&atilde;o alinhada &agrave; sua aplica&ccedil;&atilde;o</li></ul><a class="ml-simple-link" href="/empresa">Conhe&ccedil;a a Metal Life <span aria-hidden="true">&nearr;</span></a></div>
</div></section>
<section class="ml-process"><div class="wrap"><header class="ml-section-heading"><div><span class="ml-label">Simples desde o primeiro contato</span><h2>Vamos tirar seu projeto do papel?</h2></div><p>Conte com a Metal Life para entender a necessidade e definir os pr&oacute;ximos passos.</p></header><div class="ml-process-grid"><article><span>01 /</span><h3>Conte o que precisa</h3><p>Envie a aplica&ccedil;&atilde;o, as medidas e os desenhos ou fotos dispon&iacute;veis.</p></article><article><span>02 /</span><h3>Alinhamos os detalhes</h3><p>Avaliamos a configura&ccedil;&atilde;o e os requisitos do seu projeto.</p></article><article><span>03 /</span><h3>Receba uma proposta</h3><p>Converse com nossa equipe sobre a solu&ccedil;&atilde;o e as condi&ccedil;&otilde;es de fornecimento.</p></article></div></div></section>
<section class="ml-final-cta"><div class="wrap"><div><span class="ml-label">Sua pr&oacute;xima solu&ccedil;&atilde;o come&ccedil;a aqui</span><h2>Metal Life.<br>Na medida da sua ind&uacute;stria.</h2><p>Vamos conversar sobre o que voc&ecirc; precisa fabricar?</p></div><div class="ml-final-actions"><a class="ml-pill ml-pill-light" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Solicitar or&ccedil;amento <span aria-hidden="true">&nearr;</span></a><a href="/solicitar-orcamento">Prefere enviar os detalhes? Preencha o formul&aacute;rio &rarr;</a></div></div></section>
