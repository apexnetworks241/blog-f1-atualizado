<?php

// Conectamos com o banco de dados
$string_de_conexao = "sqlite:banco.db";

$conn = new PDO($string_de_conexao);

// Variáveis do blog usadas pela View (index.php)
$blog_nome      = "Blog TI 26";
$blog_autor     = "Willian";
$blog_email_adm = "willian@gmail.com";

// Consulta de usuários
$sql_dados_circuitos = "
SELECT id_circuito, nome_circuito, pais_circuito, cidade, extensao, ano_gp, regiao, descricao_circuito
FROM circuitos
ORDER BY id_circuito DESC;
";

// Rodamos a consulta — nome consistente usado em index.php
$result_set_circuitos = $conn->query($sql_dados_circuitos);

?>