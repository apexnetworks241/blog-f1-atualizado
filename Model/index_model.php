<?php
// Conectamos com o banco de dados
$string_de_conexao = "sqlite:banco.db";

$conn = new PDO($string_de_conexao);

// Variáveis do blog usadas pela View (index.php)
$blog_nome      = "Blog F1";
$blog_autor     = "Willian";
$blog_email_adm = "willian@gmail.com";

// Consulta de usuários
$sql_top_equipes = "
SELECT nome_equipe, pais_equipe, titulos
FROM equipes
ORDER BY titulos DESC
LIMIT 3
";

// Rodamos a consulta — nome consistente usado em index.php
$result_top_equipes = $conn->query($sql_top_equipes);

$sql_top_circuitos = "
SELECT nome_circuito, pais_circuito, cidade, ano_gp
FROM circuitos
ORDER BY ano_gp DESC
LIMIT 3
";

$result_top_circuitos = $conn->query($sql_top_circuitos);

$sql_top_novidades = "
SELECT titulo, conteudo, data_pub
FROM novidades
ORDER BY data_pub DESC
LIMIT 3
";

$result_top_novidades = $conn->query($sql_top_novidades);

?>