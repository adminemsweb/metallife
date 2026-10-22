<?php
$catalogColumns=[
 [['title'=>'Caixas e pain&eacute;is','links'=>[
  '/caixas-metalicas-paineis-eletricos'=>'Ver linha completa',
  '/gabinete-metalico'=>'Gabinete personalizado',
  '/caixa-metalica-sobrepor'=>'Caixas de sobrepor',
  '/caixa-metalica-embutir'=>'Caixas de embutir',
  '/quadros-comando-metalicos'=>'Quadros de comando',
  '/gabinetes-autoportantes'=>'Gabinetes autoportantes',
  '/caixas-passagem-metalicas'=>'Caixas de passagem',
  '/caixas-metalicas-ip54-ip65'=>'Caixas IP54 e IP65',
 ]]],
 [['title'=>'Pintura industrial','links'=>[
  '/cabines-pintura-industrial'=>'Ver linha completa',
  '/cabine-pintura-eletrostatica-po'=>'Pintura eletrost&aacute;tica a p&oacute;',
  '/cabine-pintura-liquida'=>'Pintura l&iacute;quida',
  '/cabine-pintura-automatica'=>'Cabines autom&aacute;ticas',
  '/estufas-fornos-cura'=>'Estufas e fornos',
 ]]],
 [['title'=>'Totens e controle de acesso','anchor'=>'/produtos#totens'],['title'=>'Acess&oacute;rios metalizados','anchor'=>'/produtos#acessorios']],
 [['title'=>'Protetores faciais','anchor'=>'/produtos#protetores-faciais','compact'=>true]],
];
foreach($catalogColumns as $catalogColumn):?>
<div class="catalog-nav-column"><?php foreach($catalogColumn as $catalogGroup):
 $catalogLinks=$catalogGroup['links']??[];
 if(isset($catalogGroup['anchor']))foreach($site['products'] as $catalogSlug=>$catalogProduct){
  if(($catalogProduct['category_url']??'')!==$catalogGroup['anchor'])continue;
  $catalogLinks['/'.$catalogSlug]=!empty($catalogGroup['compact'])?'Modelo '.e($catalogProduct['sku']):$catalogProduct['name'];
 }
?>
<section class="catalog-nav-group"><h3><?=$catalogGroup['title']?></h3><div class="catalog-nav-links<?=!empty($catalogGroup['compact'])?' catalog-nav-models':''?>"><?php foreach($catalogLinks as $catalogUrl=>$catalogLabel):?><a href="<?=e($catalogUrl)?>"<?=current_path()===$catalogUrl?' aria-current="page"':''?>><?=$catalogLabel?></a><?php endforeach;?></div><?php if(!empty($catalogGroup['compact'])):?><a class="catalog-nav-category-link" href="<?=e($catalogGroup['anchor'])?>">Comparar modelos &rarr;</a><?php endif;?></section>
<?php endforeach;?></div>
<?php endforeach;?>
