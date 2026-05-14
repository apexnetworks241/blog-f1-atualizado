<?php
// 1. Receber dados do formulário

$nome_user  = $_POST['nome_user'];
$email_user = $_POST['email_user'];
$senha      = $_POST['senha'];
$id_usuario = $_POST['id_usuario'];

// 2. Criptografar a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// 3. Montar instrução SQL (UPDATE)

$sql = "
UPDATE usuarios
SET nome_user  = :nome_user,
    email_user = :email_user,
    senha      = :senha
WHERE id_usuario = :id_usuario;
";

// 4. Conectar com o banco

$conn = new PDO("sqlite:../../banco.db");

// 5. Prepared Statement

$stmt = $conn->prepare($sql);

// 6. Passamos os valores antes de executar o comando

$stmt->bindValue(':nome_user',  $nome_user);
$stmt->bindValue(':email_user', $email_user);
$stmt->bindValue(':senha',      $senha_hash);
$stmt->bindValue(':id_usuario', $id_usuario);

// 7. Executamos o comando

$stmt->execute();

// 8. Redirecionamos para a listagem

ob_start();
header("Location: /View/usuarios/listagem-user.php");
exit;
?>