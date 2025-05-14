
CREATE TABLE admins (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);


CREATE TABLE usuarios (
    id INT(10) NOT NULL AUTO_INCREMENT,
    login VARCHAR(30) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE categorias (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE produtos (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255),
    ativo TINYINT(1) DEFAULT 1,
    categoria_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);