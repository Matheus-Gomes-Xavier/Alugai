-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS renthub;
USE alugai;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Usuário de exemplo
INSERT INTO usuarios (nome, email, senha) VALUES
('Admin', 'admin@alugai.com', '123456');

-- Tabela de itens
CREATE TABLE IF NOT EXISTS itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descricao TEXT NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Itens de Cozinha
INSERT INTO itens (titulo, descricao, categoria) VALUES
('Liquidificador', 'Liquidificador de alta potência, ideal para sucos e vitaminas.', 'cozinha'),
('Panela de Pressão', 'Panela de pressão 4,5L em ótimo estado.', 'cozinha'),
('Batedeira', 'Batedeira elétrica com 3 velocidades.', 'cozinha');

-- Itens de Marcenaria
INSERT INTO itens (titulo, descricao, categoria) VALUES
('Furadeira', 'Furadeira elétrica com brocas inclusas.', 'marcenaria'),
('Serra Circular', 'Serra circular portátil, perfeita para cortes rápidos.', 'marcenaria'),
('Lixadeira', 'Lixadeira orbital em bom estado.', 'marcenaria');

-- Itens de Informática
INSERT INTO itens (titulo, descricao, categoria) VALUES
('Notebook Dell', 'Notebook i5, 8GB RAM, ótimo para estudo e trabalho.', 'informatica'),
('Monitor 24"', 'Monitor LED de 24 polegadas Full HD.', 'informatica'),
('Teclado Mecânico', 'Teclado mecânico gamer com iluminação RGB.', 'informatica');
