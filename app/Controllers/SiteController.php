<?php
declare(strict_types=1);
namespace App\Controllers;
use App\Core\View;

final class SiteController
{
    private array $site;
    private string $cspNonce;

    public function __construct()
    {
        $this->site=require dirname(__DIR__).'/Data/site.php';
        $this->cspNonce=base64_encode(random_bytes(18));
        header("Content-Security-Policy: default-src 'self'; base-uri 'self'; object-src 'none'; frame-ancestors 'none'; form-action 'self'; script-src 'self' 'nonce-{$this->cspNonce}'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self'; media-src 'self'; connect-src 'self'; manifest-src 'self'; upgrade-insecure-requests");
    }

    public function page(string $template,array $data=[]):void{ View::render($template,['site'=>$this->site,'cspNonce'=>$this->cspNonce,...$data]); }
    public function seo(string $title,string $description,string $path,string $type='website'):array{return compact('title','description','path','type');}
    public function product(string $slug):void{ $p=$this->site['products'][$slug]??null; if(!$p){$this->notFound();return;} $this->page('product',['product'=>$p,'slug'=>$slug,'seo'=>$this->seo($p['title'],$p['description'],'/'.$slug)]);}
    public function feature(string $slug):void{ $f=$this->site['features'][$slug]??null; if(!$f){$this->notFound();return;} $this->page('feature-detail',['feature'=>$f,'slug'=>$slug,'seo'=>$this->seo($f['title'],$f['description'],'/detalhes/'.$slug)]);}
    public function article(string $slug):void{ $a=$this->site['articles'][$slug]??null;if(!$a){$this->notFound();return;} $d='Crit&eacute;rios para avaliar '.html_entity_decode($a['keyword']).' com apoio t&eacute;cnico e sem respostas gen&eacute;ricas.';$this->page('article',['article'=>$a,'slug'=>$slug,'seo'=>$this->seo(strip_tags(html_entity_decode($a['title'])).' | Metal Life',$d,'/conteudo-tecnico/'.$slug,'article')]);}
    public function notFound():void{http_response_code(404);$this->page('404',['seo'=>$this->seo('P&aacute;gina n&atilde;o encontrada | Metal Life','A p&aacute;gina solicitada n&atilde;o foi encontrada.','/404')]);}
    public function quote():void
    {
        $this->startQuoteSession();
        header('Cache-Control: no-store');
        $seo=$this->seo('Solicitar Or&ccedil;amento Industrial | Metal Life','Envie as informa&ccedil;&otilde;es do seu projeto de caixa met&aacute;lica ou cabine de pintura e solicite uma avalia&ccedil;&atilde;o.','/solicitar-orcamento');
        if(($_SERVER['REQUEST_METHOD']??'GET')==='GET'){$_SESSION['csrf']=bin2hex(random_bytes(24));$this->page('quote',['csrf'=>$_SESSION['csrf'],'seo'=>$seo]);return;}
        $fields=[];foreach(['name','company','email','phone','location','interest','application','dimensions','quantity','protection','message','origin'] as $key)$fields[$key]=trim((string)($_POST[$key]??''));
        $errors=[];
        if(!hash_equals((string)($_SESSION['csrf']??''),(string)($_POST['csrf']??'')))$errors[]='A sess&atilde;o do formul&aacute;rio expirou. Recarregue a p&aacute;gina.';
        if(trim((string)($_POST['website']??''))!=='')$errors[]='N&atilde;o foi poss&iacute;vel validar o envio.';
        if($fields['name']==='')$errors[]='Informe seu nome.';if($fields['company']==='')$errors[]='Informe a empresa.';if(!filter_var($fields['email'],FILTER_VALIDATE_EMAIL))$errors[]='Informe um e-mail v&aacute;lido.';if($fields['phone']==='')$errors[]='Informe um telefone.';if($fields['interest']==='')$errors[]='Selecione o produto de interesse.';if($fields['message']==='')$errors[]='Descreva brevemente o projeto.';if(!isset($_POST['consent']))$errors[]='Confirme o consentimento com a Pol&iacute;tica de Privacidade.';
        $limits=['name'=>120,'company'=>160,'email'=>254,'phone'=>40,'location'=>160,'interest'=>100,'application'=>300,'dimensions'=>160,'quantity'=>9,'protection'=>40,'message'=>4000,'origin'=>500];
        foreach($limits as $key=>$limit)if(strlen($fields[$key])>$limit)$errors[]='Um ou mais campos ultrapassaram o tamanho permitido.';
        if($fields['quantity']!==''&&(!ctype_digit($fields['quantity'])||(int)$fields['quantity']<1||(int)$fields['quantity']>999999))$errors[]='Informe uma quantidade v&aacute;lida.';
        $uploadName='';
        if(isset($_FILES['project_file'])&&($_FILES['project_file']['error']??UPLOAD_ERR_NO_FILE)!==UPLOAD_ERR_NO_FILE){$f=$_FILES['project_file'];$allowed=['application/pdf'=>'pdf','image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'];$mime=is_uploaded_file($f['tmp_name'])?(new \finfo(FILEINFO_MIME_TYPE))->file($f['tmp_name']):'';if($f['error']!==UPLOAD_ERR_OK||$f['size']>5*1024*1024||!isset($allowed[$mime]))$errors[]='O anexo deve ser PDF, JPG, PNG ou WebP e ter no m&aacute;ximo 5 MB.';else $uploadName=bin2hex(random_bytes(16)).'.'.$allowed[$mime];}
        if($errors){http_response_code(422);$_SESSION['csrf']=bin2hex(random_bytes(24));$this->page('quote',['csrf'=>$_SESSION['csrf'],'formData'=>$fields,'formErrors'=>$errors,'seo'=>$seo]);return;}
        try{$this->persistQuote($fields,$uploadName);}catch(\Throwable $exception){error_log('Quote persistence failed: '.$exception->getMessage());http_response_code(500);$_SESSION['csrf']=bin2hex(random_bytes(24));$this->page('quote',['csrf'=>$_SESSION['csrf'],'formData'=>$fields,'formErrors'=>['N&atilde;o foi poss&iacute;vel registrar a solicita&ccedil;&atilde;o. Tente novamente.'],'seo'=>$seo]);return;}
        $_SESSION['csrf']=bin2hex(random_bytes(24));$this->page('quote',['csrf'=>$_SESSION['csrf'],'formStatus'=>'success','seo'=>$seo]);
    }

