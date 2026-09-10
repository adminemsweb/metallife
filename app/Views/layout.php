<?php
$app=require dirname(__DIR__).'/config/app.php';
$seo=$seo??['title'=>$app['title'],'description'=>$app['description'],'path'=>current_path(),'type'=>'website'];
$plain=static fn(string $value):string=>html_entity_decode(strip_tags($value),ENT_QUOTES|ENT_HTML5,'UTF-8');
$canonical=rtrim($app['base_url'],'/').$seo['path'];
$siteUrl=rtrim($app['base_url'],'/');
$organization=['@context'=>'https://schema.org','@type'=>'Organization','@id'=>$siteUrl.'/#organization','name'=>'Metal Life','alternateName'=>'Metal Life Industrial','url'=>$siteUrl.'/','logo'=>['@type'=>'ImageObject','url'=>$siteUrl.'/img/metal-life-logo.png','width'=>1200,'height'=>1200],'description'=>$plain('Fabricante de caixas met&aacute;licas, gabinetes, quadros el&eacute;tricos e cabines de pintura industrial sob medida.'),'email'=>'contato@metallife.com.br','telephone'=>'+55 11 96919-5102','sameAs'=>['https://www.instagram.com/mettal.life/']];
$website=['@context'=>'https://schema.org','@type'=>'WebSite','@id'=>$siteUrl.'/#website','url'=>$siteUrl.'/','name'=>'Metal Life','alternateName'=>['Metal Life Industrial','metallife.com.br'],'publisher'=>['@id'=>$siteUrl.'/#organization'],'inLanguage'=>'pt-BR'];
?>
<!doctype html><html lang="pt-BR"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=e($plain($seo['title']))?></title><meta name="description" content="<?=e($plain($seo['description']))?>">
<link rel="canonical" href="<?=e($canonical)?>"><meta name="robots" content="index,follow,max-image-preview:large">
<meta name="theme-color" content="#102b46"><meta property="og:locale" content="pt_BR"><meta property="og:type" content="<?=e($seo['type'])?>"><meta property="og:site_name" content="Metal Life"><meta property="og:title" content="<?=e($plain($seo['title']))?>"><meta property="og:description" content="<?=e($plain($seo['description']))?>"><meta property="og:url" content="<?=e($canonical)?>"><meta property="og:image" content="<?=e(rtrim($app['base_url'],'/').($seo['image']??'/images/cabines-pintura/cabine-pintura-eletrostatica-po.jpg'))?>">
<meta name="twitter:card" content="summary_large_image"><meta name="twitter:title" content="<?=e($plain($seo['title']))?>"><meta name="twitter:description" content="<?=e($plain($seo['description']))?>">
<link rel="icon" href="/favicon.png?v=3" type="image/png"><link rel="apple-touch-icon" href="/favicon.png?v=3"><link rel="manifest" href="/manifest.json?v=3"><link rel="stylesheet" href="/assets/css/site.css?v=42">
<script type="application/ld+json" nonce="<?=e($cspNonce)?>"><?=json_encode($organization,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)?></script>
<?php if($seo['path']==='/'):?><script type="application/ld+json" nonce="<?=e($cspNonce)?>"><?=json_encode($website,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)?></script><?php endif;?>
<link rel="stylesheet" href="/assets/css/navigation.css?v=6">
<link rel="stylesheet" href="/assets/css/footer.css?v=2">
<?php if($template==='cabinet'):?><link rel="stylesheet" href="/assets/css/cabinet.css?v=4"><?php endif;?>
<?php if(in_array($template,['booth-planner','cabinet'],true)):?><link rel="stylesheet" href="/assets/css/booth-planner.css?v=4"><?php endif;?>
</head><body id="top">
<a class="skip-link" href="#main-content">Pular para o conte&uacute;do</a>
<header class="site-header"><div class="header-inner">
 <a class="header-brand" href="/" aria-label="Metal Life &mdash; p&aacute;gina inicial"><span class="site-logo"><img src="/img/metal-life-logo.png" width="62" height="62" alt="Metal Life"></span></a>
 <nav class="desktop-nav" aria-label="Navega&ccedil;&atilde;o principal">
  <a class="<?=e(active_path('/'))?>" href="/">In&iacute;cio</a>
  <a class="<?=e(active_path('/empresa'))?>" href="/empresa">A Metal Life</a>
  <div class="nav-group <?=str_contains(current_path(),'caixa')||str_contains(current_path(),'quadro')||(str_contains(current_path(),'gabinete')&&current_path()!=='/gabinete-metalico')||(str_contains(current_path(),'cabine')&&current_path()!=='/cabine-de-pintura')||str_contains(current_path(),'estufa')||current_path()==='/produtos'?'active':''?>"><button type="button" aria-expanded="false">Produtos <span aria-hidden="true">+</span></button><div class="nav-dropdown nav-products"><div><span class="nav-category">Caixas e pain&eacute;is</span><a href="/gabinete-metalico">Gabinete personalizado &nearr;</a><a href="/caixas-metalicas-paineis-eletricos">Vis&atilde;o geral</a><a href="/caixa-metalica-sobrepor">Caixas de sobrepor</a><a href="/caixa-metalica-embutir">Caixas de embutir</a><a href="/quadros-comando-metalicos">Quadros de comando</a><a href="/gabinetes-autoportantes">Gabinetes autoportantes</a><a href="/caixas-passagem-metalicas">Caixas de passagem</a><a href="/caixas-metalicas-ip54-ip65">Caixas IP54 e IP65</a></div><div><span class="nav-category">Pintura industrial</span><a href="/cabine-de-pintura">Configurar minha cabine &nearr;</a><a href="/cabines-pintura-industrial">Vis&atilde;o geral</a><a href="/cabine-pintura-eletrostatica-po">Pintura eletrost&aacute;tica a p&oacute;</a><a href="/cabine-pintura-liquida">Pintura l&iacute;quida</a><a href="/cabine-pintura-automatica">Cabines autom&aacute;ticas</a><a href="/estufas-fornos-cura">Estufas e fornos</a></div></div></div>
  <a class="<?=e(active_path('/gabinete-metalico'))?>" href="/gabinete-metalico">Gabinete de pintura</a>
  <a class="<?=e(active_path('/aplicacoes-setores'))?>" href="/aplicacoes-setores">Aplica&ccedil;&otilde;es</a>
  <a class="<?=e(is_path_prefix('/conteudo-tecnico'))?>" href="/conteudo-tecnico">Conte&uacute;do</a>
  <a class="<?=e(active_path('/contato'))?>" href="/contato">Contato</a>
 </nav>
 <a class="header-quote" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer"><span>Solicitar or&ccedil;amento</span><strong aria-hidden="true">&rarr;</strong></a>
 <button class="menu-trigger" type="button" data-menu-open aria-controls="mobile-menu" aria-expanded="false"><span>Menu</span><b aria-hidden="true"></b></button>
