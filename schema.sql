-- Banco de dados: renthub
-- Execute este script para criar a estrutura do banco

CREATE DATABASE IF NOT EXISTS alugai CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE renthub;

CREATE TABLE IF NOT EXISTS usuarios (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nome       VARCHAR(120)  NOT NULL,
  email      VARCHAR(180)  NOT NULL UNIQUE,
  senha      VARCHAR(255)  NOT NULL,  -- armazenado com password_hash()
  criado_em  DATETIME      DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS administradores (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  email      VARCHAR(180)  NOT NULL UNIQUE,
  senha      VARCHAR(255)  NOT NULL,  -- armazenado com password_hash()
  criado_em  DATETIME      DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS itens (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  titulo      VARCHAR(200)  NOT NULL,
  categoria   ENUM('cozinha','marcenaria','informatica','outros') NOT NULL,
  descricao   TEXT,
  usuario_id  INT           NOT NULL,
  criado_em   DATETIME      DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
