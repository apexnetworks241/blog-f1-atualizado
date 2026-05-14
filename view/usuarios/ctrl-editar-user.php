<?php
$id_usuario = $_GET['id_usuario'];

$conn = new PDO("sqlite:../../banco.db");

$sql_dados_usuarios = "
SELECT id_usuario, nome_user, email_user, senha
FROM usuarios
WHERE id_usuario = :id_usuario;
";

$stmt = $conn->prepare($sql_dados_usuarios);
$stmt->bindValue(':id_usuario', $id_usuario);
$stmt->execute();

$um_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$nome_user  = $um_usuario['nome_user'];
$email_user = $um_usuario['email_user'];
$senha      = $um_usuario['senha'];
$id_usuario = $um_usuario['id_usuario'];

require "../../auth.php";
exigir_login();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog F1</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <header>
        <h1>Blog F1</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/view/usuarios/listagem-user.php">Voltar</a>
        </nav>
    </header>
    <h2>Editar usuário</h2>
    <form action="/Controller/usuarios/ctrl-atualizar-user.php" method="post">

        <label>Nome:</label>
        <input type="text" name="nome_user" required value="<?= htmlspecialchars($nome_user) ?>">

        <label>Email:</label>
        <input type="email" name="email_user" required value="<?= htmlspecialchars($email_user) ?>">

        <label>Senha:</label>
        <input type="password" name="senha" required value="<?= htmlspecialchars($senha) ?>">

        <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($id_usuario) ?>">

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>