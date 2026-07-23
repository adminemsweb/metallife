<?php

declare(strict_types=1);

return [
    'brand' => [
        'name' => 'METAL LIFE',
        'manualTitle' => 'Equipamentos industriais',
        'subtitle' => 'Cabines de pintura robustas para linhas de produção que não podem parar.',
        'date' => 'Julho de 2026',
        'mission' => 'Fabricar cabines de pintura robustas para a indústria metalúrgica e moveleira, com suporte técnico real do projeto à manutenção.',
        'vision' => 'Ser reconhecida como parceira técnica confiável para operações industriais que dependem de desempenho contínuo.',
        'positioning' => 'A fabricante que entrega equipamentos robustos com suporte técnico de verdade para linhas de produção que não podem parar.',
        'territory' => 'Confiabilidade operacional',
    ],
    'sections' => [
        ['number' => '01', 'title' => 'Empresa', 'description' => 'Quem somos, missão e posicionamento', 'route' => '/empresa'],
        ['number' => '02', 'title' => 'Soluções', 'description' => 'Cabines de pintura e suporte técnico', 'route' => '/solucoes'],
        ['number' => '03', 'title' => 'Segmentos', 'description' => 'Metalúrgica, moveleira e produção contínua', 'route' => '/segmentos'],
        ['number' => '04', 'title' => 'Diferenciais', 'description' => 'Robustez, conformidade e pós-venda', 'route' => '/diferenciais'],
        ['number' => '05', 'title' => 'Conteúdo técnico', 'description' => 'Ficha técnica, aplicações e comunicação', 'route' => '/conteudo-tecnico'],
        ['number' => '06', 'title' => 'Contato', 'description' => 'Solicite uma avaliação técnica', 'route' => '/contato'],
    ],
    'hero' => [
        'eyebrow' => 'Cabines de pintura industriais',
        'title' => 'Equipamentos robustos para linhas de produção que não podem parar.',
        'description' => 'A METAL LIFE projeta, fabrica e dá suporte técnico a cabines de pintura para indústrias metalúrgicas e moveleiras que precisam de confiabilidade operacional.',
        'primaryCta' => 'Solicitar avaliação técnica',
        'secondaryCta' => 'Conhecer soluções',
    ],
    'solutions' => [
        ['title' => 'Cabines de pintura industriais', 'description' => 'Projetos dimensionados para operação contínua, alta demanda e rotina produtiva real.'],
        ['title' => 'Sistemas de exaustão e filtragem', 'description' => 'Soluções alinhadas a requisitos ambientais, segurança e desempenho operacional.'],
        ['title' => 'Manutenção e peças', 'description' => 'Atendimento pós-venda para reduzir parada de linha e manter o equipamento disponível.'],
    ],
    'metrics' => [
        ['value' => '120px', 'label' => 'largura mínima digital da marca'],
        ['value' => '3 cm', 'label' => 'referência mínima para impressão'],
        ['value' => '360°', 'label' => 'suporte do projeto à manutenção'],
    ],
    'pillars' => [
        ['title' => 'Robustez', 'description' => 'Equipamentos dimensionados para uso contínuo e alta demanda.'],
        ['title' => 'Suporte real', 'description' => 'Peças, manutenção e atendimento mesmo após a instalação.'],
        ['title' => 'Conformidade', 'description' => 'Soluções alinhadas às normas ambientais e de segurança vigentes.'],
        ['title' => 'Proximidade técnica', 'description' => 'Parceiro consultivo, não apenas fornecedor.'],
    ],
    'personas' => [
        [
            'label' => 'Persona 1',
            'title' => 'Gestor Industrial / Gerente de Produção',
            'description' => 'Parada de linha, durabilidade, conformidade, custo operacional.',
            'accent' => 'navy',
        ],
        [
            'label' => 'Persona 2',
            'title' => 'Dono / Diretor de PME Industrial',
            'description' => 'ROI, prazo de entrega, suporte pós-venda, confiança de longo prazo.',
            'accent' => 'amber',
        ],
        [
            'label' => 'Persona 3',
            'title' => 'Engenheiro / Comprador Técnico',
            'description' => 'Especificações, ficha técnica — faz a triagem antes do comercial.',
            'accent' => 'navy',
        ],
    ],
    'valueProblems' => [
        ['title' => 'Risco de parada de produção', 'description' => 'Equipamento robusto + suporte técnico acessível.'],
        ['title' => 'Incerteza sobre conformidade', 'description' => 'Cabines alinhadas a normas ambientais e de segurança.'],
        ['title' => 'Falta de relacionamento pós-venda', 'description' => 'Presença contínua — peças, manutenção, atendimento técnico.'],
    ],
    'messagePillars' => [
        ['title' => 'Robustez', 'proof' => 'Especificações técnicas, garantia, casos de uso prolongado.'],
        ['title' => 'Suporte real', 'proof' => 'SLA de atendimento, disponibilidade de peças, depoimentos.'],
        ['title' => 'Conformidade', 'proof' => 'Certificações, ficha técnica, dados de filtragem/exaustão.'],
        ['title' => 'Proximidade técnica', 'proof' => 'Conteúdo técnico, atendimento consultivo.'],
    ],
    'colors' => [
        ['name' => 'Azul Naval', 'role' => 'Primária', 'hex' => '#112240', 'rgb' => '17, 34, 64', 'pantone' => 'PMS 289 C'],
        ['name' => 'Azul Ardósia', 'role' => 'Primária', 'hex' => '#3D5A80', 'rgb' => '61, 90, 128', 'pantone' => 'PMS 654 C'],
        ['name' => 'Âmbar Metálico', 'role' => 'Primária', 'hex' => '#C97D2E', 'rgb' => '201, 125, 46'],
        ['name' => 'Cinza Claro', 'role' => 'Fundo / neutro', 'hex' => '#E8ECF2', 'rgb' => '232, 236, 242', 'pantone' => 'PMS Cool Gray 1 C'],
    ],
    'logos' => [
        ['name' => 'Versão principal', 'description' => 'Uso preferencial em fundos brancos ou muito claros.', 'path' => '/assets/logos/metal-life-primary.svg', 'class' => 'light'],
        ['name' => 'Versão invertida', 'description' => 'Uso sobre Azul Naval e fundos escuros de alto contraste.', 'path' => '/assets/logos/metal-life-white.svg', 'class' => 'dark'],
        ['name' => 'Versão monocromática', 'description' => 'Uso restrito para aplicações técnicas ou limitações de impressão.', 'path' => '/assets/logos/metal-life-monochrome.svg', 'class' => 'neutral'],
    ],
    'voice' => [
        'personality' => ['Técnica', 'Confiável', 'Direta', 'Robusta', 'Próxima', 'Consultiva', 'Segura', 'Profissional'],
        'correct' => [
            'Projetamos cabines de pintura dimensionadas para o ritmo real da sua produção.',
            'Do projeto à manutenção, nossa equipe acompanha a operação do equipamento.',
            'Soluções robustas para linhas de produção que não podem parar.',
        ],
        'avoid' => [
            'A melhor cabine do mercado.',
            'Tecnologia revolucionária que mudará sua empresa.',
            'Qualidade incomparável e resultados garantidos.',
        ],
        'rewrite' => [
            ['avoid' => 'A cabine mais inovadora do mercado', 'use' => 'Dimensionada para reduzir parada de linha e atender às normas vigentes'],
            ['avoid' => 'Apaixonados por transformar sua indústria', 'use' => 'Atendemos do projeto à manutenção — inclusive depois da instalação'],
            ['avoid' => 'Solução completa e revolucionária', 'use' => 'Equipamento robusto, com suporte técnico e peças disponíveis'],
        ],
        'tagline' => 'Equipamento que não para sua produção.',
        'alternatives' => 'Cabines feitas para rodar todos os dias. · Sua linha de pintura, sem interrupção.',
        'pitch' => 'A METAL LIFE fabrica cabines de pintura para indústria metalúrgica e moveleira. Diferente de fornecedores que entregam e desaparecem, a gente continua por perto — com peças, manutenção e suporte técnico.',
    ],
    'applications' => [
        'Ficha técnica', 'Proposta comercial', 'Apresentação institucional', 'Papel timbrado',
        'Assinatura de e-mail', 'Uniforme', 'Cartão de visita', 'LinkedIn',
        'Instagram', 'Capa de catálogo', 'Adesivo de equipamento', 'Placa de identificação industrial',
    ],
];
