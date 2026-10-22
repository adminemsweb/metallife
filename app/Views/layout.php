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
<!-- Google Tag Manager -->
<script nonce="<?=e($cspNonce)?>">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;var n=d.querySelector('[nonce]');
n&&j.setAttribute('nonce',n.nonce||n.getAttribute('nonce'));f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NKWLBPJQ');</script>
<!-- End Google Tag Manager -->
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=e($plain($seo['title']))?></title><meta name="description" content="<?=e($plain($seo['description']))?>">
<link rel="canonical" href="<?=e($canonical)?>"><meta name="robots" content="index,follow,max-image-preview:large">
<meta name="theme-color" content="#102b46"><meta property="og:locale" content="pt_BR"><meta property="og:type" content="<?=e($seo['type'])?>"><meta property="og:site_name" content="Metal Life"><meta property="og:title" content="<?=e($plain($seo['title']))?>"><meta property="og:description" content="<?=e($plain($seo['description']))?>"><meta property="og:url" content="<?=e($canonical)?>"><meta property="og:image" content="<?=e(rtrim($app['base_url'],'/').($seo['image']??'/img/metal-life-compartilhamento.png'))?>">
<meta property="og:image:secure_url" content="<?=e($siteUrl.($seo['image']??'/img/metal-life-compartilhamento.png'))?>"><meta property="og:image:alt" content="<?=e(isset($seo['image'])?$plain($seo['title']):'Logo Metal Life')?>">
<?php if(!isset($seo['image'])):?><meta property="og:image:type" content="image/png"><meta property="og:image:width" content="1200"><meta property="og:image:height" content="1200"><?php endif;?>
<meta name="twitter:image" content="<?=e($siteUrl.($seo['image']??'/img/metal-life-compartilhamento.png'))?>">
<meta name="twitter:card" content="summary_large_image"><meta name="twitter:title" content="<?=e($plain($seo['title']))?>"><meta name="twitter:description" content="<?=e($plain($seo['description']))?>">
<link rel="icon" href="/favicon.png?v=3" type="image/png"><link rel="apple-touch-icon" href="/favicon.png?v=3"><link rel="manifest" href="/manifest.json?v=3"><link rel="stylesheet" href="/assets/css/site.css?v=48">
<script type="application/ld+json" nonce="<?=e($cspNonce)?>"><?=json_encode($organization,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)?></script>
<?php if($seo['path']==='/'):?><script type="application/ld+json" nonce="<?=e($cspNonce)?>"><?=json_encode($website,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)?></script><?php endif;?>
<link rel="stylesheet" href="/assets/css/navigation.css?v=14">
<link rel="stylesheet" href="/assets/css/footer.css?v=3">
<?php if($template==='home'):?><link rel="stylesheet" href="/assets/css/landing.css?v=3"><?php endif;?>
<?php if(in_array($template,['catalog-product','products','category-telecom'],true)):?><link rel="stylesheet" href="/assets/css/catalog-product.css?v=3"><?php endif;?>
<?php if($template==='applications'):?><link rel="stylesheet" href="/assets/css/applications.css?v=2"><?php endif;?>
<?php if($template==='blog'):?><link rel="stylesheet" href="/assets/css/blog.css?v=1"><?php endif;?>
<?php if($template==='article'):?><link rel="stylesheet" href="/assets/css/article.css?v=1"><?php endif;?>
<?php if($template==='quote'):?><link rel="stylesheet" href="/assets/css/quote.css?v=1"><?php endif;?>
<?php if($template==='contact'):?><link rel="stylesheet" href="/assets/css/contact.css?v=1"><?php endif;?>
<?php if($template==='cabinet'):?><link rel="stylesheet" href="/assets/css/cabinet.css?v=6"><?php endif;?>
<?php if(in_array($template,['booth-planner','cabinet'],true)):?><link rel="stylesheet" href="/assets/css/booth-planner.css?v=5"><?php endif;?>
<?php if($template==='cabinet'):?><link rel="stylesheet" href="/assets/css/cabinet-scale.css?v=2"><?php endif;?>
<?php if(in_array($template,['product','catalog-product','category-boxes','category-booths'],true)):?><link rel="stylesheet" href="/assets/css/product-scale.css?v=1"><?php endif;?>
<?php if($template==='product'):?><link rel="stylesheet" href="/assets/css/product-detail.css?v=1"><?php endif;?>
</head><body id="top">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKWLBPJQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<a class="skip-link" href="#main-content">Pular para o conte&uacute;do</a>
<header class="site-header"><div class="header-inner">
 <a class="header-brand" href="/" aria-label="Metal Life &mdash; p&aacute;gina inicial"><span class="site-logo"><img src="/img/metal-life-logo.png" width="62" height="62" alt="Metal Life"></span><span class="header-brand-copy" aria-hidden="true">Metal Life<small>Solu&ccedil;&otilde;es industriais</small></span></a>
 <nav class="desktop-nav" aria-label="Navega&ccedil;&atilde;o principal">
  <a class="<?=e(active_path('/'))?>" href="/">In&iacute;cio</a>
  <a class="<?=e(active_path('/empresa'))?>" href="/empresa">A Metal Life</a>
  <div class="nav-group <?=current_path()==='/produtos'||isset($site['products'][ltrim(current_path(),'/')])||in_array(current_path(),['/gabinete-metalico','/caixas-metalicas-paineis-eletricos','/cabines-pintura-industrial','/racks-padrao-telecom'],true)?'active':''?>"><button type="button" aria-expanded="false">Produtos <span aria-hidden="true">+</span></button><div class="nav-dropdown nav-products"><div class="catalog-nav-grid"><?php require __DIR__.'/partials/catalog-navigation.php';?></div><a class="catalog-nav-all" href="/produtos"><span>Explore o cat&aacute;logo Metal Life</span><strong>Ver todos os produtos &rarr;</strong></a></div></div>
  <a class="<?=e(active_path('/gabinete-metalico'))?>" href="/gabinete-metalico">Caixa met&aacute;lica</a>
  <a class="<?=e(active_path('/aplicacoes-setores'))?>" href="/aplicacoes-setores">Aplica&ccedil;&otilde;es</a>
  <a class="<?=e(is_path_prefix('/conteudo-tecnico'))?>" href="/conteudo-tecnico">Conte&uacute;do</a>
  <a class="<?=e(active_path('/contato'))?>" href="/contato">Contato</a>
 </nav>
 <a class="header-quote" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer"><svg class="header-whatsapp-icon" viewBox="0 0 24 24" width="19" height="19" fill="currentColor" aria-hidden="true" focusable="false"><path d="M20.52 3.48A11.87 11.87 0 0 0 12.05 0C5.46 0 .1 5.36.1 11.95c0 2.1.55 4.15 1.6 5.96L0 24l6.26-1.64a11.96 11.96 0 0 0 5.79 1.47h.01c6.59 0 11.95-5.36 11.95-11.95 0-3.19-1.24-6.19-3.49-8.4ZM12.06 21.8a9.9 9.9 0 0 1-5.05-1.38l-.36-.21-3.72.98.99-3.63-.23-.37a9.89 9.89 0 0 1-1.52-5.24c0-5.48 4.46-9.94 9.95-9.94a9.87 9.87 0 0 1 7.03 2.91 9.88 9.88 0 0 1 2.91 7.03c0 5.48-4.46 9.95-10 9.95Zm5.45-7.44c-.3-.15-1.77-.87-2.04-.97-.28-.1-.48-.15-.68.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.88-.78-1.48-1.75-1.65-2.05-.18-.3-.02-.46.13-.61.14-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.03-.53-.07-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.8.37-.27.3-1.04 1.02-1.04 2.49s1.07 2.89 1.22 3.09c.15.2 2.1 3.2 5.09 4.49.71.31 1.26.49 1.7.63.71.23 1.36.2 1.87.12.57-.08 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.13-.27-.2-.57-.35Z"/></svg><span>Cota&ccedil;&atilde;o via WhatsApp</span></a>
 <?php require __DIR__.'/partials/header-socials.php';?>
 <button class="menu-trigger" type="button" data-menu-open aria-controls="mobile-menu" aria-expanded="false"><span>Menu</span><b aria-hidden="true"></b></button>