</div></header>
<div class="mobile-menu" id="mobile-menu" data-mobile-menu role="dialog" aria-modal="true" aria-label="Navega&ccedil;&atilde;o" hidden><div class="mobile-menu-head"><img src="/img/metal-life-logo.png" width="62" height="62" alt="Metal Life"><button type="button" data-menu-close>Fechar &times;</button></div><p class="mobile-menu-label">Explore a Metal Life</p><nav aria-label="Menu mobile"><a href="/">In&iacute;cio</a><a href="/empresa">A Metal Life</a><a href="/caixas-metalicas-paineis-eletricos">Caixas e pain&eacute;is</a><a href="/gabinete-metalico">Gabinete de pintura</a><a href="/cabines-pintura-industrial">Cabines de pintura</a><a href="/aplicacoes-setores">Aplica&ccedil;&otilde;es</a><a href="/conteudo-tecnico">Conte&uacute;do t&eacute;cnico</a><a href="/contato">Contato</a><a class="mobile-quote" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Solicitar or&ccedil;amento <span aria-hidden="true">&rarr;</span></a></nav></div>
<main id="main-content" tabindex="-1"><?php require __DIR__.'/'.$template.'.php';?></main>
<?php require __DIR__.'/partials/footer.php';?>
<script src="/assets/js/cabinet-finish.js?v=1" defer></script>
<script src="/assets/js/site.js?v=11" defer></script>
<?php if($template==='cabinet'):?><script src="/assets/js/cabinet.js?v=1" defer></script><?php endif;?>
<?php if(in_array($template,['booth-planner','cabinet'],true)):?><script src="/assets/js/booth-project.js?v=2" defer></script><script src="/assets/js/booth-planner.js?v=2" defer></script><?php endif;?></body></html>
