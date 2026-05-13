<?php

// Conectamos com o banco de dados
$string_de_conexao = "sqlite:banco.db";

$conn = new PDO($string_de_conexao);

// Variáveis do blog usadas pela View (index.php)
$blog_nome      = "Blog TI 26";
$blog_autor     = "Willian";
$blog_email_adm = "willian@gmail.com";

// Consulta de usuários
$sql_dados_novidades = "
SELECT id_novidades, titulo, conteudo, data_pub
FROM novidades
ORDER BY id_novidades DESC;
";

// Rodamos a consulta — nome consistente usado em index.php
$result_set_novidades = $conn->query($sql_dados_novidades);

?>