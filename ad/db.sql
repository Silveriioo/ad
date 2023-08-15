CREATE DATABASE ad;

CREATE TABLE ad.usuario (
    id int primary key auto_increment,
    nome VARCHAR(100) not null,
    data_nascimento DATE not null,
    funcao VARCHAR(50) not null,
    pa VARCHAR(5) not null,
    email VARCHAR(100) not null,
    senha VARCHAR(250) not null,
    ip_cliente VARCHAR(45),
    nivel varchar(5)
);

CREATE TABLE ad.patrimonio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    patrimonio VARCHAR(50) NOT NULL,
    destino VARCHAR(100) NOT NULL,
    pa VARCHAR(5) NOT NULL,
    data_cadastro DATE NOT NULL,
    usuario VARCHAR(100) NOT NULL
);

CREATE TABLE ad.usuarios_acessos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(45) not null,
    email VARCHAR(100) not null,
    data_acesso TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM ad.patrimonio;
SELECT * FROM ad.usuario;
SELECT * FROM ad.usuarios_acessos;