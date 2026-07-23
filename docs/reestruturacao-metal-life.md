# Reestrutura&ccedil;&atilde;o do site Metal Life

## Arquitetura

O projeto permanece em PHP 8, com renderiza&ccedil;&atilde;o server-side, roteador pr&oacute;prio e MariaDB opcional. O conte&uacute;do do cat&aacute;logo e do blog est&aacute; centralizado em `app/Data/site.php`; `SiteController` entrega p&aacute;ginas, produtos, artigos e o fluxo de or&ccedil;amento. O layout global e os componentes ficam em `app/Views`.

N&atilde;o existe painel administrativo. A estrutura permite substituir o arquivo de dados por um reposit&oacute;rio de banco no futuro sem alterar as URLs ou os templates.

## Mapa de rotas

- `/`: Home
- `/empresa`: sobre a Metal Life
- `/produtos`: cat&aacute;logo
- `/caixas-metalicas-paineis-eletricos`: categoria de caixas e pain&eacute;is
- `/caixa-metalica-sobrepor`, `/caixa-metalica-embutir`, `/quadros-comando-metalicos`, `/gabinetes-autoportantes`, `/caixas-passagem-metalicas`, `/caixas-metalicas-ip54-ip65`: produtos da linha el&eacute;trica
- `/cabines-pintura-industrial`: categoria de cabines
- `/cabine-pintura-eletrostatica-po`, `/cabine-pintura-liquida`, `/cabine-pintura-automatica`, `/estufas-fornos-cura`: produtos da linha de pintura
- `/aplicacoes-setores`: aplica&ccedil;&otilde;es
- `/conteudo-tecnico`: &iacute;ndice de artigos
- `/conteudo-tecnico/{slug}`: artigo
- `/solicitar-orcamento`: formul&aacute;rio GET/POST
- `/contato`, `/politica-de-privacidade` e 404 personalizada

URLs antigas relevantes possuem redirecionamento 301.

## Estrat&eacute;gia de palavras-chave

- Categoria el&eacute;trica: `caixa met&aacute;lica para painel el&eacute;trico`.
- Produtos el&eacute;tricos: uma inten&ccedil;&atilde;o espec&iacute;fica por rota (sobrepor, embutir, quadro de comando, autoportante, passagem e IP54/IP65).
- Categoria pintura: `cabine de pintura industrial`.
- Produtos de pintura: inten&ccedil;&otilde;es separadas para p&oacute;, l&iacute;quida, autom&aacute;tica e cura.
- Blog: os 12 slugs e suas palavras-chave est&atilde;o em `app/Data/site.php`. Os textos s&atilde;o introdut&oacute;rios e n&atilde;o substituem valida&ccedil;&atilde;o t&eacute;cnica ou normativa.

## Padr&otilde;es visuais

- Azul industrial `#102b46`, laranja de a&ccedil;&atilde;o `#cf5b25`, fundos claros e cinzas met&aacute;licos.
- Container m&aacute;ximo de 1240 px e texto limitado para legibilidade.
- Tipografia do sistema para eliminar depend&ecirc;ncias externas.
- Bot&otilde;es, cards, tabelas, formul&aacute;rios e foco vis&iacute;vel padronizados em `public/assets/css/site.css`.
- Breakpoints principais em 1120, 800 e 560 px; o layout continua fluido nas larguras intermedi&aacute;rias.

## Componentes

- Layout global: header, submenus, menu mobile e footer.
- `partials/breadcrumb.php`: breadcrumb vis&iacute;vel e `BreadcrumbList`.
- `partials/product-card.php`: card de produto.
- `partials/cta.php`: CTA reutiliz&aacute;vel.
- Template `product.php`: hero, aplica&ccedil;&otilde;es, tabela, FAQ e CTA.
- Templates `blog.php` e `article.php`: listagem e artigo com `BlogPosting`.
- `quote.php`: formul&aacute;rio com preserva&ccedil;&atilde;o de dados em erro.

## Regras para novas p&aacute;ginas

1. Criar rota descritiva sem IDs ou par&acirc;metros desnecess&aacute;rios.
2. Definir title, description e canonical &uacute;nicos no registro da rota.
3. Usar somente um H1 e manter H2/H3 em ordem l&oacute;gica.
4. Incluir breadcrumb, links internos e CTA contextual.
5. N&atilde;o publicar especifica&ccedil;&otilde;es, normas, certifica&ccedil;&otilde;es ou n&uacute;meros sem comprova&ccedil;&atilde;o.

## Regras para imagens

- Pastas: `public/images/empresa`, `caixas-metalicas`, `quadros-comando`, `gabinetes`, `cabines-pintura`, `estufas`, `aplicacoes` e `blog`.
- Usar nomes descritivos, dimens&otilde;es expl&iacute;citas, propor&ccedil;&atilde;o preservada e alt text factual.
- Imagens abaixo da dobra usam lazy loading.
- Exportar WebP/AVIF no pipeline de publica&ccedil;&atilde;o. O ambiente local atual n&atilde;o possui codificador; os JPEGs foram redimensionados e recomprimidos.
- N&atilde;o reutilizar a mesma foto para produtos diferentes quando as imagens oficiais forem entregues.

## Checklist de SEO

- [x] URLs amig&aacute;veis e redirecionamentos 301
- [x] title, description, canonical, Open Graph e Twitter Card
- [x] um H1 por p&aacute;gina
- [x] Organization, Product, BreadcrumbList e BlogPosting
- [x] links internos, sitemap e robots
- [x] 404 personalizada
- [ ] Trocar `APP_URL`, host do sitemap e robots pelo dom&iacute;nio oficial
- [ ] Adicionar fotos oficiais exclusivas e imagem social dedicada
- [ ] Revisar tecnicamente os artigos antes de publica&ccedil;&atilde;o editorial

## Checklist de publica&ccedil;&atilde;o

- [ ] Confirmar raz&atilde;o social, telefone, e-mail, endere&ccedil;o, redes sociais e canal de privacidade
- [ ] Confirmar hist&oacute;rico, regi&otilde;es atendidas, materiais, acabamentos e certifica&ccedil;&otilde;es
- [ ] Configurar `APP_URL` com HTTPS
- [ ] Definir permiss&otilde;es de escrita em `storage/` e rotina de reten&ccedil;&atilde;o/backup
- [ ] Configurar envio/notifica&ccedil;&atilde;o comercial ou integra&ccedil;&atilde;o com CRM
- [ ] Testar PHP e extens&otilde;es `fileinfo`, `PDO` e `pdo_mysql`
- [ ] Atualizar sitemap/robots para o dom&iacute;nio oficial
- [ ] Executar Lighthouse no ambiente de homologa&ccedil;&atilde;o e revisar Core Web Vitals reais
