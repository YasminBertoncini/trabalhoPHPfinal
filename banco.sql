CREATE TABLE cadastro(
    cpf VARCHAR(11) PRIMARY KEY,
    nome VARCHAR(255),
    endereco VARCHAR(255),
    email VARCHAR(255)
    );

    CREATE TABLE precos (
    item VARCHAR(50) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sabor VARCHAR(50) NOT NULL,
    tamanho VARCHAR(50) NOT NULL,
    bebida VARCHAR(50) NOT NULL
);

CREATE TABLE login (
    nomeUsuario VARCHAR(50) NOT NULL,
    senha VARCHAR(50) NOT NULL
);


CREATE TABLE pedidos_detalhes (
    pedido_id INT,
    cpf VARCHAR(11),
    PRIMARY KEY (pedido_id),
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (cpf) REFERENCES cadastro(cpf)
);


INSERT INTO login (nomeUsuario, senha) VALUES
('yasmin@bertoncini', '1234');


INSERT INTO precos (item, tipo, preco) VALUES 
('frango', 'sabor', 25.00), 
('calabresa', 'sabor', 20.00),
 ('portuguesa', 'sabor', 22.00), 
 ('chocolate', 'sabor', 25.00), 
 ('4', 'tamanho', 15.00), 
 ('8', 'tamanho', 20.00), 
 ('12', 'tamanho', 25.00), 
 ('Coca-Cola', 'bebida', 9.00), 
 ('Guarana', 'bebida', 7.50), 
('Fanta', 'bebida', 6.00);