</div></header>
<div class="mobile-menu" id="mobile-menu" data-mobile-menu role="dialog" aria-modal="true" aria-label="Navega&ccedil;&atilde;o" hidden><div class="mobile-menu-head"><img src="/img/metal-life-logo.png" width="62" height="62" alt="Metal Life"><button type="button" data-menu-close>Fechar &times;</button></div><?php require __DIR__.'/partials/header-socials.php';?><p class="mobile-menu-label">Explore a Metal Life</p><nav aria-label="Menu mobile"><a href="/">In&iacute;cio</a><a href="/empresa">A Metal Life</a><details class="mobile-catalog"><summary>Produtos</summary><div class="mobile-catalog-content"><?php require __DIR__.'/partials/catalog-navigation.php';?></div><a class="mobile-catalog-all" href="/produtos">Ver todos os produtos &rarr;</a></details><a href="/aplicacoes-setores">Aplica&ccedil;&otilde;es</a><a href="/conteudo-tecnico">Conte&uacute;do t&eacute;cnico</a><a href="/contato">Contato</a><a class="mobile-quote" href="https://wa.me/5511969195102" target="_blank" rel="noopener noreferrer">Solicitar or&ccedil;amento <span aria-hidden="true">&rarr;</span></a></nav></div>
<main id="main-content" tabindex="-1"<?php if(in_array($template,['product','catalog-product','category-boxes','category-booths'],true)):?> data-product-page<?php endif;?><?php if($template==='category-boxes'):?> class="boxes-page"<?php elseif(in_array($template,['products','category-telecom'],true)):?> class="products-page"<?php elseif($template==='applications'):?> class="applications-page"<?php elseif($template==='blog'):?> class="blog-page"<?php endif;?>><?php require __DIR__.'/'.$template.'.php';?></main>
<?php require __DIR__.'/partials/footer.php';?>
<script src="/assets/js/cabinet-finish.js?v=1" defer></script>
<script src="/assets/js/site.js?v=12" defer></script>
<?php if($template==='home'):?><script src="/assets/js/landing.js?v=1" defer></script><?php endif;?>
<?php if($template==='cabinet'):?><script src="/assets/js/cabinet.js?v=1" defer></script><?php endif;?>
<?php if(in_array($template,['booth-planner','cabinet'],true)):?><script src="/assets/js/booth-project.js?v=2" defer></script><script src="/assets/js/booth-planner.js?v=3" defer></script><?php endif;?></body></html>
