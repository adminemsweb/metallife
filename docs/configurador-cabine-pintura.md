# Configurador de cabine de pintura

O configurador está integrado em `/gabinete-metalico#configurar`, abaixo do visualizador original, conforme a preferência do usuário. O link principal “Gabinete de pintura” abre `/gabinete-metalico`; `/cabine-de-pintura` redireciona temporariamente para essa mesma página. O visualizador mostra o gabinete elétrico e oferece referências de cores; suas fotos não representam uma cabine industrial para pintar peças. O formulário registra separadamente as necessidades do projeto de pintura para avaliação técnica.

O formulário reúne produto, quantidade **e período**, material, dimensões máximas e peso da peça, revestimento, aplicação manual/automática, movimentação, trocas de cor, horas, operadores, medidas internas desejadas, espaço disponível, recursos de interesse, acabamento externo, energia e identificação do solicitante.

As medidas da peça usam centímetros; cabine e espaço usam metros. O tamanho da cabine pode ser informado ou encaminhado para dimensionamento técnico. Alertas comparam eixos na orientação informada e não substituem análise de folgas, acessos, exaustão, filtragem, instalação e equipamentos auxiliares. Não há estimativa automática de capacidade ou preço. Recursos são interesses sujeitos à avaliação, não itens de fornecimento garantidos.

O resumo é montado no navegador, sem armazenamento local nem envio intermediário ao servidor. Inclui as cores escolhidas no visualizador como referência, além das medidas e da produção desejadas. Os botões de proposta do produto levam ao formulário, para não ignorar esses dados. Ao clicar em enviar, o cliente abre o WhatsApp da Metal Life com a mensagem preenchida e decide enviá-la lá. Há uma alternativa para copiar a mensagem e um link ao formulário convencional quando JavaScript não estiver disponível.

## Referências consultadas em 10/09/2026

- [Nordson — Powder Coating Booths](https://www.nordson.com/en/products/industries/powder-coating-booths): diferenças entre produção por lote e linhas de maior volume, aplicação manual/automática, frequência de troca de cores, recuperação e integração com equipamentos.
- [Nordson — Powder Coating Spray Booths](https://www.nordson.com/en/divisions/industrial-coating-solutions/application-solutions/powder-coating/powder-coating-booths): variação de tamanho das peças e disposição das estações de aplicação.
- Dados internos: `app/Views/category-booths.php` e `app/Data/site.php`, que descrevem as linhas Metal Life e os critérios de avaliação por projeto.

As fontes orientam o levantamento de necessidades; números de desempenho e recursos específicos dos equipamentos de outros fabricantes não são atribuídos à Metal Life.

Validação: `node --test tests/booth-project.test.cjs` e lint dos arquivos PHP alterados.
