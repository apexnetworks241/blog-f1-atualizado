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




/* Lógico_3: */

CREATE TABLE Usuario (
    nome_user VARCHAR,
    email_user VARCHAR,
    tipo_Usuario,_admin_ VARCHAR,
    senha VARCHAR,
    id_usuario INTEGER PRIMARY KEY
);

CREATE TABLE Circuitos (
    id_circuito INTEGER PRIMARY KEY,
    nome_circuito VARCHAR,
    pais_circuito VARCHAR,
    cidade VARCHAR,
    extensao VARCHAR,
    ano_gp VARCHAR,
    regiao VARCHAR,
    descricao_circuito VARCHAR,
    fk_Usuario_id_usuario INTEGER
);

CREATE TABLE Equipes (
    id_equipe INTEGER PRIMARY KEY,
    nome_equipe VARCHAR,
    pais_equipe VARCHAR,
    base VARCHAR,
    status VARCHAR,
    descricao_equipe VARCHAR,
    anos VARCHAR,
    titulos VARCHAR,
    fk_Usuario_id_usuario INTEGER
);

CREATE TABLE Novidades (
    id_novidades INTEGER PRIMARY KEY,
    titulo VARCHAR,
    data_pub DATE,
    conteudo VARCHAR,
    fk_Usuario_id_usuario INTEGER
);
 
ALTER TABLE Circuitos ADD CONSTRAINT FK_Circuitos_2
    FOREIGN KEY (fk_Usuario_id_usuario)
    REFERENCES Usuario (id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE Equipes ADD CONSTRAINT FK_Equipes_2
    FOREIGN KEY (fk_Usuario_id_usuario)
    REFERENCES Usuario (id_usuario)
    ON DELETE CASCADE;
 
ALTER TABLE Novidades ADD CONSTRAINT FK_Novidades_2
    FOREIGN KEY (fk_Usuario_id_usuario)
    REFERENCES Usuario (id_usuario)
    ON DELETE CASCADE;