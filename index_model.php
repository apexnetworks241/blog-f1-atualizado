<?php

// Conectamos com o banco de dados
$string_de_conexao = "sqlite:banco.db";

$conn = new PDO($string_de_conexao);

// Variáveis do blog usadas pela View (index.php)
$blog_nome      = "Blog TI 26";
$blog_autor     = "Willian";
$blog_email_adm = "willian@gmail.com";

// Consulta de usuários
$sql_dados_usuarios = "
SELECT id_usuario, nome_user, email_user, senha, tipo
FROM usuarios
ORDER BY id_usuario DESC;
";

// Rodamos a consulta — nome consistente usado em index.php
$result_set_usuarios = $conn->query($sql_dados_usuarios);

?>