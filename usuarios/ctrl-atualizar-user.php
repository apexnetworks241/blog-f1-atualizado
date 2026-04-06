<?php
// 1. Receber dados do formulário

$nome_user   = $_POST['nome_user'];
$email_user  = $_POST['email_user'];
$senha       = $_POST['senha'];
$id_usuario  = $_POST['id_usuario'];

// 2. Montar instrução SQL (UPDATE)

$sql = "
UPDATE usuarios
SET nome_user  = :nome_user,
    email_user = :email_user,
    senha      = :senha
WHERE id_usuario = :id_usuario;
";

// 3. Conectar com o banco

$conn = new PDO("sqlite:../banco.db");

// 4. Prepared Statement

$stmt = $conn->prepare($sql);

// 5. Passamos os valores antes de executar o comando

$stmt->bindValue(':nome_user',  $nome_user);
$stmt->bindValue(':email_user', $email_user);
$stmt->bindValue(':senha',      $senha);
$stmt->bindValue(':id_usuario', $id_usuario);

// 6. Executamos o comando

$stmt->execute();

// 7. Mostramos a listagem com o usuário atualizado

require "listagem-user.php";
?>