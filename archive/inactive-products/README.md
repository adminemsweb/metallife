# Produtos desativados

Desativados em 29/10/2026: protetores faciais F-1 a F-13, suporte 45 graus, totem de portaria e caixas/totens para controladores faciais.

Os cadastros completos continuam em app/Data/site.php e recebem active=false no filtro final. Apenas os cadastros ativos são enviados às views e ao roteador.

As 38 imagens e arquivos de referência foram movidos de public/images/produtos para archive/inactive-products/public/images/produtos. A pasta archive fica fora do DocumentRoot e não deve ser disponibilizada por uma rota pública.

Para eventual reativação autorizada, rever a permissão de uso do conteúdo, restaurar os arquivos em seus caminhos originais, ajustar o filtro de inativação e os destaques, e reinserir os links no menu e sitemap. Não basta alterar apenas o menu.
