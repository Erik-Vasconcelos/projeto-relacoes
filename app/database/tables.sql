DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    dataNascimento  TEXT,
    tipo            INTEGER,
    ativado         INTEGER
);

INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (1,'teste 1','01-01-2000',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (2,'teste 2','01-01-2001',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (3,'teste 3','01-01-2003',1,1);


DROP TABLE IF EXISTS categorias;
CREATE TABLE IF NOT EXISTS categorias (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL
);

INSERT INTO categorias (id, nome) values (1,'Grão');
INSERT INTO categorias (id, nome) values (2,'Enlatado');
INSERT INTO categorias (id, nome) values (3,'Empacotado');

DROP TABLE IF EXISTS produtos;
CREATE TABLE IF NOT EXISTS produtos (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    valor   decimal(10, 2),
    categoria_id INTEGER,
    foreign key(categoria_id) references categorias (id)
);

insert into produtos(id, nome, valor, categoria_id) values(1, 'Arroz', 4.20, 1);
insert into produtos(id, nome, valor, categoria_id) values(2, 'Milho', 25.36, 2);

DROP TABLE IF EXISTS pedidos;
CREATE TABLE IF NOT EXISTS pedidos (
    id              INTEGER PRIMARY KEY,
    nomeCliente TEXT not NULL,
    instant         TEXT

);

DROP TABLE IF EXISTS item_pedido;
CREATE TABLE IF NOT EXISTS item_pedido (
    id      INTEGER PRIMARY KEY,
    produto_id      TEXT    NOT NULL,
    pedido_id      TEXT    NOT NULL,

    FOREIGN KEY (produto_id)
       REFERENCES produtos (id),
    FOREIGN KEY (pedido_id)
       REFERENCES pedidos (id)

);
