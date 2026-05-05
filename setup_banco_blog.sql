.open banco.db
.mode table
.output verificacao.txt;

DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS circuitos;
DROP TABLE IF EXISTS equipes;
DROP TABLE IF EXISTS novidades;
DROP TABLE IF EXISTS perfil;

CREATE TABLE usuarios(
    id_usuario INTEGER PRIMARY KEY AUTOINCREMENT,
    nome_user TEXT,
    email_user TEXT,
    senha TEXT,
    tipo TEXT CHECK(tipo IN ('admin','usuario')) DEFAULT 'usuario'
);

INSERT INTO usuarios (nome_user, email_user, senha, tipo)
VALUES (
    'Willian',
    'willian@gmail.com',
    '123456',
    'admin'
);

CREATE TABLE circuitos(
    id_circuito INTEGER PRIMARY KEY AUTOINCREMENT,
    nome_circuito TEXT,
    pais_circuito TEXT,
    cidade TEXT,
    extensao REAL,
    ano_gp INTEGER,
    regiao TEXT,
    descricao_circuito TEXT
);

CREATE TABLE equipes (
    id_equipe INTEGER PRIMARY KEY AUTOINCREMENT,
    nome_equipe TEXT,
    pais_equipe TEXT,
    base TEXT,
    anos TEXT,
    titulos INTEGER,
    descricao_equipe TEXT
);

CREATE TABLE IF NOT EXISTS novidades  (
    id_novidades INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT,
    conteudo TEXT,
    data_pub TEXT
);

PRAGMA table_info (usuarios);
PRAGMA table_info (circuitos);
PRAGMA table_info (equipes);
PRAGMA table_info (novidades);