    private function startQuoteSession():void
    {
        if(session_status()===PHP_SESSION_ACTIVE)return;
        ini_set('session.use_strict_mode','1');
        ini_set('session.use_only_cookies','1');
        $appUrl=(string)($_ENV['APP_URL']??getenv('APP_URL')?:'');
        session_start([
            'cookie_httponly'=>true,
            'cookie_secure'=>str_starts_with(strtolower($appUrl),'https://'),
            'cookie_samesite'=>'Lax',
            'cookie_path'=>'/',
            'use_strict_mode'=>true,
            'use_only_cookies'=>true,
        ]);
    }

    private function safeCsvCell(string $value):string
    {
        return preg_match('/^[\x00-\x20]*[=+\-@]/',$value)===1?"'".$value:$value;
    }

    private function persistQuote(array $fields,string $uploadName):void
    {
        $storage=dirname(__DIR__,2).'/storage';
        $uploads=$storage.'/uploads';
        if(!is_dir($uploads)&&!mkdir($uploads,0775,true)&&!is_dir($uploads))throw new \RuntimeException('storage directory unavailable');
        $uploadedPath='';
        if($uploadName!==''){
            $uploadedPath=$uploads.'/'.$uploadName;
            if(!move_uploaded_file($_FILES['project_file']['tmp_name'],$uploadedPath))throw new \RuntimeException('upload move failed');
        }
        $csv=fopen($storage.'/quote-requests.csv','ab');
        if($csv===false){if($uploadedPath!=='')@unlink($uploadedPath);throw new \RuntimeException('CSV open failed');}
        try{
            if(!flock($csv,LOCK_EX))throw new \RuntimeException('CSV lock failed');
            if(ftell($csv)===0&&fputcsv($csv,['created_at',...array_keys($fields),'file'],',','"','')===false)throw new \RuntimeException('CSV header write failed');
            $safeFields=array_map(fn(string $value):string=>$this->safeCsvCell($value),array_values($fields));
            if(fputcsv($csv,[date(DATE_ATOM),...$safeFields,$uploadName],',','"','')===false)throw new \RuntimeException('CSV row write failed');
            fflush($csv);
            flock($csv,LOCK_UN);
        }catch(\Throwable $exception){
            if($uploadedPath!=='')@unlink($uploadedPath);
            throw $exception;
        }finally{fclose($csv);}
    }
}
