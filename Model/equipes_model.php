<?php

// Conectamos com o banco de dados
$string_de_conexao = "sqlite:banco.db";

$conn = new PDO($string_de_conexao);

// Variáveis do blog usadas pela View (index.php)
$blog_nome      = "Blog TI 26";
$blog_autor     = "Willian";
$blog_email_adm = "willian@gmail.com";

// Consulta de usuários
$sql_dados_equipes = "
SELECT id_equipe, nome_equipe, pais_equipe, base, anos, titulos, descricao_equipe
FROM equipes
ORDER BY nome_equipe asc;
";

// Rodamos a consulta — nome consistente usado em index.php
$result_set_equipes = $conn->query($sql_dados_equipes);

?>