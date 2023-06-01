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

INSERT INTO categorias (id, nome) values (1,'grão');
INSERT INTO categorias (id, nome) values (2,'enlatado');

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