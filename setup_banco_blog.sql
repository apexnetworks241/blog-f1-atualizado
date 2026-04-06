.open banco.db
.mode table
.output verificacao.txt;

DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS circuitos;
DROP TABLE IF EXISTS equipes;
DROP TABLE IF EXISTS posts;
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
    voltas INTEGER,
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
    status BOOLEAN,
    descricao_equipe TEXT
);

CREATE TABLE IF NOT EXISTS posts (
    id_posts INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo_post TEXT,
    conteudo_post TEXT,
    usuario_id INTEGER,
    circuito_id INTEGER,
    equipe_id INTEGER,
    FOREIGN KEY (usuario_id)  REFERENCES usuarios(id)  ON DELETE CASCADE,
    FOREIGN KEY (circuito_id) REFERENCES circuitos(id) ON DELETE SET NULL,
    FOREIGN KEY (equipe_id)   REFERENCES equipes(id)   ON DELETE SET NULL
);

PRAGMA table_info (usuarios);
PRAGMA table_info (circuitos);
PRAGMA table_info (equipes);
PRAGMA table_info (posts);
PRAGMA table_info (perfil);