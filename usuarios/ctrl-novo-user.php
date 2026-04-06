<?php
// 1. Receber dados do formulário

$nome_user  = $_POST['nome_user'];
$email_user = $_POST['email_user'];
$senha      = $_POST['senha'];
$tipo       = $_POST['tipo'] ?? 'usuario'; // valor padrão caso não enviado

// 2. Montar instrução SQL (INSERT)

$sql = "
INSERT INTO usuarios (nome_user, email_user, senha, tipo)
VALUES (:nome_user, :email_user, :senha, :tipo);
";

// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

$stmt = $conn->prepare($sql);

// 5. Passamos os valores antes de executar o comando

$stmt->bindValue(':nome_user',  $nome_user);
$stmt->bindValue(':email_user', $email_user);
$stmt->bindValue(':senha',      $senha);
$stmt->bindValue(':tipo',       $tipo);

// 6. Executamos o comando

$stmt->execute();

// 7. Pegamos o valor do ID do novo registro

$id = $conn->lastInsertId();

// 8. Redirecionamos para a listagem

require "listagem-user.php";
?>