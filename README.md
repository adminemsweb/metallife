# Site Metal Life

Site institucional e cat&aacute;logo industrial em PHP 8, com foco em caixas met&aacute;licas para pain&eacute;is el&eacute;tricos e cabines de pintura industrial.

## Requisitos

- PHP 8.2 ou superior
- Extens&otilde;es `fileinfo` e `PDO`; `pdo_mysql` para usar MariaDB
- MariaDB 10.5 ou superior &eacute; opcional

## Executar localmente

```bash
php -S 127.0.0.1:8080 -t public public/index.php
```

Acesse `http://127.0.0.1:8080`.

N&atilde;o h&aacute; etapa de build: o projeto usa PHP server-side, CSS e JavaScript nativos. O equivalente &agrave; verifica&ccedil;&atilde;o de produ&ccedil;&atilde;o &eacute; executar lint PHP e testar as rotas com `APP_URL` configurada.

```bash
php -l public/index.php
php -l app/Controllers/SiteController.php
```

## Configura&ccedil;&atilde;o

Copie `.env.example` para `.env` e ajuste `APP_URL` e, se necess&aacute;rio, as credenciais MariaDB. Antes de publicar, atualize tamb&eacute;m o host em `public/sitemap.xml` e `public/robots.txt`.

O formul&aacute;rio de or&ccedil;amento grava solicita&ccedil;&otilde;es em `storage/quote-requests.csv` e anexos validados em `storage/uploads/`. Essa pasta &eacute; criada automaticamente e deve possuir permiss&atilde;o de escrita no servidor.

## Documenta&ccedil;&atilde;o

Arquitetura, rotas, SEO, padr&otilde;es visuais e checklists est&atilde;o em `docs/reestruturacao-metal-life.md`.
