<?php
declare(strict_types=1);

use App\Controllers\SiteController;
use App\Core\Env;
use App\Core\Router;

if(PHP_SAPI==='cli-server'){$requestedPath=parse_url($_SERVER['REQUEST_URI']??'/',PHP_URL_PATH)?:'/';$staticFile=__DIR__.$requestedPath;if($requestedPath!=='/'&&is_file($staticFile))return false;}
require dirname(__DIR__).'/app/Support/helpers.php';
spl_autoload_register(static function(string $class):void{$prefix='App\\';if(!str_starts_with($class,$prefix))return;$file=dirname(__DIR__).'/app/'.str_replace('\\',DIRECTORY_SEPARATOR,substr($class,strlen($prefix))).'.php';if(is_file($file))require $file;});
Env::load(dirname(__DIR__).'/.env');
$controller=new SiteController();$router=new Router();

$router->get('/',fn()=>$controller->page('home',['seo'=>$controller->seo('Metal Life','A Metal Life fabrica caixas met&aacute;licas, gabinetes, quadros el&eacute;tricos e cabines de pintura industrial sob medida para cada projeto.','/')]));
$router->get('/empresa',fn()=>$controller->page('company',['seo'=>$controller->seo('Sobre a Metal Life | Engenharia Industrial','Conhe&ccedil;a a atua&ccedil;&atilde;o da Metal Life em solu&ccedil;&otilde;es met&aacute;licas e equipamentos para processos industriais.','/empresa')]));
$router->get('/produtos',fn()=>$controller->page('products',['seo'=>$controller->seo('Produtos Industriais Sob Medida | Metal Life','Conhe&ccedil;a caixas met&aacute;licas, gabinetes, quadros, cabines de pintura e estufas para aplica&ccedil;&otilde;es industriais.','/produtos')]));
$router->get('/caixas-metalicas-paineis-eletricos',fn()=>$controller->page('category-boxes',['seo'=>$controller->seo('Caixa Met&aacute;lica para Painel El&eacute;trico | Metal Life','Caixas met&aacute;licas para pain&eacute;is el&eacute;tricos, quadros e gabinetes industriais sob medida. Conhe&ccedil;a as solu&ccedil;&otilde;es Metal Life.','/caixas-metalicas-paineis-eletricos')]));
$router->get('/cabines-pintura-industrial',fn()=>$controller->page('category-booths',['seo'=>$controller->seo('Cabines de Pintura Industrial | Metal Life','Cabines de pintura industrial a p&oacute;, l&iacute;quida e autom&aacute;tica, al&eacute;m de estufas desenvolvidas conforme o processo.','/cabines-pintura-industrial')]));
$router->get('/aplicacoes-setores',fn()=>$controller->page('applications',['seo'=>$controller->seo('Aplica&ccedil;&otilde;es Industriais e Setores | Metal Life','Solu&ccedil;&otilde;es met&aacute;licas e equipamentos para diferentes processos e setores industriais.','/aplicacoes-setores')]));
$router->get('/conteudo-tecnico',fn()=>$controller->page('blog',['seo'=>$controller->seo('Conte&uacute;do T&eacute;cnico Industrial | Metal Life','Guias sobre caixas met&aacute;licas, pain&eacute;is el&eacute;tricos, cabines de pintura e processos industriais.','/conteudo-tecnico')]));
$router->get('/solicitar-orcamento',fn()=>$controller->quote());$router->post('/solicitar-orcamento',fn()=>$controller->quote());
$router->get('/contato',fn()=>$controller->page('contact',['seo'=>$controller->seo('Contato | Metal Life','Entre em contato com a Metal Life para conversar sobre caixas met&aacute;licas, pain&eacute;is e cabines de pintura.','/contato')]));
$router->get('/politica-de-privacidade',fn()=>$controller->page('privacy',['seo'=>$controller->seo('Pol&iacute;tica de Privacidade | Metal Life','Saiba como a Metal Life trata os dados enviados pelos formul&aacute;rios deste site.','/politica-de-privacidade')]));
$router->get('/404',fn()=>$controller->notFound());
$site=require dirname(__DIR__).'/app/Data/site.php';
foreach(array_keys($site['features']) as $slug){$router->get('/detalhes/'.$slug,fn()=>$controller->feature($slug));}
foreach(array_keys($site['products']) as $slug){$router->get('/'.$slug,fn()=>$controller->product($slug));}
foreach(array_keys($site['articles']) as $slug){$router->get('/conteudo-tecnico/'.$slug,fn()=>$controller->article($slug));}
$redirect=static function(string $path):void{header('Location: '.$path,true,301);};
foreach(['/conteudo'=>'/conteudo-tecnico','/sobre'=>'/empresa','/solucoes'=>'/produtos','/segmentos'=>'/aplicacoes-setores','/diferenciais'=>'/empresa','/aplicacoes'=>'/aplicacoes-setores','/logo'=>'/','/cores'=>'/','/tipografia'=>'/','/voz'=>'/'] as $old=>$new){$router->get($old,fn()=>$redirect($new));}
$router->dispatch($_SERVER['REQUEST_URI']??'/');
