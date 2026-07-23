CREATE DATABASE IF NOT EXISTS metal_life_brand
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE metal_life_brand;

CREATE TABLE IF NOT EXISTS brand_settings (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  setting_key VARCHAR(80) NOT NULL UNIQUE,
  setting_value TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS manual_sections (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  number VARCHAR(8) NOT NULL,
  title VARCHAR(120) NOT NULL,
  description VARCHAR(255) NOT NULL,
  route VARCHAR(80) NOT NULL,
  sort_order INT UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS brand_pillars (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(120) NOT NULL,
  description TEXT NOT NULL,
  sort_order INT UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS brand_colors (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  role VARCHAR(120) NOT NULL,
  hex VARCHAR(7) NOT NULL,
  rgb VARCHAR(40) NOT NULL,
  cmyk VARCHAR(80) NULL,
  pantone VARCHAR(120) NULL,
  sort_order INT UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS logo_variations (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  description TEXT NOT NULL,
  path VARCHAR(255) NOT NULL,
  class VARCHAR(40) NOT NULL,
  sort_order INT UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS brand_applications (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(140) NOT NULL,
  description TEXT NULL,
  image_path VARCHAR(255) NULL,
  sort_order INT UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO brand_settings (setting_key, setting_value) VALUES
('name', 'METAL LIFE'),
('manualTitle', 'Manual de Marca'),
('subtitle', 'Identidade visual e verbal — guia de uso da marca'),
('date', 'Julho de 2026'),
('mission', 'Fabricar cabines de pintura robustas para a indústria metalúrgica e moveleira, com suporte técnico real do projeto à manutenção.'),
('vision', 'Ser reconhecida como parceira técnica confiável para operações industriais que dependem de desempenho contínuo.'),
('positioning', 'A fabricante que entrega equipamentos robustos com suporte técnico de verdade para linhas de produção que não podem parar.'),
('territory', 'Confiabilidade operacional')
ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value);

INSERT INTO manual_sections (number, title, description, route, sort_order) VALUES
('01', 'Sobre a marca', 'Missão, visão, posicionamento e território', '/sobre', 10),
('02', 'Logo', 'Versões, área de proteção e usos corretos', '/logo', 20),
('03', 'Cores', 'Paleta primária, códigos e combinações', '/cores', 30),
('04', 'Tipografia', 'Fontes, hierarquia e aplicação', '/tipografia', 40),
('05', 'Tom de voz', 'Arquétipo, personalidade e linguagem', '/voz', 50),
('06', 'Aplicações', 'Fichas técnicas, LinkedIn, Instagram e documentos', '/aplicacoes', 60);

INSERT INTO brand_pillars (title, description, sort_order) VALUES
('Robustez', 'Equipamentos dimensionados para uso contínuo e alta demanda.', 10),
('Suporte real', 'Peças, manutenção e atendimento mesmo após a instalação.', 20),
('Conformidade', 'Soluções alinhadas às normas ambientais e de segurança vigentes.', 30),
('Proximidade técnica', 'Parceiro consultivo, não apenas fornecedor.', 40);

INSERT INTO brand_colors (name, role, hex, rgb, pantone, sort_order) VALUES
('Azul Naval', 'Primária', '#112240', '17, 34, 64', 'PMS 289 C', 10),
('Azul Ardósia', 'Primária', '#3D5A80', '61, 90, 128', 'PMS 654 C', 20),
('Âmbar Metálico', 'Primária', '#C97D2E', '201, 125, 46', NULL, 30),
('Cinza Claro', 'Fundo / neutro', '#E8ECF2', '232, 236, 242', 'PMS Cool Gray 1 C', 40);

INSERT INTO logo_variations (name, description, path, class, sort_order) VALUES
('Versão principal', 'Uso preferencial em fundos brancos ou muito claros.', '/assets/logos/metal-life-primary.svg', 'light', 10),
('Versão invertida', 'Uso sobre Azul Naval e fundos escuros de alto contraste.', '/assets/logos/metal-life-white.svg', 'dark', 20),
('Versão monocromática', 'Uso restrito para aplicações técnicas ou limitações de impressão.', '/assets/logos/metal-life-monochrome.svg', 'neutral', 30);

INSERT INTO brand_applications (title, sort_order) VALUES
('Ficha técnica', 10), ('Proposta comercial', 20), ('Apresentação institucional', 30),
('Papel timbrado', 40), ('Assinatura de e-mail', 50), ('Uniforme', 60),
('Cartão de visita', 70), ('LinkedIn', 80), ('Instagram', 90),
('Capa de catálogo', 100), ('Adesivo de equipamento', 110), ('Placa de identificação industrial', 120);
